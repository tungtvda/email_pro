<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.6.6
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
                <h3 class="box-title"><?php echo Yii::t('settings', 'SPF/Dkim')?></h3>
            </div>
            <div class="box-body">
                <div class="callout callout-info">
                    <?php echo Yii::t('settings', 'Please note that the values you set here will be used for all the Sending Domains.');?><br />
                    <?php echo Yii::t('settings', 'If you don\'t want this, then leave these empty.');?>
                </div>
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
                <div class="form-group col-lg-12">
                    <?php echo $form->labelEx($model, 'spf');?>
                    <?php echo $form->textField($model, 'spf', $model->getHtmlOptions('spf')); ?>
                    <div class="callout callout-info">
                        <?php echo Yii::t('settings', 'You can use {url} to generate the SPF records.', array('{url}' => CHtml::link('http://www.spfwizard.net/', 'http://www.spfwizard.net/', array('target' => '_blank'))));?>
                    </div>
                    <?php echo $form->error($model, 'spf');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model, 'dkim_private_key');?>
                        <?php echo $form->textArea($model, 'dkim_private_key', $model->getHtmlOptions('dkim_private_key', array('rows' => 10))); ?>
                        <?php echo $form->error($model, 'dkim_private_key');?>
                    </div>
                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model, 'dkim_public_key');?>
                        <?php echo $form->textArea($model, 'dkim_public_key', $model->getHtmlOptions('dkim_public_key', array('rows' => 10))); ?>
                        <?php echo $form->error($model, 'dkim_public_key');?>
                    </div>
                    <div class="clearfix"><!-- --></div>
                    <div class="callout callout-info">
                        <?php echo Yii::t('settings', 'You can use {url} to generate the dkim records.', array('{url}' => CHtml::link('http://dkimcore.org/tools/keys.html', 'http://dkimcore.org/tools/keys.html', array('target' => '_blank'))));?><br />
                        <?php echo Yii::t('settings', 'Please note that you have to paste the full public/private keys, including the key header/footer.');?>
                    </div>
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