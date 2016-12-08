<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * HTMLPurifier_URIScheme_tel
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.5
 */
 
class HTMLPurifier_URIScheme_tel extends HTMLPurifier_URIScheme
{
    /**
     * Whether or not URIs of this scheme are locatable by a browser
     * http and ftp are accessible, while mailto and news are not.
     * @type bool
     */
    public $browsable = false;
    
    /**
     * Whether or not the URI may omit a hostname when the scheme is
     * explicitly specified, ala file:///path/to/file. As of writing,
     * 'file' is the only scheme that browsers support his properly.
     * @type bool
     */
    public $may_omit_host = true;

    public function doValidate(&$uri, $config, $context) {
        $uri->userinfo = null;
        $uri->host     = null;
        $uri->port     = null;
        
        return (bool)preg_match('/^\+?[a-zA-Z0-9_-]+$/i', $uri->path);
    }
}