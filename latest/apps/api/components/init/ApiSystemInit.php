<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ApiSystemInit
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class ApiSystemInit extends CApplicationComponent 
{
    protected $_hasRanOnBeginRequest = false;
    protected $_hasRanOnEndRequest = false;
    
    public function init()
    {
        parent::init();
        
        // hook into events and add our methods.
        Yii::app()->attachEventHandler('onBeginRequest', array($this, 'runOnBeginRequest'));
        Yii::app()->attachEventHandler('onEndRequest', array($this, 'runOnEndRequest'));
    }
    
    public function runOnBeginRequest(CEvent $event)
    {
        if ($this->_hasRanOnBeginRequest) {
            return;
        }
        
        // no cookies for this app.
        ini_set('session.use_cookies', '0');
        
        // and mark the event as completed.
        $this->_hasRanOnBeginRequest = true;
    }
    
    public function runOnEndRequest(CEvent $event)
    {
        if ($this->_hasRanOnEndRequest) {
            return;
        }
        
        // and mark the event as completed.
        $this->_hasRanOnEndRequest = true;
    }
}