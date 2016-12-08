<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * CampaignsController
 *
 * Handles the actions for campaigns related tasks
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */

class CampaignsController extends Controller
{
    public $layout = 'thin';

    /**
     * Will show the web version of a campaign email
     */
    public function actionWeb_version($campaign_uid, $subscriber_uid = null)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('campaign_uid', $campaign_uid);
        $criteria->addNotInCondition('status', array(Campaign::STATUS_PENDING_DELETE));
        $campaign = Campaign::model()->find($criteria);

        if (empty($campaign)) {
            $this->redirect(array('site/index'));
        }

        $subscriber = null;
        if (!empty($subscriber_uid)) {
            $subscriber = ListSubscriber::model()->findByUid($subscriber_uid);
        }

        $list           = $campaign->list;
        $customer       = $list->customer;
        $template       = $campaign->template;
        $emailContent   = $template->content;
        $emailFooter    = null;

        if (!empty($campaign->option) && !empty($campaign->option->preheader)) {
            $emailContent = CampaignHelper::injectPreheader($emailContent, $campaign->option->preheader, $campaign);
        }
        
        if (($emailFooter = $customer->getGroupOption('campaigns.email_footer')) && strlen(trim($emailFooter)) > 5) {
            $emailContent = CampaignHelper::injectEmailFooter($emailContent, $emailFooter, $campaign);
        }

        if (!empty($campaign->option) && $campaign->option->xml_feed == CampaignOption::TEXT_YES) {
            $emailContent = CampaignXmlFeedParser::parseContent($emailContent, $campaign, $subscriber, true);
        }

        if (!empty($campaign->option) && $campaign->option->json_feed == CampaignOption::TEXT_YES) {
            $emailContent = CampaignJsonFeedParser::parseContent($emailContent, $campaign, $subscriber, true);
        }

        if ($subscriber) {
            if (!empty($campaign->option) && $campaign->option->url_tracking == CampaignOption::TEXT_YES) {
                $emailContent = CampaignHelper::transformLinksForTracking($emailContent, $campaign, $subscriber, false);
            }
        } else {
            $subscriber = new ListSubscriber();
        }

        $emailData = CampaignHelper::parseContent($emailContent, $campaign, $subscriber, true);
        list(,,$emailContent) = $emailData;

