<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * OptionSpfDkim
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.6.6
 */
 
class OptionSpfDkim extends OptionBase
{
    // settings category
    protected $_categoryName = 'system.dns.spf_dkim';
    
    public $spf = '';
    
    public $dkim_public_key = '';
    
    public $dkim_private_key = '';
    
    public function rules()
    {
        $rules = array(
            array('spf', 'safe'),
            array('dkim_private_key', 'match', 'pattern' => '/-----BEGIN\sRSA\sPRIVATE\sKEY-----(.*)-----END\sRSA\sPRIVATE\sKEY-----/sx'),
            array('dkim_public_key', 'match', 'pattern' => '/-----BEGIN\sPUBLIC\sKEY-----(.*)-----END\sPUBLIC\sKEY-----/sx'),
            array('dkim_private_key, dkim_public_key', 'length', 'max' => 10000),

        );
        return CMap::mergeArray($rules, parent::rules());    
    }
    
    public function attributeLabels()
    {
        $labels = array(
            'spf'                => Yii::t('settings', 'The SPF value'),
            'dkim_private_key'   => Yii::t('settings', 'Dkim private key'),
            'dkim_public_key'    => Yii::t('settings', 'Dkim public key'),
        );
        
        return CMap::mergeArray($labels, parent::attributeLabels());    
    }
    
    public function attributePlaceholders()
    {
        $placeholders = array(
            'spf'              => 'v=spf1 mx a ptr mail.otherdomain.com ~all',
            'dkim_private_key' => "-----BEGIN RSA PRIVATE KEY-----\n ... \n-----END RSA PRIVATE KEY-----",
            'dkim_public_key'  => "-----BEGIN PUBLIC KEY-----\n ... \n-----END PUBLIC KEY-----",
        );
        return CMap::mergeArray($placeholders, parent::attributePlaceholders());
    }
    
    public function attributeHelpTexts()
    {
        $texts = array(
            'spf' => Yii::t('settings', 'The SPF value, i.e: v=spf1 mx a ptr mail.otherdomain.com ~all'),
        );
        
        return CMap::mergeArray($texts, parent::attributeHelpTexts());
    }
}
