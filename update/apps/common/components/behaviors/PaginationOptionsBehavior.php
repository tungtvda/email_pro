<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * PaginationOptionsBehavior
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4
 */
 
class PaginationOptionsBehavior extends CBehavior
{
    public $pageSizeVar = 'page_size';
           
    public function getPageSize()
    {
        $pageSize = $this->getPageSizeFromOptions();
        if (MW_IS_CLI) {
            return $pageSize;
        }
        
        $lookIntoSession = !in_array(Yii::app()->apps->getCurrentAppName(), array('api'));
        if ($lookIntoSession && Yii::app()->hasComponent('session') && Yii::app()->session->contains($this->pageSizeVar)) {
            $pageSize = (int)Yii::app()->session->itemAt($this->pageSizeVar);
        }
        
        if (Yii::app()->request->getQuery($this->pageSizeVar)) {
            $pageSize = (int)Yii::app()->request->getQuery($this->pageSizeVar, $pageSize);
            if ($lookIntoSession && Yii::app()->hasComponent('session')) {
                Yii::app()->session->add($this->pageSizeVar, $pageSize);
            }
        }
        
        if (!in_array($pageSize, array_keys($this->getOptionsList()))) {
            $pageSize = 10;
        }
        
        return $pageSize;
    }
    
    public function getPageSizeFromOptions()
    {
        $defaultPageSize = 10;
        if (Yii::app()->apps->isAppName('backend')) {
            $defaultPageSize = (int)Yii::app()->options->get('system.common.backend_page_size', $defaultPageSize);
        } elseif(Yii::app()->apps->isAppName('customer')) {
            $defaultPageSize = (int)Yii::app()->options->get('system.common.customer_page_size', $defaultPageSize);
        }
        return $defaultPageSize;
    }
    
    public function getOptionsList()
    {
        return array(
            10    => 10,
            20    => 20,
            30    => 30,
            40    => 40,
            50    => 50,
            60    => 60,
            70    => 70,
            80    => 80,
            90    => 90,
            100   => 100,
            500   => 500,
            1000  => 1000,
        );
    }
    
    public function getGridFooterPagination(array $htmlOptions = array())
    {
        return CHtml::dropDownList($this->pageSizeVar, $this->getPageSize(), $this->getOptionsList(), array_merge(array(
            'onchange' => "$.fn.yiiGridView.update('".$this->owner->modelName."-grid',{ data:{".$this->pageSizeVar.": $(this).val() }})",
        ), $htmlOptions));
    }
}