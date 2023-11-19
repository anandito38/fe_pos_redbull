<?php

namespace App\Repositories\ProductDetail;

use Exception;
use App\Models\Memproduksi;
use App\Models\Product;
use App\Models\Vendor;

class GetAllProductDetailRepository
{
    public function getAllProductDetail($productId)
    {
        try {

            // Mengambil data dari tabel Product berdasarkan ID
            $product = Product::with('vendors')->find($productId);
            if (!$product) {
                throw new Exception('Product not found');
            }

            // Mengambil data ID Vendor dari tabel Memproduksi berdasarkan ID Product
            $memproduksiData = Memproduksi::where('idProduct', $productId)->get();
            $vendorData = collect();

            // Mengambil data Vendor berdasarkan ID Vendor dari tabel Memproduksi
            foreach ($memproduksiData as $data) {
                $vendor = Vendor::find($data->idVendor);
                if ($vendor) {
                    $vendorData->push($vendor);
                }
            }

            return [
                'product' => $product,
                'vendors' => $vendorData,
            ];
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
