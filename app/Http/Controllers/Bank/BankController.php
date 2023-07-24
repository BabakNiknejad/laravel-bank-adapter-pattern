<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Services\Bank\BankInterface;
use Illuminate\Http\Request;

class BankController extends Controller
{

    public function __construct(protected BankInterface $bankAdapter)
    {
        $this->middleware('auth:api');
    }

    public function deposit(Request $request)
    {
      return $this->bankAdapter->deposit();
    }
}
