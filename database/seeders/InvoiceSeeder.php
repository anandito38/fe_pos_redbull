<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::create([
            'kodeInvoice' => 'INV-001',
            'tanggalPembelian' => '2021-01-01',
            'admin_id' => 1
        ]);
    }
}
