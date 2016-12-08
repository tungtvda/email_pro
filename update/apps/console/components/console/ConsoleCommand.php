<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ConsoleCommand
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.6.6
 *
 */

class ConsoleCommand extends CConsoleCommand
{
    // whether this should be verbose and output to console
    public $verbose = 0;

    /**
     * @param $message
     * @param bool $timer
     * @param string $separator
     * @return int
     */
    protected function stdout($message, $timer = true, $separator = "\n")
    {
        if (!$this->verbose) {
            return 0;
        }
        
        if (!is_array($message)) {
            $message = array($message);
        }

        $out = '';
        
        foreach ($message as $msg) {
            
            if ($timer) {
                $out .= '[' . date('Y-m-d H:i:s') . '] - ';
            }
            
            $out .= $msg;
            
            if ($separator) {
                $out .= $separator;
            }
        }

        echo $out;
        return 0;
    }
}
