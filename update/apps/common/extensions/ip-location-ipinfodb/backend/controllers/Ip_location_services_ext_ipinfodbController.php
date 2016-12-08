<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * Controller file for service settings.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 */
 
class Ip_location_services_ext_ipinfodbController extends Controller
{
    // init the controller
    public function init()
    {
        parent::init();
        Yii::import('ext-ip-location-ipinfodb.backend.models.*');
    }
    
    // move the view path
    public function getViewPath()
    {
        return Yii::getPathOfAlias('ext-ip-location-ipinfodb.backend.views');
    }
    
    /**
     * Default action.
     */
    public function actionIndex()
    {
        $extensionInstance = Yii::app()->extensionsManager->getExtensionInstance('ip-location-ipinfodb');
        
        $request = Yii::app()->request;
        $notify  = Yii::app()->notify;
        
        $model = new IpLocationIpinfodbExtModel();
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
            'pageMetaTitle'     => $this->data->pageMetaTitle . ' | '. Yii::t('ext_ip_location_ipinfodb', 'Ip location service from Ipinfodb.com'),
            'pageHeading'       => Yii::t('ext_ip_location_ipinfodb', 'Ip location service from Ipinfodb.com'),
            'pageBreadcrumbs'   => array(
                Yii::t('ip_location', 'Ip location services') => $this->createUrl('ip_location_services/index'),
                Yii::t('ext_ip_location_ipinfodb', 'Ip location service from Ipinfodb.com'),
            )
        ));

        $this->render('settings', compact('model'));
    }
}