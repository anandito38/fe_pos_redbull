<?php

namespace App\Services\BookingDetail;

use Exception;
use App\Repositories\BookingDetail\DeleteBookingDetailRepository;

class DeleteBookingDetailService
{
    public function __construct(
        private DeleteBookingDetailRepository $deleteBookingDetailRepository
    ) {}

    public function DeleteBookingDetail(int $idBooking, int $idProduct)
    {
        try {
            return $this->deleteBookingDetailRepository->DeleteBookingDetail($idBooking, $idProduct);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
