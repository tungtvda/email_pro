<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * NOTE: Not used right now, may become deprecated in future.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
?>

<div class="notification">
    <?php echo Yii::t('lists', 'A subscriber has been removed from your list.');?><br />
    <?php echo Yii::t('lists', 'List name');?>: <?php echo $list->name;?><br />
    <?php echo Yii::t('lists', 'Subscriber email');?>: <?php echo $subscriber->email;?><br />
</div>