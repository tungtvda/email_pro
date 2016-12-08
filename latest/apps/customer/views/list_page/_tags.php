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
<div class="callout callout-info">
    <label><?php echo Yii::t('lists', 'Available tags:');?></label>
    <?php foreach ($tags as $tag) { ?>
    <a href="javascript:;" class="btn btn-primary btn-xs" data-tag-name="<?php echo CHtml::encode($tag['tag']);?>">
        <?php echo CHtml::encode($tag['tag']);?>
    </a>
    <?php } ?>
</div>