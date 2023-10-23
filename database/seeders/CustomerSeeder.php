<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'fullName' => 'Atilla Fejril',
            'nickname' => 'Atilla',
            'phoneNumber' => '081245657890',
            'address' => 'Jl. Sukabirus F90',
        ]);
    }
}
