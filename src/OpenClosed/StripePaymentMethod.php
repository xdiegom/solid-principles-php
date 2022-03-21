<?php

namespace SOLID\OpenClosed;

class StripePaymentMethod implements PaymentMethodInterface
{
    public function pay(float $amount)
    {
         echo "Pay the amount $amount using Stripe payment method.";
    }
}
