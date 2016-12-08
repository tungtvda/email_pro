<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.3
 */
 
?>

<div class="box box-primary">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> <?php echo Yii::t('servers', 'Customer');?></h3>
        </div>
        <div class="pull-right"></div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
        <div class="form-group col-lg-3">
            <?php echo $form->labelEx($server, 'customer_id');?>
            <?php echo $form->hiddenField($server, 'customer_id', $server->getHtmlOptions('customer_id')); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
                'name'          => 'customer',
                'value'         => !empty($server->customer) ? ($server->customer->getFullName() ? $server->customer->getFullName() : $server->customer->email) : null,
                'source'        => $this->createUrl('customers/autocomplete'),
                'cssFile'       => false,
                'options'       => array(
                    'minLength' => '2',
                    'select'    => 'js:function(event, ui) {
                        $("#'.CHtml::activeId($server, 'customer_id').'").val(ui.item.customer_id);
                    }',
                    'search'    => 'js:function(event, ui) {
                        $("#'.CHtml::activeId($server, 'customer_id').'").val("");
                    }',
                    'change'    => 'js:function(event, ui) {
                        if (!ui.item) {
                            $("#'.CHtml::activeId($server, 'customer_id').'").val("");
                        }
                    }',
                ),
                'htmlOptions'   => $server->getHtmlOptions('customer_id'),
            ));
            ?>
            <?php echo $form->error($server, 'customer_id');?>
        </div>
        <div class="form-group col-lg-3">
            <?php echo $form->labelEx($server, 'locked');?>
            <?php echo $form->dropDownList($server, 'locked', $server->getYesNoOptions(), $server->getHtmlOptions('locked')); ?>
            <?php echo $form->error($server, 'locked');?>
        </div>
        <div class="clearfix"><!-- --></div>           
    </div>
</div>
