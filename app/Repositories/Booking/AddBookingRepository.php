<?php

namespace App\Repositories\Booking;

use App\Repositories\Customer\GetCustomerByIdRepository;
use Exception;
use App\DTO\BookingDTO;
use App\Models\Booking;

class AddBookingRepository {
    public function __construct(
        private GetCustomerByIdRepository $getCustomerByIdRepository
    )
    {}
    /**
     * Register new Booking
     * @param BookingDTO $BookingDTO
     * @return BookingDTO
     */
    public function AddBooking(BookingDTO $bookingDTO) {
        try {
            $dataCustomer = $this->getCustomerByIdRepository->GetCustomerById($bookingDTO->customer_id);
            $newCustomer = collect($dataCustomer->getAttributes())->toArray();

            $booking = new Booking();
            $booking->quantity = 0;
            $booking->totalHarga = 0;
            $booking->customer_id = $bookingDTO->customer_id;

            $nameArray = explode(' ', $newCustomer["fullName"]);
            $tanggalFormatted = date_create_from_format('dmY', date('dmY'))->format('dmy');
            $waktuFormatted = date_create_from_format('H:i:s', date('H:i:s'))->format('H:i');
            $lastDigits = substr($newCustomer["phoneNumber"], -4);
            $booking->kode = sprintf("%s/%s/%s/%s", str_replace(' ', '/', strtoupper($nameArray[0])), $lastDigits, $tanggalFormatted, $waktuFormatted);

            $booking->save();
            return $bookingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
