<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.3
 */
 
?>
<div class="box box-primary">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title">
                <span class="glyphicon glyphicon-file"></span> <?php echo $pageHeading;?>
            </h3>
        </div>
        <div class="pull-right">
            <?php echo CHtml::form();?>
            <button type="submit" name="delete" value="1" class="btn btn-danger btn-xs delete-app-log" data-message="<?php echo Yii::t('app', 'Are you sure you want to remove the application log?')?>"><?php echo Yii::t('app', 'Delete');?></button>
            <?php echo CHtml::endForm();?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
        <textarea class="form-control" rows="30"><?php echo $applicationLog;?></textarea>  
    </div>
</div>