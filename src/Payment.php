<?php

namespace AppMax;

use Exception;
use AppMax\Core\AppMaxController;
use AppMax\Exceptions\AppMaxException;
use GuzzleHttp\Exception\RequestException;

class Payment extends AppMaxController{
               
    public function creditCardToken(array $data) {     
        
        try{
            
            $response = $this->http->post("v1/payments/tokenize", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "json" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
                        
        } catch (RequestException $ex) {
            
            throw AppMaxException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
    
    public function creditCard(array $data) {     
        
        try{
            
            $response = $this->http->post("v1/payments/credit-card", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "json" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
                        
        } catch (RequestException $ex) {
            
            throw AppMaxException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
    
    public function pix(array $data) {     
        
        try{
            
            $response = $this->http->post("v1/payments/pix", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "json" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
                        
        } catch (RequestException $ex) {
            
            throw AppMaxException::fromGuzzleException($ex);
                        
        } catch (Exception $ex) {
                 
            throw new AppMaxException($ex);
        
        }
        
    }
    
    public function boleto(array $data) {     
        
        try{
            
            $response = $this->http->post("v1/payments/boleto", array(
                'headers' => [
                    'Authorization' => $this->token->getAuthorization(),
                ],
                "json" => $data,
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
