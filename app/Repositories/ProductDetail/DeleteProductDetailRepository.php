<?php

namespace App\Repositories\ProductDetail;

use Exception;
use App\Models\ProductDetail;

class DeleteProductDetailRepository
{
    public function DeleteProductDetail(int $idProduct, int $idVendor)
    {
        try {
            $relation = ProductDetail::where('idProduct', $idProduct)
                ->where('idVendor', $idVendor)
                ->first();

            if (!$relation) {
                throw new Exception('Product-Vendor relation not found');
            }

            $relation->delete();

            return $relation;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
