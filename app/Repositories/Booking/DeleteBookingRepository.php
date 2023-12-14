<?php

namespace App\Repositories\Booking;

use Exception;
use App\DTO\BookingDTO;
use App\Models\Booking;
use App\Models\Payment;

class DeleteBookingRepository {
    /**
     * Delete Booking and associated Payment
     * @param BookingDTO $bookingDTO
     * @return BookingDTO
     */
    public function deleteBooking(BookingDTO $bookingDTO) {
        try {
            $booking = Booking::findOrFail($bookingDTO->id);

            $payment = Payment::where('booking_id', $booking->id)->first();
            if ($payment) {
                $payment->delete();
            }

            $booking->delete();

            return $booking;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
