<?php

namespace SOLID\LiskovSubstitution;

class CurrentAccount extends WithDrawableAccount
{
    public function deposit($amount)
    {
         echo "Depositing amount of: $amount from Current Account";
    }

    public function withdraw($amount)
    {
         echo "Withdraw amount of: $amount from Current Account";
    }
}
