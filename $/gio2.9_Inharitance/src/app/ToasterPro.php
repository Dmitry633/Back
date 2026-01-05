<?php
// declare(strict_types=1);

namespace App;

// class ToasterPro
// {
//     public array $slices = [];
//     public int   $size   = 4;

//     public function addSlice(string $slice): void
//     {
//         if (count($this->slices) < $this->size){
//             $this->slices[] = $slice;
//         }
//     }
//     public function toast()
//     {
//         foreach ($this->slices as $i => $slice) {
//         echo ($i + 1) . ': Toasting ' . $slice . PHP_EOL;
//         }
//     }
//     public function toastBagel()
//     {
//         foreach ($this->slices as $i => $slice) {
//         echo ($i + 1) . ': Toasting ' . $slice . ' with bagels option' . PHP_EOL;
//         }
//     }
// }

// Используем силу наследования, исп-я ключевое слово extends и наш код преобразится:

// class ToasterPro extends Toaster// теперь тостерПро унаследует все public/protected методы/св-ва/консатны от класса тостер, что означает, что мы можем избаится от св-ва слайсы, от методов addSlice, toast. Напоминаю, что можно перезаписать  public/protected методы/св-ва/консатны и здесь мы как раз перезаписывает св-во size со значением 4
// {
//     protected int   $size   = 4;

//     public function toastBagel()
//     {
//         foreach ($this->slices as $i => $slice) {
//         echo ($i + 1) . ': Toasting ' . $slice . ' with bagels option' . PHP_EOL;
//         }
//     }
// }

// добавим конструктор
// class ToasterPro extends Toaster
// {
//     // protected int   $size;

//     public function __construct()
//     { 
//         parent::__construct();//Для того чтобы кол-во слайсов равнялось кол-ву слайсов потомка необходимо явно вызвать родительский метод используя ключевой слово parent
//        $this->size = 4; //тк видимость у св-ва protected - мы можем получить доступ к этому св-ву, потому удалим стр 48
//     //    parent::__construct();
//     }

//     public function addSlice(string $slice): void //предположим мы хотим перезаписать этот метод. Если мы не вызовем метод родитяеля явно - автоматически это  тоже не произойдет и на экран ничего не выведется
//     {
//        parent::addSlice($slice); // поэтому вызовем родительский метод явно
//     // Если нужна пользователтская логика то ее нужно печатать здесь, в этом случае мы не собироемся вызывать родительский метод вообще (т.е. с.  59 надо удалить)
//     }

//     public function toastBagel()
//     {
//         foreach ($this->slices as $i => $slice) {
//         echo ($i + 1) . ': Toasting ' . $slice . ' with bagels option' . PHP_EOL;
//         }
//     }
// }

// для правила совместимости для конструктора
class ToasterPro extends Toaster
{

    // public function __construct(string $x, string $y, int $z)//примем некоторые параметры в классе-потомке/ все что нужн сделать - убедиться, что передаешь правльные аргументы в конструктор-родителя, при вызове parent::__construct(). если не вызываешь, тогда не очем беспокоется
    // { 
    //     parent::__construct($x);//зависит от тебя как хочешь передать аргумент
    //     // parent::__construct('foo');//  в этом случае нужно убрать string $x из аргументов
    public function __construct()
    { 
        parent::__construct();
        $this->size = 4;// к стр 49 index - здесь мы намеренно изменяем св-во  и здесь такая задумка, но такое же действие может сломать инкапсуляцию, там где ты позволишь это сделать, ведь это мжено сделать в любом другом методе
    }

    // можно  по разному называть параметры методов, что не станет причиной проблемы совместимости, но могут вызвать ошибки,если использована особенность  именнованного аргумета:
    // public function addSlice(string $sliceX): void
    public function addSlice(string $slice): void
    {
        // parent::addSlice($sliceX);
        parent::addSlice($slice);
    }                                           // - что вполне обосновано и будет работать, но, если в index использовать именнованный аргумент (c 21), то будет ошибка  - т.к имя аргумента отличается, поэтому нужно, чтобы имя аргумента совпадало


    public function toastBagel()
    {
        // $this->size = 999;// к стр 49 index 
        foreach ($this->slices as $i => $slice) {
        echo ($i + 1) . ': Toasting ' . $slice . ' with bagels option' . PHP_EOL;
        }
    }

    public function foo()// перзапись метода -  решение проблемы , изложенной  в стр 84 Тостера - но по мнению автора это нехорошая задумка. Совет: в случае если вынуждены перезаписывать метод подобным образом и использовать Исключение, попытайся пересмотреть использование Н. Возможно ты хочешь достичь чего то еще наппример структуру(COMPOSITION) - но об этом позже
    {
        throw new \Exception('Not Supported');
    }
}