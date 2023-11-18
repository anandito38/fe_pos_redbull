<?php

namespace App\Services\Product;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Product\GetAllProductRepository;

class GetAllProductService {
    public function __construct(
        private GetAllProductRepository $productRepository
    ) {}

    /**
     * Get all Product
     * @return array
     */
    public function getAllProduct(Request $request) {
        try {
            return $this->productRepository->getAllProduct($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
