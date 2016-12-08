<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * OptionLicense
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.9
 */

class OptionLicense extends OptionBase
{
    // settings category
    protected $_categoryName = 'system.license';

    public $first_name;

    public $last_name;

    public $email;

    public $market_place;

    public $purchase_code;

    public function rules()
    {
        $rules = array(
            array('first_name, last_name, email, market_place, purchase_code', 'required'),
            array('first_name, last_name, email, market_place, purchase_code', 'length', 'max' => 255),
            array('email', 'email', 'validateIDN' => true),
        );

        return CMap::mergeArray($rules, parent::rules());
    }

    public function attributeLabels()
    {
        $labels = array(
            'first_name'    => Yii::t('settings', 'First name'),
            'last_name'     => Yii::t('settings', 'Last name'),
            'email'         => Yii::t('settings', 'Email'),
            'market_place'  => Yii::t('settings', 'Market place'),
            'purchase_code' => Yii::t('settings', 'Purchase code'),
        );

        return CMap::mergeArray($labels, parent::attributeLabels());
    }

    public function attributeHelpTexts()
    {
        $texts = array();
        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }
}
