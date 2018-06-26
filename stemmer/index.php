<?php
// demo.php

// include composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();

// stem
$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';
$output   = $stemmer->stem($sentence);

//echo $output . "\n<br/>";
// ekonomi indonesia sedang dalam tumbuh yang bangga

//echo $stemmer->stem('Mereka meniru-nirukannya') . "\n";

$http = new \GuzzleHttp\Client();

$main_url = "https://sandbox-id.xfers.com/api/v3";

$headers = ['X-XFERS-USER-API-KEY'=> "ebzFVj2PXd-ov1dH3o6xAxLqstcRqMJ7gsY3K98qu8o"];

$response = $http->get($main_url."/user", ['headers'=> $headers]);

$response = json_decode($response->getBody()->getContents(), true);

print_r($response);

