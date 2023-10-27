<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'fullName' => 'Anandito Satria Asyraf',
            'nickname' => 'Anandito',
            'password' => Hash::make('12345678'),
            'phoneNumber' => '081234567890',
            'address' => 'Jl. Sukabirus F10',
            'role' => 'Administrator'
        ]);
    }
}
