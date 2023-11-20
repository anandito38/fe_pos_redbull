<?php

namespace App\Services\ProductDetail;

use Exception;
use App\Repositories\ProductDetail\DeleteProductDetailRepository;

class DeleteProductDetailService
{
    public function __construct(
        private DeleteProductDetailRepository $deleteProductDetailRepository
    ) {}

    public function DeleteProductDetail(int $idProduct, int $idVendor)
    {
        try {
            return $this->deleteProductDetailRepository->DeleteProductDetail($idProduct, $idVendor);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
