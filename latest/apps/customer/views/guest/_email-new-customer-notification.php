<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.6
 */
$customerUrl = Yii::app()->options->get('system.urls.backend_absolute_url') . 'customers/update/id/' . $customer->customer_id; 
?>

<!-- START CONTENT -->
<?php echo Yii::t('customers', 'A new customer registration has been made as follows:');?><br />
<?php foreach ($customer->getAttributes(array('first_name', 'last_name', 'email')) as $attributeName => $attributeValue) { ?>
<?php echo $customer->getAttributeLabel($attributeName);?>: <?php echo $attributeValue;?> <br />
<?php } ?>
<br />
<?php echo Yii::t('customers', 'The customer details url is as follows:');?><br />
<?php echo CHtml::link($customerUrl, $customerUrl);?> <br />
<!-- END CONTENT-->