<?php

namespace App\Services\Booking;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BookingDTO;

use App\Repositories\Booking\EditBookingRepository;

class EditBookingService {
    public function __construct(
        private EditBookingRepository $bookingRepository
    ) {}

    /**
     * Edit Booking
     * @param Request $request
     * @return BookingDTO
     */
    public function editVendor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:bookings,id',
                'quantity' => 'required',
                'kode' => 'required',
                'totalHarga' => 'required',
                'customer_id' => 'exists:customers,id'
            ]);

            $bookingDTO = new BookingDTO(
                id: $request->id,
                quantity: $request->quantity,
                kode: $request->kode,
                totalHarga: $request->totalHarga,
                customer_id: $request->customer_id
            );

            $bookingDTO = $this->bookingRepository->editBooking($bookingDTO);

            return $bookingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
