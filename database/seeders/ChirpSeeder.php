<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    public function run(): void
    {
        /** @var Collection<User> */
        $users = User::count() < 3
            ? collect([
                User::query()->create([
                    'name' => 'Cristyan Valera',
                    'email' => 'cristyanvalera@mail.com',
                    'password' => bcrypt('password'),
                ]),
                User::query()->create([
                    'name' => 'Yusmely Garcia',
                    'email' => 'yusmelygarcia@mail.com',
                    'password' => bcrypt('password'),
                ]),
                User::query()->create([
                    'name' => 'Crismely Valera',
                    'email' => 'crismelyvalera@mail.com',
                    'password' => bcrypt('password'),
                ]),
            ])
            : User::take(3)->get();

        $chirps = [
            'Just discovered Laravel - where has this been all my life? 🚀',
            'Building something cool with Chirper today!',
            'Laravel\'s Eloquent ORM is pure magic ✨',
            'Deployed my first app with Laravel Cloud. So smooth!',
            'Who else is loving Blade components?',
            'Friday deploys with Laravel? No problem! 😎',
        ];

        foreach ($chirps as $message) {
            $users->random()->chirps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
