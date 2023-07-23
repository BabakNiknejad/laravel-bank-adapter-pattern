<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\BankType;
use App\Models\User;
use Illuminate\Database\Seeder;


class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::query()->where('email', 'nik@gmail.com')->first()->id;

        $bankTypeA = BankType::query()->where('name', 'A')->first();
        $bankTypeB = BankType::query()->where('name', 'B')->first();
        $bankTypeC = BankType::query()->where('name', 'C')->first();

        // Bank A
        BankAccount::create([
            'bank_type_id' => $bankTypeA->id,
            'user_id' => $userId,
            'card_number' => fake()->unique()->creditCardNumber(),
            'shaba_number' => 'IR5100000000000000000000000000000',
        ]);

        // Bank B
        BankAccount::create([
            'bank_type_id' => $bankTypeB->id,
            'user_id' => $userId,
            'card_number' => fake()->unique()->creditCardNumber(),
            'shaba_number' => 'IR5200000000000000000000000000000',
        ]);

        // Bank C
        BankAccount::create([
            'bank_type_id' => $bankTypeC->id,
            'user_id' => $userId,
            'card_number' => fake()->unique()->creditCardNumber(),
            'shaba_number' => 'IR5300000000000000000000000000000',
        ]);
    }

    /**
    'card_number' => $faker->unique()->creditCardNumber(),
    'card_type' => $faker->creditCardType(),
    'card_holder_name' => $faker->name(),
    'card_expiration_date' => $faker->date(),
    'card_cvc' => $faker->randomNumber(3),
     */

}
