<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     AccountSeeder::class,
        //     UserSeeder::class,
        //     SocialNetworkSeeder::class,
        // ]);
        // User::factory(100)->create();
    }
}
