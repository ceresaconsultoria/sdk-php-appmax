<?php

namespace AppMax\Entity;

class AppMaxToken {
    public $access_token;
    public $token_type;
    public $expires_in;
    public $created_at;
    public $expire_at;
    
    public function __construct($json = null, $createdAt = null) {
        if($json){
            $jsonObj = json_decode($json);
            
            $this->access_token  = $jsonObj->access_token;
            $this->token_type  = $jsonObj->token_type;
            $this->expires_in  = $jsonObj->expires_in;
            $this->created_at  = $createdAt;
            
            $dateTime = new \DateTime($this->created_at);
            $dateTime->modify("+{$this->expires_in} seconds");
            
            $this->expire_at = $dateTime->format('Y-m-d H:i:s');
        }
    }
    
    public function isValid(){
        $now = strtotime(date('Y-m-d H:i:s'));
        $expire_at = strtotime($this->expire_at);
        
        return $expire_at >= $now;
    }
    
    public function getAuthorization(){
        return $this->token_type.' '.$this->access_token;
    }
}
