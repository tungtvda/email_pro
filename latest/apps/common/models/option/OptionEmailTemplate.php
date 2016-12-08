<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * OptionEmailTemplate
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class OptionEmailTemplate extends OptionBase
{
    // settings category
    protected $_categoryName = 'system.email_templates';
    
    public $common; 

    public function rules()
    {
        $rules = array(
            array('common', 'required', 'on' => 'common'),
        );
        
        return CMap::mergeArray($rules, parent::rules());    
    }
    
    public function attributeLabels()
    {
        $labels = array(
            'common'    => Yii::t('settings', 'Common template'),
        );
        
        return CMap::mergeArray($labels, parent::attributeLabels());    
    }
    
    public function attributePlaceholders()
    {
        $placeholders = array(
            'common' => null,
        );
        
        return CMap::mergeArray($placeholders, parent::attributePlaceholders());
    }
    
    public function attributeHelpTexts()
    {
        $texts = array(
            'common' => Yii::t('settings', 'The "common" template is used when sending notifications, password reset emails, etc.'),
        );
        
        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }
    
    public function beforeValidate()
    {
        if ($this->scenario == 'common' && strpos($this->common, '[CONTENT]') === false) {
            $this->addError('common', Yii::t('settings', 'The "[CONTENT]" tag is required but it has not been found in the content.'));
        }
        return parent::beforeValidate();
    }
}
