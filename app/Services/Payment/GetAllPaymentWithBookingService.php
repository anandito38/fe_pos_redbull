<?php

namespace App\Services\Payment;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Payment\GetAllPaymentWithBookingRepository;

class GetAllPaymentWithBookingService {
    public function __construct(
        private GetAllPaymentWithBookingRepository $paymentRepository
    ) {}

    /**
     * Get all Payment with Booking name
     * @param Request $request
     * @return array PaymentDTO, Booking name
     */
    public function getAllPaymentWithBooking(Request $request) {
        try {
            return $this->paymentRepository->getAllPaymentWithBookingRepository($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
