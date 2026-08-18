<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $account = Account::where('email', 'admin@example.com')->first();

        if(!$account) {
            Account::create([
                'name' => 'Admin',
                'nickname' => 'Admin',
                'email' => 'admin@example.com',
                'phone' => '1234567890',
                'legal_name' => 'Admin Legal',
                'vat' => 'VAT12345',
                'address' => 'Admin Address',
                'city' => 'Admin City',
                'state' => 'Admin State',
                'country' => 'Admin Country',
                'postal_code' => 'Admin Postal Code',
            ]);
        }

    }
}
