<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama' => 'Mochi Daifuku Chocolate',
            'kode' => 'P-001',
            'hargaJual' => '10000',
            'quantity' => '100',
            'booking_id' => 1,
            'vendor_id' => 1
        ]);
    }
}
