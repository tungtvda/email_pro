<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.7
 */

?>

<?php echo Yii::t('campaigns', 'Hi {to_name}!', array('{to_name}' => $forward->to_name));?>
<br />
<?php echo Yii::t('campaigns', '{from_name} thought you might like the following url: {url}', array('{from_name}' => $forward->from_name, '{url}' => CHtml::link($forwardUrl, $forwardUrl, array('target' => '_blank'))));?>

<?php if (!empty($forward->message)) { ?>
<br />
<?php echo Yii::t('campaigns', '{from_name} also left this message for you:', array('{from_name}' => $forward->from_name));?><br />
<?php echo $forward->message;?>
<?php } ?>