<?php

namespace App\Repositories\Product;

use Exception;

use App\DTO\ProductDTO;
use App\Models\Product;

class DeleteProductRepository {
    /**
     * Delete Product
     * @param ProductDTO $ProductDTO
     * @return ProductDTO
     */
    public function deleteProduct(ProductDTO $productDTO) {
        try {
            $product = Product::findOrFail($productDTO->id);
            $product->delete();

            return $product;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
