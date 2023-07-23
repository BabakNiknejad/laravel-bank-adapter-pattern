<?php

namespace App\Services\Bank;

interface BankInterface
{
    public function deposit($card);

    public function withdraw($card);
}
