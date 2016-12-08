<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.8
 */
 
?>

<?php echo Yii::t('orders', 'Hello {name}', array('{name}' => $order->customer->fullName));?>,<br />
<?php echo Yii::t('orders', 'As requested, attached is your order invoice with reference number: {ref}', array(
    '{ref}' => $invoiceOptions->prefix . ($order->order_id < 10 ? '0' . $order->order_id : $order->order_id)
));?><br />
<?php echo Yii::t('orders', 'If you have any questions regarding this invoice, please contact us.');?>
