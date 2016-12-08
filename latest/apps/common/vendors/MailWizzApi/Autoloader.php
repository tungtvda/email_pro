<?php
/**
 * This file contains the autoloader class for the Cyber FisionApi PHP-SDK.
 *
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2015 https://cyberfision.com/
 */
 
 
/**
 * The Cyber FisionApi Autoloader class.
 * 
 * From within a Yii Application, you would load this as:
 * 
 * <pre>
 * require_once(Yii::getPathOfAlias('application.vendors.Cyber FisionApi.Autoloader').'.php');
 * Yii::registerAutoloader(array('Cyber FisionApi_Autoloader', 'autoloader'), true);
 * </pre>
 * 
 * Alternatively you can:
 * <pre>
 * require_once('Path/To/Cyber FisionApi/Autoloader.php');
 * Cyber FisionApi_Autoloader::register();
 * </pre>
 * 
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @package Cyber FisionApi
 * @since 1.0
 */
class Cyber FisionApi_Autoloader
{
    /**
     * The registrable autoloader
     * 
     * @param string $class
     */
    public static function autoloader($class)
    {
        if (strpos($class, 'Cyber FisionApi') === 0) {
            $className = str_replace('_', '/', $class);
            $className = substr($className, 12);
            
            if (is_file($classFile = dirname(__FILE__) . '/'. $className.'.php')) {
                require_once($classFile);
            }
        }
    }
    
    /**
     * Registers the Cyber FisionApi_Autoloader::autoloader()
     */
    public static function register()
    {
        spl_autoload_register(array('Cyber FisionApi_Autoloader', 'autoloader'));
    }
}