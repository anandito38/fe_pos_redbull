<?php

namespace App\Services\ProductDetail;

use Exception;
use App\Repositories\ProductDetail\AddProductDetailRepository;

class AddProductDetailService
{
    public function __construct(
        private AddProductDetailRepository $addProductDetailRepository
    ) {}

    public function AddProductDetail(int $idProduct, int $idVendor)
    {
        try {
            return $this->addProductDetailRepository->AddProductDetail($idProduct, $idVendor);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
