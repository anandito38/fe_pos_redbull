<?php

namespace App\Services\ProductDetail;

use Exception;
use App\Repositories\ProductDetail\GetAllProductDetailRepository;
use App\DTO\MemproduksiDTO;

class GetAllProductDetailService
{
    public function __construct(
        private GetAllProductDetailRepository $productDetailRepository
    ) {}

    public function getAllProductDetail(MemproduksiDTO $productDetailDTO)
    {
        try {
            return $this->productDetailRepository->getAllProductDetail($productDetailDTO);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
