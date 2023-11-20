<?php

namespace Database\Seeders;

use App\Models\Memproduksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemproduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productId = 1;

        Memproduksi::create([
            'idVendor' => 1,
            'idProduct' => $productId,
        ]);

        Memproduksi::create([
            'idVendor' => 2,
            'idProduct' => $productId,
        ]);
    }
}
