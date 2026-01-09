<?php

namespace App;

Interface Renderable
{
    public function render(): string;// удалим к-слово abstract и все будет работать также как раньше

}