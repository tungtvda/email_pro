<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 */
 
?>

<?php $form = $this->beginWidget('CActiveForm'); ?>
<div class="box box-primary">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title">
                <span class="glyphicon glyphicon-map-marker"></span> <?php echo Yii::t('ext_ip_location_freegeoip', 'Ip location service from Freegeoip.net');?>
            </h3>
        </div>
        <div class="pull-right"></div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
         <div class="callout callout-info">
            <?php echo Yii::t('ext_ip_location_freegeoip', 'Once the the service is enabled, it will start collecting informations each time when a campaign is opened and/or when a link from within a campaign is clicked.');?><br />
         </div>

         <div class="form-group col-lg-6">
            <?php echo $form->labelEx($model, 'status');?>
            <?php echo $form->dropDownList($model, 'status', $model->getStatusesDropDown(), $model->getHtmlOptions('status')); ?>
            <?php echo $form->error($model, 'status');?>
        </div> 
        
        <div class="form-group col-lg-6">
            <?php echo $form->labelEx($model, 'sort_order');?>
            <?php echo $form->dropDownList($model, 'sort_order', $model->getSortOrderDropDown(), $model->getHtmlOptions('sort_order', array('data-placement' => 'left'))); ?>
            <?php echo $form->error($model, 'sort_order');?>
        </div> 
        
        <div class="clearfix"><!-- --></div>
        
        <div class="form-group col-lg-6">
            <?php echo $form->labelEx($model, 'status_on_email_open');?>
            <?php echo $form->dropDownList($model, 'status_on_email_open', $model->getStatusesDropDown(), $model->getHtmlOptions('status_on_email_open')); ?>
            <?php echo $form->error($model, 'status_on_email_open');?>
        </div> 

        <div class="form-group col-lg-6">
            <?php echo $form->labelEx($model, 'status_on_track_url');?>
            <?php echo $form->dropDownList($model, 'status_on_track_url', $model->getStatusesDropDown(), $model->getHtmlOptions('status_on_track_url')); ?>
            <?php echo $form->error($model, 'status_on_track_url');?>
        </div>

        <div class="clearfix"><!-- --></div>
        
        <div class="form-group col-lg-6">
            <?php echo $form->labelEx($model, 'status_on_unsubscribe');?>
            <?php echo $form->dropDownList($model, 'status_on_unsubscribe', $model->getStatusesDropDown(), $model->getHtmlOptions('status_on_unsubscribe')); ?>
            <?php echo $form->error($model, 'status_on_unsubscribe');?>
        </div>

        <div class="form-group col-lg-6">
            <?php echo $form->labelEx($model, 'status_on_customer_login');?>
            <?php echo $form->dropDownList($model, 'status_on_customer_login', $model->getStatusesDropDown(), $model->getHtmlOptions('status_on_customer_login')); ?>
            <?php echo $form->error($model, 'status_on_customer_login');?>
        </div>
        <div class="clearfix"><!-- --></div> 
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <button type="submit" class="btn btn-default btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>"><?php echo Yii::t('app', 'Save changes');?></button>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>
<?php $this->endWidget(); ?>