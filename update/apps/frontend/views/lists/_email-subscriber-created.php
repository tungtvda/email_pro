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

$subscriberUpdateUrl = Yii::app()->apps->getAppUrl('customer', sprintf('lists/%s/subscribers/%s/update', $list->list_uid, $subscriber->subscriber_uid), true); 
?>

<div class="notification">
    <?php echo Yii::t('lists', 'A new subscriber has been added to your list.');?><br />
    <?php echo Yii::t('lists', 'List name');?>: <?php echo $list->name;?><br />
    <?php echo Yii::t('lists', 'Details url');?>: <?php echo CHtml::link($subscriberUpdateUrl, $subscriberUpdateUrl);?><br />
    <br />
    <?php echo Yii::t('lists', 'Submitted data');?>:<br />
    <?php foreach ($fields as $fieldLabel => $fieldValue) { ?>
    <?php echo $fieldLabel; ?>: <?php echo $fieldValue;?><br />
    <?php } ?>
</div>