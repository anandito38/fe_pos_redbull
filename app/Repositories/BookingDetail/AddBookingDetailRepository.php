<?php

namespace App\Repositories\BookingDetail;

use App\Models\Memilih;
use Exception;
use App\Models\Booking;
use App\Models\Product;

class AddBookingDetailRepository
{
    public function AddBookingDetail(int $idBooking, int $idProduct)
    {
        try {
            $book = Booking::find($idBooking);
            $product = Product::find($idProduct);

            if (!$book || !$product) {
                throw new Exception('Booking or Product not found');
            }

            // Cek apakah relasi product dan vendor sudah ada
            $existingRelation = Memilih::where('idBook', $idBooking)
                ->where('idProduct', $idProduct)
                ->first();

            if ($existingRelation) {
                throw new Exception('This booking and product relation already exists');
            }

            // Tambahkan relasi product dan vendor ke tabel Memproduksi
            $memilih = new Memilih();
            $memilih->idBook = $idBooking;
            $memilih->idProduct = $idProduct;
            $memilih->save();

            return $memilih;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
