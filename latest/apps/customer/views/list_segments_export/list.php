<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.8
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
                    <span class="glyphicon export"></span> <?php echo $pageHeading;?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo CHtml::link(Yii::t('app', 'Cancel'), array('list_segments/index', 'list_uid' => $list->list_uid), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Cancel')));?>
                <?php echo CHtml::link(Yii::t('app', 'Refresh'), array('list_segments_export/index', 'list_uid' => $list->list_uid, 'segment_uid' => $segment->segment_uid), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3><?php echo Yii::t('list_export', 'CSV');?></h3>
                        <p><?php echo Yii::t('app', 'File');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-download"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left">
                            &nbsp; <a href="<?php echo $this->createUrl('list_segments_export/csv', array('list_uid' => $list->list_uid, 'segment_uid' => $segment->segment_uid));?>" class="btn bg-teal btn-flat btn-xs"><span class="glyphicon glyphicon-export"></span> <?php echo Yii::t('list_export', 'Click to export');?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-footer"></div>
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