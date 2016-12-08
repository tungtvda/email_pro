<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ListCsvImport
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */

class ListCsvImport extends ListImportAbstract
{
    
    public function rules()
    {
        $mimes   = null;
        $options = Yii::app()->options;
        if ($options->get('system.importer.check_mime_type', 'yes') == 'yes' && CommonHelper::functionExists('finfo_open')) {
            $mimes = Yii::app()->extensionMimes->get('csv')->toArray();
        }

        $rules = array(
            array('file', 'required', 'on' => 'upload'),
            array('file', 'file', 'types' => array('csv'), 'mimeTypes' => $mimes, 'maxSize' => $this->file_size_limit, 'allowEmpty' => true),
            array('file_name', 'length', 'is' => 44),
        );

        return CMap::mergeArray($rules, parent::rules());
    }
}
