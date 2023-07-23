<?php

namespace App\Services\Bank\ABank;

use Illuminate\Support\Facades\Http;
use function response;

class ABank
{


    public function depositMoney($card)
    {
        try {
            $response = file_get_contents(base_path("app/Services/Bank/ABank/ABank.json"));
            Http::fake(["ABank.ir" => Http::response($response)]);
            $response = json_decode($response);
            return $response->amount;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function withdrawMoney($card)
    {
        return $card . 'Aw';
    }
}
