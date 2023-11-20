<?php

namespace App\Repositories\Product;

use Exception;

use App\Models\Product;
use App\DTO\ProductDTO;

class GetAllProductRepository
{
    public function getAllProduct()
    {
        try{
            $products = Product::all();

            $productDTOs = [];
            foreach ($products as $product) {
                $productDTO = new ProductDTO(
                    $product->id,
                    $product->nama,
                    $product->kode,
                    $product->hargaJual,
                    $product->quantity,
                    $product->external_id
                );

                array_push($productDTOs, $productDTO);
            }

            return $productDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
