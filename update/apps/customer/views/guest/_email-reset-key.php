<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
 
?>

<!-- START CONTENT -->
<?php echo Yii::t('customers', 'Please follow the following url in order to reset your password:');?><br />
<?php $url = Yii::app()->createAbsoluteUrl('guest/reset_password', array('reset_key' => $model->reset_key));?>
<a href="<?php echo $url;?>"><?php echo $url;?></a><br /><br />
<?php echo Yii::t('customers', 'If for some reason you cannot click the above url, please paste this one into your browser address bar:')?><br />
<?php echo $url;?>
<!-- END CONTENT-->