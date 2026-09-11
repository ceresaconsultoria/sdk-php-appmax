<?php

namespace AppMax;

use Exception;
use AppMax\Core\AppMaxController;
use AppMax\Exceptions\AppMaxException;
use GuzzleHttp\Exception\RequestException;

class Customer extends AppMaxController{
               
    public function createOrUpdate(array $data) {     
        
        try{
            
            $response = $this->http->post("v1/customers", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
                        
        } catch (RequestException $ex) {
            
            throw HubApiException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
}
