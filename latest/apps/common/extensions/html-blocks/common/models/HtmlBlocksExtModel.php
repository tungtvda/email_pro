<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * HtmlBlocksExtModel
 * 
 * @package Cyber Fision EMA
 * @subpackage Payment Gateway Stripe
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 */
 
class HtmlBlocksExtModel extends FormModel
{
    protected $_extensionInstance;
    
    public $customer_footer;
    
    public function rules()
    {
        $rules = array(
            array('customer_footer', 'safe'),
        );
        
        return CMap::mergeArray($rules, parent::rules());    
    }
    
    public function attributeLabels()
    {
        $labels = array(
            'customer_footer'      => Yii::t('ext_html_blocks', 'Customer area footer'),
        );
        
        return CMap::mergeArray($labels, parent::attributeLabels());    
    }
    
    public function attributePlaceholders()
    {
        $placeholders = array(
            'customer_footer' => '',
        );
        
        return CMap::mergeArray($placeholders, parent::attributePlaceholders());
    }
    
    public function attributeHelpTexts()
    {
        $texts = array(
            'customer_footer'  => Yii::t('ext_html_blocks', 'Html shown in footer area of the customers'),
        );
        
        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }
    
    public function save()
    {
        $extension  = $this->getExtensionInstance();
        $attributes = array('customer_footer');
        foreach ($attributes as $name) {
            $extension->setOption($name, $this->$name);
        }
        return $this;
    }
    
    public function populate() 
    {
        $extension  = $this->getExtensionInstance();
        $attributes = array('customer_footer');
        foreach ($attributes as $name) {
            $this->$name = $extension->getOption($name, $this->$name);
        }
        return $this;
    }
    
    public function setExtensionInstance($instance)
    {
        $this->_extensionInstance = $instance;
        return $this;
    }
    
    public function getExtensionInstance()
    {
        if ($this->_extensionInstance !== null) {
            return $this->_extensionInstance;
        }
        return $this->_extensionInstance = Yii::app()->extensionsManager->getExtensionInstance('html-blocks');
    }
}
