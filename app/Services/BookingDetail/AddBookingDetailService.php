<?php

namespace App\Services\BookingDetail;

use Exception;
use App\Repositories\BookingDetail\AddBookingDetailRepository;

class AddBookingDetailService
{
    public function __construct(
        private AddBookingDetailRepository $addBookingDetailRepository
    ) {}

    public function AddBookingDetail(int $idBooking, int $idProduct, int $qtyMemilih)
    {
        try {
            return $this->addBookingDetailRepository->AddBookingDetail($idBooking, $idProduct, $qtyMemilih);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
