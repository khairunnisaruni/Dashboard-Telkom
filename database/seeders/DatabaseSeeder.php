<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin123',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'profile_picture' => null,
            ]
        );

        // Regular user
        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User1234',
                'password' => Hash::make('user1234'),
                'is_admin' => false,
                'profile_picture' => null,
            ]
        );
    }
}
