<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4
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
if ($viewCollection->renderContent) {
    $this->renderPartial('_customers_tabs');
    /**
     * This hook gives a chance to prepend content before the active form or to replace the default active form entirely.
     * Please note that from inside the action callback you can access all the controller view variables 
     * via {@CAttributeCollection $collection->controller->data}
     * In case the form is replaced, make sure to set {@CAttributeCollection $collection->renderForm} to false 
     * in order to stop rendering the default content.
     * @since 1.3.3.1
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
                <h3 class="box-title"><?php echo Yii::t('settings', 'Customer quota counters')?></h3>
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
                    'controller'    => $this,
                    'form'          => $form    
                )));
                ?>
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
                <?php 
                /**
                 * This hook gives a chance to append content after the active form fields.
                 * Please note that from inside the action callback you can access all the controller view variables 
                 * via {@CAttributeCollection $collection->controller->data}
                 * @since 1.3.3.1
                 */
                $hooks->doAction('after_active_form_fields', new CAttributeCollection(array(
                    'controller'    => $this,
                    'form'          => $form    
                )));
                ?>
                <div class="clearfix"><!-- --></div>
            </div>
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
     * @since 1.3.3.1
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
 * @since 1.3.3.1
 */
$hooks->doAction('after_view_file_content', new CAttributeCollection(array(
    'controller'        => $this,
    'renderedContent'   => $viewCollection->renderContent,
)));