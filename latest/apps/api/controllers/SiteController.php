<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * SiteController
 * 
 * Default api application controller
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
    // access rules for this controller
    public function accessRules()
    {
        return array(
            // allow all users on all actions
            array('allow'),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     * 
     * By default we don't return any information from this action.
     */
    public function actionIndex()
    {
        $this->renderJson();
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if ($error['code'] === 404) {
                $error['message'] = Yii::t('app', 'Page not found.');
            }
            return $this->renderJson(array(
                'status'    => 'error',
                'error'        => CHtml::encode($error['message']),
            ), $error['code']);
        }
    }

}
