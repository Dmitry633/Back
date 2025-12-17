<?php

declare(strict_types = 1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;
//Создадим const  в Transaction -по стандарту название капсом, разделитель  - знак подчеркивания
class Transaction
{
/*закоменчено, тк  перенесено в файл Status.php
   public const STATUS_PAID = 'paid';//  в качестве значения  м использовать инт. или стринг, в зависимости от того как хошь хранить эти статусы. также м добавить модификаторы лоступа или видмость класса константы, если нет, то по умолчаннию будет public. Но автор рекомендует прописывать видимость, даже если public. см index
//    private const STATUS_PAID = 'paid';//При установки класса констант в private, не будет возможности получить доступ  их вне этого класса. В этом же случае не будет доступа к св-вам класса . Однако можно получить доступ  в пределах класса (см construct)
   
   public const STATUS_PENDING = 'pending';
   public const STATUS_DECLINED = 'declined';
   public const ALL_STATUSES = [// где ключи будут актуальными статусами
        self:: STATUS_PAID  => 'Paid',//здесь первая буква  д б большой. стр 15 - 18 называются таблицей поиска
        self:: STATUS_PENDING  => 'Pending',
        self:: STATUS_DECLINED  => 'Declined',
   ];
*/
    private string $status;
    public function __construct()
    {
        // $this->setStatus('pending');// установка значения по умолчанию
        /*
        $this->setStatus(self::STATUS_PENDING);// вместо установки значения по умолчанию поставим self
        */
        $this->setStatus(Status::PENDING);// ссылаемся на константу используя имя класса

        // var_dump(Transaction::STATUS_PAID);// Для доступа к константе в пределах класса испольхуем имя класса
        // var_dump(self::STATUS_PAID);//еще один способ - использовать ключевое слово self - ссылается на текущий класс или класс, где он(self) вызван. это похоже на $this, которое ссылается на вызов объекта
    }
    //если вы заметили, что какой то кусок данных захардкожен и не меняется так часто, рассмотрите замену его на константы. вот пример:
   public function setStatus(string $status):self//в даннмо случае можно еще прописать:Transaction - имя класса //создадим метод
   {
    /*
    if (! isset (self::ALL_STATUSES[$status])){//теперь сделаем проверку существует ли полученный статус в массиве
        */
    if (! isset (Status::ALL_STATUSES[$status])){

        throw new \InvalidArgumentException('Invalid status');// если не существует, то сделаем какой то тип исключения или ошибки
    }

    $this->status = $status;// метод , к-рый будет устанавливать свойство status
    return $this;
   }
}
