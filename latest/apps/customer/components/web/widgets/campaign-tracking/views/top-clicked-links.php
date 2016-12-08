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

<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('campaign_reports', 'Top clicked links');?></h3>
        </div>
        <div class="panel-body" style="height:380px; overflow-y: scroll;">
            <ul class="list-group">
                <?php foreach ($models as $model) { ?>
                <li class="list-group-item">
                    <div class="pull-left">
                        <?php echo $model->getDisplayGridDestination(40);?>
                    </div>
                    <div class="pull-right">
                        <span class="badge"><?php echo $model->counter;?></span>
                    </div>
                    <div class="clearfix"><!-- --></div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="panel-footer">
            <?php if ($this->showDetailLinks) { ?>
            <div class="pull-right">
                <a href="<?php echo $this->controller->createUrl('campaign_reports/click', array('campaign_uid' => $campaign->campaign_uid));?>" class="btn btn-primary btn-xs"><?php echo Yii::t('campaign_reports', 'View all clicks');?></a>
                <a href="<?php echo $this->controller->createUrl('campaign_reports/click', array('campaign_uid' => $campaign->campaign_uid, 'show' => 'top'));?>" class="btn btn-primary btn-xs"><?php echo Yii::t('campaign_reports', 'View top clicks');?></a>
            </div>
            <?php } ?>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
</div>