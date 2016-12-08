<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4
 */

?>
<ul class="nav nav-tabs" style="border-bottom: 0px;">
    <li class="<?php echo $this->getAction()->getId() == 'campaign_attachments' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/campaign_attachments')?>">
            <?php echo Yii::t('settings', 'Attachments');?>
        </a>
    </li>
    <li class="<?php echo $this->getAction()->getId() == 'campaign_template_tags' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/campaign_template_tags')?>">
            <?php echo Yii::t('settings', 'Template tags');?>
        </a>
    </li>
    <li class="<?php echo $this->getAction()->getId() == 'campaign_exclude_ips_from_tracking' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/campaign_exclude_ips_from_tracking')?>">
            <?php echo Yii::t('settings', 'Exclude IPs from tracking');?>
        </a>
    </li>
    <li class="<?php echo $this->getAction()->getId() == 'campaign_blacklist_words' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/campaign_blacklist_words')?>">
            <?php echo Yii::t('settings', 'Blacklist words');?>
        </a>
    </li>
    <li class="<?php echo $this->getAction()->getId() == 'campaign_template_engine' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/campaign_template_engine')?>">
            <?php echo Yii::t('settings', 'Template engine');?>
        </a>
    </li>
    <li class="<?php echo $this->getAction()->getId() == 'campaign_misc' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/campaign_misc')?>">
            <?php echo Yii::t('settings', 'Miscellaneous');?>
        </a>
    </li>
</ul>
