<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.5
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
    <?php echo CHtml::form();?>
    <div class="box box-primary">
        <div class="box-header">
            <div class="pull-left">
                <h3 class="box-title">
                    <span class="glyphicon glyphicon-remove-circle"></span> <?php echo $pageHeading;?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo CHtml::link(Yii::t('app', 'Cancel'), array('lists/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Cancel')));?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">
            <hr />
            
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <strong>
                    <?php echo Yii::t('lists', 'This action will remove {subscribers} subscribers, {segments} segments, {fields} custom fields and {campaigns} campaigns.', array(
                        '{subscribers}' => $list->subscribersCount,
                        '{segments}'    => $list->segmentsCount,
                        '{fields}'      => $list->fieldsCount,
                        '{campaigns}'   => $list->campaignsCount,
                    ));?>
                    <br />
                    <?php echo Yii::t('lists', 'Are you still sure you want to remove this list? There is no coming back after you do it!');?>
                </strong>
            </div>
            
            <hr />
            <h5><?php echo Yii::t('lists', 'Following campaigns will be removed');?></h5>
            <div class="table-responsive">
            <?php 
            $this->widget('zii.widgets.grid.CGridView', $hooks->applyFilters('grid_view_properties', array(
                'ajaxUrl'           => $this->createUrl($this->route),
                'id'                => $campaign->modelName.'-grid',
                'dataProvider'      => $campaign->search(),
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
                        'name'  => 'name',
                        'value' => 'CHtml::link($data->name, Yii::app()->createUrl("campaigns/overview", array("campaign_uid" => $data->campaign_uid)))',
                        'type'  => 'raw',
                    ),
                    array(
                        'name'  => 'type',
                        'value' => 'ucfirst(strtolower($data->getTypeNameDetails()))',
                        'type'  => 'raw',
                        'filter'=> $campaign->getTypesList(),
                        'htmlOptions' => array('style' => 'max-width: 150px')
                    ),
                    array(
                        'name'  => 'status',
                        'value' => '$data->getStatusWithStats()',
                        'filter'=> $campaign->getStatusesList(),
                    ),
                    array(
                        'name'  => 'date_added',
                        'value' => '$data->dateAdded',
                        'filter'=> false,
                    ),
                    array(
                        'name'  => 'send_at',
                        'value' => '$data->getSendAt()',
                        'filter'=> false,
                    ),
                    array(
                        'class'     => 'CButtonColumn',
                        'header'    => Yii::t('app', 'Options'),
                        'footer'    => $campaign->paginationOptions->getGridFooterPagination(),
                        'buttons'   => array(
                            'overview'=> array(
                                'label'     => ' &nbsp; <span class="glyphicon glyphicon-info-sign"></span> &nbsp;', 
                                'url'       => 'Yii::app()->createUrl("campaigns/overview", array("campaign_uid" => $data->campaign_uid))',
                                'imageUrl'  => null,
                                'options'   => array('title' => Yii::t('campaigns', 'Overview'), 'class' => ''),
                                'visible'   => '!$data->editable || $data->isPaused',
                            ),
                            'update'=> array(
                                'label'     => ' &nbsp; <span class="glyphicon glyphicon-pencil"></span> &nbsp;', 
                                'url'       => 'Yii::app()->createUrl("campaigns/update", array("campaign_uid" => $data->campaign_uid))',
                                'imageUrl'  => null,
                                'visible'   => '$data->editable',
                                'options'   => array('title' => Yii::t('app', 'Update'), 'class' => ''),
                            ),
                        ),
                        'htmlOptions' => array(
                            'style' => 'width: 70px;'
                        ),
                        'template'=>'{overview} {update}'
                    ),
                ), $this),
            ), $this));  
            ?>
            <div class="clearfix"><!-- --></div>
            </div>
            <hr />
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="submit" class="btn btn-danger btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>"><?php echo Yii::t('app', 'I understand, delete it!');?></button>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
    <?php echo CHtml::endForm();?>
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