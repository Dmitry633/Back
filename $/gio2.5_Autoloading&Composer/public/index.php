<?php

//2.5 Автозагрузка и Composer
/*
// require_once '../app/PaymentGateway/Stripe/Transaction.php';//подключение файлов таким образом очень уродливо и очень быстро - чем больше классов есть, тем больше подключаемых инструкций необходимо. Автозагрузка решает эту проблему, при помощи ф-ции spl_autoload_register, которая принимает несколько аргументов, первый из которых покахывает, что нам не все равно какая из ф-ций callback.
// require_once '../app/Notification/Email.php';
// require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';
// require_once '../app/PaymentGateway/Paddle/Transaction.php';

spl_autoload_register(function($class)
{
    var_dump($class);// так  мы не увидим вывода на экран, т к наша spl ф-ция не запущена, потому что у нас есть инструкции подключения и ПХП знает как загрузить эти классы и поэтому  ему нет необходимости запускать наш автозагрузчик. Автозагрузка делает авоматическую закгрузку классов, интерфейсов и ф-ций, которуе еще не подключены или другими словами являются undefined. После комментирования всхе подключений мы видим вывод ПКИ, а поповоду второго vardump - ошибка, т.к подключение файлов, где содержатся классы закомментированы
}); //spl_autoload_register принимает несколько аргументов, первый из которых показывает, что нам не все равно какая из ф-ций callback. Первый аргумент будет нашией пользовательской ф-цией автозагрузки. и эта ф-ция получает Полное Квалифицированное Имя (ПКИ) в качестве аргумента

use App\PaymentGateway\Paddle\Transaction;

$paddleTransaction = new Transaction();

var_dump($paddleTransaction);
*/

/*
//Т.О когда пытаешься использовать или получить доступ к классу, ПХП проверяет существование класса - если нет, то перед выводом ошибки он смотрит на ф-ции автозагрузки и запускает их один за другим. При регистрации автозагрузчика они отправляются в очередь и выполняются один за другим, всякий раз когда класс не найден.

spl_autoload_register(function($class)
{
    var_dump('Autoloader 1');
});

spl_autoload_register(function($class)
{
    var_dump('Autoloader 2');
}, prepend: true);// можно добавить третий аргумент true, чтобы добавить автозагрузку в очередь вместо добавления его в конец. тогда автолоадер 2 напечатается вперед автолоадера 1

use App\PaymentGateway\Paddle\Transaction;

$paddleTransaction = new Transaction();

var_dump($paddleTransaction);
*/
// теперь посмотрим как работает автозагрузчик, включенный в наш класс:
spl_autoload_register(function($class)
{
    // require $class;// здесь будет ошибка, т.к это ПКИ а не путь к файлу. но мы можем получить этот путь из ПКИ, если сделаем некуб обработку
    //наша цель получить нечто вроде '../app/PaymentGateway/Paddle/Transaction.php' из App\PaymentGateway\Paddle\Transaction:
    // $class = lcfirst(str_replace('\\', '/', $class)) . '.php';
    //теперь  у нас есть app/PaymentGateway/Paddle/Transaction.php, но все еще выводится ошибка. причиной этого  является неправильный путь, тк. нам надо выйти на папку выше и зайтив папку ..../app/, для этого воспользуемся магической констатнтой
    // __DIR__// она вернет текущую дирректорию файла, в нашем случае это ..../public/

    // require $class;
    // var_dump($class);// здесь выведется ПКИ
    // $path = __DIR__ . '/' . lcfirst(str_replace('\\', '/', $class)) . '.php';//все еще выдает ошибку, т к  не перешли на уровень выше
    $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class)) . '.php';// теперь работает
    
    if (file_exist($path)) { //для соответствия PSR-4
        require $path;
    }
    // var_dump($path);

});

use App\PaymentGateway\Paddle\Transaction;

$paddleTransaction = new Transaction();

var_dump($paddleTransaction);