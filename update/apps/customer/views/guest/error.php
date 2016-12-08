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


<div class="box box-primary">
    <div class="box-header"><h3 class="box-title"><?php echo Yii::t('app', 'Error {code}!', array('{code}' => (int)$code));?></h3></div>
    <div class="box-body">
        <p class="info"><?php echo CHtml::encode($message);?></p>
    </div>
    <div class="box-footer">
        <div class="pull-right">
            <a href="javascript:history.back(-1);" class="btn btn-default"> <i class="glyphicon glyphicon-circle-arrow-left"></i> <?php echo Yii::t('app', 'Back')?></a>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
</div>