<?php
/**
 * This file contains the customers endpoint for Cyber FisionApi PHP-SDK.
 * 
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2015 https://cyberfision.com/
 */
 
 
/**
 * Cyber FisionApi_Endpoint_Customers handles all the API calls for customers.
 * 
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @package Cyber FisionApi
 * @subpackage Endpoint
 * @since 1.0
 */
class Cyber FisionApi_Endpoint_Customers extends Cyber FisionApi_Base
{
    /**
     * Create a new mail list for the customer
     * 
     * The $data param must contain following indexed arrays:
     * -> customer
     * -> company
     * 
     * @param array $data
     * @return Cyber FisionApi_Http_Response
     */
    public function create(array $data)
    {
        if (isset($data['customer']['password'])) {
            $data['customer']['confirm_password'] = $data['customer']['password'];
        }
        
        if (isset($data['customer']['email'])) {
            $data['customer']['confirm_email'] = $data['customer']['email'];
        }
        
        if (empty($data['customer']['timezone'])) {
            $data['customer']['timezone'] = 'UTC';
        }
        
        $client = new Cyber FisionApi_Http_Client(array(
            'method'        => Cyber FisionApi_Http_Client::METHOD_POST,
            'url'           => $this->config->getApiUrl('customers'),
            'paramsPost'    => $data,
        ));
        
        return $response = $client->request();
    }
}