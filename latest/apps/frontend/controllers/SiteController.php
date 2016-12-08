<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * SiteController
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->redirect(Yii::app()->apps->getAppUrl('customer'));
    }
    
    public function actionOffline()
    {
        if (Yii::app()->options->get('system.common.site_status') !== 'offline') {
            $this->redirect(array('site/index'));
        }
        
        throw new CHttpException(503, Yii::app()->options->get('system.common.site_offline_message'));
    }
    
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo CHtml::encode($error['message']);
            } else {
                $this->setData(array(
                    'pageMetaTitle'         => Yii::t('app', 'Error {code}!', array('{code}' => (int)$error['code'])), 
                    'pageMetaDescription'   => CHtml::encode($error['message']),
                ));
                $this->render('error', $error) ;
            }    
        }
    }

}