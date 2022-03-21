<?php

namespace SOLID\OpenClosed;

class PaypalPaymentMethod implements PaymentMethodInterface
{
    public function pay(float $amount)
    {
        echo "Pay the amount $amount using PayPal payment method.";
    }
}
