<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * Ip_location_servicesController
 * 
 * Handles the actions for ip location services related tasks
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.2
 */
 
class Ip_location_servicesController extends Controller
{

    /**
     * Display available services
     */
    public function actionIndex()
    {
        $request = Yii::app()->request;
        $model = new IpLocationServicesList();
        
        $this->setData(array(
            'pageMetaTitle'     => $this->data->pageMetaTitle . ' | ' . Yii::t('ip_location', 'Ip location services'), 
            'pageHeading'       => Yii::t('ip_location', 'Ip location services'),
            'pageBreadcrumbs'   => array(
                Yii::t('ip_location', 'Ip location services'),
            ),
        ));
        
        $this->render('index', compact('model'));
    }

}