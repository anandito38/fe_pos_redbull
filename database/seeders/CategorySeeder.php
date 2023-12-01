<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'namaCategory' => 'Tepung'
        ]);

        Category::create([
            'namaCategory' => 'Flavor'
        ]);

        Category::create([
            'namaCategory' => 'Packaging'
        ]);

        Category::create([
            'namaCategory' => 'Essense Syrup'
        ]);
    }
}
