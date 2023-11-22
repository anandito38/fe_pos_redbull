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
            InvoiceSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
            ProductSeeder::class,
            MemproduksiSeeder::class,
            MemilihSeeder::class,
        ]);
    }
}
