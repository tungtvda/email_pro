<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.5
 */

/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderContent} to false 
 * in order to stop rendering the default content.
 * @since 1.3.4.3
 */
$hooks->doAction('before_view_file_content', $viewCollection = new CAttributeCollection(array(
    'controller'    => $this,
    'renderContent' => true,
)));

// and render if allowed
if ($viewCollection->renderContent) { ?>
    <div class="box box-primary">
        <div class="box-header" id="chatter-header">
            <h3 class="box-title"><i class="glyphicon glyphicon-list-alt"></i> <?php echo $pageHeading;?></h3>
            <div class="box-tools pull-right"></div>
        </div>
        <div class="box-body">
            <div class="clearfix"><!-- --></div>

            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo Yii::t('tools', 'Sync');?></h3>
                        <p><?php echo Yii::t('tools', 'Subscribers');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left"></div>
                        <div class="pull-right">
                            <a href="#sync-lists-modal" data-toggle="modal" class="btn bg-red btn-flat btn-xs"><span class="glyphicon glyphicon-eye-open"></span> <?php echo Yii::t('app', 'View');?></a>&nbsp;
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo Yii::t('tools', 'Split');?></h3>
                        <p><?php echo Yii::t('tools', 'List');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-albums"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left"></div>
                        <div class="pull-right">
                            <a href="#split-list-modal" data-toggle="modal" class="btn bg-aqua btn-flat btn-xs"><span class="glyphicon glyphicon-eye-open"></span> <?php echo Yii::t('app', 'View');?></a>&nbsp;
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>

            <div class="clearfix"><!-- --></div>    
        </div>
    </div>

    <div class="modal fade" id="sync-lists-modal" tabindex="-1" role="dialog" aria-labelledby="diff-lists-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo Yii::t('tools', 'Sync lists');?></h4>
            </div>
            <div class="modal-body">
                <?php 
                $form = $this->beginWidget('CActiveForm', array(
                    'action'        => array('lists_tools/sync'),
                    'htmlOptions'   => array('id' => 'sync-lists-form'),
                ));
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($syncTool, 'primary_list_id');?>
                    <?php echo $form->dropDownList($syncTool, 'primary_list_id', $syncTool->getAsDropDownOptionsByCustomerId(), $syncTool->getHtmlOptions('primary_list_id')); ?>
                    <!-- <div class="callout callout-info"><?php echo $syncTool->getAttributeHelpText('primary_list_id');?></div> -->
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($syncTool, 'secondary_list_id');?>
                    <?php echo $form->dropDownList($syncTool, 'secondary_list_id', $syncTool->getAsDropDownOptionsByCustomerId(), $syncTool->getHtmlOptions('secondary_list_id')); ?>
                    <!-- <div class="callout callout-info"><?php echo $syncTool->getAttributeHelpText('secondary_list_id');?></div> -->
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($syncTool, 'missing_subscribers_action');?>
                    <?php echo $form->dropDownList($syncTool, 'missing_subscribers_action', $syncTool->getMissingSubscribersActions(), $syncTool->getHtmlOptions('missing_subscribers_action')); ?>
                    <div class="callout callout-info"><?php echo $syncTool->getAttributeHelpText('missing_subscribers_action');?></div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($syncTool, 'duplicate_subscribers_action');?>
                    <?php echo $form->dropDownList($syncTool, 'duplicate_subscribers_action', $syncTool->getDuplicateSubscribersActions(), $syncTool->getHtmlOptions('duplicate_subscribers_action')); ?>
                    <div class="callout callout-info"><?php echo $syncTool->getAttributeHelpText('duplicate_subscribers_action');?></div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($syncTool, 'distinct_status_action');?>
                    <?php echo $form->dropDownList($syncTool, 'distinct_status_action', $syncTool->getDistinctStatusActions(), $syncTool->getHtmlOptions('distinct_status_action')); ?>
                    <div class="callout callout-info"><?php echo $syncTool->getAttributeHelpText('distinct_status_action');?></div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
              <button type="button" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>" onclick="$('#sync-lists-form').submit();"><?php echo Yii::t('app', 'Sync');?></button>
            </div>
          </div>
        </div>
    </div>
    
    <div class="modal fade" id="split-list-modal" tabindex="-1" role="dialog" aria-labelledby="split-list-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo Yii::t('tools', 'Split list');?></h4>
            </div>
            <div class="modal-body">
                <div class="callout callout-info">
                    <?php echo Yii::t('lists', 'This tool allows you to split a big list into multiple smaller ones. Please note that subscribers from the selected list will be moved into new lists, not copied.');?>
                </div>
                <?php 
                $form = $this->beginWidget('CActiveForm', array(
                    'action'        => array('lists_tools/split'),
                    'htmlOptions'   => array('id' => 'split-list-form'),
                ));
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($splitTool, 'list_id');?>
                    <?php echo $form->dropDownList($splitTool, 'list_id', $splitTool->getAsDropDownOptionsByCustomerId(), $splitTool->getHtmlOptions('list_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($splitTool, 'sublists');?>
                    <?php echo $form->textField($splitTool, 'sublists', $splitTool->getHtmlOptions('sublists')); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($splitTool, 'limit');?>
                    <?php echo $form->dropDownList($splitTool, 'limit', $splitTool->getLimitOptions(), $splitTool->getHtmlOptions('limit')); ?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
              <button type="button" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>" onclick="$('#split-list-form').submit();"><?php echo Yii::t('app', 'Split');?></button>
            </div>
          </div>
        </div>
    </div>

<?php 
}
/**
 * This hook gives a chance to append content after the view file default content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * @since 1.3.4.3
 */
$hooks->doAction('after_view_file_content', new CAttributeCollection(array(
    'controller'        => $this,
    'renderedContent'   => $viewCollection->renderContent,
)));