<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.6.2
 */

?>

<div class="form-group">
    <?php echo CHtml::activeLabelEx($trackUnsubscribe, 'reason');?>
    <?php echo CHtml::activeTextArea($trackUnsubscribe, 'reason', $trackUnsubscribe->getHtmlOptions('reason', array(
        'name' => 'unsubscribe_reason',
        'id'   => 'unsubscribe_reason',
    ))); ?>
    <?php echo CHtml::error($trackUnsubscribe, 'reason');?>
</div>
