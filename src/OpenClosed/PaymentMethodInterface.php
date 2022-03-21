<?php

namespace SOLID\OpenClosed;

interface PaymentMethodInterface
{
    public function pay(float $amount);
}
