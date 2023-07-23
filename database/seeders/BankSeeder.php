<?php

namespace Database\Seeders;

use App\Models\BankType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
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
