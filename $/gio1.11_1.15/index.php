<?php
// declare(strict_types=1);

//1.11 EXPRESSION

$x = 4;
$y = $x;
/*
$z = $x === $y;
$z = sum($x, $y);
*/
if ($x < 5) {
    echo 'Hello'."\n";
}
//1.12 OPERATORS I
//Arithmetic Operarors (+ - * / % **)

$x = 10.5;
$y = 2.9;
var_dump($x % $y);//0, т.к дрорбные части при этом операторе отбрасываются. Знак(+/-) берется у делимого

$x = 10.5;
$y = 2.9;
var_dump(fmod($x, $y));//вычисление остатка для дробных чисел

$x = +'10';//привидение из строки в целое
$y = 2;
var_dump($x + $y);//12

$x = 10;//int
$y = 2.0;//float
var_dump($x + $y);//float

$x = 10;//int
$y = 0;//float
var_dump(fdiv($x,  $y));//inf если через деление  - то ошибка


//Asignment Operators (= += -= *= /= %= **=)

$x = 10;

if($x = 5) {//здесь присваивание , а не сравнивание. Присваивание всегда тру, поэтому буде выполнен блок за ифом, даже если икс не равен пяти
    echo "TRU" . "\n";
}

$x = ($y = 10) + 5; //менее читабельно
var_dump($x, $y);// int(15) int(10)

$x = 7;
$x *= 3 ;// the same $x = $x * 3
var_dump ($x);//21

//String operators(. .=)
$x = 'Hello';
$x .= ' World';//the same $x = 'Hello' . ' World'
echo $x . "\n";//Hello World

//Compression Operetors(== === != <> !=== < > =< >= <=> ?? ?:)
$x = 5;
$y = '5';

var_dump($x == $y);//bool(true)   == - does the type conversion for you - сравнивает только значаение
var_dump($x === $y);//bool(false)  - сравнивает и значение и тип данных
var_dump($x != $y);//bool(false) the same <>
var_dump($x !== $y);//bool(true)

$x = 5;
$y = 10;
var_dump($x <=> $y);//int(-1) т к y > x

var_dump(0 == 'hello');// до php8.0 строки-> число раное нуль( the same 0 =='0'). с php8.0 если строка не только из чисел, то другая сторона выражения преобразуется в строку и происходит сравнение ( the same '0' =='hello')

$x = 'Hello World';
$y = strpos($x, 'H');
var_dump ($y);

if ($y === false) { //при == не находит
    echo "H not Found" . "\n";
} else {
    echo 'H Found at index ' . $y . "\n";
}

$result = $y === false ? 'H not Found' : 'H Found at index ' . $y;//рекомендуется использовать скобки
echo $result . "\n";

//$x = null;
$y = $x ?? 'hello'; //choose 'hello' only if x is null (= undefined)
var_dump($y);

//Error Control Operators(@)
$x = @file('foo.txt'); //@ - убирает ошибку - НЕ РЕКОМЕНДУЕТСЯ ИСПОЛЬЗОВАТЬ Т К ПРОБЛЕМУ НЕ РЕШАЕТ

//Increment/Decrement Operators (++, --) - актуально только для  чисел и для строк актуален только инкремент
$x = 5;
echo ++$x;//6
echo $x++;//6
echo $x;//7
$x = null;
echo ++$x;//1

$x = 'abc';
echo ++$x . "\n";//abd

//Logical Operators (&& || ! and or xor)
$x = 0;
$y = false;
var_dump(!$x || $y);//bool(true)

$x = true;
$y = false;
$z = $x && $y;
var_dump($z);//bool(false)

$z = $x and $y;
var_dump($z);//bool(true) Из-за приоритета. У  оператора = приоритет выше чем у and

$x = true;
$y = false;

var_dump($x || $y);//bool(true) в этом случае переменная у замыкается, т.к. для оператора или достаточно одного ТРУ, а он у нас на первом месте, поэтому остальные операнды не выполняются вовсе - происходит замыкание переменной у

function hello() {
    echo 'Hello World';

    return false;
}
var_dump ($x || hello());//bool(true) - hello - замыкается (не выполоняется)
var_dump ($x && hello());//Hello Worldbool(false) - т.к. x - ТРУ а для оператора И необходимы оба операнда ТРУ, поэтому проверяется второй операнд и hello выполняется
var_dump ($y && hello());//bool(false) - Первый Операнд фолс - значит оператор И уже не даст ТРУ - hello замыкается
var_dump ($y && hello() || true);//bool(true) - По порядку сначала выполняется И  - И дает ФОЛС(hello замыкается), затем ИЛИ дает ТРУ

//Bitwise Operators (& | ^ - << >>)

$x = 6;
$y = 3;
/* 6 в двоичном коде:
110
3 в двоичном коде:
011
оператор & возвращает 1 если оба числа 1(операция проходит поразрядно):
010 = 2 - в двоичной системе
*/
var_dump($x & $y);//2 - and operator
/*
110
011
111 = 7
*/
var_dump($x | $y);//7 - or operator

