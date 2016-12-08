<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.4
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
if ($viewCollection->renderContent) {
    $this->renderPartial('_customers_tabs');
    /**
     * This hook gives a chance to prepend content before the active form or to replace the default active form entirely.
     * Please note that from inside the action callback you can access all the controller view variables 
     * via {@CAttributeCollection $collection->controller->data}
     * In case the form is replaced, make sure to set {@CAttributeCollection $collection->renderForm} to false 
     * in order to stop rendering the default content.
     * @since 1.3.4.3
     */
    $hooks->doAction('before_active_form', $collection = new CAttributeCollection(array(
        'controller'    => $this,
        'renderForm'    => true,
    )));
    
    // and render if allowed
    if ($collection->renderForm) {
        $form = $this->beginWidget('CActiveForm'); 
        ?>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo Yii::t('settings', 'Customer registration')?></h3>
            </div>
            <div class="box-body">
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'enabled');?>
                    <?php echo $form->dropDownList($model, 'enabled', $model->getYesNoOptions(), $model->getHtmlOptions('enabled')); ?>
                    <?php echo $form->error($model, 'enabled');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'default_group');?>
                    <?php echo $form->dropDownList($model, 'default_group', CMap::mergeArray(array('' => Yii::t('app', 'Choose')), $model->getGroupsList()), $model->getHtmlOptions('default_group')); ?>
                    <?php echo $form->error($model, 'default_group');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'unconfirm_days_removal');?>
                    <?php echo $form->textField($model, 'unconfirm_days_removal', $model->getHtmlOptions('unconfirm_days_removal')); ?>
                    <?php echo $form->error($model, 'unconfirm_days_removal');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'require_approval');?>
                    <?php echo $form->dropDownList($model, 'require_approval', $model->getYesNoOptions(), $model->getHtmlOptions('require_approval')); ?>
                    <?php echo $form->error($model, 'require_approval');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'require_email_confirmation');?>
                    <?php echo $form->dropDownList($model, 'require_email_confirmation', $model->getYesNoOptions(), $model->getHtmlOptions('require_email_confirmation')); ?>
                    <?php echo $form->error($model, 'require_email_confirmation');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'company_required');?>
                    <?php echo $form->dropDownList($model, 'company_required', $model->getYesNoOptions(), $model->getHtmlOptions('company_required')); ?>
                    <?php echo $form->error($model, 'company_required');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'tc_url');?>
                    <?php echo $form->textField($model, 'tc_url', $model->getHtmlOptions('tc_url')); ?>
                    <?php echo $form->error($model, 'tc_url');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'send_email_method');?>
                    <?php echo $form->dropDownList($model, 'send_email_method', $model->getSendEmailMethods(), $model->getHtmlOptions('send_email_method')); ?>
                    <?php echo $form->error($model, 'send_email_method');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'new_customer_registration_notification_to');?>
                    <?php echo $form->textField($model, 'new_customer_registration_notification_to', $model->getHtmlOptions('new_customer_registration_notification_to')); ?>
                    <?php echo $form->error($model, 'new_customer_registration_notification_to');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'default_country');?>
                    <?php echo $form->dropDownList($model, 'default_country', CMap::mergeArray(array('' => ''), Country::getAsDropdownOptions()), $model->getHtmlOptions('default_country')); ?>
                    <?php echo $form->error($model, 'default_country');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'default_timezone');?>
                    <?php echo $form->dropDownList($model, 'default_timezone', CMap::mergeArray(array('' => ''), DateTimeHelper::getTimeZones()), $model->getHtmlOptions('default_timezone')); ?>
                    <?php echo $form->error($model, 'default_timezone');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-12">
                    <?php echo $form->labelEx($model, 'forbidden_domains');?>
                    <?php echo $form->textArea($model, 'forbidden_domains', $model->getHtmlOptions('forbidden_domains')); ?>
                    <?php echo $form->error($model, 'forbidden_domains');?>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo Yii::t('settings', 'Send customer to email list')?></h3>
            </div>
            <div class="box-body">
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-3">
                    <?php echo $form->labelEx($model, 'api_url');?>
                    <?php echo $form->textField($model, 'api_url', $model->getHtmlOptions('api_url')); ?>
                    <?php echo $form->error($model, 'api_url');?>
                </div>
                <div class="form-group col-lg-3">
                    <?php echo $form->labelEx($model, 'api_public_key');?>
                    <?php echo $form->textField($model, 'api_public_key', $model->getHtmlOptions('api_public_key')); ?>
                    <?php echo $form->error($model, 'api_public_key');?>
                </div>
                <div class="form-group col-lg-3">
                    <?php echo $form->labelEx($model, 'api_private_key');?>
                    <?php echo $form->textField($model, 'api_private_key', $model->getHtmlOptions('api_private_key')); ?>
                    <?php echo $form->error($model, 'api_private_key');?>
                </div>
                <div class="form-group col-lg-3">
                    <?php echo $form->labelEx($model, 'api_list_uid');?>
                    <?php echo $form->textField($model, 'api_list_uid', $model->getHtmlOptions('api_list_uid')); ?>
                    <?php echo $form->error($model, 'api_list_uid');?>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>
        
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo Yii::t('settings', 'Facebook integration')?></h3>
            </div>
            <div class="box-body">
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'facebook_enabled');?>
                    <?php echo $form->dropDownList($model, 'facebook_enabled', $model->getYesNoOptions(), $model->getHtmlOptions('facebook_enabled')); ?>
                    <?php echo $form->error($model, 'facebook_enabled');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'facebook_app_id');?>
                    <?php echo $form->textField($model, 'facebook_app_id', $model->getHtmlOptions('facebook_app_id')); ?>
                    <?php echo $form->error($model, 'facebook_app_id');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'facebook_app_secret');?>
                    <?php echo $form->textField($model, 'facebook_app_secret', $model->getHtmlOptions('facebook_app_secret')); ?>
                    <?php echo $form->error($model, 'facebook_app_secret');?>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo Yii::t('settings', 'Twitter integration')?></h3>
            </div>
            <div class="box-body">
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'twitter_enabled');?>
                    <?php echo $form->dropDownList($model, 'twitter_enabled', $model->getYesNoOptions(), $model->getHtmlOptions('twitter_enabled')); ?>
                    <?php echo $form->error($model, 'twitter_enabled');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'twitter_app_consumer_key');?>
                    <?php echo $form->textField($model, 'twitter_app_consumer_key', $model->getHtmlOptions('twitter_app_consumer_key')); ?>
                    <?php echo $form->error($model, 'twitter_app_consumer_key');?>
                </div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'twitter_app_consumer_secret');?>
                    <?php echo $form->textField($model, 'twitter_app_consumer_secret', $model->getHtmlOptions('twitter_app_consumer_secret')); ?>
                    <?php echo $form->error($model, 'twitter_app_consumer_secret');?>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>
        
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo Yii::t('settings', 'Welcome email')?></h3>
            </div>
            <div class="box-body">
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-4">
                    <?php echo $form->labelEx($model, 'welcome_email');?>
                    <?php echo $form->dropDownList($model, 'welcome_email', $model->getYesNoOptions(), $model->getHtmlOptions('welcome_email')); ?>
                    <?php echo $form->error($model, 'welcome_email');?>
                </div>
                <div class="form-group col-lg-8">
                    <?php echo $form->labelEx($model, 'welcome_email_subject');?>
                    <?php echo $form->textField($model, 'welcome_email_subject', $model->getHtmlOptions('welcome_email_subject')); ?>
                    <?php echo $form->error($model, 'welcome_email_subject');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-12">
                    <?php echo $form->labelEx($model, 'welcome_email_content');?>
                    <?php echo $form->textArea($model, 'welcome_email_content', $model->getHtmlOptions('welcome_email_content', array('rows' => 20))); ?>
                    <?php echo $form->error($model, 'welcome_email_content');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="callout callout-info">
                    <?php echo $model->getAttributeHelpText('welcome_email_content');?>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>
        
        <div class="box box-primary">
            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>"><?php echo Yii::t('app', 'Save changes');?></button>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>
        <?php 
        $this->endWidget(); 
    }
    /**
     * This hook gives a chance to append content after the active form.
     * Please note that from inside the action callback you can access all the controller view variables 
     * via {@CAttributeCollection $collection->controller->data}
     * @since 1.3.4.3
     */
    $hooks->doAction('after_active_form', new CAttributeCollection(array(
        'controller'      => $this,
        'renderedForm'    => $collection->renderForm,
    )));
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