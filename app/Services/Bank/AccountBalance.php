<?php

namespace App\Services\Bank;


use App\Services\Bank\BankInterface;

class AccountBalance implements BankInterface
{
    protected array $banks;
    protected int $balance = 0;

    public function __construct(...$args)
    {
        $this->banks = $args;
    }

    public function deposit($card)
    {
        /* @var BankInterface $bank */
        foreach ($this->banks as $bank) {
            $this->balance += $bank->deposit($card);
        }
        return $this->balance;
    }


    public function withdraw($card)
    {
    }
}
