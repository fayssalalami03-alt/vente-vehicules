<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Admin Mohamed',
            'email' => 'admin@gmail.com',
            'phone' => '0600000000',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Test',
            'email' => 'user@gmail.com',
            'phone' => '0611111111',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);
    }
}
