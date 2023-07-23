<?php

namespace App\Services\Bank\CBank;

use App\Services\Bank\BankInterface;

class CBankAdapter implements BankInterface
{
    public function __construct(protected CBank $bank)
    {
    }

    public function deposit($card)
    {
        return $this->bank->Inventry($card);
    }

    public function withdraw($card)
    {
       return $this->bank->withdraw($card);
    }
}
