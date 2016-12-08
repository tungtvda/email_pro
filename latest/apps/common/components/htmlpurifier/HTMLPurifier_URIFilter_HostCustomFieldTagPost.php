<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * HTMLPurifier_URIFilter_HostCustomFieldTagPost
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.6.1
 */

class HTMLPurifier_URIFilter_HostCustomFieldTagPost extends HTMLPurifier_URIFilter
{
    public $name = 'HostCustomFieldTagPost';

    public $post = true;

    public function filter(&$uri, $config, $context)
    {
        return true;
    }
}