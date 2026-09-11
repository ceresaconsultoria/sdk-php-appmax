<?php

namespace AppMax;

use Exception;
use AppMax\Core\AppMaxController;
use AppMax\Exceptions\AppMaxException;
use GuzzleHttp\Exception\RequestException;

class Order extends AppMaxController{
               
    const PENDENTE = 'pendente';
    const AUTORIZADO = 'autorizado';
    const APROVADO = 'aprovado';
    const CANCELADO = 'cancelado';
    const RECUSADO_POR_RISCO = 'recusado_por_risco';
    const ESTORNADO = 'estornado';
    const INTEGRADO = 'integrado';
    const PENDENTE_INTEGRACAO = 'pendente_integracao';
    const PENDENTE_INTEGRACAO_EM_ANALISE = 'pendente_integracao_em_analise';
    const CHARGEBACK_EM_TRATATIVA = 'chargeback_em_tratativa';
    const CHARGEBACK_EM_DISPUTA = 'chargeback_em_disputa';
    const CHARGEBACK_PERDIDO = 'chargeback_perdido';
    const CHARGEBACK_VENCIDO = 'chargeback_vencido'; 
    
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
