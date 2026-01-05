<?php
// declare(strict_types=1);
namespace App;

class FancyOven
{// вместо использования Н. от ТостераПро используем COMPOSITION, где fancyOven будет иметь функциональность ТостераПро, мы можем сделать это используя св-во:
    // private ToasterPro $toaster;

    // public function __construct(ToasterPro $toaster)//которое можем приянть в конструкторе, как зависимость
    // {
    //     $this->toaster = $toaster
    // }
//чтобы сделать лучше сделаем продвижение св-ва:
    public function __construct(private ToasterPro $toaster)//которое можем приянть в конструкторе, как зависимость
    {

    }
    //Т О вместо дублирования ТостераПро, мы скопировали функционал toast  и toastBagel

    public function fry()
    {
// fry stuff
    }
    public function toast()// этот метод есть в ТостерПро и в Тостер
    {
        $this->toaster->toast();
    }

    public function toastBagel()// этот метод есть в ТостерПро
    {
        $this->toaster->toastBagel();
    }

}
// ТО мы не используя Н. получили функциональность ТостераПро используя COMPOSITION