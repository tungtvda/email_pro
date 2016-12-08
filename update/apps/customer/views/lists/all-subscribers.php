<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.5.2
 */

/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderContent} to false
 * in order to stop rendering the default content.
 * @since 1.3.3.1
 */
$hooks->doAction('before_view_file_content', $viewCollection = new CAttributeCollection(array(
    'controller'    => $this,
    'renderContent' => true,
)));

// and render if allowed
if ($viewCollection->renderContent) { ?>

    <div class="pull-right">
        <a href="javascript:;" class="btn btn-primary toggle-filters-form"><?php echo Yii::t('list_subscribers', 'Toggle filters form');?></a>
    </div>

    <div class="clearfix"><!-- --></div>
    <?php $this->renderPartial('_filters');?>
    <div class="clearfix"><!-- --></div>

    <hr />

    <div class="box box-primary">
        <div class="box-header">
            <div class="pull-left">
                <h3 class="box-title">
                    <span class="glyphicon glyphicon-users"></span> <?php echo $pageHeading;?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo CHtml::link(Yii::t('list_subscribers', 'Back to lists'), array('lists/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('list_subscribers', 'Back to lists')));?>
                <?php echo CHtml::link(Yii::t('app', 'Refresh'), array('lists/all_subscribers'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
            <?php
            /**
             * This hook gives a chance to prepend content or to replace the default grid view content with a custom content.
             * Please note that from inside the action callback you can access all the controller view
             * variables via {@CAttributeCollection $collection->controller->data}
             * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderGrid} to false
             * in order to stop rendering the default content.
             * @since 1.3.3.1
             */
            $hooks->doAction('before_grid_view', $collection = new CAttributeCollection(array(
                'controller'    => $this,
                'renderGrid'    => true,
            )));

            // and render if allowed
            if ($collection->renderGrid) {
                $this->widget('zii.widgets.grid.CGridView', $hooks->applyFilters('grid_view_properties', array(
                    'ajaxUrl'           => $this->createUrl($this->route),
                    'id'                => $filter->modelName.'-grid',
                    'dataProvider'      => $filter->getActiveDataProvider(),
                    'filter'            => null,
                    'filterPosition'    => 'body',
                    'filterCssClass'    => 'grid-filter-cell',
                    'itemsCssClass'     => 'table table-bordered table-hover table-striped',
                    'selectableRows'    => 0,
                    'enableSorting'     => false,
                    'cssFile'           => false,
                    'pagerCssClass'     => 'pagination pull-right',
                    'pager'             => array(
                        'class'         => 'CLinkPager',
                        'cssFile'       => false,
                        'header'        => false,
                        'htmlOptions'   => array('class' => 'pagination'),
                        // 'pages'         => $pages, 
                    ),
                    'columns' => $hooks->applyFilters('grid_view_columns', array(
                        array(
                            'name'  => 'list_id',
                            'value' => 'CHtml::link($data->list->name, Yii::app()->createUrl("lists/update", array("list_uid" => $data->list->list_uid)))',
                            'type'  => 'raw',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'subscriber_uid',
                            'value' => 'CHtml::link($data->subscriber_uid, Yii::app()->createUrl("list_subscribers/update", array("list_uid" => $data->list->list_uid, "subscriber_uid" => $data->subscriber_uid)))',
                            'type'  => 'raw',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'email',
                            'value' => '$data->email',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'source',
                            'value' => 'Yii::t("list_subscribers", ucfirst($data->source))',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'ip_address',
                            'value' => '$data->ip_address',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'status',
                            'value' => 'Yii::t("list_subscribers", ucfirst($data->status))',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'date_added',
                            'value' => '$data->dateAdded',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'last_updated',
                            'value' => '$data->lastUpdated',
                            'filter'=> false,
                        ),
                        array(
                            'class'     => 'CButtonColumn',
                            'header'    => Yii::t('app', 'Options'),
                            'footer'    => $filter->paginationOptions->getGridFooterPagination(),
                            'buttons'   => array(
                                'update' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-pencil"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("list_subscribers/update", array("list_uid" => $data->list->list_uid, "subscriber_uid" => $data->subscriber_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Update'), 'class' => ''),
                                ),
                                'unsubscribe' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-log-out"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("list_subscribers/unsubscribe", array("list_uid" => $data->list->list_uid, "subscriber_uid" => $data->subscriber_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Unsubscribe'), 'class' => 'unsubscribe', 'data-message' => Yii::t('list_subscribers', 'Are you sure you want to unsubscribe this subscriber?')),
                                    'visible'   => '$data->getCanBeUnsubscribed() && $data->status == ListSubscriber::STATUS_CONFIRMED',
                                ),
                                'subscribe' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-log-in"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("list_subscribers/subscribe", array("list_uid" => $data->list->list_uid, "subscriber_uid" => $data->subscriber_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('list_subscribers', 'Subscribe back'), 'class' => 'subscribe', 'data-message' => Yii::t('list_subscribers', 'Are you sure you want to subscribe back this unsubscriber?')),
                                    'visible'   => '$data->getCanBeConfirmed() && $data->status == ListSubscriber::STATUS_UNCONFIRMED',
                                ),
                                'confirm' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-log-in"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("list_subscribers/subscribe", array("list_uid" => $data->list->list_uid, "subscriber_uid" => $data->subscriber_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('list_subscribers', 'Confirm subscriber'), 'class' => 'subscribe', 'data-message' => Yii::t('list_subscribers', 'Are you sure you want to confirm this subscriber?')),
                                    'visible'   => '$data->getCanBeConfirmed() && $data->status == ListSubscriber::STATUS_UNSUBSCRIBED',
                                ),
                                'delete' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-remove-circle"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("list_subscribers/delete", array("list_uid" => $data->list->list_uid, "subscriber_uid" => $data->subscriber_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Delete'), 'class' => 'delete', 'data-message' => Yii::t('app', 'Are you sure you want to delete this item? There is no coming back after you do it.')),
                                    'visible'   => '$data->getCanBeDeleted()',
                                ),
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:90px;',
                            ),
                            'template'=>'{update} {unsubscribe} {subscribe} {confirm} {delete}'
                        ),
                    ), $this),
                ), $this));
            }
            /**
             * This hook gives a chance to append content after the grid view content.
             * Please note that from inside the action callback you can access all the controller view
             * variables via {@CAttributeCollection $collection->controller->data}
             * @since 1.3.3.1
             */
            $hooks->doAction('after_grid_view', new CAttributeCollection(array(
                'controller'    => $this,
                'renderedGrid'  => $collection->renderGrid,
            )));
            ?>
            <div class="clearfix"><!-- --></div>
            </div>
        </div>
    </div>
<?php
}
/**
 * This hook gives a chance to append content after the view file default content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * @since 1.3.3.1
 */
$hooks->doAction('after_view_file_content', new CAttributeCollection(array(
    'controller'        => $this,
    'renderedContent'   => $viewCollection->renderContent,
)));
