<?php

namespace App\Services\Bank\BBank;

use App\Services\Bank\BankInterface;

class BBankAdapter implements BankInterface
{
    public function __construct(protected BBank $bank)
    {
    }

    public function deposit()
    {
        return $this->bank->InventryMoney();
    }

    public function withdraw()
    {
       return $this->bank->withdrawMoney();
    }
}
