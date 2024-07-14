<?php
// declare(strict_types=1);
//1.5 Booleans

$isComplete = "false";
$isComplete_1 =(string) false;
$isComplete_2 = "false";


//integers 0 -0 = false
//floats 0.0 -0.0 = false
// '' = false
//'0' = false
//[] = false
// null = false
//other are true
echo $isComplete. "\n";//true -> 1 false -> ' ' becouse when print something in php, it will try to casting to a string
var_dump ($isComplete). "\n";
// var_dump ($isComplete_1). "\n";
var_dump (is_bool($isComplete)). "\n";
// var_dump (is_bool($isComplete_2)). "\n";
var_dump((bool) $isComplete);



//example of control structure:

if ($isComplete) {
    //do somthing
    echo 'success'."\n";//баг со значением 'false' var_dump пишет фолс, а иф/элс отрабатывает как тру
    /*бага нет, т.к. is_bool  проверяет является ли переменная логическим значением (непосредственно тру или фолс, строка не является булиновым значением -  поэтому поэтому строка'false' -> false)
    а вот bool приводит значение переменной к булиновому, поэтому строка'false' -> true
    */
} else {
    //do somthing else
    echo 'fail';
}

//1.6 Integers
$x = (int) 5.98;
var_dump($x);//5
$x = (int) "87fhsd";
var_dump($x);//87
$x = (int) "fhsd";
var_dump($x);//0
$x = (int) true;
var_dump($x);//1

$x = (int) null;
var_dump(is_int($x));//true, т.к int (null) - > 0, а это целое число

//1.7 Floats
echo 'Floats:' ."\n";

$y = 13_500.5;
var_dump($y);
echo $y."\n";
$y = 13.5e3;
var_dump($y);
$y = floor((0.1+0.7)*10);
echo $y."\n";//7?т к 0,1+0,7 = 0,799999999998, floor - округляет до ближашего меньшего целого числа
$y = ceil((0.1+0.2)*10);
echo $y."\n";//4,т к 0,1+0,2 = 0,300000000004, ceil - округляет до ближайшегобольшего целого числа
//мораль: не доверять числам  с плавающей точкой до последнего числа и не сравнивать их напрямую
//не сравнивать их напрямую:
$x = 0.23;
$y = 1 - 0.77;
var_dump($x, $y);

if ($x == $y) {//no
    echo 'Yes';
} else {
    echo 'No'."\n";
}

echo NAN."\n";
echo log(-1)."\n";//NAN
echo INF."\n";
echo PHP_FLOAT_MAX  * 2 ."\n";//INF
$x = PHP_FLOAT_MAX  * 2;
var_dump($x);//float(INF)
var_dump(is_infinite($x));//true
$x = 5;
var_dump(is_finite($x));//true
var_dump(is_nan($x));//false
//casting

$x = 5;
var_dump((float)$x);//float(5)
$x = 'kjhkis';
var_dump((float)$x);//float(0)
$x = '14.5kjhkis';
var_dump((float)$x);//float(14.5)

//1.8 STRINGS
$firstName = 'Will';
$lastName = "Smith";
//'' - you cannot use variables, ""  - you can use variables,

$lastName = "$firstName Smith";
$lastName = "${firstName} Smith";//для лучшей читабельности

echo $lastName . "\n";// Will Smith
$lastName = '$firstName Smith';
echo $lastName ."\n";//$firstName Smith

$firstName = 'Will';
$lastName = "Smith";
$name = $firstName . ' ' . $lastName;
echo $name . "\n";
echo $name[1] . "\n";//i
echo $name[-2] . "\n";//t
$name[1] = 'I';

//Heredoc & Nowdoc для многострочного текста, сложных выражний - нет необходимости закрывать ковычки:
$x = 1;
$y = 2;
//Heredoc
$text =  <<<TEXT
Line 1 $x ''
Line 2 $y "'
Line 3
TEXT;

echo nl2br($text);

//Nowdoc
$text =  <<<'TEXT'
Line 1 $x ''
Line 2 $y "'
Line 3
TEXT;
echo "\n";

echo nl2br($text);



$text =  <<<TEXT
Hello World
TEXT;
echo "\n";

var_dump($text);//string(11) "Hello World"

$text =  <<<TEXT
    Hello World
TEXT;
echo "\n";

var_dump($text);//string(15) "    Hello World"
$text =  <<<TEXT
<div>
    <p>Hello</p>
    <p>World</p>
</div>
TEXT;
echo nl2br($text);
echo "\n";

//1.10 ARRAYS

$programmingLanguage1 = 'PHP';
$programmingLanguage2 = 'Java';
$programmingLanguage3 = 'Python';

