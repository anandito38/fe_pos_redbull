<?php

namespace App\Repositories\BookingDetail;

use App\Models\Memilih;
use Exception;

class DeleteBookingDetailRepository
{
    public function DeleteBookingDetail(int $idBooking, int $idProduct)
    {
        try {
            $relation = Memilih::where('idBook', $idBooking)
                ->where('idProduct', $idProduct)
                ->first();

            if (!$relation) {
                throw new Exception('Product-Product relation not found');
            }else{
                Memilih::where('idBook', $idBooking)
                ->where('idProduct', $idProduct)
                ->delete();
            }



            return $relation;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
