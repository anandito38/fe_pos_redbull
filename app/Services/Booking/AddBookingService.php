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
                'quantity' => 'required',
                'kode' => 'required',
                'totalHarga' => 'required',
                'customer_id' => 'required|exists:customers,id'
            ]);

            $bookingDTO = new BookingDTO(
                id : null,
                quantity : $request->quantity,
                kode : $request->kode,
                totalHarga : $request->totalHarga,
                customer_id : $request->customer_id,
            );

            $bookingResult = $this->addBookingRepository->AddBooking($bookingDTO);

            return ([
                'kode' => $bookingResult->getKode(),
                'totalHarga' => $bookingResult->getTotalHarga()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
