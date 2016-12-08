<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.4
 */
 
?>
<ul class="nav nav-tabs" style="border-bottom: 0px;">
    <li class="<?php echo $this->getAction()->getId() == 'monetization' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/monetization')?>">
            <?php echo Yii::t('settings', 'Monetization');?>
        </a>
    </li>
    <li class="<?php echo $this->getAction()->getId() == 'monetization_orders' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/monetization_orders')?>">
            <?php echo Yii::t('settings', 'Orders');?>
        </a>
    </li>
    <li class="<?php echo $this->getAction()->getId() == 'monetization_invoices' ? 'active' : 'inactive';?>">
        <a href="<?php echo $this->createUrl('settings/monetization_invoices')?>">
            <?php echo Yii::t('settings', 'Invoices');?>
        </a>
    </li>
</ul>