/*
110
011
101 = 5 - xor  особый оператор or -возвращает 1 если хотя бы один разряд 1, если оба разряда 1 , то возвращает 0.
*/
var_dump($x ^ $y);//5 - xor operator
/*
-110 -> 001
001
&
011
001 = 1
*/
$x = 6;
$y = 3;
var_dump(-$x & $y);//2 - баг - должно быть 1
/*
6 << 3 - 110 -> 110000 = 48 (на три знака влево (три нуля))

*/
var_dump($x << $y);//48

//Array Operators (+ == === != <> !===)

//Execution Operators ('')

//Type Operators (Instanceof)

//Nullsafe Operator - PHPB (?)

//1.14 Operator Precedence & Associativity
$x = $y = 5;// у оператора = правая ассоциативность, поэтому данная строка выполняется справа налево(сначала присваивается 5 в у затем у в x)

$x = 5;
$y = 2;
$z = 10;

$result = $x / $y * $z; // у операторов одинаковый приоритет и левая ассоциативность,т.е операции будут выполнятся слева направо
var_dump($result);//25
//$result = $x < $y > $z; //операторы с  одинаковым приоритетом и  без ассоциативности не могут быть использованы друг с другм
$result = $x < $y == $z;//будет работать т к  приоритеты разные но ассоциативности нет

$x = true;
$y = false;
var_dump ($x && ! $y);//true - приоритет ! выше чем &&

$z = true;
var_dump ($x && $y || $z);//true приоритет && выше чем ||
var_dump ($z || $x && $y);//true приоритет && выше чем ||

$z = $x && $y;
var_dump($z);//false

$z = $x and $y;
var_dump($z);//true - т к  у = выше приоритетт чем у and и происходит присваивание, а  and $y просто отбрасывается.

$z = ($x and $y);//рекомендуется использовать скобки - в том числе из за читабельнсти
var_dump($z);//false

//1.15 Control Structures in PHP - Conditional Statements - if/else 

$score = 96;
if ($score >= 90) {
    echo 'A';
    if ($score >= 95) {
        echo '+'. "\n";
    }
} elseif ($score >= 80) {
    echo 'B';
} elseif ($score >= 70) {
    echo 'B';
} elseif ($score >= 60) {
    echo 'C';
} elseif ($score >= 60) {
    echo 'D';
} else {
    echo 'F';
}
?>

<html>
    <head>
    </head>
    <body>
        <?php  $score = 40 ?>
        <?php if ($score >= 90): ?> 
            <strong style='color: green'> A </strong>
           <?php  elseif ($score >= 80): ?>
            <strong> B </strong>
           <?php  elseif ($score >= 70): ?>
            <strong> C </strong>
           <?php  elseif ($score >= 60): ?>
            <strong> D </strong>
           <?php  elseif ($score >= 50): ?>
            <strong> E </strong>
           <?php  else : ?>
            <strong style='color: red'> F </strong>
           <?php endif ?>
    </body>
</html>
<?php
// $a = array(1, 2, 3, 17);

// $i = 0; /* только для пояснения */
// foreach ($a as $v) {
//     echo "\$a[$i] => $v.\n";
//     $i++;
// }

// $a = array(
//     "one" => 1,
//     "two" => 2,
//     "three" => 3,
//     "seventeen" => 17
// );

// foreach ($a as $k => $v) {
//     echo "\$a[$k] => $v.\n";
// }
// $nums = [2,7,11,15];
// $target = 9;
// $i = 0;
// function twoSum($nums, $target) {
//     for ($i = 0; $i < count($nums); $i++) {
//        if (($nums[$i] + $nums[++$i]) == $target){
//         echo [$i, ++$i];
//        }
//     }
// }

// echo twoSum([2,7,11,15], 9);
// echo count($nums);
/*
function twoSum($nums, $target) {
    $resultAr = [];
    for ($i = 0; $i < count($nums); $i++) {
        for ($k = 0; $k < count($nums); $k++) {
            while (count($resultAr)<2) {
                if ($i == $k) {
                    ++$k;
                } elseif ($nums[$i] + $nums[$k] == $target) {
                    $resultAr[] = $i;
                    $resultAr[] = $k;
                    var_dump ($resultAr);
                } else {
                    echo "Jopa kakaya to";
                    break;
                }
            }
        }
    }
    return $resultAr;
}
*/
echo "Hello world". "\n";
function twoSum($nums, $target) {
    $hashMap = [];
    $count = count($nums);
    for($i=0; $i < $count; $i++){
            $secondIndex = $target-$nums[$i];//6-4 = 2
            if(isset($hashMap[$secondIndex])){//-
                return array($i,$hashMap[$secondIndex]);
            }else{
                $hashMap[$nums[$i]]=$i;
                //$hashMap[3] = 0
                //$hashMap[2] = 1
                //$hashMap[4] = 2

            }
    }
    return [];
}
//$hashMap[ , ,0,1,2]

print_r(twoSum([3,2,4,], 6));
    
$arrayMurray = [2,5,9,13];
$arrayMurray = [];

$arrayMurray[3] = 0;
print_r($arrayMurray[3]);