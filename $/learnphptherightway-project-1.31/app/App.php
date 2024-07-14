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
var_dump($contArr);
// $chunks = explode(',', $contStr);
// print_r ($chunks);
// $data=[];

foreach($contArr as $str) {
   $transactions =  explode(',', $str, 4);
   print_r ($transactions);
   $data[] = $transactions[0];
   $check_№[] = $transactions[1];
   $description[] = $transactions[2];
   $amount[] = $transactions[3];


//    for(i = 0; i<count($transactions); i++){
// ;
//    };
}


print_r ($data);
print_r ($check_№);
print_r ($description);
print_r ($amount);
$income = 0;
$expense = 0;
echo "Дальше идет ФОРЫЧ " . "\n";

foreach(array_slice($amount, 1) as $str){
    echo $str ."\n";
    var_dump ($str);
    //echo $str[1] ."\n";
    $noDollar = str_replace('$', '', $str);
    $noQ = str_replace('"', '', $noDollar);

    //$getFloat = (float)$noDollar;
    echo $noQ ;
    var_dump ($noQ);
    // echo $getFloat ."\n";

    // if($str[0]== '-'){
    // echo "Без доллара  A равно " . $a."\n";
   

    //    // $noDollarExp = (float)$a;
        
    // }

   // echo "Без доллара равно " . $noDollarExp;

    // $num = (float)$str;
    // var_dump ($num);

    // if ($num > 0) {
    //     $income += $num;
    // } else {
    //     $expense -= $num;
    // }
    // return $income;
}

$k = "-$150.43";
$x = str_replace('"','$', '', $k);
var_dump ($x);

$t = (float)$x;
var_dump ($t);
var_dump ($k);
//var_dump ($amount[0]);



// echo $income."\n";
// echo $expense."\n";




