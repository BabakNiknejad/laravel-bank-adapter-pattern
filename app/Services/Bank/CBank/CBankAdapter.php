<?php

namespace App\Services\Bank\CBank;

use App\Services\Bank\BankInterface;

class CBankAdapter implements BankInterface
{
    public function __construct(protected CBank $bank)
    {
    }

    public function deposit()
    {
        return $this->bank->Inventry();
    }

    public function withdraw()
    {
       return $this->bank->withdraw();
    }
}
