<?php

// demo.php

// include composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

$tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
$tokenizer = $tokenizerFactory->createDefaultTokenizer();

$tokens = $tokenizer->tokenize('Saya membeli barang seharga Rp 5.000 di Jl. Prof. Soepomo no. 67.');

echo json_encode($tokens);
