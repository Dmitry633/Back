<?php

declare(strict_types = 1);
include '../public/index.php';

// Your Code
function getTransactionFile(): string {
    $files = [];
    $files = array_diff(scandir(FILES_PATH), ['.','..']);
    return $files[2] ."\n";

}
// echo FILES_PATH . "\n";
// print_r(scandir(FILES_PATH));
// print_r(array_diff(scandir(FILES_PATH), ['.','..']));
print_r (getTransactionFile());
// var_dump (file_get_contents('../transaction_files/sample_1.csv'));
//echo (str_getcsv('../transaction_files/sample_1.csv'));
/*
$file = fopen('../transaction_files/sample_1.csv', 'r');
$row = fgetcsv($file);
print_r ($row);
while ($row !==false){
    echo 'Date: '.$row[0]. 'Check #: '.$row[1]. 'Description: '.$row[2]. 'Amount: '.$row[3]. "";
}
fclose($file);
*/
// $contStr = file_get_contents('../transaction_files/sample_1.csv');
$contArr = file('../transaction_files/sample_1.csv');
// var_dump($contArr);
// $chunks = explode(',', $contStr);
// print_r ($chunks);
foreach($contArr as $str) {
   $transactions =  explode(',', $str);
   print_r ($transactions);
}