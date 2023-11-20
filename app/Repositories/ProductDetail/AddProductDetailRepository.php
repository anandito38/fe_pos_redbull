<?php

namespace App\Repositories\ProductDetail;

use App\Models\Memproduksi;
use Exception;
use App\Models\Product;
use App\Models\Vendor;

class AddProductDetailRepository
{
    public function AddProductDetail(int $idProduct, int $idVendor)
    {
        try {
            $product = Product::find($idProduct);
            $vendor = Vendor::find($idVendor);

            if (!$product || !$vendor) {
                throw new Exception('Product or Vendor not found');
            }

            // Cek apakah relasi product dan vendor sudah ada
            $existingRelation = Memproduksi::where('idProduct', $idProduct)
                ->where('idVendor', $idVendor)
                ->first();

            if ($existingRelation) {
                throw new Exception('This product and vendor relation already exists');
            }

            // Tambahkan relasi product dan vendor ke tabel Memproduksi
            $memproduksi = new Memproduksi();
            $memproduksi->idProduct = $idProduct;
            $memproduksi->idVendor = $idVendor;
            $memproduksi->save();

            return $memproduksi;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
