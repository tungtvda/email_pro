<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ListSubscriberFieldCache
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.6.2
 */

/**
 * This is the model class for table "list_subscriber_field_cache".
 *
 * The followings are the available columns in table 'list_subscriber_field_cache':
 * @property integer $subscriber_id
 * @property string $data
 *
 * The followings are the available model relations:
 * @property ListSubscriber $subscriber
 */
class ListSubscriberFieldCache extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{list_subscriber_field_cache}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        $rules = array();
        return CMap::mergeArray($rules, parent::rules());
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        $relations = array(
            'subscriber' => array(self::BELONGS_TO, 'ListSubscriber', 'subscriber_id'),
        );

        return CMap::mergeArray($relations, parent::relations());
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        $labels = array();
        return CMap::mergeArray($labels, parent::attributeLabels());
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ListSubscriberFieldCache the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function beforeSave()
    {
        $this->data = json_encode($this->data);
        return parent::beforeSave();
    }

    public function afterSave()
    {
        $this->data = json_decode($this->data, true);
        if (!is_array($this->data)) {
            $this->data = array();
        }
        parent::afterSave();
    }
    
    public function afterFind()
    {
        $this->data = json_decode($this->data, true);
        if (!is_array($this->data)) {
            $this->data = array();
        }
        parent::afterFind();
    }
}
