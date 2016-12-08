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

// since 1.3.5.6
$htmlOptions = array();
if (!empty($attributes) && !empty($attributes['target']) && in_array($attributes['target'], array('_blank'))) {
    $htmlOptions['target'] = $attributes['target'];
} 
?>

<?php echo CHtml::form('', 'post', $htmlOptions);?>
<?php echo $content;?>
<?php echo CHtml::endForm();?>