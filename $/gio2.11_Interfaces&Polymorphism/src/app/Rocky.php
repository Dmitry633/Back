<?php

namespace App;

class Rocky implements DebtCollector// т.к Рокки - другой тип коллекторов пропишем выполнение И.
{
    public function collect(float $owedAmount): float
    {
        return $owedAmount * 0.65;//как упомянуто ранее  - разные типы коллекторов могут применять разные методы взыскания долга. Здесь предположим Рокки возвращает 65% клиенту, остаток он оставляет себе

    } 
}