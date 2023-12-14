<?php

namespace App\Repositories\Payment;

use Exception;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Invoice\AddInvoiceRepository;

class EditPaymentRepository
{
    public function __construct(
        private AddInvoiceRepository $addInvoiceRepository
    )
    {}

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

            $booking = Booking::where('id', $payment->booking_id)->first();

            if ($booking) {
                $booking->is_payment = true;
                $booking->save();
            }

            // $invoiceData = [
            //     'payment_id' => $payment->id,
            // ];

            $this->addInvoiceRepository->addInvoice($payment->id);

            return $payment;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
