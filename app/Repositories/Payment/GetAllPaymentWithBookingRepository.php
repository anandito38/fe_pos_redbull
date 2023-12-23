<?php

namespace App\Repositories\Payment;

use Exception;
use App\Models\Payment;

class GetAllPaymentWithBookingRepository
{
    public function getAllPaymentWithBookingRepository()
    {
        try {
            $payments = Payment::join('bookings', 'payments.booking_id', '=', 'bookings.id')
                ->leftJoin('users', function($join) {
                    $join->on('payments.admin_id', '=', 'users.id')
                        ->whereNotNull('payments.admin_id');
                })
                ->select(
                    'payments.id AS payment_id',
                    'payments.barcode',
                    'payments.status',
                    'payments.metode',
                    'payments.admin_id',
                    'payments.booking_id',
                    'payments.updated_at AS payment_updated_at',
                    'bookings.quantity',
                    'bookings.kode',
                    'bookings.totalHarga',
                    'bookings.created_at AS book_created_at',
                    'users.nickname',
                )->get();


            $paymentDTOs = [];

            foreach ($payments as $payment) {
                $paymentDTO = [
                    'id' => $payment->payment_id,
                    'barcode' => $payment->barcode,
                    'status' => $payment->status,
                    'metode' => $payment->metode,
                    'payment_updated_at' => $payment->payment_updated_at,
                    'booking_id' => $payment->booking_id,
                    'book_created_at' => $payment->book_created_at,
                    'quantity' => $payment->quantity,
                    'kode' => $payment->kode,
                    'totalHarga' => $payment->totalHarga,
                    'admin_id' => $payment->admin_id,
                    'nickname' => $payment->nickname,
                ];

                array_push($paymentDTOs, $paymentDTO);
            }

            return $paymentDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

