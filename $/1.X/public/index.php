<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require APP_PATH . 'helper.php';//подключаем хэлпер до transactions.php
// require VIEWS_PATH . 'transactions.php';
$files = getTransactionFiles(FILES_PATH);//получили пути до всех файлов в директории
// var_dump($files);
$transactions = [];
foreach($files as $file){//перебираем все файлы в директории
    $transactions = array_merge($transactions, getTransactions($file));//создаем массив из файлов  по указанному ранее пути
}

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';
