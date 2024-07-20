<?php
declare(strict_types=1);


echo 'joe\'s invoice' . "\n";
$_1name = 'Gio';
echo $_1name . "\n";

$x = 1;
//$y = &$x; //назначение по ссылке, а не по значению
$x = 3;


//echo $y . "\n";

$firstname = 'Gio';

echo 'Hello $firstname' . "\n";
echo "Hello $firstname" . "\n";
echo 'Hello ' . $firstname . "\n"; 
?> 

<!DOCTYPE html>
<html>
    <body>
        <h1>
            <?php 
                echo 'Hello world';
                $x = 1;
                $y = 4;

                echo '<p>' . $x . ', ' . $y . '</p>';
        
            
            ?>
            <?= 'Hello world' ?>

        </h1>
        <p>My first paragraph.</p>

    </body>
</html>  


<?php
// 1.3 Constants
$firstname = 'Gio';
$firstname = 'Joe';

echo $firstname."\n";
// first way to define constant
define('name', 'value'); //определяется во время выполнения, можно использоватьв control structure
// define('STATUS_PAID', 'paid');


// echo STATUS_PAID. "\n";

// define('STATUS_PAID', 1); - Error
// cheking if the constant has been defined:
echo defined('STATUS_PAID')."\n"; // - boolean

// second way to define constant
// const STATUS_PAID = 'paid'; //определяется во время компиляции, нельзя использоватьв control structure
// echo STATUS_PAID. "\n";
/*
if (true) {
    // const FOO = 'bar'; - Error
    define('STATUS_PAID', 9);
}
*/
//for static data
$paid = 'PAID';
define('STATUS_' . $paid, 4);

echo STATUS_PAID. "\n";

echo PHP_VERSION."\n";

//Magic constant - value can be changed depend in where used

echo __LINE__."\n";
echo __FILE__."\n";

//Variable variables

$foo = 'bar';

$$foo = 'baz';
// the same: $bar = 'baz' - define value as variable.
echo $foo , $bar."\n";
echo $foo , $foo."\n";
echo "$foo , $foo"."\n"; // - not work
echo "$foo , {$$foo}"."\n";
echo "$foo , ${$foo}"."\n";

//1.4 Data types
/*
// 4 Scalar Types
    //bool - true/ false
    $completed = true;
    //int - 1, 2,3, -5///
    $score = 75;
    //float - 1.5, 0.1, 0.005...
    $price = 0.99;
    //string
    $greeting = 'Hello Gio';

    echo $completed."\n";    
    echo $score."\n";
    echo $price."\n";
    echo $greeting."\n";

    echo gettype($completed)."\n";
    var_dump($price)."\n";
  

//4 Compound Types
    //array 
    $companies = [1, 2, 3, 0.5, -9.2, 'A', 'b', true];
    echo $companies. "\n";//error because of not set phph configuration file (in lates vedeos)
    print_r ($companies). "\n";
    
    //object
    //callable
    //iterable

//2 Special Types
    //resource
    //null - no value
*/
    function sum(int $x, int $y) {
        $x = 5.5;//change type  to float
        var_dump($x, $y);
        return $x + $y."\n";
    }

    echo sum(2, 3)."\n";
    /*echo sum(2, '3')."\n";// - int  - противореиче типов данных - исправляется активацией srict_types
    $sum = sum(2, '3');
    echo $sum."\n";
   var_dump($sum);
*/

function mus(float $x, float $y) {
    var_dump($x, $y);
    return $x + $y."\n";
}
$mus = mus(4, 9);//баг противоречия сохраняется даже  в строгом режиме для float(int распознается как float)
echo $mus;
//var_dump($mus);

//casting types
$z = '5';//string
$z = (int)'5';//int

var_dump($z);