<?php
//1.23 variable scope
$x = 5;//глобальная переменная

function foo() {
    $x = 1;//первый вариант
    echo $x. "\n";//ОШИБКА -  в пределах  ф-ции ннет такой переменной, чтобы она появилась   3 варианта
}
foo();//1

function foo1($x) {// второй вариант
    echo $x . "\n";//ОШИБКА -  в пределах  ф-ции ннет такой переменной, чтобы она появилась   3 варианта
}
foo1($x);

//3 вариант - использовать ключевое слово для доступа к переменной в глобальной области действия

function foo2() {
    global $x;//третий вариант
    $x = 10;
    echo $x . "\n";
}
foo2();
echo $x . "\n";// 10  без строки global $x; здесь будет 5


// include('script1.php');//переменная  х со строки 3 будет доступна в пределах этого файла

// echo $x . "\n";

//PHP  содержит глобальные перменные в ассоциативном массиве, называемом GLOBALS, где ключ - это имя переменной, а значение - это значение переменной. Можно получить доступ так, вместо использования ключевого слова global

function foo3() {
    $GLOBALS['x'] = 3; // - супер глобальная перменная - подобную запись надо избегать, тк.к тяжеле  читать, поддерживать и намгого прще внести баги, вместо этого следует исп-ть параметры ф-ции и ретерн ф-ции для получения данных в и вне ф-ции. супер глобальные полезны в других случаячх - позже по курсу(куки , запросы т и тд ...)

    echo $GLOBALS['x'] . "\n";
}
foo3();
echo $x . "\n";

//Статичные переменные - обычные переменнные с локольной оболастьюб действия. Отличие в том, что они получают уничтожение из вне  своей области действия пока статичяная переменная  не получит разрушение и она сохраняет свое значение:
 function getValue() {
    $value = someVeryExpensiveFunction();
    //какие-то действия с  $value
    return $value;
 }

 function someVeryExpensiveFunction() {
     sleep(0.5);
     return 10;
 }

 echo getValue() . "\n"; // что если необходимо вызвать  эту ф-цию несколько раз, т.к. возможно необходимо получить это значение из разных мест:
 echo getValue() . "\n"; 
 echo getValue() . "\n"; 
 //В итоге каждый раз вызывается объемная ф-ция
// Т к  возвращаемые данные не переменная, и в  ф-циях нет аргументов, здесь можем использовать статичную переменную для сохранения этого:,

function getValue1() {
  static $value = null;
  if ($value === null) {
    $value = someVeryExpensiveFunction1();
  }
    //какие-то действия с  $value
    return $value;
 }

 function someVeryExpensiveFunction1() {
     sleep(1);
     echo 'Processing ';//напечатается только один раз
     return 10;
 }

 echo getValue1() . "\n";
 echo getValue1() . "\n";
 echo getValue1() . "\n"; // не будет вызывать объемную ф-цию трижды, а вызовет один раз, Если удалить ключ слово static, товызовет трижды

//1.24 Variable, Anonymous, Callable, Closure & Arrow Functions 

// PHP позволяет вызвать ф-цию из переменной добавлением круглых скобок
function sum(int|float ...$numbers): int|float {
    return array_sum($numbers);
}
$x = 'sum';
echo $x (1, 2, 3, 5) . "\n";// когда  пхп видит скобки после  переменной, он будет искать ф-цию с тем же именем, что бы ни содержалось в переменной. В нашем случае в х содержится sum и поэтому ПХП вызывает ф-цию sum, если бы ф-ции sum не было, то была бы ОШИБКА.
//чтобы имзбежать такую ошибку можно использовать ф-цию callable - для проверки может ли переменная быть вызвана как ф-ция:
if (is_callable($x)) {
    echo $x (1, 2, 3, 5) . "\n";
} else {
    echo 'Not callable';
}
//ф-ция из переменной не будет работать с языковыми конструкциями (напр empty onset print и т д) - в этом случае нужно создать ф-цию обертку для них и вызвать  вместо них. также можно использовать объектный метод - но это будет позже

//Анонимные ф-ции (Лямбда ф-ции)
$x1 = 'глобальная переменная';
$sum1 = function (int|float ...$numbers): int|float {//т.к. это выражение мы можем присвоить его в переменную
    //echo $x1. "\n";// ошибка из-за локальной областьи видимости 
    return array_sum($numbers);
}; // для анонимных ф-ций обязателно ;
$y = 'summ';//теперь этой ф-ции не Е и анонимная ф-ция не будет вызвана
//echo $y (1, 2, 3, 5) . "\n";
if (is_callable($y)) {
    echo $y (1, 2, 3, 5) . "\n";
} else {
    echo 'Not callable' . "\n";
}

echo $sum1(1, 3, 5). "\n";//вызов анонимной ф-ции
// также можно передать анонимную ф-цию в качестве аргументов в другую ф-цию и даже вернуть из других ф-ций

$sum1 = function (int|float ...$numbers) use($x1): int|float {//НО в анонимной  ф-ции веозможно получить доступ к переменной в глобальной области исплльзуя use - Такой тип  анонимной ф-ции , когдла ты мполучаешь доступ из вне его лкальной области видимости назваеется ЗАМЫКАНИЕ (closure)
    //Примечание: то что х1 была скопированан в А.Ф. значит, что при изменении значения х1 в теле а.ф.
    $x1 = 'локальная переменная';
    echo $x1. "\n";// ошибка из-за локальной областьи видимости , 
    return array_sum($numbers);
};
echo $sum1(1, 3, 5). "\n";//вызов анонимной ф-ции

