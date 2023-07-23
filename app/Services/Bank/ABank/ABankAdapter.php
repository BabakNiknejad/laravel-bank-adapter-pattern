<?php

namespace App\Services\Bank\ABank;

use App\Services\Bank\BankInterface;

class ABankAdapter implements BankInterface
{
    public function __construct(protected ABank $bank)
    {
    }

    public function deposit($card)
    {
        return $this->bank->depositMoney($card);
    }

    public function withdraw($card)
    {
       return $this->bank->withdrawMoney($card);
    }
}
