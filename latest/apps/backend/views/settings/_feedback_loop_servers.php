<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.3.1
 */
 
?>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"><?php echo Yii::t('settings', 'Settings for processing feedback loop servers')?></h3>
    </div>
    <div class="box-body">
        <?php 
        /**
         * This hook gives a chance to prepend content before the active form fields.
         * Please note that from inside the action callback you can access all the controller view variables 
         * via {@CAttributeCollection $collection->controller->data}
         * @since 1.3.3.1
         */
        $hooks->doAction('before_active_form_fields', new CAttributeCollection(array(
            'controller'        => $this,
            'form'              => $form    
        )));
        ?>
        <div class="clearfix"><!-- --></div>
        <div class="form-group col-lg-3">
            <?php echo $form->labelEx($cronFeedbackModel, 'memory_limit');?>
            <?php echo $form->dropDownList($cronFeedbackModel, 'memory_limit', $cronFeedbackModel->getMemoryLimitOptions(), $cronFeedbackModel->getHtmlOptions('memory_limit', array('data-placement' => 'right'))); ?>
            <?php echo $form->error($cronFeedbackModel, 'memory_limit');?>
        </div>    
        <div class="form-group col-lg-2">
            <?php echo $form->labelEx($cronFeedbackModel, 'servers_at_once');?>
            <?php echo $form->textField($cronFeedbackModel, 'servers_at_once', $cronFeedbackModel->getHtmlOptions('servers_at_once')); ?>
            <?php echo $form->error($cronFeedbackModel, 'servers_at_once');?>
        </div>
        <div class="form-group col-lg-2">
            <?php echo $form->labelEx($cronFeedbackModel, 'emails_at_once');?>
            <?php echo $form->textField($cronFeedbackModel, 'emails_at_once', $cronFeedbackModel->getHtmlOptions('emails_at_once')); ?>
            <?php echo $form->error($cronFeedbackModel, 'emails_at_once');?>
        </div>
        <div class="form-group col-lg-2">
            <?php echo $form->labelEx($cronFeedbackModel, 'pause');?>
            <?php echo $form->textField($cronFeedbackModel, 'pause', $cronFeedbackModel->getHtmlOptions('pause')); ?>
            <?php echo $form->error($cronFeedbackModel, 'pause');?>
        </div> 
        <div class="form-group col-lg-3">
            <?php echo $form->labelEx($cronFeedbackModel, 'subscriber_action');?>
            <?php echo $form->dropDownList($cronFeedbackModel, 'subscriber_action', $cronFeedbackModel->getSubscriberActionOptions(), $cronFeedbackModel->getHtmlOptions('subscriber_action', array('data-placement' => 'left'))); ?>
            <?php echo $form->error($cronFeedbackModel, 'subscriber_action');?>
        </div> 
        <div class="clearfix"><!-- --></div>    
        <?php 
        /**
         * This hook gives a chance to append content after the active form fields.
         * Please note that from inside the action callback you can access all the controller view variables 
         * via {@CAttributeCollection $collection->controller->data}
         * @since 1.3.3.1
         */
        $hooks->doAction('after_active_form_fields', new CAttributeCollection(array(
            'controller'        => $this,
            'form'              => $form    
        )));
        ?>
        <div class="clearfix"><!-- --></div>
    </div>
</div>