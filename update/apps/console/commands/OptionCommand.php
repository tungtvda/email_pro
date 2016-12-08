<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * OptionCommand
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4
 */
 
class OptionCommand extends ConsoleCommand 
{
    public function actionGet_option($name, $default = null)
    {
        exit((string)Yii::app()->options->get($name, $default));
    }
    
    public function actionSet_option($name, $value)
    {
        Yii::app()->options->set($name, $value);
    }
}