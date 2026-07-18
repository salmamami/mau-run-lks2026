<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mau-run.com',
            'nik' => '3308067811120001',
            'no_hp' => '081234567890',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
