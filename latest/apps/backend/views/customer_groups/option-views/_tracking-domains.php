<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.6
 */
 
 ?>
 <div class="col-lg-12 row-group-category">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><?php echo Yii::t('settings', 'Tracking domains')?></h3>
        </div>
        <div class="box-body">
            <div class="callout callout-info">
                <?php echo Yii::t('settings', 'Please note, in order for this feature to work this (sub)domain needs a dedicated IP address, otherwise all defined CNAMES for it will point to the default domain on this server.');?>
                <br />
                <strong><?php echo Yii::t('settings', 'If you do not use a dedicated IP address for this domain only or you are not sure you do so, do not enable this feature!');?></strong>
            </div>
            <div class="clearfix"><!-- --></div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'can_manage_tracking_domains');?>
                <?php echo $form->dropDownList($model, 'can_manage_tracking_domains', $model->getYesNoOptions(), $model->getHtmlOptions('can_manage_tracking_domains')); ?>
                <?php echo $form->error($model, 'can_manage_tracking_domains');?>
            </div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'can_select_for_delivery_servers');?>
                <?php echo $form->dropDownList($model, 'can_select_for_delivery_servers', $model->getYesNoOptions(), $model->getHtmlOptions('can_select_for_delivery_servers')); ?>
                <?php echo $form->error($model, 'can_select_for_delivery_servers');?>
            </div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'can_select_for_campaigns');?>
                <?php echo $form->dropDownList($model, 'can_select_for_campaigns', $model->getYesNoOptions(), $model->getHtmlOptions('can_select_for_campaigns')); ?>
                <?php echo $form->error($model, 'can_select_for_campaigns');?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>