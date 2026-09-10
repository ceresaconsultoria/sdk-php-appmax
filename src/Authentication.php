<?php

namespace AppMax;

use Exception;
use AppMax\Core\AppMaxController;
use AppMax\Exceptions\AppMaxException;

class Authentication extends AppMaxController{
    
    public function __construct(array $config = []) {
        if(!isset($config['base_uri'])){
            throw new \Exception('Informe a URL da autorização da AppMax');
        }
        
        parent::__construct($config);
    }
           
    public function token(array $data): Entity\AppMaxToken{        
        try{
            
            $response = $this->http->post("oauth2/token", array(
                "form_params" => $data
            ));

            $body = (string)$response->getBody();
                        
            return new Entity\AppMaxToken($body, date('Y-m-d H:i:s'));
                        
        } catch (RequestException $ex) {
            
            throw HubApiException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
        
}
