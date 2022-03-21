<?php

namespace SOLID\LiskovSubstitution;

class WithDrawableAccount extends Account
{
    public function deposit($amount)
    {
         echo "Depositing amount of: $amount";
    }

    public function withdraw($amount)
    {
         echo "Withdraw amount of: $amount";
    }
}
