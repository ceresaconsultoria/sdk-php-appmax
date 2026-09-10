<?php

error_reporting(-1);
ini_set('display_errors', 1);

include "../vendor/autoload.php";

$jsonToken1 = file_get_contents('./token/token1.json');
$token1 = json_decode($jsonToken1);

$hash = $_GET['token'];

$appMaxAuthorization = new AppMax\Authorization([
    'base_uri' => \AppMax\Core\AppMaxHttp::BASE_URL_SANDBOX,
]);

$appMaxAuthorization->setToken(new \AppMax\Entity\AppMaxToken($jsonToken1, $token1->created_at));

$merchantClient = $appMaxAuthorization->appClientGenerate([
    'token' => $hash,
]);

\AppMax\Helper\AppMaxHelper::dump([
    'Merchant Client' => $merchantClient
]);

$appMaxAuthentication = new AppMax\Authentication([
    'base_uri' => \AppMax\Core\AppMaxHttp::BASE_AUTH_URL_SANDBOX,
]);

$appMaxToken2 = $appMaxAuthentication->token([
    'grant_type' => 'client_credentials',
    'client_id' => $merchantClient->data->client->client_id,
    'client_secret' => $merchantClient->data->client->client_secret,
]);

\AppMax\Helper\AppMaxHelper::dump([
    'Merchant Token' => $appMaxToken2
]);

file_put_contents('./token/token2.json', json_encode($appMaxToken2));

