<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Clear the users table before seeding
        \DB::table('users')->truncate();

        // Create users
        User::create([
            'name' => 'Root User',
            'email' => 'test@example.com', // Keep this static if required
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Static password for testing
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Normal User (in root team)',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Normal User (not in root team)',
            'email' => 'test3@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}

