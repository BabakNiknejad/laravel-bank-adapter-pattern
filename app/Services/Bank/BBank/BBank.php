<?php

namespace App\Services\Bank\BBank;

use Illuminate\Support\Facades\Http;

class BBank
{


    public function InventryMoney()
    {
        try {
            $response = file_get_contents(base_path("app/Services/Bank/BBank/BBank.json"));
            Http::fake(["BBank.ir" => Http::response($response)]);
            $response = json_decode($response);
            return $response->balance;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function withdrawMoney()
    {
        return  'BW';
    }
}
