<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * Payment_gatewaysController
 * 
 * Handles the actions for payment gateways related tasks
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.4
 */
 
class Payment_gatewaysController extends Controller
{
    /**
     * Display available gateways
     */
    public function actionIndex()
    {
        $request = Yii::app()->request;
        $model = new PaymentGatewaysList();
        
        $this->setData(array(
            'pageMetaTitle'     => $this->data->pageMetaTitle . ' | ' . Yii::t('payment_gateways', 'Payment gateways'), 
            'pageHeading'       => Yii::t('payment_gateways', 'Payment gateways'),
            'pageBreadcrumbs'   => array(
                Yii::t('payment_gateways', 'Payment gateways'),
            ),
        ));
        
        $this->render('index', compact('model'));
    }

}