<?php

namespace App\Services\Bank\CBank;

use Illuminate\Support\Facades\Http;

class CBank
{


    public function Inventry($card)
    {
        try {
            $response = file_get_contents(base_path("app/Services/Bank/CBank/CBank.json"));
            Http::fake(["CBank.ir" => Http::response($response)]);
            $response = json_decode($response);
            return $response->value;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function withdraw($card)
    {
        return $card . 'CW';
    }
}
