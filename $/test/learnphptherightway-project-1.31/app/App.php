<?php

declare(strict_types = 1);
// include '../public/index.php';

// Your Code
function getTransactionFiles(string $dirPath): array {
    $files = [];
    foreach(scandir($dirPath) as $file) {
        if (is_dir($file)) {// чтобы убрать точки
            continue;
        }
        $files[] = $dirPath . $file;
    }
    // $files = array_diff(scandir(FILES_PATH), ['.','..']);
    return $files;
}

function getTransactions(string $fileName): array {
    if(! file_exists($fileName)){
        trigger_error('File"' .$fileName. '" does not exist', E_USER_ERROR);//вызов ошибки
    } //проверка существкует ли файл
    $file = fopen($fileName, 'r');
    fgetcsv($file); // убрали наименования столлбцов из массива
    $transactions = [];
    while (($transaction = fgetcsv($file)) !== false){
        $transactions[] = $transaction;
    }
    return $transactions;
}
// echo FILES_PATH . "\n";
// print_r(scandir(FILES_PATH));
// print_r(array_diff(scandir(FILES_PATH), ['.','..']));
// print_r (getTransactionFile());
// var_dump (file_get_contents('../transaction_files/sample_1.csv'));
// echo (str_getcsv('../transaction_files/sample_1.csv'));

// $file = fopen('../transaction_files/sample_1.csv', 'r');
// $row = fgetcsv($file);
// print_r ($row);
// while ($row !==false){
//     echo 'Date: '.$row[0]. 'Check #: '.$row[1]. 'Description: '.$row[2]. 'Amount: '.$row[3]. "";
// }
// fclose($file);
