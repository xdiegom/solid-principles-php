<?php

namespace SOLID\LiskovSubstitution;

class SavingAccount extends WithDrawableAccount
{
    public function deposit($amount)
    {
         echo "Depositing amount of: $amount from Saving Account";
    }

    public function withdraw($amount)
    {
         echo "Withdraw amount of: $amount from Saving Account";
    }
}
