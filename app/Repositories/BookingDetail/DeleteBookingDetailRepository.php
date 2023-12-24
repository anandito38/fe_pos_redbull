<?php

namespace App\Repositories\BookingDetail;

use App\Models\Memilih;
use App\Models\Product;
use App\Models\Booking;
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
                $tempQty = $relation->qtyMemilih;

                $book = Booking::find($idBooking);
                $product = Product::find($idProduct);

                $book->totalHarga -= $product->hargaJual * $tempQty;
                $book->quantity -= $tempQty;
                $book->save();

                $product->quantity += $tempQty;
                $product->save();

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
