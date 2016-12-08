<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * OptionCronProcessBounceServers
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.3.1
 */
 
class OptionCronProcessBounceServers extends OptionBase
{
    // settings category
    protected $_categoryName = 'system.cron.process_bounce_servers';
    
    // maximum amount of memory allowed
    public $memory_limit;
    
    // how many servers to process at once
    public $servers_at_once = 10;
    
    // how many emails should we load at once for each loaded server
    public $emails_at_once = 500;

    // how many seconds should we pause between the batches
    public $pause = 5;
    
    public function rules()
    {
        $rules = array(
            array('servers_at_once, emails_at_once, pause', 'required'),
            array('memory_limit', 'in', 'range' => array_keys($this->getMemoryLimitOptions())),
            array('servers_at_once, emails_at_once, pause', 'numerical', 'integerOnly' => true),
            array('servers_at_once', 'numerical', 'min' => 1, 'max' => 100),
            array('emails_at_once', 'numerical', 'min' => 100, 'max' => 1000),
            array('pause', 'numerical', 'min' => 0, 'max' => 60),
        );
        
        return CMap::mergeArray($rules, parent::rules());    
    }
    
    public function attributeLabels()
    {
        $labels = array(
            'memory_limit'     => Yii::t('settings', 'Memory limit'),
            'servers_at_once'  => Yii::t('settings', 'Servers at once'),
            'emails_at_once'   => Yii::t('settings', 'Emails at once'),
            'pause'            => Yii::t('settings', 'Pause'),
        );
        
        return CMap::mergeArray($labels, parent::attributeLabels());    
    }
    
    public function attributePlaceholders()
    {
        $placeholders = array(
            'memory_limit'     => null,
            'servers_at_once'  => null,
            'emails_at_once'   => null,
            'pause'            => null,
        );
        
        return CMap::mergeArray($placeholders, parent::attributePlaceholders());
    }
    
    public function attributeHelpTexts()
    {
        $texts = array(
            'memory_limit'     => Yii::t('settings', 'The maximum memory amount the process is allowed to use while processing one batch of servers.'),
            'servers_at_once'  => Yii::t('settings', 'How many servers to process at once.'),
            'emails_at_once'   => Yii::t('settings', 'How many emails for each server to process at once.'),
            'pause'            => Yii::t('settings', 'How many seconds to sleep after processing the emails from a server.'),
        );
        
        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }
}
