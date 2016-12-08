<?php
/**
 * This file contains the list segments endpoint for Cyber FisionApi PHP-SDK.
 * 
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2015 https://cyberfision.com/
 */
 
 
/**
 * Cyber FisionApi_Endpoint_ListSegments handles all the API calls for handling the list segments.
 * 
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @package Cyber FisionApi
 * @subpackage Endpoint
 * @since 1.0
 */
class Cyber FisionApi_Endpoint_ListSegments extends Cyber FisionApi_Base
{
    /**
     * Get segments from a certain mail list
     * 
     * Note, the results returned by this endpoint can be cached.
     * 
     * @param string $listUid
     * @param integer $page
     * @param integer $perPage
     * @return Cyber FisionApi_Http_Response
     */
    public function getSegments($listUid, $page = 1, $perPage = 10)
    {
        $client = new Cyber FisionApi_Http_Client(array(
            'method'        => Cyber FisionApi_Http_Client::METHOD_GET,
            'url'           => $this->config->getApiUrl(sprintf('lists/%s/segments', $listUid)),
            'paramsGet'     => array(
                'page'      => (int)$page, 
                'per_page'  => (int)$perPage
            ),
            'enableCache'   => true,
        ));
        
        return $response = $client->request();
    }
}