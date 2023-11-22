<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'totalPrice' => '100000',
            'barcode' => '1234567890',
            'admin_id' => 1,
            'booking_id' => 1,
        ]);
    }
}
