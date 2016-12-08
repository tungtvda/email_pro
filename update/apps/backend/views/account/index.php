<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
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
        $form = $this->beginWidget('CActiveForm', array(
            'htmlOptions' => array('enctype' => 'multipart/form-data')
        )); 
        ?>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> <?php echo Yii::t('users', 'Update your account data.');?></h3>
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
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'first_name');?>
                    <?php echo $form->textField($user, 'first_name', $user->getHtmlOptions('first_name')); ?>
                    <?php echo $form->error($user, 'first_name');?>
                </div>        
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'last_name');?>
                    <?php echo $form->textField($user, 'last_name', $user->getHtmlOptions('last_name')); ?>
                    <?php echo $form->error($user, 'last_name');?>
                </div>    
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'email');?>
                    <?php echo $form->textField($user, 'email', $user->getHtmlOptions('email')); ?>
                    <?php echo $form->error($user, 'email');?>
                </div>        
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'confirm_email');?>
                    <?php echo $form->textField($user, 'confirm_email', $user->getHtmlOptions('confirm_email')); ?>
                    <?php echo $form->error($user, 'confirm_email');?>
                </div>        
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'fake_password');?>
                    <?php echo $form->textField($user, 'fake_password', $user->getHtmlOptions('password')); ?>
                    <?php echo $form->error($user, 'fake_password');?>
                </div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'confirm_password');?>
                    <?php echo $form->textField($user, 'confirm_password', $user->getHtmlOptions('confirm_password')); ?>
                    <?php echo $form->error($user, 'confirm_password');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'timezone');?>
                    <?php echo $form->dropDownList($user, 'timezone', $user->getTimeZonesArray(), $user->getHtmlOptions('timezone')); ?>
                    <?php echo $form->error($user, 'timezone');?>
                </div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($user, 'language_id');?>
                    <?php echo $form->dropDownList($user, 'language_id', CMap::mergeArray(array('' => Yii::t('app', 'Application default')), Language::getLanguagesArray()), $user->getHtmlOptions('language_id')); ?>
                    <?php echo $form->error($user, 'language_id');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <hr />
                <div class="form-group col-lg-6">
                    <div class="col-lg-2">
                        <img src="<?php echo $user->getAvatarUrl(90, 90);?>" class="img-thumbnail"/>
                    </div>
                    <div class="col-lg-10">
                        <?php echo $form->labelEx($user, 'new_avatar');?>
                        <?php echo $form->fileField($user, 'new_avatar', $user->getHtmlOptions('new_avatar')); ?>
                        <?php echo $form->error($user, 'new_avatar');?>    
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