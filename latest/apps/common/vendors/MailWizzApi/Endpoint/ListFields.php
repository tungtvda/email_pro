<?php
/**
 * This file contains the lists fields endpoint for Cyber FisionApi PHP-SDK.
 * 
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2015 https://cyberfision.com/
 */
 
 
/**
 * Cyber FisionApi_Endpoint_ListFields handles all the API calls for handling the list custom fields.
 * 
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @package Cyber FisionApi
 * @subpackage Endpoint
 * @since 1.0
 */
class Cyber FisionApi_Endpoint_ListFields extends Cyber FisionApi_Base
{
    /**
     * Get fields from a certain mail list
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param string $listUid
     * @return Cyber FisionApi_Http_Response
     */
    public function getFields($listUid)
    {
        $client = new Cyber FisionApi_Http_Client(array(
            'method'        => Cyber FisionApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl(sprintf('lists/%s/fields', $listUid)),
            'paramsGet'     => array(),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
}