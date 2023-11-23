<?php

namespace Database\Seeders;

use App\Models\Memilih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $BookId = 1;

        Memilih::create([
            'idProduct' => 1,
            'idBook' => $BookId,
        ]);

        Memilih::create([
            'idProduct' => 2,
            'idBook' => $BookId,
        ]);
    }
}
