<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppMax\Core;

use GuzzleHttp\Client;

/**
 * Description of MSHttp
 *
 * @author weslley
 */
class AppMaxHttp {
    protected Client $http;
    protected $config;

    const BASE_MERCHANT_SANDBOX = "https://breakingcode.sandboxappmax.com.br/appstore/integration/";
    const BASE_MERCHANT_URL = "https://admin.appmax.com.br/appstore/integration/";
    
    const BASE_AUTH_URL_SANDBOX = "https://auth.sandboxappmax.com.br/";
    const BASE_AUTH_URL = "https://auth.appmax.com.br/";
    
    const BASE_URL_SANDBOX = "https://api.sandboxappmax.com.br/";
    const BASE_URL = "https://api.appmax.com.br/";
           
    public function __construct(array $config = []) {        
        $defaultConfig = array(
            'base_uri' => self::BASE_URL,
            'timeout' => 30,
            'headers' => array(
                'content-type' => 'application/json'
            )
        );
        
        $this->config = array_merge($defaultConfig, $config);
                
        $this->http = new Client($this->config);
    }
}
