<?php

namespace App\Repositories\Payment;

use Exception;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class EditPaymentRepository
{
    public function editPayment($request)
    {
        try {
            $paymentId = $request->input('id');
            $metode = $request->input('metode');

            $loggedInUser = Auth::user();

            $payment = Payment::find($paymentId);

            if (!$payment) {
                throw new Exception('Payment not found');
            }

            $payment->admin_id = $loggedInUser->id;
            $payment->metode = $metode;
            $payment->status = true;
            $payment->save();

            return $payment;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
