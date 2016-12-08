<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ClearCacheCommand
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.6.6
 *
 */

class ClearCacheCommand extends ConsoleCommand
{
    // enable verbose mode
    public $verbose = 1;
    
    /**
     * @return int
     */
    public function actionIndex()
    {
        Yii::app()->hooks->doAction('console_command_clear_cache_before_process', $this);

        $result = $this->process();

        Yii::app()->hooks->doAction('console_command_clear_cache_after_process', $this);

        return $result;
    }

    /**
     * @return int
     */
    protected function process()
    {
        $this->stdout(FileSystemHelper::clearCache());
        return 0;
    }
}
