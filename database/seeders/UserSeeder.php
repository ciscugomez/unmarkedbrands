<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account = Account::where('email', 'admin@example.com')->first();
        if ($account) {
            if (!User::where('email', 'admin@example.com')->first()) {
                User::create([
                    'name' => 'Admin',
                    'surname' => 'Admin',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('admin123'),
                    'account_id' => $account->id,
                ]);
            }
        }
    }
}
