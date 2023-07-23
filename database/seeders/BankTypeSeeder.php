<?php

namespace Database\Seeders;

use App\Models\BankType;
use Illuminate\Database\Seeder;

class BankTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankType::create([
            'name' => 'A'
        ]);

        BankType::create([
            'name' => 'B'
        ]);

        BankType::create([
            'name' => 'C'
        ]);
    }
}
