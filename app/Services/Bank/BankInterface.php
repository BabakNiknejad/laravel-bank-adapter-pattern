<?php

namespace App\Services\Bank;

interface BankInterface
{
    public function deposit();

    public function withdraw();
}
