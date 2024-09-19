<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager1@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user'
        ]);
    }
}
