<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * HtmlHelper
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.5
 */
 
class HtmlHelper extends CHtml
{    
    public static function accessLink($text, $url='#', $htmlOptions=array())
    {
        $app = Yii::app();
        if (is_array($url) && $app->apps->isAppName('backend') && $app->hasComponent('user') && $app->user->getId() && $app->user->getModel()) {
            if (!$app->user->getModel()->hasRouteAccess($url[0])) {
                return;
            }
        }
        return self::link($text, $url, $htmlOptions);
    }
}