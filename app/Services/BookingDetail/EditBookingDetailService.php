<?php

namespace App\Services\BookingDetail;
use Exception;
use App\Repositories\BookingDetail\EditBookingDetailRepository;

class EditBookingDetailService
{
    public function __construct(
        private EditBookingDetailRepository $editBookingDetailRepository
    ) {}

    public function editBookingDetail(int $idBook, int $idProduct, int $qty) {
        try {
            return $this->editBookingDetailRepository->editBookingDetail($idBook, $idProduct, $qty);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
