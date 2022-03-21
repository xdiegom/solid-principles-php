<?php

namespace SOLID\SingleResponsibility;

class Sale
{
    public string $date;
    public int $amount;

    public function __construct(string $date, int $amount)
    {
        $this->date = $date;
        $this->amount = $amount;
    }
}
