<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialNetworks = [
            [
                'name'  => 'X',
                'icon'  => 'x.svg',
                'url'   => 'https://x.com/',
            ],
            [
                'name'  => 'LinekedIn',
                'icon'  => 'linkedin.svg',
                'url'   => 'https://www.linkedin.com/',
            ],
            [
                'name'  => 'Facebook',
                'icon'  => 'facebook.svg',
                'url'   => 'https://www.facebook.com/',
            ],
            [
                'name'  => 'Instagram',
                'icon'  => 'instagram.svg',
                'url'   => 'https://www.instagram.com/',
            ]
        ];

        foreach ($socialNetworks as $socialNetwork) {
            if (SocialNetwork::where('name', $socialNetwork['name'])->first()) continue;
            SocialNetwork::create($socialNetwork);
        }
    }
}