$programmingLanguages = ['PHP', 'Java', 'Python'];
/*
// $programmingLanguages = array('PHP', 'Java', 'Python'); - еще вариант представления массива
echo $programmingLanguages[1]. "\n";
$name = 'Gio';
echo $name[-2]. "\n";//i
// echo $programmingLanguages[-2]. "\n";//Error - такое в массивах не работает
//to know about existing index:
var_dump(isset($programmingLanguages[1]));//true
var_dump(isset($programmingLanguages[3]));//false
// $programmingLanguages[1] = 'C++';//замена второго элемента массива
var_dump($programmingLanguages);
print_r($programmingLanguages);

echo '<pre>';
print_r($programmingLanguages);
'</pre>';
//to get a legth of ARRAY:
echo count($programmingLanguages);//3

$programmingLanguages[] = 'C++';//push element at the end of the array
echo '<pre>';
print_r($programmingLanguages);
'</pre>';
echo count($programmingLanguages);//4

array_push($programmingLanguages, 'C++', 'C', 'GO');//add multuiple elements

echo '<pre>';
print_r($programmingLanguages);
'</pre>';
echo count($programmingLanguages);//7
*/

//to define and name your key

/*
$programmingLanguages = [
    'php' => '8.0',
    'python' => '3.9'
];
echo '<pre>';
print_r($programmingLanguages);
'</pre>';
echo($programmingLanguages['php']);//8.0
echo($programmingLanguages['kjfk']);//warming

$programmingLanguages['go'] = '1.15';
$programmingLanguages[$name] = '1.15';

echo '<pre>';
print_r($programmingLanguages);
'</pre>';
*/
//multi-dimension array:
$programmingLanguages = [
    'php' => [
        'creator' => 'Rasmus Lerdorf',
        'extension' => '.php',
        'website' => 'www.php.net',
        'isOpenSource' => true,
        'versions' => [
            ['version' => 8, 'releaseDate' => 'Nov 26, 2020'],
            ['version' => 7.4, 'releaseDate' => 'Nov 28, 2019'],
        ],
    ],
    'python' => [
        'creator' => 'Guido Van Rossum',
        'extension' => '.py',
        'website' => 'www.python.org',
        'isOpenSource' => true,
        'versions' => [
            ['version' => 3.9, 'releaseDate' => 'Oct 5, 2020'],
            ['version' => 3.8, 'releaseDate' => 'Oct 14, 2019'],
        ],
    ],
];
echo '<pre>';
print_r($programmingLanguages);
'</pre>';
//to access to element of multi-dimension array:
echo $programmingLanguages['php']['website'] ."\n";//www.php.net
echo $programmingLanguages['php']['versions'][0]['releaseDate']."\n";//Nov 26, 2020

$array = [0 => 'foo', 1 => 'bar', '1' => 'baz'];// [0] => foo [1] => baz, т к у баз такойж е ключ как и у бар и он перезаписан

print_r($array);

$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd'];//    [1] => d т к ключ одинаковый во всех четырех случаях(массив приводит все ключи в этом массиве к единице) и  поэтому он перезаписывается трижды
print_r($array);

$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd', null => 'e'];//     [1] => d [] => e 
print_r($array);
echo $array[null]. "\n";//e

//to remove elements from arrays

$array = ['a',  'foo' =>'b', 50 => 'c', 'd','e'];//
echo array_pop($array). "\n";//e - delete last element
print_r($array);//e - deleted

echo array_shift($array). "\n";//a - delete first element
print_r($array);//a - deleted
//реиндексируются только нумерованные ключи.(если элементу массива присвоено буквенный индекс, то он останется неизменным)

//Another way to removing elemtnt from array:
$array = ['a', 'b', 50 => 'c', 'd','e'];//


//При использованиии массива с указанием конкретного индексами он удалит эти элементы из массива, если он не указывать индекс конкретного элемента, то этогт метод уничтожит весь массив
/*
unset($array);// use for destroy veriables
print_r($array);//массив уничтожен
*/
unset($array[50], $array[1]);// use for destroy veriables
print_r($array);//delete c
//Причем массив не реиндексируется

$array = [1, 2, 3];//
unset($array[0], $array[1], $array[2]);
$array[] = 9;
print_r($array);//    [3] => 9

//CASTING array
$x = 'fff';
var_dump((array) $x);//[0]=>string(3) "fff"

$x = null;
var_dump((array) $x);//array(0){}

// to know if key exist in array:
$array = ['a' => 1, 'b' => null];   
var_dump(array_key_exists('a', $array));//bool(true)

var_dump(isset($array['a']));//tell if key exist and it not null - true
var_dump(array_key_exists('b', $array));//bool(true)
var_dump(isset($array['b']));//bool(false)
