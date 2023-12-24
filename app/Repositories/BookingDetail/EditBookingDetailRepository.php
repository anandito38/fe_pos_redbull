<?php

namespace App\Repositories\BookingDetail;

use Exception;
use App\Models\Memilih;
use App\Models\Product;
use App\Models\Booking;

class EditBookingDetailRepository
{
    public function EditBookingDetail(int $idBooking, int $idProduct, int $qty)
    {
        try {
            $relation = Memilih::where('idBook', $idBooking)
                ->where('idProduct', $idProduct)
                ->first();

            if (!$relation) {
                throw new Exception('Product-Product relation not found');
            }else{
                $tempQty = $relation->qtyMemilih;

                Memilih::where('idBook', $idBooking)
                ->where('idProduct', $idProduct)
                ->delete();

                $memilih = new Memilih();
                $memilih->idBook = $idBooking;
                $memilih->idProduct = $idProduct;
                $memilih->qtyMemilih = $qty;
                $memilih->save();

                $book = Booking::find($idBooking);
                $product = Product::find($idProduct);

                $book->totalHarga = ($book->totalHarga - ($tempQty * $product->hargaJual)) + $product->hargaJual * $qty;
                $book->quantity = ($book->quantity - $tempQty) + $qty;
                $book->save();

                $product->quantity = ($product->quantity - $tempQty) + $qty;
                $product->save();

            }



            return $relation;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
