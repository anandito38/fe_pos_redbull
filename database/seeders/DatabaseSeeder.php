<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            VendorSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
            ProductSeeder::class,
            InvoiceSeeder::class,
            MemproduksiSeeder::class,
            MemilihSeeder::class,
        ]);
    }
}
