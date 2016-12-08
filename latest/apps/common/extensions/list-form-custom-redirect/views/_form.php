<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
?>
<hr />
<div class="col-lg-12">
    <div class="col-lg-9">
        <label><?php echo Yii::t('lists', 'Instead of the above message, redirect the subscriber to the following url:')?></label>
        <?php echo $form->textField($model, 'url', $model->getHtmlOptions('url'));?>
        <?php echo $form->error($model, 'url');?>
    </div>
    <div class="col-lg-3">
        <label><?php echo Yii::t('lists', 'After this number of seconds:');?></label>
        <?php echo $form->textField($model, 'timeout', $model->getHtmlOptions('timeout'));?>
        <?php echo $form->error($model, 'timeout');?>
    </div>
</div>
<div class="clearfix"><!-- --></div>