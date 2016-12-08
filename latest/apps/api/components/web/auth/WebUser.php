<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * WebUser
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class WebUser extends BaseWebUser
{
    private $_model;
    
    private $_id;
    
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function setName($name)
    {
        return $this;
    }
    
    public function getName()
    {
        return null;
    }
    
    public function getIsGuest()
    {
        return $this->getId() === null;
    }
    
    public function setReturnUrl($value)
    {
        return $this;
    }
    
    public function getReturnUrl($defaultUrl=null)
    {
        return null;
    }
    
    public function setModel(Customer $model)
    {
        $this->_model = $model;
        return $this;
    }
    
    public function getModel()
    {
        if ($this->_model !== null) {
            return $this->_model;
        }
        return $this->_model = Customer::model()->findByPk((int)$this->getId());
    }
}