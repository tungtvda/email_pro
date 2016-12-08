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

<div class="form-group wrap-<?php echo strtolower($field->tag);?>">
    <?php echo CHtml::activeLabelEx($model, 'value');?>
    <?php echo CHtml::textField($field->tag, $model->value, $model->getHtmlOptions('value')); ?>
    <?php echo CHtml::error($model, 'value');?>
</div>