<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * CustomerGroupOptionQuotaCounters
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.3
 */
 
class CustomerGroupOptionQuotaCounters extends OptionCustomerQuotaCounters
{
    public function behaviors()
    {
        $behaviors = array(
            'handler' => array(
                'class'          => 'backend.components.behaviors.CustomerGroupModelHandlerBehavior',
                'categoryName'   => $this->_categoryName,
            ),
        );
        return CMap::mergeArray($behaviors, parent::behaviors());
    }

    public function save()
    {
        return $this->asa('handler')->save();
    }
}
