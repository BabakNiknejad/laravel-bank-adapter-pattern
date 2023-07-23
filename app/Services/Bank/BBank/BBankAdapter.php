<?php

namespace App\Services\Bank\BBank;

use App\Services\Bank\BankInterface;

class BBankAdapter implements BankInterface
{
    public function __construct(protected BBank $bank)
    {
    }

    public function deposit($card)
    {
        return $this->bank->InventryMoney($card);
    }

    public function withdraw($card)
    {
       return $this->bank->withdrawMoney($card);
    }
}
