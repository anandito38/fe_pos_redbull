<?php

namespace App\Services\BookingDetail;

use Exception;
use App\Repositories\BookingDetail\GetAllBookingDetailRepository;

class GetAllBookingDetailService
{
    public function __construct(
        private GetAllBookingDetailRepository $bookingDetailRepository,
    ) {}

    public function getAllBookingDetail($bookingId)
    {
        try {
            $result = $this->bookingDetailRepository->getAllBookingDetail($bookingId);

            $bookingData = collect($result['booking']->getAttributes())->toArray();

            $productsData = collect($result['products'])->map(function ($vendor) {
                return collect($vendor->getAttributes())->toArray();
            })->toArray();

            return [
                'booking' => $bookingData,
                'products' => $productsData,
            ];
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
