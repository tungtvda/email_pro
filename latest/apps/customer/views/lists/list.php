<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
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
    <div class="box box-primary">
        <div class="box-header">
            <div class="pull-left">
                <h3 class="box-title">
                    <span class="glyphicon glyphicon-list-alt"></span> <?php echo $pageHeading;?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo CHtml::link(Yii::t('app', 'Create new'), array('lists/create'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Create new')));?>
                <?php echo CHtml::link(Yii::t('app', 'All subscribers'), array('lists/all_subscribers'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'All subscribers')));?>
                <?php echo CHtml::link(Yii::t('app', 'Refresh'), array('lists/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
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
                    'id'                => $list->modelName.'-grid',
                    'dataProvider'      => $list->search(),
                    'filter'            => $list,
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
                        'htmlOptions'   => array('class' => 'pagination')
                    ),
                    'columns' => $hooks->applyFilters('grid_view_columns', array(
                        array(
                            'name'  => 'list_uid',
                            'value' => 'CHtml::link($data->list_uid,Yii::app()->createUrl("lists/overview", array("list_uid" => $data->list_uid)))',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'name',
                            'value' => 'CHtml::link($data->name,Yii::app()->createUrl("lists/overview", array("list_uid" => $data->list_uid)))',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'display_name',
                            'value' => 'CHtml::link($data->display_name,Yii::app()->createUrl("lists/overview", array("list_uid" => $data->list_uid)))',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'subscribers_count',
                            'value' => 'Yii::app()->format->formatNumber($data->subscribersCount)',
                            'filter'=> false,
                        ),
                        array(
                            'name'  => 'opt_in',
                            'value' => 'Yii::t("lists", ucfirst($data->opt_in))',
                            'filter'=> $list->getOptInArray(),
                        ),
                        array(
                            'name'  => 'opt_out',
                            'value' => 'Yii::t("lists", ucfirst($data->opt_out))',
                            'filter'=> $list->getOptOutArray(),
                        ),
                        array(
                            'name'  => 'merged',
                            'value' => 'Yii::t("lists", ucfirst($data->merged))',
                            'filter'=> $list->getYesNoOptions(),
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
                            'footer'    => $list->paginationOptions->getGridFooterPagination(),
                            'buttons'   => array(
                                'overview' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-info-sign"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("lists/overview", array("list_uid" => $data->list_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('lists', 'Overview'), 'class' => ''),
                                    'visible'   => '!$data->pendingDelete',
                                ),
                                'copy'=> array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-subtitles"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("lists/copy", array("list_uid" => $data->list_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Copy'), 'class' => 'copy-list'),
                                    'visible'   => '!$data->pendingDelete',
                                ),
                                'update' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-pencil"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("lists/update", array("list_uid" => $data->list_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Update'), 'class' => ''),
                                    'visible'   => '$data->editable',
                                ),
                                'confirm_delete' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-remove-circle"></span> &nbsp; ',
                                    'url'       => 'Yii::app()->createUrl("lists/delete", array("list_uid" => $data->list_uid))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Delete'), 'class' => ''),
                                    'visible'   => '$data->isRemovable',
                                ),
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:130px;',
                            ),
                            'template'=>'{overview} {copy} {update} {confirm_delete}'
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
