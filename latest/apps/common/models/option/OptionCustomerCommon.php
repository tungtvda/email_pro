<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * OptionCustomerCommon
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.6
 */
 
class OptionCustomerCommon extends OptionBase
{
    // settings category
    protected $_categoryName = 'system.customer_common';
    
    public $notification_message;
    
    public $show_articles_menu = 'no';

    public function rules()
    {
        $rules = array(
            array('notification_message', 'safe'),
            array('show_articles_menu', 'in', 'range' => array_keys($this->getYesNoOptions())),
        );
        
        return CMap::mergeArray($rules, parent::rules());    
    }
    
    public function attributeLabels()
    {
        $labels = array(
            'notification_message' => Yii::t('settings', 'Notification message'),
            'show_articles_menu'   => Yii::t('settings', 'Show articles menu'),
        );
        
        return CMap::mergeArray($labels, parent::attributeLabels());    
    }
    
    public function attributePlaceholders()
    {
        $placeholders = array(
            'notification_message'  => '',
            'show_articles_menu'    => '',
        );
        
        return CMap::mergeArray($placeholders, parent::attributePlaceholders());
    }
    
    public function attributeHelpTexts()
    {
        $texts = array(
            'notification_message'  => Yii::t('settings', 'A small persistent notification message shown in customers area'),
            'show_articles_menu'    => Yii::t('settings', 'Whether to show the articles link in the menu'),
        );
        
        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }
}
