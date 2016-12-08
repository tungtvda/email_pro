<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * DeliveryServerSmtpAmazon
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */

class DeliveryServerSmtpAmazon extends DeliveryServerSmtp
{
    protected $serverType = 'smtp-amazon';

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        $rules = array(
            array('username, password, port, timeout', 'required'),
        );

        return CMap::mergeArray($rules, parent::rules());
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DeliveryServer the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getParamsArray(array $params = array())
    {
        $params['transport'] = self::TRANSPORT_SMTP;
        return parent::getParamsArray($params);
    }

    public function attributeHelpTexts()
    {
        $texts = array(
            'hostname'    => Yii::t('servers', 'Your Amazon SES hostname, usually this is standard and looks like the following: email-smtp.us-east-1.amazonaws.com.'),
            'username'    => Yii::t('servers', 'Your Amazon SES SMTP username/access key ID, something like: i.e: AKIAIYYYYYYYYYYUBBFQ.'),
            'password'    => Yii::t('servers', 'Your Amazon SES password/secret access key.'),
            'port'        => Yii::t('servers', 'Amazon SES supports the following ports: 25, 465 or 587.'),
            'protocol'    => Yii::t('servers', 'There is no need to select a protocol for Amazon SES, but if you need a secure connection, TLS is supported.'),
            'from_email'  => Yii::t('servers', 'Your Amazon SES email address approved for sending emails.'),
        );

        return CMap::mergeArray(parent::attributeHelpTexts(), $texts);
    }

    public function attributeLabels()
    {
        $labels = array(
            'username'  => Yii::t('servers', 'Access Key ID'),
            'password'  => Yii::t('servers', 'Secret Access Key'),
        );

        return CMap::mergeArray(parent::attributeLabels(), $labels);
    }
    
    public function attributePlaceholders()
    {
        $placeholders = array(
            'hostname'  => Yii::t('servers', 'i.e: email-smtp.us-east-1.amazonaws.com'),
            'username'  => Yii::t('servers', 'i.e: AKIAIYYYYYYYYYYUBBFQ'),
            'password'  => Yii::t('servers', 'i.e: pnSXPeHkmapf6gghCyfIDz8YJce9iu9fzyqLB123'),
        );

        return CMap::mergeArray(parent::attributePlaceholders(), $placeholders);
    }
}
