<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * Ext_campaign_activity_mapController
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 */
 
class Ext_campaign_activity_mapController extends Controller
{
    // init the controller
    public function init()
    {
        parent::init();
        Yii::import('ext-campaign-activity-map.backend.models.*');
    }
    
    // move the view path
    public function getViewPath()
    {
        return Yii::getPathOfAlias('ext-campaign-activity-map.backend.views');
    }
    
    /**
     * Default action.
     */
    public function actionIndex()
    {
        $extensionInstance = Yii::app()->extensionsManager->getExtensionInstance('campaign-activity-map');
        
        $request = Yii::app()->request;
        $notify  = Yii::app()->notify;
        
        $model = new CampaignActivityMapExtModel();
        $model->populate($extensionInstance);

        if ($request->isPostRequest && ($attributes = (array)$request->getPost($model->modelName, array()))) {
            $model->attributes = $attributes;
            if ($model->validate()) {
                $notify->addSuccess(Yii::t('app', 'Your form has been successfully saved!'));
                $model->save($extensionInstance);
            } else {
                $notify->addError(Yii::t('app', 'Your form has a few errors, please fix them and try again!'));
            }
        }
        
        $this->setData(array(
            'pageMetaTitle'     => $this->data->pageMetaTitle . ' | '. Yii::t('ext_campaign_activity_map', 'Campaign activity map'),
            'pageHeading'       => Yii::t('ext_campaign_activity_map', 'Campaign activity map'),
            'pageBreadcrumbs'   => array(
                Yii::t('extensions', 'Extensions') => $this->createUrl('extensions/index'),
                Yii::t('ext_campaign_activity_map', 'Campaign activity map'),
            )
        ));

        $this->render('settings', compact('model'));
    }
}