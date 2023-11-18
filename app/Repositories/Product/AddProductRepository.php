<?php

namespace App\Repositories\Product;

use Exception;
use App\DTO\ProductDTO;

use App\Models\Product;

class AddProductRepository {
    /**
     * Register new Product
     * @param ProductDTO $ProductDTO
     * @return ProductDTO
     */

    public function AddProduct(ProductDTO $productDTO) {
        try {
            $product = new Product();
            $product->nama = strtoupper($productDTO->nama);
            $product->hargaJual = $productDTO->hargaJual;
            $product->quantity = $productDTO->quantity;

            $words = explode(' ', strtoupper($productDTO->nama));

            $codeWords = array_map(function($word) {
                return substr($word, 0, 3);
            }, $words);

            $productCode = strtoupper(implode('-', $codeWords));

            $product->kode = $productCode;
            $product->save();

            return $productDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
