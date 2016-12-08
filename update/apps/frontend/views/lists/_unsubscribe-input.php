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

<div class="form-group">
    <?php echo CHtml::activeLabelEx($subscriber, 'email');?>
    <?php echo CHtml::activeTextField($subscriber, 'email', $subscriber->getHtmlOptions('email')); ?>
    <?php echo CHtml::error($subscriber, 'email');?>
</div>
