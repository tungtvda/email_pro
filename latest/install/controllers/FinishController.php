<?php defined('MW_INSTALLER_PATH') || exit('No direct script access allowed');

/**
 * FinishController
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class FinishController extends Controller
{
    public function actionIndex()
    {
        if (!getSession('cron') || !getSession('license_data')) {
            redirect('index.php?route=cron');
        }
        
        $this->data['pageHeading'] = 'Finish';
        $this->data['breadcrumbs'] = array(
            'Finish' => 'index.php?route=finish',
        );
        
        $this->render('finish');
    }
    
}