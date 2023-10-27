<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'namaBarang' => 'Tepung Terigu',
            'merek' => 'Segitiga Biru',
            'quantity' => '50',
            'hargaModal' => '50000',
            'category_id' => 1
        ]);

        Vendor::create([
            'namaBarang' => 'Tepung Tapioka',
            'merek' => 'Rose Brand',
            'quantity' => '30',
            'hargaModal' => '60000',
            'category_id' => 1
        ]);
    }
}
