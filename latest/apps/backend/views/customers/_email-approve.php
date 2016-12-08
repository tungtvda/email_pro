<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.3
 */
 
?>

<!-- START CONTENT -->
<?php echo Yii::t('customers', 'Congratulations, your account on {site} has been approved and you can now login using the url below:', array('{site}' => Yii::app()->options->get('system.common.site_name')));?><br />
<?php $url = Yii::app()->apps->getAppUrl('customer', 'guest/index', true);?>
<a href="<?php echo $url;?>"><?php echo $url;?></a><br /><br />
<?php echo Yii::t('customers', 'If for some reason you cannot click the above url, please paste this one into your browser address bar:')?><br />
<?php echo $url;?>
<!-- END CONTENT-->