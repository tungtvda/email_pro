<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.6
 */
 
 ?>
 <div class="col-lg-12 row-group-category">
    <div class="box box-primary">
        <div class="box-body">
            <div class="clearfix"><!-- --></div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'show_articles_menu');?>
                <?php echo $form->dropDownList($model, 'show_articles_menu', $model->getYesNoOptions(), $model->getHtmlOptions('show_articles_menu')); ?>
                <?php echo $form->error($model, 'show_articles_menu');?>
            </div>
            <div class="clearfix"><!-- --></div>
            <div class="form-group col-lg-12">
                <?php echo $form->labelEx($model, 'notification_message');?>
                <?php echo $form->textArea($model, 'notification_message', $model->getHtmlOptions('notification_message')); ?>
                <?php echo $form->error($model, 'notification_message');?>
            </div>
            <div class="clearfix"><!-- --></div> 
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>