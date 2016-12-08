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
    <div class="callout callout-info">
        <?php echo Yii::t('campaign_reports', 'This report shows all the urls from the email and the number of clicks each url received.');?>
    </div>
    <div class="box box-primary">
        <div class="box-header">
            <div class="pull-left">
                <h3 class="box-title">
                    <span class="glyphicon glyphicon-list-alt"></span> <?php echo $pageHeading;?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo CHtml::link(Yii::t('campaign_reports', 'Campaign overview'), array('campaigns/overview', 'campaign_uid' => $campaign->campaign_uid), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('campaign_reports', 'Back to campaign overview')));?>

                <?php echo CHtml::link(Yii::t('campaign_reports', 'All clicks'), array('campaign_reports/click', 'campaign_uid' => $campaign->campaign_uid), array('class' => 'btn '.(empty($show) ? 'btn-default' : 'btn-primary').' btn-xs', 'title' => Yii::t('campaign_reports', 'Export reports')));?>
                <?php echo CHtml::link(Yii::t('campaign_reports', 'Top clicks'), array('campaign_reports/click', 'campaign_uid' => $campaign->campaign_uid, 'show' => 'top'), array('class' => 'btn '.($show == 'top' ? 'btn-default' : 'btn-primary').' btn-xs', 'title' => Yii::t('campaign_reports', 'Export reports')));?>
                <?php echo CHtml::link(Yii::t('campaign_reports', 'Latest clicks'), array('campaign_reports/click', 'campaign_uid' => $campaign->campaign_uid, 'show' => 'latest'), array('class' => 'btn '.($show == 'latest' ? 'btn-default' : 'btn-primary').' btn-xs', 'title' => Yii::t('campaign_reports', 'Export reports')));?>

                <?php if (!empty($canExportStats)) {?>
                <?php echo CHtml::link(Yii::t('campaign_reports', 'Export reports'), array('campaign_reports_export/click', 'campaign_uid' => $campaign->campaign_uid), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('campaign_reports', 'Export reports')));?>
                <?php } ?>
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

            if ($collection->renderGrid) {
                $this->widget('zii.widgets.grid.CGridView', $hooks->applyFilters('grid_view_properties', array(
                    'ajaxUrl'           => $this->createUrl($this->route, array('campaign_uid' => $campaign->campaign_uid)),
                    'id'                => $model->modelName.'-grid',
                    'dataProvider'      => $dataProvider,
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
                        'htmlOptions'   => array('class' => 'pagination')
                    ),
                    'columns' => $hooks->applyFilters('grid_view_columns', array(
                        array(
                            'name'  => 'destination',
                            'value' => '$data->getDisplayGridDestination()',
                            'type'  => 'raw',
                            'htmlOptions' => array('style' => 'max-width:420px;word-wrap:break-word;'),
                        ),
                        array(
                            'name'  => 'clicked_times',
                            'value' => '$data->counter',
                        ),
                        array(
                            'name'  => 'date_added',
                            'value' => '$data->dateAdded',
                        ),
                        array(
                            'class'     => 'CButtonColumn',
                            'header'    => Yii::t('app', 'Options'),
                            'footer'    => $model->paginationOptions->getGridFooterPagination(),
                            'buttons'   => array(
                                'urlclick'=> array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-info-sign"></span> &nbsp;',
                                    'url'       => 'Yii::app()->createUrl("campaign_reports/click_url", array("campaign_uid" => $data->campaign->campaign_uid, "url_id" => $data->url_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('campaign_reports', 'View all clicks for this url'), 'class' => ''),
                                ),
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:70px;',
                            ),
                            'template'=>'{urlclick}'
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
