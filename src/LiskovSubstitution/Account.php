<?php

namespace SOLID\LiskovSubstitution;

class Account
{
    public function deposit($amount)
    {
         echo "Depositing amount of: $amount";
    }
}
