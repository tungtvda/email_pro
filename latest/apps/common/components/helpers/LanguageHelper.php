<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * LanguageHelper
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.1
 */
 
class LanguageHelper 
{

    /**
     * LanguageHelper::getAppLanguageCode()
     * 
     * @return string
     */
    public static function getAppLanguageCode()
    {
        $languageCode = $language = Yii::app()->language;
        if (strpos($language, '_') !== false) {
            $languageAndRegionCode = explode('_', $language);
            list($languageCode, $regionCode) = $languageAndRegionCode;
        }
        return $languageCode;  
    }
}