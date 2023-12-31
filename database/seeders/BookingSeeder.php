<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'quantity' => '100',
            'kode' => 'B-001',
            'totalHarga' => 15000,
            'customer_id' => 1,
        ]);
    }
}
