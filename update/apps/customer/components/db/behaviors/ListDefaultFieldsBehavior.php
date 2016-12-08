<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ListDefaultFieldsBehavior
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
 
class ListDefaultFieldsBehavior extends CActiveRecordBehavior 
{
    public function afterSave($event)
    {
        $type = ListFieldType::model()->findByAttributes(array(
            'identifier' => 'text',
        ));
        
        if (empty($type)) {
            return;
        }
        
        $model = new ListField();
        $model->type_id     = $type->type_id;
        $model->list_id     = $this->owner->list_id;
        $model->label       = 'Email';
        $model->tag         = 'EMAIL';
        $model->required    = 'yes';
        $model->visibility  = 'visible';
        $model->sort_order  = 0;
        $model->save(false);
        
        $model = new ListField();
        $model->type_id     = $type->type_id;
        $model->list_id     = $this->owner->list_id;
        $model->label       = 'First name';
        $model->tag         = 'FNAME';
        $model->required    = 'no';
        $model->visibility  = 'visible';
        $model->sort_order  = 1;
        $model->save(false);
        
        $model = new ListField();
        $model->type_id     = $type->type_id;
        $model->list_id     = $this->owner->list_id;
        $model->label       = 'Last name';
        $model->tag         = 'LNAME';
        $model->required    = 'no';
        $model->visibility  = 'visible';
        $model->sort_order  = 2;
        $model->save(false);
    }
}