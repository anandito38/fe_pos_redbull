<?php

namespace App\Repositories\ProductDetail;

use Exception;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\ProductDetail;

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
            $existingRelation = ProductDetail::where('idProduct', $idProduct)
                ->where('idVendor', $idVendor)
                ->first();

            if ($existingRelation) {
                throw new Exception('This product and vendor relation already exists');
            }

            // Tambahkan relasi product dan vendor ke tabel Memproduksi
            $memproduksi = new ProductDetail();
            $memproduksi->idProduct = $idProduct;
            $memproduksi->idVendor = $idVendor;
            $memproduksi->save();

            return $memproduksi;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
