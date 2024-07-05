<?php
declare(strict_types=1);

//1.16 LOOPS

//While

$i=0;
while($i<=15) {
    echo $i++;
}
echo "\n";

$i=0;
while(true) {//бесконечный цикл,  в случаеесли мы оэидаем чего либо (например i>=15)
    if ($i>=15){
        break;
    }
    echo $i++;
}
echo "\n";

while(true) {//бесконечный цикл,  в случаеесли мы оэидаем чего либо (например i>=15)
    while ($i>10){
        break 2;//2-аргумент брейка значит отсанавливает оба цикла (внутренний и внешний вайл в этом случае) - по умолчанию  - 1.
    }
    echo $i++;
}
echo "\n";
$i=0;
while($i<=15){//
    if($i%2===0){
        $i++;//поэтому мы его прописываем здесь
        continue;//пропускает итерацию(то, что последует после выражения иф   - эхо i++), если выполняется условие в ифе
    }
    echo $i++ ;//если инкремент оставить только здесь то будет бесконечниый цикл
}
echo "\n";

$i=0;
while($i<=15)://
    if($i%2===0){
        $i++;//поэтому мы его прописываем здесь
        continue;//пропускает итерацию(то, что последует после выражения иф   - эхо i++), если выполняется условие в ифе
    }
    echo $i++ . ',';//если инкремент оставить только здесь то будет бесконечниый цикл
endwhile;
echo "\n";

//do-wile - похож на вайл, но здесь гарантированно пройдет хотя бы одна итерация, т.к условие проверяется в конце инерации, а не в начале
$i=20;
do{
    echo $i++;//20
} while ($i<=15);
echo "\n";

//for
for ($i=0;$i<15;$i++){
    echo$i;
}
echo "\n";

for ($i=0;$i<15; print$i, $i++){//0-14

}
echo "\n";

for ($i=0;print$i, $i<15;  $i++){// 0 - 15
    
}
echo "\n";

// for ( ; ; ){//всегда истина - бесконечный цикл
//     echo$i;
// }
$text = 'Hello World';
for ($i=0; $i<strlen($text); $i++){
    echo $text[$i]."\n";
}
echo "\n";
//чтобы меньше загружать память рекомендуется функцию выносить в переменную до цикла иил в первую часть цикла:
for ($i=0, $length = strlen($text); $i < $length; $i++){//первая часть фор выполняется только один раз, поэтому ф-ция ленгс будет выполнена только один раз
    echo $text[$i]."\n";
}
echo "\n";

//foreach

$programmingLanguages = ['php', 'java', 'c++', 'go', 'rust'];
foreach($programmingLanguages as $language){
    echo $language . "\n";
}

$programmingLanguages = ['php', 'java', 'c++', 'go', 'rust'];
foreach($programmingLanguages as $key => $language){
    echo $key . ':' . $language . "\n";
}


foreach($programmingLanguages as $key => &$language){//все значения будут 'php'
    $language = 'php';//все значения будут 'php'

}

// unset($language);
// $language = 'php';// в случае обозначения переменной после ФОРИЧ(при условии & последнее значение будет замененон на 'php'). Т.к. эта переменная все еще ссылается на последний элементр массива и rust -> php - для исключения подобного необходимо уничтожить переменную - см строкой выше - повторю описанное дествительно при ссылке - &

print_r($programmingLanguages);

$programmingLanguages = ['php', 'java', 'c++', 'go', 'rust'];
foreach($programmingLanguages as $key => $language){
    echo $key . ':' . $language . "\n";
}

echo $language;//rust - По завершению ФОРИЧ в переменной останется последнее значение цикла

// Итерация ассоциативных массивов
$user = [
    'name' => 'Gio',
    'email' => 'gio@email.com',
    'skills' => ['php', 'graphql', 'react'],
];

// foreach($user as $key => $value) {
//     echo $key.':'.$value."\n";// при выводе 'skills' - выдаст ВОРНИНГ, т к это массив
// }

// foreach($user as $key => $value) {
//     echo $key.':'.json_encode($value)."\n";// теперь'skills'  выведет на экран
// }
//еще вариант:
foreach($user as $key => $value) {
    if(is_array($value)){//убеждаемся что переменная является массивом
        $value=implode(',', $value); //implode — Объединяет элементы массива в строку
    }
    echo $key.':'.$value."\n";// теперь'skills'  выведет на экран
}
//и еще вариант:

