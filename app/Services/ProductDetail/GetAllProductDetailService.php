<?php

namespace App\Services\ProductDetail;

use Exception;
use App\Repositories\ProductDetail\GetAllProductDetailRepository;

class GetAllProductDetailService
{
    public function __construct(
        private GetAllProductDetailRepository $productDetailRepository,
    ) {}

    public function getAllProductDetail($productId)
    {
        try {
            $result = $this->productDetailRepository->getAllProductDetail($productId);

            $productData = collect($result['product']->getAttributes())->toArray();

            $vendorsData = collect($result['vendors'])->map(function ($vendor) {
                return collect($vendor->getAttributes())->toArray();
            })->toArray();

            return [
                'product' => $productData,
                'vendors' => $vendorsData,
            ];
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
