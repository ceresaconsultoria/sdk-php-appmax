<?php

namespace AppMax;

use Exception;
use AppMax\Core\AppMaxController;
use AppMax\Exceptions\AppMaxException;
use GuzzleHttp\Exception\RequestException;

class Authorization extends AppMaxController{
               
    public function hash(array $data) {     
        
        try{
            
            $response = $this->http->post("app/authorize", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "form_params" => $data
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
                        
        } catch (RequestException $ex) {
            
            throw AppMaxException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
    
    public function appClientGenerate(array $data) {     
        
        try{
            
            $response = $this->http->post("app/client/generate", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "form_params" => $data
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
                        
        } catch (RequestException $ex) {
            
            throw AppMaxException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
        
}
