<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.5
 */
 
?>
<div class="callout callout-info">
    <?php echo Yii::t('tools', 'Please wait while splitting the {list} list into {num} sublists. This might take a while depending on your list size.', array(
        '{list}' => $splitTool->getList()->name, 
        '{num}' => (int)$splitTool->sublists
    )); ?>
</div>

<div class="box box-primary">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title">
                <span class="glyphicon glyphicon-share"></span> <?php echo $pageHeading;?> 
            </h3>
        </div>
        <div class="pull-right">
            <?php echo CHtml::link(Yii::t('tools', 'Back to tools'), array('lists_tools/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Back')));?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body" id="split-list-box" data-attrs='<?php echo $jsonAttributes;?>'>
        <span class="counters"></span>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" data-bind="style: {width: widthPercentage()}">
                <span class="sr-only"><span data-bind="text: percentage">0</span>% <?php echo Yii::t('app', 'Complete');?></span>
            </div>
        </div>
        <div class="alert alert-info log-info" data-bind="html: progressText"><?php echo Yii::t('app', 'Please wait...')?></div>
        <div class="log-errors"></div>
    </div>
    <div class="box-footer"></div>
</div>