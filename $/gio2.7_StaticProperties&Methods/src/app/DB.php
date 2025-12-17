<?php

namespace App;

class DB
{
    private static ?DB $instance = null;// статическое св-во, к-ре нуллэбл(знак ?), его тип - текущий класс DB, с установленным значением по умолчанию нулл.

    public function __construct(public array $config)// в конструкторе принимаем конфигурации, к-рые являются нестатическим св-вом. Прмечательно что доступ установлен частный - что означает, что мы не можем напрямую создавать экземпляры этого класса(см index c.26)
    {
        echo 'Instance Created <br />';
    }

    public static function getInstance(array $config): DB // из-за этого(с.9)  у нас есть этот статический метод, и мы можем вызвать его для получения экземпляра DB class. Он принимает тот же аргумент, что и конструктор...
    {
        if (self::$instance === null){//... и проверяет является ли экземпляр нуллом
            self::$instance = new DB ($config);
        }
        return self::$instance;
    }
}