        echo $emailContent;
    }

    /**
     * Will track and register the email openings
     *
     * GMail will store the email images, therefore there might be cases when successive opens by same subscriber
     * will not be tracked.
     * In order to trick this, it seems that the content length must be set to 0 as pointed out here:
     * http://www.emailmarketingtipps.de/2013/12/07/gmails-image-caching-affects-email-marketing-heal-opens-tracking/
     *
     * Note: When mod gzip enabled on server, the content length will be at least 20 bytes as explained in this bug:
     * https://issues.apache.org/bugzilla/show_bug.cgi?id=51350
     * In order to alleviate this, seems that we need to use a fake content type, like application/json
     */
    public function actionTrack_opening($campaign_uid, $subscriber_uid)
    {
        header("Content-Type: application/json");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: private");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header('P3P: CP="OTI DSP COR CUR IVD CONi OTPi OUR IND UNI STA PRE"');
        header("Pragma: no-cache");
        header("Content-Length: 0");

        $criteria = new CDbCriteria();
        $criteria->compare('campaign_uid', $campaign_uid);
        $criteria->addNotInCondition('status', array(Campaign::STATUS_PENDING_DELETE));
        $campaign = Campaign::model()->find($criteria);

        if (empty($campaign)) {
            Yii::app()->end();
        }

        // since 1.3.5.8
        Yii::app()->hooks->addFilter('frontend_campaigns_can_track_opening', array($this, '_actionCanTrackOpening'));
        $canTrack = Yii::app()->hooks->applyFilters('frontend_campaigns_can_track_opening', true, $this, $campaign);
        if (!$canTrack) {
            Yii::app()->end();
        }

        $subscriber = ListSubscriber::model()->findByUid($subscriber_uid);
        if (empty($subscriber)) {
            Yii::app()->end();
        }

        Yii::app()->hooks->addAction('frontend_campaigns_after_track_opening', array($this, '_openActionChangeSubscriberListField'), 99);
        Yii::app()->hooks->addAction('frontend_campaigns_after_track_opening', array($this, '_openActionAgainstSubscriber'), 100);

        $track = new CampaignTrackOpen();
        $track->campaign_id     = $campaign->campaign_id;
        $track->subscriber_id   = $subscriber->subscriber_id;
        $track->ip_address      = Yii::app()->request->getUserHostAddress();
        $track->user_agent      = substr(Yii::app()->request->getUserAgent(), 0, 255);

        if ($track->save(false)) {
            // raise the action, hook added in 1.2
            $this->setData('ipLocationSaved', false);
            try {
                Yii::app()->hooks->doAction('frontend_campaigns_after_track_opening', $this, $track, $campaign, $subscriber);
            } catch (Exception $e) {

            }
        }

        Yii::app()->end();
    }

    /**
     * Will track the clicks the subscribers made in the campaign email
     */
    public function actionTrack_url($campaign_uid, $subscriber_uid, $hash)
    {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        $criteria = new CDbCriteria();
        $criteria->compare('campaign_uid', $campaign_uid);
        $criteria->addNotInCondition('status', array(Campaign::STATUS_PENDING_DELETE));
        $campaign = Campaign::model()->find($criteria);

        if (empty($campaign)) {
            Yii::app()->hooks->doAction('frontend_campaigns_track_url_item_not_found', array(
                'step' => 'campaign'
            ));
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }

        // since 1.3.5.8
        Yii::app()->hooks->addFilter('frontend_campaigns_can_track_url', array($this, '_actionCanTrackUrl'));
        $canTrack = Yii::app()->hooks->applyFilters('frontend_campaigns_can_track_url', true, $this, $campaign);
        if (!$canTrack) {
            Yii::app()->end();
        }

        $subscriber = ListSubscriber::model()->findByUid($subscriber_uid);
        if (empty($subscriber)) {
            Yii::app()->hooks->doAction('frontend_campaigns_track_url_item_not_found', array(
                'step' => 'subscriber'
            ));
            if ($redirect = $campaign->list->getSubscriber404Redirect()) {
                $this->redirect($redirect);
            }
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }

        $url = CampaignUrl::model()->findByAttributes(array(
            'campaign_id'   => $campaign->campaign_id,
            'hash'          => $hash,
        ));

        if (empty($url)) {
            Yii::app()->hooks->doAction('frontend_campaigns_track_url_item_not_found', array(
                'step' => 'url'
            ));
            if ($redirect = $campaign->list->getSubscriber404Redirect()) {
                $this->redirect($redirect);
            }
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }

        Yii::app()->hooks->addAction('frontend_campaigns_after_track_url_before_redirect', array($this, '_urlActionChangeSubscriberListField'), 99);
        Yii::app()->hooks->addAction('frontend_campaigns_after_track_url_before_redirect', array($this, '_urlActionAgainstSubscriber'), 100);

        $track = new CampaignTrackUrl();
        $track->url_id          = $url->url_id;
        $track->subscriber_id   = $subscriber->subscriber_id;
        $track->ip_address      = Yii::app()->request->getUserHostAddress();
        $track->user_agent      = substr(Yii::app()->request->getUserAgent(), 0, 255);

       try {
           if ($track->save(false)) {
               // hook added in 1.2
               $this->setData('ipLocationSaved', false);
               try {
                   Yii::app()->hooks->doAction('frontend_campaigns_after_track_url', $this, $track, $campaign, $subscriber);
               } catch (Exception $e) {

               }
           }
       } catch (Exception $e) {}

        // changed since 1.3.5.9
        $url->destination = StringHelper::normalizeUrl($url->destination);
        Yii::app()->hooks->doAction('frontend_campaigns_after_track_url_before_redirect', $this, $campaign, $subscriber, $url);

        $destination = $url->destination;
        if (preg_match('/\[(.*)?\]/', $destination)) {
            list(,,$destination) = CampaignHelper::parseContent($destination, $campaign, $subscriber, false);
        }

        // since 1.3.5.9
        if ($campaign->option->open_tracking == CampaignOption::TEXT_YES && !$subscriber->hasOpenedCampaign($campaign)) {
            $track = new CampaignTrackOpen();
            $track->campaign_id   = $campaign->campaign_id;
            $track->subscriber_id = $subscriber->subscriber_id;
            $track->ip_address    = Yii::app()->request->getUserHostAddress();
            $track->user_agent    = substr(Yii::app()->request->getUserAgent(), 0, 255);
            try {
                if ($track->save(false)) {
                    try {
                        Yii::app()->hooks->doAction('frontend_campaigns_after_track_opening', $this, $track, $campaign, $subscriber);
                    } catch (Exception $e) {}
                }
            } catch (Exception $e) {}
        }
        //

        $this->redirect($destination, true, 301);
    }

    /**
     * Will forward this campaign link to a friend email address
     */
    public function actionForward_friend($campaign_uid, $subscriber_uid = null)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('campaign_uid', $campaign_uid);
        $criteria->addNotInCondition('status', array(Campaign::STATUS_PENDING_DELETE));
        $campaign = Campaign::model()->find($criteria);

        if (empty($campaign)) {
            $this->redirect(array('site/index'));
        }

        $subscriber = null;
        if (!empty($subscriber_uid)) {
            $subscriber = ListSubscriber::model()->findByUid($subscriber_uid);
            if (empty($subscriber)) {
                $this->redirect(array('site/index'));
            }
        }

        $forward     = new CampaignForwardFriend();
        $request     = Yii::app()->request;
        $notify      = Yii::app()->notify;
        $options     = Yii::app()->options;
        $forwardUrl  = $options->get('system.urls.frontend_absolute_url') . 'campaigns/' . $campaign->campaign_uid;

        if (!empty($subscriber)) {
            $forward->from_email = $subscriber->email;
        }
        $forward->subject = Yii::t('campaigns', 'Hey, check out this url, i think you will like it.');

        if ($request->isPostRequest && ($attributes = $request->getPost($forward->modelName, array()))) {
            $forward->attributes    = $attributes;
            $forward->campaign_id   = $campaign->campaign_id;
            $forward->subscriber_id = $subscriber ? $subscriber->subscriber_id : null;
            $forward->ip_address    = $request->getUserHostAddress();
            $forward->user_agent    = substr($request->getUserAgent(), 0, 255);

            $forwardsbyIp = CampaignForwardFriend::model()->countByAttributes(array(
                'campaign_id' => $forward->campaign_id,
                'ip_address'  => $forward->ip_address
            ));

            $forwardLimit = 10;
            if ($forwardsbyIp >= $forwardLimit) {
                $notify->addError(Yii::t('campaigns', 'You can only forward a campaign {num} times!', array('{num}' => $forwardLimit)));
                $this->refresh();
            }

            if (!$forward->save()) {
                $notify->addError(Yii::t('app', 'Your form has a few errors, please fix them and try again!'));
            } else {
                $emailTemplate = $options->get('system.email_templates.common');
                $emailBody     = $this->renderPartial('_email-forward-friend', compact('campaign', 'subscriber', 'forward', 'forwardUrl'), true);
                $emailTemplate = str_replace('[CONTENT]', $emailBody, $emailTemplate);

                $email = new TransactionalEmail();
                $email->to_name     = $forward->to_name;
                $email->to_email    = $forward->to_email;
                $email->from_name   = $forward->from_name;
                $email->from_email  = $forward->from_email;
                $email->subject     = $forward->subject;
                $email->body        = $emailTemplate;
                $email->save();

                $notify->addSuccess(Yii::t('campaigns', 'Your message has been successfully forwarded!'));
                $this->refresh();
            }
        }

        $this->setData(array(
            'pageMetaTitle'   => $this->data->pageMetaTitle . ' | '. Yii::t('campaigns', 'Forward to a friend'),
            'pageHeading'     => Yii::t('campaigns', 'Forward to a friend'),
            'pageBreadcrumbs' => array()
        ));

        $this->render('forward-friend', compact('campaign', 'subscriber', 'forward', 'forwardUrl'));
    }

    /**
     * Will record the abuse report for a campaign
     */
    public function actionReport_abuse($campaign_uid, $list_uid, $subscriber_uid)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('campaign_uid', $campaign_uid);
        $criteria->addNotInCondition('status', array(Campaign::STATUS_PENDING_DELETE));
        $campaign = Campaign::model()->find($criteria);

        if (empty($campaign)) {
            $this->redirect(array('site/index'));
        }

        $list = Lists::model()->findByUid($list_uid);
        if (empty($list)) {
            $this->redirect(array('site/index'));
        }

        $subscriber = ListSubscriber::model()->findByAttributes(array(
            'subscriber_uid' => $subscriber_uid,
            'status'         => ListSubscriber::STATUS_CONFIRMED,
        ));

        if (empty($subscriber)) {
            $this->redirect(array('site/index'));
        }

        $request = Yii::app()->request;
        $notify  = Yii::app()->notify;
        $options = Yii::app()->options;
        $report  = new CampaignAbuseReport();

        if ($request->isPostRequest && ($attributes = (array)$request->getPost($report->modelName, array()))) {
            $report->attributes      = $attributes;
            $report->customer_id     = $list->customer_id;
            $report->campaign_id     = $campaign->campaign_id;
            $report->list_id         = $list->list_id;
            $report->subscriber_id   = $subscriber->subscriber_id;
            $report->customer_info   = sprintf('%s(%s)', $list->customer->getFullName(), $list->customer->email);
            $report->campaign_info   = $campaign->name;
            $report->list_info       = sprintf('%s(%s)', $list->name, $list->display_name);
            $report->subscriber_info = $subscriber->email;

            if ($report->save()) {
                $subscriber->status = ListSubscriber::STATUS_UNSUBSCRIBED;
                $subscriber->save(false);

                $trackUnsubscribe = new CampaignTrackUnsubscribe();
                $trackUnsubscribe->campaign_id   = $campaign->campaign_id;
                $trackUnsubscribe->subscriber_id = $subscriber->subscriber_id;
                $trackUnsubscribe->note          = 'Abuse complaint!';
                $trackUnsubscribe->save(false);

                $notify->addSuccess(Yii::t('campaigns', 'Thank you for your report, we will take proper actions against this as soon as possible!'));
            } else {
                $notify->addError(Yii::t('app', 'Your form has a few errors, please fix them and try again!'));
            }
        }

        $this->setData(array(
            'pageMetaTitle'   => $this->data->pageMetaTitle . ' | '. Yii::t('campaigns', 'Report abuse'),
            'pageHeading'     => Yii::t('campaigns', 'Report abuse'),
            'pageBreadcrumbs' => array()
        ));

        $this->render('report-abuse', compact('report'));
    }

    public function _openActionChangeSubscriberListField(Controller $controller, CampaignTrackOpen $track, Campaign $campaign, ListSubscriber $subscriber)
    {
        $models = CampaignOpenActionListField::model()->findAllByAttributes(array(
            'campaign_id' => $campaign->campaign_id,
        ));

        if (empty($models)) {
            return;
        }

        foreach ($models as $model) {
            $valueModel = ListFieldValue::model()->findByAttributes(array(
                'field_id'      => $model->field_id,
                'subscriber_id' => $subscriber->subscriber_id,
            ));
            if (empty($valueModel)) {
                $valueModel = new ListFieldValue();
                $valueModel->field_id       = $model->field_id;
                $valueModel->subscriber_id  = $subscriber->subscriber_id;
            }
            $valueModel->value = $model->field_value;
            $valueModel->save();
        }
    }

    public function _openActionAgainstSubscriber(Controller $controller, CampaignTrackOpen $track, Campaign $campaign, ListSubscriber $subscriber)
    {
        $models = CampaignOpenActionSubscriber::model()->findAllByAttributes(array(
            'campaign_id' => $campaign->campaign_id,
        ));

        if (empty($models)) {
            return;
        }
        
        foreach ($models as $model) {
            if ($model->action == CampaignOpenActionSubscriber::ACTION_MOVE) {
                $subscriber->moveToList($model->list_id);
            } else {
                $subscriber->copyToList($model->list_id);
            }
        }
    }

    public function _urlActionChangeSubscriberListField(Controller $controller, Campaign $campaign, ListSubscriber $subscriber, CampaignUrl $url)
    {
        $models = CampaignTemplateUrlActionListField::model()->findAllByAttributes(array(
            'campaign_id' => $campaign->campaign_id,
            'url'         => $url->destination,
        ));

        if (empty($models)) {
            return;
        }

        foreach ($models as $model) {
            $valueModel = ListFieldValue::model()->findByAttributes(array(
                'field_id'      => $model->field_id,
                'subscriber_id' => $subscriber->subscriber_id,
            ));
            if (empty($valueModel)) {
                $valueModel = new ListFieldValue();
                $valueModel->field_id       = $model->field_id;
                $valueModel->subscriber_id  = $subscriber->subscriber_id;
            }
            $valueModel->value = $model->field_value;
            $valueModel->save();
        }
    }

    public function _urlActionAgainstSubscriber(Controller $controller, Campaign $campaign, ListSubscriber $subscriber, CampaignUrl $url)
    {
        $models = CampaignTemplateUrlActionSubscriber::model()->findAllByAttributes(array(
            'campaign_id' => $campaign->campaign_id,
            'url'         => $url->destination,
        ));

        if (empty($models)) {
            return;
        }
        
        foreach ($models as $model) {
            if ($model->action == CampaignOpenActionSubscriber::ACTION_MOVE) {
                $subscriber->moveToList($model->list_id);
            } else {
                $subscriber->copyToList($model->list_id);
            }
        }
    }

    public function _actionCanTrackOpening($canTrack, $controller, $campaign)
    {
        $ipAddress    = Yii::app()->request->getUserHostAddress();
        $dontTrackIps = Yii::app()->options->get('system.campaign.exclude_ips_from_tracking.open', '');
        if (empty($dontTrackIps)) {
            return $canTrack;
        }
        $dontTrackIps = explode(',', $dontTrackIps);
        $dontTrackIps = array_unique(array_map('trim', $dontTrackIps));
        if (empty($dontTrackIps)) {
            return $canTrack;
        }
        return $canTrack = !in_array($ipAddress, $dontTrackIps);
    }

    public function _actionCanTrackUrl($canTrack, $controller, $campaign)
    {
        $ipAddress    = Yii::app()->request->getUserHostAddress();
        $dontTrackIps = Yii::app()->options->get('system.campaign.exclude_ips_from_tracking.url', '');
        if (empty($dontTrackIps)) {
            return $canTrack;
        }
        $dontTrackIps = explode(',', $dontTrackIps);
        $dontTrackIps = array_unique(array_map('trim', $dontTrackIps));
        if (empty($dontTrackIps)) {
            return $canTrack;
        }
        return $canTrack = !in_array($ipAddress, $dontTrackIps);
    }
}
