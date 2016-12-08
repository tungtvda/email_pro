<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * CampaignTrackingLatestOpensWidget
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
 
class CampaignTrackingLatestOpensWidget extends CWidget 
{
    public $campaign;
    
    public $showDetailLinks = true;
    
    public function run() 
    {
        $campaign = $this->campaign;
        
        if ($campaign->status == Campaign::STATUS_DRAFT) {
            return;
        }
        
        $criteria = new CDbCriteria();
        $criteria->select = 't.id, t.subscriber_id, t.date_added';
        $criteria->with = array(
            'subscriber' => array(
                'select'    => 'subscriber.subscriber_uid, subscriber.email',
                'together'  => true,
                'joinType'  => 'INNER JOIN',
            ),
        );
        $criteria->compare('campaign_id', (int)$campaign->campaign_id);
        $criteria->order = 't.id DESC';
        $criteria->limit = 10;
        
        $models = CampaignTrackOpen::model()->findAll($criteria);

        $this->render('latest-opens', compact('campaign', 'models'));
    }
}