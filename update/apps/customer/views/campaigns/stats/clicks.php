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

<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo Yii::t('campaign_reports', 'Click rate');?></h3>
        </div>
        <div class="panel-body" style="height:380px;">
            <div class="circliful-graph" data-dimension="250" data-text="<?php echo $campaign->stats->getClicksThroughRate(true);?>%" data-info="<?php echo Yii::t('campaign_reports', 'Click through rate');?>" data-width="30" data-fontsize="38" data-percent="<?php echo ceil($campaign->stats->getClicksThroughRate());?>" data-fgcolor="#3c8dbc" data-bgcolor="#eee" data-border="inline" data-type="half"></div>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getProcessedCount(true);?></span> <?php echo Yii::t('campaign_reports', 'Processed');?></li>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getClicksThroughRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'Click through rate');?></li>
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getTrackingUrlsCount(true);?></span> <?php echo Yii::t('campaign_reports', 'Total urls');?></li>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getUniqueClicksCount(true);?></span> <?php echo Yii::t('campaign_reports', 'Unique clicks');?></li>
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getUniqueClicksRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'Unique clicks rate');?></li>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getClicksCount(true);?></span> <?php echo Yii::t('campaign_reports', 'All clicks');?></li>
                <li class="list-group-item"><span class="badge"><?php echo $campaign->stats->getClicksRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'All clicks rate');?></li>
                <?php if ($campaign->stats->getIndustryClicksRate()) { ?>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getIndustryClicksRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'Industry avg({industry})', array('{industry}' => CHtml::link($campaign->stats->getIndustry()->name, array('account/company'))));?></li>
                <?php } ?>
                <li class="list-group-item active"><span class="badge"><?php echo $campaign->stats->getClicksToOpensRate(true);?>%</span> <?php echo Yii::t('campaign_reports', 'Clicks to opens rate');?></li>
            </ul>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <a href="<?php echo $this->createUrl('campaign_reports/click', array('campaign_uid' => $campaign->campaign_uid));?>" class="btn btn-primary btn-xs"><?php echo Yii::t('campaign_reports', 'View details');?></a>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
</div>