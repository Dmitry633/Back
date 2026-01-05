<?php
// declare(strict_types=1);

namespace App;

// class Toaster
// {
//     public array $slices = [];// здесь у нас два св-ва -  накопленное кол-во слайсов
//     protected int   $size   = 2;//максимальной кол-во слайсов,к-рое тостер способен изготовить одновременнно. Константа для $size здесь не используется,хотя и имела бы смысл, т.к автор планирует пройти константы и статику в отдельном видео. Еще одна деталь -  нельзя "уменьшить" видимость св-в , если в родителе видимость св-во public, то в потомке нельзя его изменить на private - будет ошибка. Но можно "увеличивать" видимость -  public > protected > private
//     // private int   $size   = 2;//Если установить видимость private для св-ва, то нам выведет только 2 слайса , хотя в index для toasterPro мы их делали три , т.к ptivate св-ва принадлежат  и существуют только в конкретном классе(Toaster), а класс потомок(ToasterPro) не может получить доступ private св-ву - это возможно только для public/protected св-в/методов/констант
    
//     public function addSlice(string $slice): void// метод добавляющий слайсы в массив слайсов до тех пор, пока не достигнут максимальное кол-во слайсов
//     {// по определению $this ссылается на вызываемый объект, в нашем случае, когда мы получаем доступ к св-вам/методам, используя $this, это необязательно значит, что получен доступ  к св-вам класса родителя. Доступ может бытть получен на классе-потомке. Давайте выведем $this в классе -родителе:
//         // var_dump($this);
//         // exit;
//         if (count($this->slices) < $this->size){
//             $this->slices[] = $slice;
//         }
//     }
//     public function toast()//метод-зацикливается через массив слайсов и выводит готовый слайсы на экран
//     {
//         foreach ($this->slices as $i => $slice) {
//         echo ($i + 1) . ': Toasting ' . $slice . PHP_EOL;
//         }
//     }
// }

// добавим конструктор

// class Toaster
// {
//     // protected array $slices = []; - инициализация $slices, при отсутствии конструктора в toaster.php
//     protected array $slices;
//     protected int   $size;

//     public function __construct()
//     {
//         $this->slices = [];
//         $this->size   = 2;
//     }

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
// }

// для правила совместимости для конструктора
// final class Toater
class Toaster
{
    protected array $slices;
    protected int   $size;

    // public function __construct(string $x)//можно принимать разные  типы аргументов
    public function __construct()
    {
        $this->slices = [];
        $this->size   = 2;
    }

    public function addSlice(string $slice): void
    {
        if (count($this->slices) < $this->size){
            $this->slices[] = $slice;
        }
    }
    
    public function toast()
    {
        foreach ($this->slices as $i => $slice) {
        echo ($i + 1) . ': Toasting ' . $slice . PHP_EOL;
        }
    }
  public function foo()  // к стр 49 index - предположим в Тосетр есть этот метод, котрый не применяется в  ТостерПро - возможно он устарел или в ТостерПро он более не нужен. Но  ТостерПро имеет доступ к этому методу и при создании экземпляров ТосетрПро у нас есть воможность вызвать этот метод и это будет неидеально, тк в ТосетрПро он не применяется вообще. И то можешь не захотеть позволять вызывать этот метод в ТостерПро
  {

  }
}