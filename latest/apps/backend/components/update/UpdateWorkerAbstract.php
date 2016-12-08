<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * UpdateWorkerAbstract
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.2
 */
 
abstract class UpdateWorkerAbstract extends CApplicationComponent
{
    final public function getDb()
    {
        return Yii::app()->getDb();
    }
    
    final public function getTablePrefix()
    {
        return $this->getDb()->tablePrefix;    
    }
    
    final public function getSqlFilesPath()
    {
        return Yii::getPathOfAlias('common.data.update-sql');
    }
    
    public function runQueriesFromSqlFile($version)
    {
        if (!is_file($sqlFile = $this->sqlFilesPath . '/' . $version . '.sql')) {
            return false;
        }
        
        $queries = (array)CommonHelper::getQueriesFromSqlFile($sqlFile, $this->getTablePrefix());

        foreach ($queries as $query) {
            $this->getDb()->createCommand($query)->execute();
        } 
        
        return true;
    }
    
    abstract public function run();
} 