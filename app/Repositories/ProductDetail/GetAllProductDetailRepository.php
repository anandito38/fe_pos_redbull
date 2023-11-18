<?php

namespace App\Repositories\ProductDetail;

use Exception;
use App\Models\ProductDetail;
use App\DTO\MemproduksiDTO;

class GetAllProductDetailRepository
{
    public function getAllProductDetail(MemproduksiDTO $productDetailDTO)
    {
        try {
            $productDetail = ProductDetail::find($productDetailDTO->idProduct);

            if (!$productDetail) {
                throw new Exception('ProductDetail not found');
            }

            return $productDetail;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
