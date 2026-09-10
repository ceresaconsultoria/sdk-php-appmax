<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppMax\Helper;

/**
 * Description of MSHelper
 *
 * @author weslley
 */
class AppMaxHelper {
    
    const CONTATO_RESIDENCIAL = "H";
    const CONTATO_CELULAR = "M";
    const CONTATO_COMERCIAL = "W";
    
    const ENDERECO_COBRANCA = "B";
    const ENDERECO_ENTREGA = "D";
    
    const FORMAS_PAGAMENTO_ITAU_SHOPLINE = "7";
    const FORMAS_PAGAMENTO_TRANSF_ONLINE_BRADESCO = "22";
    const FORMAS_PAGAMENTO_TRANSF_ONLINE_BB = "23";
    const FORMAS_PAGAMENTO_BOLETO = "6";
    const FORMAS_PAGAMENTO_SALDO = "8";
    const FORMAS_PAGAMENTO_PIX = "27";
    const FORMAS_PAGAMENTO_BOLETOPIX = "28";
    
    const FORMAS_PAGAMENTO_CARTAO_VISA = "3";
    const FORMAS_PAGAMENTO_CARTAO_VISA_PARCELA = "12";
    
    const FORMAS_PAGAMENTO_CARTAO_MASTERCARD = "4";
    const FORMAS_PAGAMENTO_CARTAO_MASTERCARD_PARCELA = "12";
    
    const FORMAS_PAGAMENTO_CARTAO_AMERICAN_EXPRESS = "5";
    const FORMAS_PAGAMENTO_CARTAO_AMERICAN_EXPRESS_PARCELA = "12";
    
    const FORMAS_PAGAMENTO_CARTAO_ELO = "16";
    const FORMAS_PAGAMENTO_CARTAO_ELO_PARCELA = "12";
    
    const FORMAS_PAGAMENTO_CARTAO_HIPERCARD = "20";
    const FORMAS_PAGAMENTO_CARTAO_HIPERCARD_PARCELA = "12";
    
    const FORMAS_PAGAMENTO_CARTAO_HIPER_ITAU = "25";
    const FORMAS_PAGAMENTO_CARTAO_HIPER_ITAU_PARCELA = "12";
    
    const STATUS_TRANSACAO_AGUARDANDO_PAGAMENTO = "4";
    const STATUS_TRANSACAO_APROVADA = "6";
    const STATUS_TRANSACAO_CANCELADA = "7";
    const STATUS_TRANSACAO_EM_CONSTESTACAO = "24";
    const STATUS_TRANSACAO_EM_MONITORAMENTO = "87";
    const STATUS_TRANSACAO_REPROVADA = "89";
    
    const GENERO_MASCULINO = "M";
    const GENERO_FEMININO = "F";
    
    const ESTADO_CIVIL_SOLTEIRO = "S";
    const ESTADO_CIVIL_CASADO = "M";
    const ESTADO_CIVIL_SEPARADO = "A";
    const ESTADO_CIVIL_DIVORCIADO = "D";
    const ESTADO_CIVIL_VIUVO = "W";
    
    const STATUS_CONTA_ATIVO = "2";
    const STATUS_CONTA_INATIVO = "3";
    const STATUS_CONTA_SUSPEITO = "114";
    
    const TIPO_CONTA_PESSOAL = "1";
    const TIPO_CONTA_EMPRESARIAL = "2";
    
    public static function dump($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
    public static function guid(){
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        return strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
    }
}
