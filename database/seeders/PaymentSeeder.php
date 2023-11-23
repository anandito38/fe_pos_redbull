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
            'status' => 'Belum Dibayar',
            'barcode' => '1234567890',
            'metode' => 'QRIS',
            'admin_id' => 1,
            'booking_id' => 1,
        ]);
    }
}
