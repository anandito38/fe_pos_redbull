<?php

namespace App\Repositories\Payment;

use Exception;
use App\Models\Payment;

class EditPaymentRepository
{
    public function editPayment($request)
    {
        try {
            $paymentId = $request->input('id');
            $adminId = $request->input('admin_id');

            $payment = Payment::find($paymentId);

            if (!$payment) {
                throw new Exception('Payment not found');
            }

            $payment->admin_id = $adminId;
            $payment->status = true;
            $payment->save();

            return $payment;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
