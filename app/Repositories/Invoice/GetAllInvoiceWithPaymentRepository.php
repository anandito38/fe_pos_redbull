<?php

namespace App\Repositories\Invoice;

use Exception;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetAllInvoiceWithPaymentRepository
{
    public function getAllInvoiceWithPayment(Request $request)
    {
        try {
            $invoices = Invoice::join('payments', 'invoices.payment_id', '=', 'payments.id')
                ->join('bookings', 'payments.booking_id', '=', 'bookings.id')
                ->leftJoin('users', 'payments.admin_id', '=', 'users.id')
                ->leftJoin('customers', 'bookings.customer_id', '=', 'customers.id')
                ->select(
                    'invoices.id AS invoice_id',
                    'invoices.payment_id',
                    'payments.metode AS payment_metode',
                    'payments.updated_at AS payment_updated_at',
                    'users.nickname AS admin_nickname',
                    'bookings.id AS booking_id',
                    'bookings.kode',
                    'bookings.totalHarga',
                    'customers.fullname AS customer_fullname',
                    'customers.phoneNumber AS customer_phoneNumber',
                    'bookings.created_at AS book_created_at'
                )
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
                        ],
                    ],
                    'booking' => [
                        'id' => $invoice->booking_id,
                        'kode' => $invoice->kode,
                        'totalHarga' => $invoice->totalHarga,
                        'customer' => [
                            'fullname' => $invoice->customer_fullname,
                            'phoneNumber' => $invoice->customer_phoneNumber,
                        ],
                        'created_at' => $invoice->book_created_at,
                    ],
                ];

                if (!isset($invoiceDTOs[$invoice->invoice_id])) {
                    $invoiceDTOs[$invoice->invoice_id] = $invoiceDTO;
                }
            }


            return $invoiceDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
