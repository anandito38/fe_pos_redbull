<?php

namespace App\Repositories\Payment;

use Exception;
use App\Models\Payment;

class AddPaymentRepository
{
    /**
     * Add a new payment.
     *
     * @param int $bookingId
     * @return Payment
     */
    public function addPayment(int $bookingId): Payment
    {
        try {
            $payment = new Payment();
            $payment->barcode = "test1.png";
            $payment->status = false;
            $payment->metode = null;
            $payment->admin_id = null;
            $payment->booking_id = $bookingId;
            $payment->save();

            return $payment;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
