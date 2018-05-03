<?php

// demo.php

// include composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

$tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
$tokenizer = $tokenizerFactory->createDefaultTokenizer();

$text = $_REQUEST['textp'];

$tokens = $tokenizer->tokenize($text);

echo json_encode($tokens);