foreach($user as $key => $value) {
    echo $key .': ';

    if(is_array($value)){
        foreach($value as $skill) {
            echo $skill. ' - ';
        }
    } else {
        echo $value;
    }
    echo"\n";
}

$paymentStatus = 'rejected';

switch ($paymentStatus) {
    case 'paid':
        echo "Paid";
        break;//если удалить брейк - при значении переменной 'paid', то код будети выполнятся далее и выведет на печать еще и "Payment Declined

    case 'declined':
    case 'rejected':// при одном из значений переменной  'declined' или 'rejected' будет выведено "Payment Declined"
        echo 'Payment Declined'. "\n";
        break;

    case 'pending':
        echo 'Pending Payment';
        break;

    default:
    echo 'Unknown Payment Status';
}

$paymentStatus = '1'; // то же будет при true

switch ($paymentStatus) {
    case 1:
        echo "Paid". "\n";
        break;

    case 2:
    case 3:
        echo 'Payment Declined';
        break;

    case 0:
        echo 'Pending Payment';
        break;

    default:
    echo 'Unknown Payment Status';
}

$paymentStatuses = [1,3,0]; 

foreach($paymentStatuses as $paymentStatus){
switch ($paymentStatus) {
    case 1:
        echo "Paid". " ";
        break;

    case 2:
    case 3:
        echo 'Payment Declined'. " ";
        break;

    case 0:
        echo 'Pending Payment'."\n";
        break;

    default:
    echo 'Unknown Payment Status';
}
}//Paid Payment Declined Pending Payment - брейк прерывает только одно свитч-выражение, но не весь цикл, поэтому здесь выведено несколько случаев цикла

$paymentStatuses = [1,3,0]; 

foreach($paymentStatuses as $paymentStatus){
switch ($paymentStatus) {
    case 1:
        echo "Paid";
        continue 2 ;//PaidPayment Declined - переноса строки нет, т.к. кейс 1 не доходит до переноса строки, тк.к мы пропускаем его посредством continue 2. echo "Paid"; не будет выполнено если мы continue 2 пропишем до echo

    case 2:
    case 3:
        echo 'Payment Declined';
        break;

    case 0:
        echo 'Pending Payment';
        break;

    default:
    echo 'Unknown Payment Status';
}
echo  "\n";
}//Paid
//Отличия ИФ от СВИТЧ
//В СВИЧ выражение условия выполняется однажды, а в ИФЭЛС условном выражении выполняется для каждого выражения(цикла)

function x(){
    sleep(3);//делает паузу в выполнении скрипта на указанное число секунд - симулируем сложную финкцию, время выполнения которой 3 секунды

    echo 'Done'."\n";
    return 3;
}

// if(x()===1){
//     echo 1;
// }elseif(x()===2){
//     echo 2;
// }elseif(x()===3){
//     echo 3;
// }else{
//     echo 4;
//}// затрачивается 9 секунд до того как дойдет до удовлетворяющего условия (х=3)(проверяются все условия подряд)
//Во избежание такой потери времени можно преобразовать код:

// $x = x();
// if($x===1){
//     echo 1;
// }elseif($x===2){
//     echo 2;
// }elseif($x===3){
//     echo 3 ."\n";
// }else{
//     echo 4;
// }

//Для СВИТЧ не нужно назначать переменную и будет проверено толко одно условие 
// switch(x()){
//     case 1:
//         echo 1;
//         break;
//     case 2:
//         echo 2;
//         break;
//     case 3:
//         echo 3;
//         break;
//     default:
//         echo 4;
// }//- СВТЧ немонго быстрее ИФ


// 1.18 MATCH 
// не работает в версиях до 8.0. Перепишем с ним цикл с $paymentStatus
$paymentStatus = 1;
match($paymentStatus){
    1=>print 'Paid'."\n",//пары ключ-значение, где ключ - выражение условия(напр булиновое значение, сравнениче чисел), значение - возвращаемое выражение, которое может быть любым выражением, например функцией, вовращаемой значение и  т п
    2=>print 'Payment Declined',
    0=>print 'Pending Payment',
    default => 'Unknown',
};

