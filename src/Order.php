<?php

namespace AppMax;

use Exception;
use AppMax\Core\AppMaxController;
use AppMax\Exceptions\AppMaxException;

class Order extends AppMaxController{
               
    public function create(array $data) {     
        
        try{
            
            $response = $this->http->post("v1/orders", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "json" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
                        
        } catch (RequestException $ex) {
            
            throw HubApiException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
    
    public function details($id) {     
        
        try{
            
            $response = $this->http->get(vsprintf('v1/orders/%s', [
                $id
            ]), array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
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
