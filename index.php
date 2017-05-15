<?php

require_once "./vendor/autoload.php";


use Goutte\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Fireguard\Correios\CepCrawler;

$request = Request::createFromGlobals();
$client = new Client();
$crawler = new CepCrawler();

$result = $crawler->searchForCep($request->query->get('cep'));
return (new JsonResponse($result))->send();

