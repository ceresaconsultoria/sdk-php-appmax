<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppMax\Exceptions;

use Exception;

/**
 * Description of MSException
 *
 * @author weslley
 */
class AppMaxException extends Exception{
    
    public function __construct(Exception $ex, $completeError = false) {
        $message = $ex->getMessage(); 
        
        if($completeError){
            $message .= PHP_EOL . $ex->getTraceAsString();
        }
        
        parent::__construct($message, $ex->getCode(), $ex->getPrevious());
    }
    
    public static function fromObjectMessage($message, $code, $previous = null){
        
        if(is_object($message)){
            
            $newMessageString = [];
            
            if(isset($message->message)){
                $newMessageString[] = $message->message;
            }
            
            if(isset($message->error)){
                $newMessageString[] = $message->error->message;
            }
            
            if(isset($message->errors)){
                foreach($message->errors as $key => $value){
                    $newMessageString[] = $key.': ' . json_encode($value);
                }
            }                        
            
            return new AppMaxException( new Exception(implode("\n", $newMessageString), $code, $previous) );     
        }
        
        if(is_string($message)){
            
            return new AppMaxException( new Exception($message, $code, $previous) );     
            
        }
        
    }
    
    public static function fromGuzzleException($ex){
        $className = get_class($ex);
        $responseBody = '['.$className.'] Body: ' . (string)$ex->getResponse()->getBody();
        return new AppMaxException( new Exception($responseBody, $ex->getCode(), $ex->getPrevious()) );
    }
    
}
