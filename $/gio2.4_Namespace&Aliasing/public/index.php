<?php

//2.4 Пространственные имена
// При определнии ф-ции, переменнл=ой, константы по дефолту они будут определены в глобал спэйс

require_once '../PaymentGateway/Stripe/Transaction.php';
require_once '../PaymentGateway/Paddle/CustomerProfile.php';
require_once '../PaymentGateway/Paddle/Transaction.php';
require_once '../Notification/Email.php';

/*
//  var_dump(new Transaction());/// этот класс без именного пространства, поэтому ПХП будет искать его в глобал спейсе
//Но вслучае наличия одинаковых имен класса в нескольких файлах ПХП выдаст ошибку, даже без обращения к этому классу. Часто для решения используются в том числе префиксы в названии класса. Тот же конфликт будет возникать с ф-циями, константами
// Но также для решения этой проблемы естьименные пространства - их нужо понимать как структуры виртуальной директории твоего класса.
//Обозначение и именного пространства делают  после декларирования и до прочего кода

//  var_dump(new Transaction());//выдаст ошибку при использовании именного пространства, тк будет искать этот класс в глобальном пространстве.

//  var_dump(new Gio\Transaction());//работает(именное пространство обозначено в файле ТРАНЗАКШН, в папке СТРАЙП)

// var_dump(new PaymentGateway\Stripe\Transaction());// также можно использовать подимена  с отсылкой к структуре

//еще один способ задания именного пространства  - импортирование при помощи ключевого слова use , после которго необходимо указать последовательность, к-рая  в namespace +  \имя класса

// use PaymentGateway\Stripe\Transaction; 
use PaymentGateway\Paddle\Transaction;

var_dump(new Transaction());

//то же можно использовать для импорта ф-ций  и констат, но это не является широкоиспользуемой практикой и автор не поощрает такую практику, например:
// use  function PaymentGateway\Stripe\Transaction;

//Классы с одинаковыми namespaces

//т к ПХП загружает из текущего локального namespace при доступе ко встроенным  в ПХП классам. нужно добавит бэкслэш, для указания чтобы грузилось из глобального пространства  или нужно импортировать их
*//*
//ПСЕВДОНИМЫ
//Предположим нужно использовать оба класса ТРАНЗАКШН

use PaymentGateWay\Paddle\{Transaction, CustomerProfile};
// use PaymentGateway\Paddle\Transaction; 
// use PaymentGateway\Stripe\Transaction;//ПХП не знает какой использовать для создания объекта, это возможно исправить с помощью псевдонима

use PaymentGateway\Stripe\Transaction as StripeTransaction;// теперь, когда будем делать new Transaction оно всегда будет ссылаться на paddle\Trasaction

$paddleTransaction = new Transaction();
// $stripeTransaction = new Transaction();
$stripeTransaction = new StripeTransaction;

// var_dump($paddleTransaction, $stripeTransaction);

//Псевдонимы также могут быть использованы для работы с длинными именами классов

// Если ты импортируешь несколько классов с одинаковыми NS, ты можешь сгруппировать их вместе. Допустим у нас есть Customer profile внутри нашего index php
// use PaymentGateWay\Paddle\CustomerProfile;

$paddleCustomerProfile = new CustomerProfile();
var_dump($paddleCustomerProfile, $paddleTransaction, $stripeTransaction);
*/
/*
//Другой способ сгруппировать это импортировать само NS - это предпочтительный вариант когда импортироешь много классов с одним NS. Вместо указания целого списка импортируешь NS и ставишь префиксы классам с этим NS. Однако автор предпочитает иметь все импортированное в используемой инструкции, потому что когда открывает класс, он видит какие все классы там есть. особенности класса или файл от которого зависит.

use PaymentGateWay\Paddle;// теперь у нас есть импортированное NS

use PaymentGateway\Stripe\Transaction as StripeTransaction;

$paddleTransaction = new Paddle\Transaction();//а здесь мы пропишем КИ
$stripeTransaction = new StripeTransaction;
$paddleCustomerProfile = new Paddle\CustomerProfile();// и здесь

var_dump($paddleCustomerProfile, $paddleTransaction, $stripeTransaction);
*/
// Еще одна особенность Псевдонимов  - можно назначить псевдоним на целое  NS
use PaymentGateWay\Paddle as PA;

use PaymentGateway\Stripe\Transaction as StripeTransaction;

$paddleTransaction = new PA\Transaction();
$stripeTransaction = new StripeTransaction;
$paddleCustomerProfile = new PA\CustomerProfile();

var_dump($paddleCustomerProfile, $paddleTransaction, $stripeTransaction);

//Правили импортирования - основы профайла
// при подключении файла
include ('views/layout.php');//подключенный файл здесь не будет наследовать классы которые были импортированны в родительском файле. Так что если нужно использовать эти классы в подклченном файле, необходимо эти классы импортировать в этот файл также
// Здесь не было охвачена тема несколько NS в одном файле, тк автор неситает это ширко используемой практикой