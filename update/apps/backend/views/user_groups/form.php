<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.5
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
                <div class="pull-left">
                    <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> <?php echo $pageHeading;?></h3>
                </div>
                <div class="pull-right">
                    <?php if (!$group->isNewRecord) { ?>
                    <?php echo CHtml::link(Yii::t('app', 'Create new'), array('user_groups/create'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Create new')));?>
                    <?php } ?>
                    <?php echo CHtml::link(Yii::t('app', 'Cancel'), array('user_groups/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Cancel')));?>
                </div>
                <div class="clearfix"><!-- --></div>
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
                <div class="form-group">
                    <?php echo $form->labelEx($group, 'name');?>
                    <?php echo $form->textField($group, 'name', $group->getHtmlOptions('name')); ?>
                    <?php echo $form->error($group, 'name');?>
                </div>        
                <div class="clearfix"><!-- --></div>
                <hr />
                <div class="clearfix"><!-- --></div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo Yii::t('user_groups', 'Access');?></h3>
                    </div>
                    <div class="box-body">
                        <?php foreach ($routesAccess as $index => $data) { ?>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo CHtml::encode($data['controller']['name']);?></h3>
                            </div>
                            <div class="box-body">
                                
                                <div class="callout callout-info">
                                    <div class="pull-left"><?php echo CHtml::encode($data['controller']['description']);?></div>
                                    <div class="pull-right">
                                        <a href="javascript:;" class="btn btn-primary btn-xs allow-all"><?php echo Yii::t('user_groups', 'Allow all');?></a>
                                        <a href="javascript:;" class="btn btn-primary btn-xs deny-all"><?php echo Yii::t('user_groups', 'Deny all');?></a>
                                        <?php if (!$group->isNewRecord) { ?>
                                        <button class="btn btn-primary btn-xs btn-submit btn-save-route-access" data-init-text="<?php echo Yii::t('app', 'Save changes');?>" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>"><?php echo Yii::t('app', 'Save changes');?></button>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"><!-- --></div>  
                                </div>
                               
                                <?php foreach ($data['routes'] as $route) { ?>
                                <div class="form-group col-lg-2">
                                    <?php echo CHtml::label($route->name, null);?>
                                    <?php echo CHtml::dropDownList($route->modelName.'['.$index.'][routes]['.$route->route.']', $route->access, $route->getAccessOptions(), $route->getHtmlOptions('action', array('id' => '', 'data-content' => $route->description)));?>
                                </div>
                                <?php } ?>
                                <div class="clearfix"><!-- --></div>
                            </div>
                        </div>
                        <?php } ?>   
                        <div class="clearfix"><!-- --></div>  
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