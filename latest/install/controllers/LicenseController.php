<?php defined('MW_INSTALLER_PATH') || exit('No direct script access allowed');

/**
 * LicenseController
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class LicenseController extends Controller
{
    public function actionIndex()
    {
        $this->data['breadcrumbs'] = array(
            'License' => 'index.php?route=license',
        );
        
        $license = null;
        if (is_file($file = MW_ROOT_PATH . '/license.txt')) {
            $license = file_get_contents($file);
        }
        
        $this->render('license', compact('license'));
    }
    
}