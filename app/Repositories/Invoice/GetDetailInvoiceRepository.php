<?php

namespace App\Repositories\Invoice;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Exception;

class GetDetailInvoiceRepository
{
    public function getInvoiceDetailsById($id)
    {
        try {
            $invoices = Invoice::join('payments', 'invoices.payment_id', '=', 'payments.id')
                ->join('bookings', 'payments.booking_id', '=', 'bookings.id')
                ->leftJoin('users', 'payments.admin_id', '=', 'users.id')
                ->leftJoin('customers', 'bookings.customer_id', '=', 'customers.id')
                ->leftJoin('memilihs', function ($join) {
                    $join->on('bookings.id', '=', 'memilihs.idBook')
                        ->where('payments.booking_id', '=', DB::raw('memilihs.idBook'));
                })
                ->leftJoin('products', 'memilihs.idProduct', '=', 'products.id')
                ->select(
                    'invoices.id AS invoice_id',
                    'invoices.payment_id',
                    'payments.metode AS payment_metode',
                    'payments.updated_at AS payment_updated_at',
                    'users.nickname AS admin_nickname',
                    'users.phoneNumber AS admin_phoneNumber',
                    'users.role AS admin_role',
                    'bookings.id AS booking_id',
                    'bookings.kode',
                    'bookings.totalHarga',
                    'customers.fullname AS customer_fullname',
                    'customers.phoneNumber AS customer_phoneNumber',
                    'customers.address AS customer_address',
                    'bookings.created_at AS book_created_at',
                    'products.kode AS product_kode',
                    'products.nama AS product_nama',
                    'products.hargaJual AS product_hargaJual',
                    'memilihs.qtyMemilih AS memilih_qty'
                )
                ->where('invoices.id', $id)
                ->get();

            $invoiceDTOs = [];

            foreach ($invoices as $invoice) {
                $invoiceDTO = [
                    'id' => $invoice->invoice_id,
                    'payment' => [
                        'id' => $invoice->payment_id,
                        'metode' => $invoice->payment_metode,
                        'updated_at' => $invoice->payment_updated_at,
                        'admin' => [
                            'nickname' => $invoice->admin_nickname,
                            'phoneNumber' => $invoice->admin_phoneNumber,
                            'role' => $invoice->admin_role,
                        ],
                    ],
                    'bookings' => [],
                ];

                $bookingData = [
                    'id' => $invoice->booking_id,
                    'kode' => $invoice->kode,
                    'totalHarga' => $invoice->totalHarga,
                    'customer' => [
                        'fullname' => $invoice->customer_fullname,
                        'phoneNumber' => $invoice->customer_phoneNumber,
                        'address' => $invoice->customer_address,
                    ],
                    'created_at' => $invoice->book_created_at,
                    'memilihs' => [],
                ];

                if (!isset($invoiceDTOs[$invoice->invoice_id])) {
                    $invoiceDTOs[$invoice->invoice_id] = $invoiceDTO;
                }

                $bookingId = $bookingData['id'];
                if (!isset($invoiceDTOs[$invoice->invoice_id]['bookings'][$bookingId])) {
                    $invoiceDTOs[$invoice->invoice_id]['bookings'][$bookingId] = $bookingData;
                }

                $invoiceDTOs[$invoice->invoice_id]['bookings'][$bookingId]['memilihs'][] = [
                    'kode' => $invoice->product_kode,
                    'nama' => $invoice->product_nama,
                    'hargaJual' => $invoice->product_hargaJual,
                    'qty' => $invoice->memilih_qty,
                ];
            }

            return $invoiceDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
