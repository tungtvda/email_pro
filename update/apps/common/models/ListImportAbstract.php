<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ListImportAbstract
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.4.5
 */

abstract class ListImportAbstract extends FormModel
{
    public $rows_count = 0;

    public $current_page = 1;

    public $is_first_batch = 1;

    public $file;

    public $file_name;

    public $file_size_limit = 5242880; // 5 mb by default
    
    private $_uploadPath;

    public function rules()
    {
        $rules = array(
            array('rows_count, current_page, is_first_batch', 'numerical', 'integerOnly' => true),
        );

        return CMap::mergeArray($rules, parent::rules());
    }

    public function upload()
    {
        // no reason to go further if there are errors.
        if (!$this->validate()) {
            return false;
        }

        $uploadPath = $this->getUploadPath();
        if (!file_exists($uploadPath) && !@mkdir($uploadPath, 0777, true)) {
            $this->addError('file', Yii::t('list_import', 'Unable to create target directory!'));
            return false;
        }

        $this->file_name = sha1(uniqid(rand(0, time()), true)) . '.csv';

        if (!$this->file->saveAs($uploadPath . $this->file_name)) {
            $this->file_name = null;
            $this->addError('file', Yii::t('list_import', 'Unable to move the uploaded file!'));
            return false;
        }

        if (!StringHelper::fixFileEncoding($uploadPath . $this->file_name)) {
             @unlink($uploadPath . $this->file_name);
             $this->addError('file', Yii::t('list_import', 'Your uploaded file is not using the UTF-8 charset. Please save it in UTF-8 then upload it again.'));
             $this->file_name = null;
             return false;
         }

        return true;
    }

    public function setUploadPath($uploadPath)
    {
        $this->_uploadPath = $uploadPath;
        return $this;
    }

    public function getUploadPath()
    {
        if (empty($this->_uploadPath)) {
            $this->_uploadPath = Yii::getPathOfAlias('common.runtime.list-import') . '/';
        }
        return rtrim($this->_uploadPath, '/') . '/';
    }
}