echo $x1. "\n";// при выводе вне а.ф. это будет значение глобальной переменной, т.к х1 была скопирована в а.ф. по значению

$sum1 = function (int|float ...$numbers) use(&$x1): int|float { // если передать переменную х1 по ссылке, то значение глобальной переменной изменится
    $x1 = 'локальная переменная';
    echo $x1. "\n";
    return array_sum($numbers);
};
echo $sum1(1, 3, 5). "\n";//вызов анонимной ф-ции

echo $x1. "\n";// теперь 'локальная переменная'

//Callable type, Callback function

//При передаче ф-ции в другую ф-цию  в качестве аргумента, а затем при вызове ее из этой ф-ции - это называется callback ф-ция.
//в ПХП есть много встроенных ф-ций, ожидающих колбэк ф-ций как аргумент например array map, array filter, use sort и т д

// Несколько спопобов передать callback F в качестве аргумента:
//1) Определить анонимную ф-цию напрямую:

$array = [1, 2, 3, 4];
$array2 = array_map(function($element){
    return $element * 2;
}, $array);//в аргументах ожидается callable type - по сути callable function которую ты передал

print_r($array);
print_r($array2);

//2) Определить анонимную ф-цию через переменную:
$v  = function($element){
    return $element * 2;
};
$array2 = array_map($v, $array);
print_r($array2);
//2) Определить  ф-цию c имененм :

function foo4($element){
    return $element * 2;
};
$array2 = array_map('foo4', $array);// если вызвать не как строку то - ОШИБКА
print_r($array2);


$sum2 = function (callable $callback, int|float ...$numbers): int|float { // 
    return $callback(array_sum($numbers));
};
echo $sum2('foo4', 1, 3, 5). "\n";// т.к. после переменной есть скобки ПХП начинает искать ф-цию с тем же именем (см стр 85) и ниходит ее на стр 161. $callback -> foo4,  $elements -> array_sum(numbers), foo4 получает 9, возвращает 18, которое затем возвращет sum2

// то же по превому способу:
$sum2 = function (closure $callback, int|float ...$numbers): int|float { // можно указать замыкание вместо колэбл, отличие  - замыкание должно быть а. ф-цией, где колэбл может быть нормальной ф-цией
    return $callback(array_sum($numbers));
};
echo $sum2(function ($element){
    return $element * 2;
}, 1, 3, 5). "\n";

//ПХП будет автоматически ковертировать такие а. ф-ции (стр 170) в случаи замыканий
$sum2 = function (callable $callback, int|float ...$numbers): int|float { // 
    return $callback(array_sum($numbers));
};
echo $sum2(function ($element){
    return $element * 2;
}, 1, 3, 5). "\n";

//Стрелочные ф-ции - оч похожи на а. ф-ции, они особенно полезны как встроенная колбэк ф-ция, как передача его как аргумента  во многие напр встроенные ф-ции

$array3 = [1, 2, 3, 4];
$array4 = array_map(function($number){
    return $number * $number;
}, $array3);

print_r($array4) . "\n";

// array4 можно записать как стрелочную:

$array4 = array_map(fn($number) => $number * $number, $array3);
print_r($array4) . "\n";
// Отлчия:
//1) всегда есть доступ из тела стрелочной ф-ции к переменной из глобальной области видимости(без использования use):
$y = 5;
$array4 = array_map(fn($number) => $number * $number * $y, $array3);
print_r($array4) . "\n";
//Примечание стрелдочная ф-ция использует переменные из глобальной области действия привязкой по значению, что означает -ты не можешь изменить переменную, к-рая была определена в глобальной области

$array4 = array_map(fn($number) => $number * $number * ++$y, $array3);// здесь у = 6
print_r($array4) . "\n";
echo $y."\n";// здесь у = 5

//2) у стрелочной ф-ции одно выражение(не может быть много строчного выражения), возвращающее значение этого выражения. Могут быть несколько строк как массив например, но нельзя после выражения поставить ; и  написать что то еще.
// $array4 = array_map(fn($number) => [
//     ,
//     ,
//     ,
// ], $array3);

//1.25 DATE
$currentTime = time() ."\n"; //текущее время в секундах
echo $currentTime; 
echo $currentTime + 5 * 24 *60 *60 ."\n";// текущее время + 5 дней в секундах
echo $currentTime - 24 *60 *60 ."\n";// текущее время - 1 день в секундах

echo date('d/m/Y G:ia', $currentTime + 5 * 24 *60 *60) . "\n";
echo date('d/m/Y G:ia', $currentTime - 24 *60 *60) . "\n";

echo date_default_timezone_get(). "\n";

date_default_timezone_set('UTC');

echo date('d/m/Y G:ia'). "\n";
echo date('d/m/Y G:ia', $currentTime + 5 * 24 *60 *60) . "\n";
echo date('d/m/Y G:ia', $currentTime - 24 *60 *60) . "\n";
echo date_default_timezone_get(). "\n";
echo date('d/m/Y G:ia', mktime(0, 0, 0, 4, 10, null )). "\n";
echo strtotime('2021-01-18 07:00:00'). "\n";
echo date('d/m/Y G:ia', strtotime('2021-01-18 07:00:00')). "\n";
echo date('d/m/Y G:ia', strtotime('tomorrow')). "\n";
echo date('d/m/Y G:ia', strtotime('last day of february')). "\n";
echo date('d/m/Y G:ia', strtotime('second friday of january')). "\n";
$date = date('d/m/Y G:ia', strtotime('second friday of january')). "\n";
print_r(date_parse($date));
print_r(date_parse_from_format('d/m/Y G:ia', $date));







