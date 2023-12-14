<?php

namespace App\Repositories\Booking;

use Exception;

use App\Models\Booking;

class GetAllBookingWithCustomerRepository
{
    public function getAllBookingWithCustomerRepository()
    {
        try{
            $bookings = Booking::join('customers', 'bookings.customer_id', '=', 'customers.id')
                ->select('bookings.*', 'customers.nickname', 'customers.phoneNumber')->get();

            $bookingDTOs = [];

            foreach ($bookings as $booking) {
                $bookingDTO = [
                    'id' => $booking->id,
                    'quantity' => $booking->quantity,
                    'kode' => $booking->kode,
                    'totalHarga' => $booking->totalHarga,
                    'is_payment' => $booking->is_payment,
                    'customer_id' => $booking->customer_id,
                    'customer_nickname' => $booking->nickname,
                    'customer_phoneNumber' => $booking->phoneNumber,
                ];

                array_push($bookingDTOs, $bookingDTO);
            }

            return $bookingDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
