<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * OptionCronProcessSubscribers
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.2
 */
 
class OptionCronProcessSubscribers extends OptionBase
{
    // settings category
    protected $_categoryName = 'system.cron.process_subscribers';
    
    // memory limit
    public $memory_limit;
    
    // how many days we should keep the unsubscribers
    public $unsubscribe_days = 30;
    
    // how many days we should keep the unconfirmed subscribers
    public $unconfirm_days = 3;
    
    // how many days we should keep the blacklisted subscribers
    public $blacklisted_days = 0;

    public function rules()
    {
        $rules = array(
            array('unsubscribe_days, unconfirm_days, blacklisted_days', 'required'),
            array('memory_limit', 'in', 'range' => array_keys($this->getMemoryLimitOptions())),
            array('unsubscribe_days, unconfirm_days, blacklisted_days', 'numerical', 'min' => 0, 'max' => 365),
        );
        
        return CMap::mergeArray($rules, parent::rules());    
    }
    
    public function attributeLabels()
    {
        $labels = array(
            'memory_limit'      => Yii::t('settings', 'Memory limit'),
            'unsubscribe_days'  => Yii::t('settings', 'Unsubscribe days'),
            'unconfirm_days'    => Yii::t('settings', 'Unconfirm days'),
            'blacklisted_days'  => Yii::t('settings', 'Blacklisted days'),
        );
        
        return CMap::mergeArray($labels, parent::attributeLabels());    
    }
    
    public function attributePlaceholders()
    {
        $placeholders = array(
            'memory_limit'      => null,
            'unsubscribe_days'  => null,
            'unconfirm_days'    => null,
            'blacklisted_days'  => null,
        );
        
        return CMap::mergeArray($placeholders, parent::attributePlaceholders());
    }
    
    public function attributeHelpTexts()
    {
        $texts = array(
            'memory_limit'      => Yii::t('settings', 'The maximum memory amount the cron process is allowed to use while running.'),
            'unsubscribe_days'  => Yii::t('settings', 'How many days to keep the unsubscribers in the system. 0 is unlimited'),
            'unconfirm_days'    => Yii::t('settings', 'How many days to keep the unconfirmed subscribers in the system. 0 is unlimited'),
            'blacklisted_days'  => Yii::t('settings', 'How many days to keep the blacklisted subscribers in the system. 0 is unlimited'),
        );
        
        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }
}
