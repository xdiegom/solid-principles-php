<?php

namespace SOLID\LiskovSubstitution;

class BankingService
{
    public WithDrawableAccount $account;

    public function __construct(WithdrawableAccount $account)
    {
         $this->account = $account;
    }

    public function withdraw($amount)
    {
         $this->account->withdraw($amount);
    }

    public function deposit($amount)
    {
         $this->account->deposit($amount);
    }
}
