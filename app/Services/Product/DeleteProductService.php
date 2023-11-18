<?php

namespace App\Services\Product;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ProductDTO;

use App\Repositories\Product\DeleteProductRepository;

class DeleteProductService {
    public function __construct(
        private DeleteProductRepository $productRepository
    ) {}

    /**
     * Delete Product
     * @param Request $request
     * @return ProductDTO
     */
    public function deleteProduct(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:products,id',
            ]);

            $productDTO = new ProductDTO(
                id : $request->id
            );

            $productDTO = $this->productRepository->deleteProduct($productDTO);

            return $productDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
