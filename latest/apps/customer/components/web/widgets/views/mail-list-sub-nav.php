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

<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <?php echo Yii::t('app', 'Quick links');?> <span class="caret"></span>
    </button>
    <?php $this->controller->widget('zii.widgets.CMenu', array(
        'items'         => $this->getNavItems(),
        'htmlOptions'   => array(
            'class' => 'dropdown-menu',
            'role'  => 'menu'
        ),
    ));?>
</div>    