<?php

error_reporting(-1);
ini_set('display_errors', 1);

include "../vendor/autoload.php";

$appMaxAuthentication = new AppMax\Authentication([
    'base_uri' => \AppMax\Core\AppMaxHttp::BASE_AUTH_URL_SANDBOX,
]);

$appMaxToken1 = $appMaxAuthentication->token([
    'grant_type' => 'client_credentials',
    'client_id' => '',
    'client_secret' => '',
]);

file_put_contents('./token/token1.json', json_encode($appMaxToken1));

//--

$appMaxAuthorization = new AppMax\Authorization([
    'base_uri' => \AppMax\Core\AppMaxHttp::BASE_URL_SANDBOX,
]);

$appMaxAuthorization->setToken($appMaxToken1);

$appMaxAuthorizationHash = $appMaxAuthorization->hash([
    'app_id' => '',
    'external_key' => 100,
    'url_callback' => '[...]/examples/callback.php',
]);

$hash = $appMaxAuthorizationHash->data->token;

$merchantUrl = \AppMax\Core\AppMaxHttp::BASE_MERCHANT_SANDBOX;

header('Location: ' . $merchantUrl . $hash);