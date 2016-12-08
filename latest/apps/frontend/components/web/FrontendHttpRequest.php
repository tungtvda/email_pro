<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * FrontendHttpRequest
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.6.2
 */

class FrontendHttpRequest extends BaseHttpRequest
{
    /**
     * FrontendHttpRequest::checkCurrentRoute()
     *
     * @return bool
     */
    protected function checkCurrentRoute()
    {
        if (stripos($this->pathInfo, 'webhook') !== false) {
            return false;
        }
        return parent::checkCurrentRoute();
    }

}