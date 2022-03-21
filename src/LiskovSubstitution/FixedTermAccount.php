<?php

namespace SOLID\LiskovSubstitution;

class FixedTermAccount implements Account
{
    public function deposit($amount)
    {
         echo "Depositing amount of: $amount from FixedTermAccount";
    }
}
