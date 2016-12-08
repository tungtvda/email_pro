<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.7
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
    if(!$template->isNewRecord) { ?>
        <div class="pull-right">
            <a href="javascript:;" onclick="window.open('<?php echo $previewUrl;?>', '<?php echo Yii::t('email_templates',  'Preview');?>', 'height=600, width=600'); return false;" class="btn btn-primary"><?php echo Yii::t('email_templates',  'Preview');?></a>
        </div>
        <div class="clearfix"><!-- --></div>
        <hr />
    <?php 
    }
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
                <h3 class="box-title"> <span class="glyphicon glyphicon-text-width"></span> <?php echo $pageHeading;?> </h3>
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
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($template, 'name');?>
                    <?php echo $form->textField($template, 'name', $template->getHtmlOptions('name')); ?>
                    <?php echo $form->error($template, 'name');?>
                </div>
                <div class="form-group col-lg-3">
                    <?php echo $form->labelEx($template, 'inline_css');?>
                    <?php echo $form->dropDownList($template, 'inline_css', $template->getInlineCssArray(), $template->getHtmlOptions('inline_css')); ?>
                    <?php echo $form->error($template, 'inline_css');?>
                </div>
                <div class="form-group col-lg-3">
                    <?php echo $form->labelEx($template, 'minify');?>
                    <?php echo $form->dropDownList($template, 'minify', $template->getYesNoOptions(), $template->getHtmlOptions('minify')); ?>
                    <?php echo $form->error($template, 'minify');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <hr />
                <div class="form-group">
                    <div class="pull-left">
                        <?php echo $form->labelEx($template, 'content');?> [<a data-toggle="modal" href="#available-tags-modal"><?php echo Yii::t('lists', 'Available tags');?></a>]
                        <?php 
                        // since 1.3.5
                        $hooks->doAction('before_wysiwyg_editor_left_side', array('controller' => $this, 'template' => $template));
                        ?>
                    </div>
                    <div class="pull-right">
                        <?php 
                        // since 1.3.5
                        $hooks->doAction('before_wysiwyg_editor_right_side', array('controller' => $this, 'template' => $template));
                        ?>
                    </div>
                    <div class="clearfix"><!-- --></div>
                    <?php echo $form->textArea($template, 'content', $template->getHtmlOptions('content', array('rows' => 15))); ?>
                    <?php echo $form->error($template, 'content');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <?php 
                /**
                 * This hook gives a chance to append content after the active form fields.
                 * Please note that from inside the action callback you can access all the controller view variables 
                 * via {@CAttributeCollection $collection->controller->data}
                 * 
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
    ?>
    <div class="modal fade" id="available-tags-modal" tabindex="-1" role="dialog" aria-labelledby="available-tags-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo Yii::t('lists', 'Available tags');?></h4>
                </div>
                <div class="modal-body" style="max-height: 300px; overflow-y:scroll;">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <td><?php echo Yii::t('lists', 'Tag');?></td>
                            <td><?php echo Yii::t('lists', 'Required');?></td>
                        </tr>
                        <?php foreach ($campaignTemplate->getAvailableTags() as $tag) { ?>
                            <tr>
                                <td><?php echo CHtml::encode($tag['tag']);?></td>
                                <td><?php echo $tag['required'] ? strtoupper(Yii::t('app', CampaignTemplate::TEXT_YES)) : strtoupper(Yii::t('app', CampaignTemplate::TEXT_NO));?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
                </div>
            </div>
        </div>
    </div>

    <?php 
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