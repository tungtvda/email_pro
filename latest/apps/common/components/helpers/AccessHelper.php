<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * AccessHelper
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.5
 */
 
class AccessHelper
{   
    // shortcut method
    public static function hasRouteAccess($route)
    {
        $app = Yii::app();
        if ($app->apps->isAppName('backend') && $app->hasComponent('user') && $app->user->getId() && $app->user->getModel()) {
            return (bool)$app->user->getModel()->hasRouteAccess($route);
        }
        return true;
    }
}