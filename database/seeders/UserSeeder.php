<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin.asa@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('asaAdmin@2024'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user.asa@gmail.com',
            'role' => 'user',
            'password' => Hash::make('asa@User'),
            'email_verified_at' => now(),
        ]);
    }
}
