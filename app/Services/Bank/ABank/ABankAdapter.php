<?php

namespace App\Services\Bank\ABank;

use App\Services\Bank\BankInterface;

class ABankAdapter implements BankInterface
{
    public function __construct(protected ABank $bank)
    {
    }

    public function deposit()
    {
        return $this->bank->depositMoney();
    }

    public function withdraw()
    {
       return $this->bank->withdrawMoney();
    }
}
