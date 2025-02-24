<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'email' => 'admin@gmail.com',
            'handphone_number' => 13213,
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'profile_picture' => '1740323327_67bb39ff8e218.avif'
        ]);
        User::create([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'handphone_number' =>31424242343,
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'profile_picture' => '1740239965_67b9f45d71924.avif'
        ]);
      
    }
}
