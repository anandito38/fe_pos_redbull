<?php

namespace App\Repositories\BookingDetail;

use Exception;
use App\Models\Memilih;
use App\Models\Product;
use App\Models\Booking;

class GetAllBookingDetailRepository
{
    public function getAllBookingDetail($bookingId)
    {
        try {
            // Mengambil data dari tabel Booking berdasarkan ID
            $booking = Booking::join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->where('bookings.id', $bookingId)
            ->select('bookings.*', 'customers.nickname', 'customers.phoneNumber')
            ->first();

            if (!$booking) {
                throw new Exception('Booking not found');
            }

            // Mengambil ID semua produk yang terkait dengan booking dari tabel Memilih
            $selectedProductIds = Memilih::where('idBook', $bookingId)->pluck('idProduct')->toArray();

            // Mengambil semua data produk berdasarkan ID yang ditemukan di atas
            $productData = Product::whereIn('id', $selectedProductIds)->get();

            return [
                'booking' => $booking,
                'products' => $productData,
            ];
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
