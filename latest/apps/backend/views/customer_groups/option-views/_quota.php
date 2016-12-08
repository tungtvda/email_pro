<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4
 */
 
 ?>
 <div class="col-lg-12 row-group-category">
    <div class="box box-primary">
        <div class="box-body">
            <div class="clearfix"><!-- --></div>
            <div class="form-group col-lg-3">
                <?php echo $form->labelEx($model, 'campaign_emails');?>
                <?php echo $form->dropDownList($model, 'campaign_emails', $model->getYesNoOptions(), $model->getHtmlOptions('campaign_emails')); ?>
                <?php echo $form->error($model, 'campaign_emails');?>
            </div>
            <div class="form-group col-lg-3">
                <?php echo $form->labelEx($model, 'campaign_test_emails');?>
                <?php echo $form->dropDownList($model, 'campaign_test_emails', $model->getYesNoOptions(), $model->getHtmlOptions('campaign_test_emails')); ?>
                <?php echo $form->error($model, 'campaign_test_emails');?>
            </div>
            <div class="form-group col-lg-3">
                <?php echo $form->labelEx($model, 'template_test_emails');?>
                <?php echo $form->dropDownList($model, 'template_test_emails', $model->getYesNoOptions(), $model->getHtmlOptions('template_test_emails')); ?>
                <?php echo $form->error($model, 'template_test_emails');?>
            </div>
            <div class="form-group col-lg-3">
                <?php echo $form->labelEx($model, 'list_emails');?>
                <?php echo $form->dropDownList($model, 'list_emails', $model->getYesNoOptions(), $model->getHtmlOptions('list_emails')); ?>
                <?php echo $form->error($model, 'list_emails');?>
            </div>
            <div class="clearfix"><!-- --></div> 
            <div class="form-group col-lg-3">
                <?php echo $form->labelEx($model, 'transactional_emails');?>
                <?php echo $form->dropDownList($model, 'transactional_emails', $model->getYesNoOptions(), $model->getHtmlOptions('transactional_emails')); ?>
                <?php echo $form->error($model, 'transactional_emails');?>
            </div>
            <div class="clearfix"><!-- --></div> 
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>