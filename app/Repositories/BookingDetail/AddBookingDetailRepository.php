<?php

namespace App\Repositories\BookingDetail;

use App\Models\Memilih;
use Exception;
use App\Models\Booking;
use App\Models\Product;

class AddBookingDetailRepository
{
    public function AddBookingDetail(int $idBooking, int $idProduct, int $qty)
    {
        try {
            $book = Booking::find($idBooking);
            $product = Product::find($idProduct);

            if (!$book || !$product) {
                throw new Exception('Booking or Product not found');
            }

            $existingRelation = Memilih::where('idBook', $idBooking)
                ->where('idProduct', $idProduct)
                ->first();

            if ($existingRelation) {
                throw new Exception('The product already exists, updated the quantity');
            }

            $memilih = new Memilih();
            $memilih->idBook = $idBooking;
            $memilih->idProduct = $idProduct;
            $memilih->qtyMemilih = $qty;
            $memilih->save();

            $product->quantity -= $qty;
            $product->save();

            $book->totalHarga += $product->hargaJual * $qty;
            $book->quantity += $qty;
            $book->save();

            return $memilih;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
