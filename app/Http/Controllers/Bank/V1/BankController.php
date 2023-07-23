<?php

namespace App\Http\Controllers\Bank\V1;

use App\Http\Controllers\Controller;
use App\Services\Bank\BankInterface;
use Illuminate\Http\Request;

class BankController extends Controller
{

    public function __construct(protected BankInterface $bankAdapter)
    {

    }

    public function deposit(Request $request)
    {
      return $this->bankAdapter->deposit($request->card);
    }
}
