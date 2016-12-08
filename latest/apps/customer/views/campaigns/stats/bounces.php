<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.3
 */
 
?>

<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('campaign_reports', 'Bounce rate');?></h3>
        </div>
        <div class="panel-body" style="height:380px;">
            <div class="circliful-graph" data-dimension="250" data-text="<?php echo $campaign->stats->getBouncesRate(true);?>%" data-info="<?php echo Yii::t('campaign_reports', 'Bounce rate');?>" data-width="30" data-fontsize="38" data-percent="<?php echo ceil($campaign->stats->getBouncesRate());?>" data-fgcolor="#b94a48" data-bgcolor="#eee" data-border="inline" data-type="half"></div>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getProcessedCount(true);?></span> <?php echo Yii::t('campaign_reports', 'Processed');?></li>
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getBouncesCount(true);?></span> <?php echo Yii::t('campaign_reports', 'Bounced back');?></li>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getBouncesRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'Bounce rate');?></li>
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getHardBouncesCount(true);?></span> <?php echo Yii::t('campaign_reports', 'Hard bounces');?></li>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getHardBouncesRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'Hard bounce rate');?></li>
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getSoftBouncesCount(true);?></span> <?php echo Yii::t('campaign_reports', 'Soft bounce');?></li>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getSoftBouncesRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'Soft bounce rate');?></li>
            </ul>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <a href="<?php echo $this->createUrl('campaign_reports/bounce', array('campaign_uid' => $campaign->campaign_uid));?>" class="btn btn-primary btn-xs"><?php echo Yii::t('campaign_reports', 'View details');?></a>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
</div>