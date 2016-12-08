<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * Custom application main configuration file
 * 
 * This file can be used to overload config/components/etc
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2014 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.1
 */
    
return array(

    // application components
    'components' => array(
        'db' => array(
            'connectionString'  => '{DB_CONNECTION_STRING}',
            'username'          => '{DB_USER}',
            'password'          => '{DB_PASS}',
            'tablePrefix'       => '{DB_PREFIX}',
        ),
    ),
);