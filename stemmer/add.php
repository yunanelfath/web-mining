<?php

// include composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container

$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();

$dictionary = $stemmerFactory->createDefaultDictionary();
$dictionary->addWordsFromTextFile(__DIR__.'/my-dictionary.txt');
$dictionary->add('internet');
$dictionary->remove('desa');

$stemmer = new \Sastrawi\Stemmer\Stemmer($dictionary);

echo $stemmer->stem('internetan'); //internet
