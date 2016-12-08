<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * AssetsUrl
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class AssetsUrl 
{
    public static function base($uri = null, $absolute = false, $appName = null)
    {
        $apps = Yii::app()->apps;
        if ($appName === null && $apps->isAppName('frontend')) {
            $appName = 'frontend';
        }
        
        $extra = ($appName === 'frontend' ? '/frontend/' : null);
        $base  = $apps->getAppUrl($appName, ltrim($extra, '/') . 'assets/' . $uri, $absolute, true);
        
        return $base;
    }
    
    public static function img($uri, $absolute = false, $appName = null)
    {
        $folderName = 'img';
        return self::base($folderName.'/'.$uri, $absolute, $appName);
    }
    
    public static function css($uri, $absolute = false, $appName = null)
    {
        $folderName = 'css';
        return self::base($folderName.'/'.$uri, $absolute, $appName);
    }
    
    public static function js($uri, $absolute = false, $appName = null)
    {
        $folderName = 'js';
        return self::base($folderName.'/'.$uri, $absolute, $appName);
    }
    
    public static function themeBase($uri = null, $absolute = false, $appName = null)
    {
        if (!Yii::app()->hasComponent('themeManager') || !Yii::app()->getTheme()) {
            throw new CHttpException(500, __METHOD__ . ' can only be called from within a theme');
        }
        
        $apps = Yii::app()->apps;
        if ($appName === null && $apps->isAppName('frontend')) {
            $appName = 'frontend';
        }
        
        $extra = ($appName === 'frontend' ? '/frontend/' : null);
        
        $name = Yii::app()->getTheme()->getName();
        $base = $apps->getAppUrl($appName, ltrim($extra, '/') . 'themes/' . $name . '/assets/' . $uri, $absolute, true);
        
        return $base;
    }
    
    public static function themeImg($uri, $absolute = false, $appName = null)
    {
        $folderName = 'img';
        return self::themeBase($folderName.'/'.$uri, $absolute, $appName);
    }
    
    public static function themeCss($uri, $absolute = false, $appName = null)
    {
        $folderName = 'css';
        return self::themeBase($folderName.'/'.$uri, $absolute, $appName);
    }
    
    public static function themeJs($uri, $absolute = false, $appName = null)
    {
        $folderName = 'js';
        return self::themeBase($folderName.'/'.$uri, $absolute, $appName);
    }
    
}