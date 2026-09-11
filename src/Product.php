<?php

namespace AppMax;

use Exception;
use AppMax\Core\AppMaxController;
use AppMax\Exceptions\AppMaxException;
use GuzzleHttp\Exception\RequestException;

class Product extends AppMaxController{
               
    public function list(array $query = []) {     
        
        try{
            
            $response = $this->http->get("v1/products", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "query" => $query,
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
