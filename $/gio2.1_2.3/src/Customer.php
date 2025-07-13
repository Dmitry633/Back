<?php

// class Customer
// {
//     public ?PaymentProfile $paymentProfile = null;
// }
class Customer
{
    private ?PaymentProfile $paymentProfile = null;// меняем на приват и создаем геттер

    public function getPaymentProfile(): ?PaymentProfile
    {
        return $this -> paymentProfile;
    }
}