//отличия от СВИТЧ.
// 1. МАТЧ может быть присвоен в переменную
$paymentStatusDisplay=match($paymentStatus){
    1=>print 'Paid'."\n",
    2=>print 'Payment Declined',
    0=>print 'Pending Payment',
    default => 'Unknown',
};

echo $paymentStatusDisplay."\n";//1

$paymentStatusDisplay=match($paymentStatus){
    1=>'Paid',
    2,3=>'Payment Declined',
    0=>'Pending Payment',
    default => 'Unknown',
};

echo $paymentStatusDisplay. "\n";//Paid

//2-е отличие. в СВИТЧ необходим брейк - т.к без него будет проход по другим кейсам  в случае с МАТЧ проверяется единственный совпавший вариант
//3-е отличие. В СВИТЧ дефолт не обязателен, поэтому могут быть кейсы, которые не найдены - ничего не будет выведено. В МАТЧ необходимо предусмотреть все возможные варианты  иначе будет ОШИБКА-  поэтому там обязателен дефолт
//4-е  МАТЧ делает строгое равнение а СВИТЧ нестрогое сравнекние (=== vs ==)

$paymentStatus = false;
$paymentStatusDisplay=match($paymentStatus){
    1>2=>'Paid',
    2,3=>'Payment Declined',
    0=>'Pending Payment',
    default => 'Unknown',
};
echo $paymentStatusDisplay. "\n";//Paid
//Преимущество СВИТЧ в том , что  в МАТЧ ты не можешь в  в паре ключ - значение , в качестве значения поставить несколько выражений через ; ,что возможно в кейсах СВИТЧ. Способ сделать так в МАТЧ есть -необходимо в качестве значения прописать вызов функции и в функции прописать необходимые выражения.

//1.19 RETURN/DECLARE/GOTO
//При использовании РЕТЕРН в ф-ции будет остановлено выполнение этой ф-ции и будут возвращены указанные аргументы. Выполнение программмы в этом случае не будет остановлено. Управление будет передано обратно - окуда ф-ция была вызвана
function sum(int $x,int $y){
    $z = $x+$y;
    return $z;// Hello world будет выведено  т к прекращается только выполнение ф-ции, не программы
}

$x = sum(5,10);
echo $x;
//return;// "Hello World" не будет выведено Если аргумент у РЕТЕРН не указан, то NULL будет возвращен
echo "\n";
echo "Hello World";

//Declare - ticks  -ТИКИ это события которые проиходят на ТИКАбельном низкоуровневом выражении, выполняемый парсером. Это хначит, что когда ПХП скрипт выполняется его группой исполняемых выражений. И болшинство этих выражений вызывают нечто называемое ТИК, которое типо некого события. НО не все выражения ТИТКАбельны
// $x = 3; //каждый из этих выражений вызывает ТИК. можно прописать ф-цию, чтобы выполнить на каждом ТИКе
// $y = 5;//каждый из этих выражений вызывает ТИК. можно прописать ф-цию, чтобы выполнить на каждом ТИКе
// $z = $x*$y;//каждый из этих выражений вызывает ТИК. можно прописать ф-цию, чтобы выполнить на каждом ТИКе

function onTick() {
    echo 'Tick'. "\n";
}
register_tick_function('onTick');
declare(ticks=1);// указывается сколько ТИКАбельных выражения должно проийти до его непосредственного срабатывания или события перед тем как ф-ция будет запущена
$i=0;
$length=10;
while ($i <$length){
    echo $i++ . "\n";
}


// declare encoding - возможно испльзования на бенч амрках или профайлах, чтобы увидеть насколько эффективно выполняется ваш код - вряд ли будешь использовать это
//declare(strict_types)


function summ(int $x,int $y){
    $z = $x+$y;
    return $z;// Hello world будет выведено  т к прекращается только выполнение ф-ции, не программы
}
echo "\n";

//echo summ('5',10). "\n";// Ошибка - не соответсвие Типов при строгом режиме. При вызове этой ф-ции из другого файла, где строгий режим не актифирован - ошибки не будет (см foo.php)

