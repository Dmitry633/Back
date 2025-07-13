<?php
declare(strict_types=1);
/*
class Transaction //рекомндуется именовать классы, а также иметь  один класс на файл и ничего более в этом файле.
{// класс может иметь переменные - которые являются свойствами и функции,которые являются методами
    //public float $amount = 15;//public - параметр доступен для любого взаимодействиядаже из вне класса private  - параметр доступен только в пределах самого класса 
    // Присвоим значение (стр 17 index.php). здесь нельзя присваивать сложные выражения (напро ф-ции). Но конкретно в этом случае не правильно в классе захарживать значение, т.к на практике значения могут быть разные. Поэтому создадим конструктор для инициализации наших свойств. 
    // public float $amount;//видимость этих свойств public может стать причиной случайных багов,когда эти свойства изменяются из вне класса, поэтому заменим их на private. Но вместо этого для доступа к этому свойству мы создадим getter function getAmount (стр 28)
    // public string $description;
    private float $amount;
    private string $description;
    public function __construct(float $amount, string $description) //Коснструктор -метод, к-рый будет вызываться каждый раз при создании нового экземпляра классамодификатор доступа необязателен но настоятельно рекомендуется. При отсутствии по умолчанию - public
    {
        $this -> amount = $amount;// для доступа к свойствам объекта класса внутри самого класса используется переменная this  - относится к вызываемому объекту, т.е. к экземпляру из которого метод был вызван
        $this -> description = $description;// далее необходимо вставить аргументы в строку new Transaction(index)
    }

//создадим метод добавляющий налог к транзакции
// public function addTax(float $rate)
// {
//     $this -> amount += $this -> amount * $rate / 100;
// }
// public function applyDiscount(float $rate)//скидка
//     {
//         $this -> amount -= $this -> amount * $rate / 100;
    // }
// для записи в виде цепи преобразуем запись методов
    public function addTax(float $rate):Transaction //и мы можем указать имя класса как выозвращаемый тип
    {
        $this -> amount += $this -> amount * $rate / 100;
        
        return $this;//здесь this относится к вызываемогу объекту, который является экземпляром класса transaction, и мы можем указать имя класса как выозвращаемый тип
        //метод цепочки бессмысленен если нужновернуть не текущий экземпляр, а конкретное значение(вместо addTax было бы что-то вроде getTax), т.е этот метод имеет смысл для определенных классов, когда создается объект до плучения финального значения
    }
    public function applyDiscount(float $rate): Transaction
    {
        $this -> amount -= $this -> amount * $rate / 100;

        return $this;
    }
    public function getAmount(): float
    {
        return $this -> amount;
    }

    public function __destruct()// вызывается когда нет ссылок доступных к объекту или когда объект разрушен
    {
        echo 'Destruct ' . $this -> description . '<br />';
    }

}
//возможно создать объект здесь же сразу после скобок класса, но не рекомендуется так делать, так что создадим его в index.php
*/
//2.3 Продвижение свойств конструктора

// class Transaction
// {
//     private float $amount;// - определения свойства
//     private string $description;

//     public function __construct(
//         private float $amount,  //добавим видимость аргументов, что будет распознано  и для свойств и для аргументов конструктора и это будет назначать значение которое будет подставляться в конструктор в это свойство неявно. В осноном это все еще определение свойство и назначение свойства неявно для тебя, так что мжно обойтись без них. Удалим их(см стр 70)
//         private string $description
//     ) {
//         $this -> amount = $amount; // - назначение свойства
//         $this -> description = $description;
//     }
// }
/*
class Transaction//неявно ПХП все еще делает определение и назначение свойства
{
      public function __construct(
        private float $amount,  
        private string $description
    ) {
    }
}
//пара вещей  о которых надо быть осведомленным
// 1.можно типизировать(type hint) любой тип кроме callable, т.к нельзя типищировать тип callable
class Transaction
{
    private float $amount;// - определения свойства
    // private callable $description;// нельзя типизировать как calable ПХП не позволяет это сделать
    private string $description;
    public function __construct(
        float $amount, //удалим видимость(private)
        // string $description
        callable $description// ОДнако в аргументах возможно поставить тип callable
        // private callable $description// но  если продвигать этто свойство и устанавливать модификатор доступа, то так делать нельзя, т.к. не позволено типизировать свойсвто с callable
    )
    {

    }
}
//также возможно комбинириовать пробвинутые свойство со свойствами класса
// нет необходимости продвигать все свойства. если хочешь продивнуть только дескрипшн, но не ЭМАУНТ, то можно удалить ДЕСКИПШН из свойств и оставить private $description в констрк=укторе
class Transaction
{
    private float $amount;// - определения свойства

    public function __construct(
        float $amount, 
        private $description
    ){
        $this -> amount = $amount;
    }
}

//2 вещь - нельзя делать дупликаты - те одиноковые( одновременно с одинаковыми именами) свойства и одинаковые продвинутые свйосвта

class Transaction
{
    private float $amount;
    // private $description;// - дупликат - ОШИБКА. 

    public function __construct(
        float $amount, 
        // private $description
        private string $description //нет необхожимости типизировать аргументы, можешь также продвигать нетипизирвоанные аргументы

    ){
        $this -> amount = $amount;
    }
}

class Transaction
{
    private float $amount;
    
    public function __construct(
        float $amount, 
        // private $description
        // private string $description  = 'hello'// возможно утстановить значение по умолчанию для продвинутого свойства, но должен следовать тем же правилам(только для простых выражений или значений констант в качестве значения  по умолчанию ) - нелья использовать вызов ф-ций или сложные выражения
        // private string $description  = null//  - так неправильно Если назначит НУЛЛ оп умолчанию, нужно сделать  у этого свйства тип нуллэбл
        private ?string $description  = null//  - так правильно Если назначит НУЛЛ оп умолчанию, нужно сделать  у этого свйства тип нуллэбл
    ){
        $this -> amount = $amount;
    }
}
   */
//Дотуп  в продвинутых свойствах
/*
class Transaction
{
    // добавим свойство
      public function __construct(
        private float $amount ,  
        private string $description
    ) {
       echo $this -> amount;// с помощью this 
       echo $amount;// или с помощью переменной
    }
}
*/
// NULL safe оператор - позволяет изменить свойство и вызов метода , даже если один из них возвращает НУЛЛ
/*
class Transaction
{
    public ?Customer $customer = null;// добавим свойство
      public function __construct(
        private float $amount ,  
        private string $description
    ) {
       
    }
}
    */
    // Замена свйства на метод
    class Transaction
{
    private ?Customer $customer = null;// меняем на приват и создаем геттер
      public function __construct(
        private float $amount ,  
        private string $description
    ) {
    }
    public function getCustomer(): ?Customer
    {
        return $this -> customer;
    }
}