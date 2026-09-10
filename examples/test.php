<?php

error_reporting(-1);
ini_set('display_errors', 1);

include "../vendor/autoload.php";

$jsonToken2 = file_get_contents('./token/token2.json');
$token2 = json_decode($jsonToken2);

$apiProduct = new \AppMax\Product([
    'base_uri' => \AppMax\Core\AppMaxHttp::BASE_URL_SANDBOX,
]);

$apiProduct->setToken(new \AppMax\Entity\AppMaxToken($jsonToken2, $token2->created_at));

$apiProductResponse = $apiProduct->list();

\AppMax\Helper\AppMaxHelper::dump($apiProductResponse);
