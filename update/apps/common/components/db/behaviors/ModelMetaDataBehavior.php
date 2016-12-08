<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ModelMetaDataBehavior
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
 
class ModelMetaDataBehavior extends CActiveRecordBehavior
{
    private $_modelMetaData;
    
    /**
     * ModelMetaDataBehavior::getModelMetaData()
     * 
     * @return CMap
     */
    public function getModelMetaData()
    {
        if(empty($this->_modelMetaData) || !($this->_modelMetaData instanceof CMap)) {
            $this->_modelMetaData = new CMap();
        }
        
        if ($this->owner instanceof ActiveRecord && $this->owner->hasAttribute('meta_data') && !empty($this->owner->meta_data) && $this->_modelMetaData->getCount() == 0) {
            $this->_modelMetaData->mergeWith(unserialize($this->owner->meta_data));    
        }
        
        return $this->_modelMetaData;
    }
    
    /**
     * ModelMetaDataBehavior::setModelMetaData()
     * 
     * @param string $key
     * @param mixed $value
     * @return ModelMetaDataBehavior
     */
    public function setModelMetaData($key, $value)
    {
        $this->getModelMetaData()->add($key, $value);
        return $this;
    }

    /**
     * ModelMetaDataBehavior::beforeSave()
     * 
     * @param mixed $event
     * @return
     */
    public function beforeSave($event)
    {
        if ($this->owner instanceof ActiveRecord && $this->owner->hasAttribute('meta_data')) {
            $this->owner->setAttribute('meta_data', serialize($this->getModelMetaData()->toArray()));    
        }
    }


}