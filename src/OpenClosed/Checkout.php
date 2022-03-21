<?php

namespace SOLID\OpenClosed;

class Checkout
{
    public function begin(float $amount, PaymentMethodInterface $paymentMethod)
    {
         $paymentMethod->pay($amount);
    }
}
