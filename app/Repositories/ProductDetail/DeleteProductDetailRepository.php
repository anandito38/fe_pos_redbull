<?php

namespace App\Repositories\ProductDetail;

use App\Models\Memproduksi;
use Exception;

class DeleteProductDetailRepository
{
    public function DeleteProductDetail(int $idProduct, int $idVendor)
    {
        try {
            $relation = Memproduksi::where('idProduct', $idProduct)
                ->where('idVendor', $idVendor)
                ->first();

            if (!$relation) {
                throw new Exception('Product-Vendor relation not found');
            }else{
                Memproduksi::where('idProduct', $idProduct)
                ->where('idVendor', $idVendor)
                ->delete();
            }

            return $relation;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
