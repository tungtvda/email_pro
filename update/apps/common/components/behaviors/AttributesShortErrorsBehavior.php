<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * AttributesShortErrorsBehavior
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
 
class AttributesShortErrorsBehavior extends CBehavior
{
    /**
     * AttributesShortErrorsBehavior::getAll()
     * 
     * @return array
     */
    public function getAll()
    {
        $_errors = array();
        foreach ($this->owner->getErrors() as $attribute => $errors) {
            if (empty($errors)) {
                continue;
            }
            $_errors[$attribute] = is_array($errors) ? reset($errors) : $errors;
        }
        return $_errors;
    }
    
    /**
     * AttributesShortErrorsBehavior::getAllAsString()
     * 
     * @param string $separator
     * @return string
     */
    public function getAllAsString($separator = '<br />')
    {
        return implode($separator, array_values($this->getAll()));
    }
}