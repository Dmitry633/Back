<?php

declare(strict_types = 1);
function getTransactionFiles(string $dirPath): array {// добавим в качестве аргумента путь до файла, чтобы наша ф-ция имела меньше зависимостей и это позволит нам использовать ее в т ч вне данной директории
    $files = [];
    foreach(scandir($dirPath) as $file) {//перебор всех файлов в директории
        if(is_dir($file)){//исключение из перечня дирректорий (точек)
            continue;
        }
        $files[]=$dirPath . $file;
    }
    return $files;
}
//Прочтем все файлы и  извлечем транзакции из них:
function getTransactions (string $fileName, ?callable $transactionHandler = null): array { //ставим НУЛЛ т к мы не собираемся обрабатывать все подряд, а только вернуть строку из ЦСВ файла - Теперь мы сделали эту ф-цию достаточно гибкой,и она теперь не зависит от отдельных ф-ций, которые выделяют транзакции. Вместо этого мы вставляем наш оброботчик, который выделяет транзакцию из строки и т. о. мы можем использовать снова эту ф-цию для других банков или других типов файлов ***не понятно что значит запись ?callable ***
    if(! file_exists($fileName)){//проверка на Е файла
        trigger_error('File'.$filename.'doesn`t exist', E_USER_ERROR);//вызов ошибки
    }
    $file = fopen($fileName,'r');
    fgetcsv($file);//прочли первую строку и она больше не будет прочтена в последующем (для удаления наименований колонок из массива $transactions)
    $transactions = [];
    while(($transaction = fgetcsv($file)) !== false){// для прочтения файла строка за строкой
        if ($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }
       $transactions[] = $transaction;//берем каждую строку и помещаем в массив
    //    $transactions[] = extractTransaction($transaction);
    }
    return $transactions;
}

function extractTransaction(array $transactionRow): array {//в данном случае ф-ция работает, но в конкретном случае не будет, например, если файлы будут разных форматов (не только csv). строка 30 строго предполагает, что колонки будут в опредедленном порядке, но если нет? или файлы лежат  в других дирректориях. Рассмотрим случай, когда файлы из разных папок, с разными форматами из банка Х и банка Y. В этом случае можем создать другую ф-цию extractTransactionFromBankY, где опрделить различные правила этой ф-ции. И способ при котором можно использовать несколько ф-ций здесь это поставить в качестве аргумента ф-ции getTransactions колбэк ф-цию(стр 15)
    [$date, $checkNumber, $description, $amount] = $transactionRow; // т к мы предполагаем, что первая колнка будет всегда датой, вторая checkNumber и т д, то используем деструкторизацию массива
    $amount =(float) str_replace(['$',','], '', $amount);//сделаем из amount численный тип
    return [     //мы можем получить данные из $transactionRow
        'date' => $date, //здесь не будем преобразовывать формат даты, т.к текущая ф-ция - для извлечения транзакции, в случае форматирования выводимых данных на экран здесь не сможем использовать эту ф-цию для пердставления каких либо вычислений [автор всегда обрабатывает выводимые на экран компоненты (форматирование дат, чисел и пр) в пределах фала 'виды' или другого слоя между 'видом' и бизнес логкой]
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount
    ];
}

function calculateTotals(array $transactions): array {
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];
    foreach($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
            
        }
    } 
    return $totals;
}
//для форматриования(доб знак $и возвращение как строки) столбца с суммами автор несчитает нужным вводить функцию в app.php т.к это не бизнесс-логика, поэтому создадим файл helper