<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Demo administrator account for project evaluation.
        User::updateOrCreate(
            ['email' => 'admin@horizonacademy.com'],
            [
                'name' => 'Horizon Academy Admin',
                'password' => Hash::make('Admin@12345'),
                'role' => 'admin',
                'status' => 'approved',
                'email_verified_at' => now(),
            ]
        );

        // Test user used by the default Laravel test environment.
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'role' => 'student',
                'status' => 'approved',
                'email_verified_at' => now(),
            ]
        );
    }
}
