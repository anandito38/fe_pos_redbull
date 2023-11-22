<?php

namespace App\Services\Booking;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Booking\GetAllBookingWithCustomerRepository;

class GetAllBookingWithCustomerService {
    public function __construct(
        private GetAllBookingWithCustomerRepository $bookingRepository
    ) {}

    /**
     * Get all Booking with Customer name
     * @param Request $request
     * @return array BookingDTO, Customer name
     */
    public function getAllBookingWithCustomer(Request $request) {
        try {
            return $this->bookingRepository->getAllBookingWithCustomerRepository($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
