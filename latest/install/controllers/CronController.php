<?php defined('MW_INSTALLER_PATH') || exit('No direct script access allowed');

/**
 * CronController
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class CronController extends Controller
{
    public function actionIndex()
    {
        if (!getSession('admin') || !getSession('license_data')) {
            redirect('index.php?route=admin');
        }
        
        if (getPost('next')) {
            setSession('cron', 1);
            redirect('index.php?route=finish');
        }
        
        $this->data['pageHeading'] = 'Cron jobs';
        $this->data['breadcrumbs'] = array(
            'Cron jobs' => 'index.php?route=cron',
        );

        $this->render('cron');
    }
    
    public function getCliPath()
    {
        return CommonHelper::findPhpCliPath();
    }
    
}