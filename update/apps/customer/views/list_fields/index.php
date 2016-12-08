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
 
?>
<div class="pull-left">
    <?php $this->widget('customer.components.web.widgets.MailListSubNavWidget', array(
        'list' => $list,
    ))?>
</div>
<div class="clearfix"><!-- --></div>
<hr />
<?php $hooks->doAction('customer_controller_list_fields_before_form');?>
<?php echo CHtml::form();?>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title"><span class="glyphicon glyphicon-tasks"></span> <?php echo $pageHeading;?></h3>
    </div>
    <div class="box-body">
        <div class="list-fields">
            <?php echo $fieldsHtml; ?>
        </div>
        <div class="clearfix"><!-- --></div>
        <div class="list-fields-buttons">
            <?php $hooks->doAction('customer_controller_list_fields_render_buttons');?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>"><?php echo Yii::t('app', 'Save changes');?></button>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>
<?php echo CHtml::endForm();?>
<?php $hooks->doAction('customer_controller_list_fields_after_form');?>