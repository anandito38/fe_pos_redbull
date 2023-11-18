<?php

namespace App\Repositories\Product;

use Exception;

use App\DTO\ProductDTO;
use App\Models\Product;

class EditProductRepository {
    /**
     * Edit Product
     * @param ProductDTO $ProductDTO
     * @return ProductDTO
     */
    public function editProduct(ProductDTO $productDTO) {
        try {
            $product = Product::find($productDTO->id);
            $product->nama = strtoupper($productDTO->nama);

            $words = explode(' ', strtoupper($productDTO->nama));

            $codeWords = array_map(function($word) {
                return substr($word, 0, 3);
            }, $words);

            $productCode = strtoupper(implode('-', $codeWords));

            $product->kode = $productCode;
            $product->hargaJual = $productDTO->hargaJual;
            $product->quantity = $productDTO->quantity;
            $product->save();

            return $product;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
