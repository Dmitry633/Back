<?php

declare(strict_types = 1);

$contArr = file(FILES_PATH . 'sample_1.csv');// должен быть перебор всех файлов в директори


foreach($contArr as $str) {
   $transactions =  explode(',', $str, 4);
   $date[] = $transactions[0];
   $check_№[] = $transactions[1];
   $description[] = $transactions[2];
   $amount[] = $transactions[3];
}

$date = array_slice($date, 1);
$check_№ = array_slice($check_№, 1);
$description = array_slice($description, 1);
$income = 0;
$expense = 0;
$nums = [];
foreach(array_slice($amount, 1) as $str){ // перебор начнется с элемента [1]
    $search = ['"', '$'];// Проблема: str_replace не убирал все кавычки из строки(vardump их показывал). Решение вместо заменяемых символов,в качестве первого аргумента str_replace, использовал массив  с перечнем заменяемых символов
    $noDollar = str_replace($search, '', $str);
    if (strpos($noDollar,',')){
        $noComma = str_replace(',', '', $noDollar);
        $noDollar = $noComma;

    }

    $getFloat = (float)$noDollar;
    $nums[] = $getFloat;
    if($getFloat < 0) {
        $expense += $getFloat;

    } else {
        $income += $getFloat;

    }
}
$income = round($income, 2);
$expense = round($expense, 2);
$total = $income + $expense;
$total = (round($total, 2));