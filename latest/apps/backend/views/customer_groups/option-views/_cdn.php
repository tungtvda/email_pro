<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.5.4
 */
 
 ?>
 <div class="col-lg-12 row-group-category">
    <div class="box box-primary">
        <div class="box-body">
            <div class="clearfix"><!-- --></div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'enabled');?>
                <?php echo $form->dropDownList($model, 'enabled', $model->getYesNoOptions(), $model->getHtmlOptions('enabled')); ?>
                <?php echo $form->error($model, 'enabled');?>
            </div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'subdomain');?>
                <?php echo $form->textField($model, 'subdomain', $model->getHtmlOptions('subdomain')); ?>
                <?php echo $form->error($model, 'subdomain');?>
            </div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'use_for_email_assets');?>
                <?php echo $form->dropDownList($model, 'use_for_email_assets', $model->getYesNoOptions(), $model->getHtmlOptions('use_for_email_assets')); ?>
                <?php echo $form->error($model, 'use_for_email_assets');?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>