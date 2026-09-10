<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppMax\Core;

use AppMax\Entity\AppMaxToken;

/**
 * Description of MSController
 *
 * @author weslley
 */
class AppMaxController extends AppMaxHttp{
    protected AppMaxToken $token;
    
    public function __construct(array $config = []) {        
        parent::__construct($config);
    }
    
    public function setToken(AppMaxToken $token){
        $this->token = $token;
        return $this;
    }
    
    public function getToken() : AppMaxToken{
        return $this->token;
    }
}
