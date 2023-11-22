<?php

namespace App\Services\Booking;

use Illuminate\Http\Request;

use App\DTO\BookingDTO;
use Exception;

use App\Repositories\Booking\AddBookingRepository;


class AddBookingService {
    public function __construct(
        private AddBookingRepository $addBookingRepository
    ) {}

    /**
     * Register new Booking
     * @param Request $request
     * @return BookingDTO
     */
    public function addBooking(Request $request) {
        try {
            $request->validate([
                'customer_id' => 'required|exists:customers,id'
            ]);

            $bookingDTO = new BookingDTO(
                id : null,
                customer_id : $request->customer_id,
            );

            $bookingResult = $this->addBookingRepository->AddBooking($bookingDTO);

            return ([
                'customer_id' => $bookingResult->getCustomer_id()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
