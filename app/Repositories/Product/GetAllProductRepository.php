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
                    id: $product->id,
                    nama: $product->nama,
                    kode: $product->kode,
                    hargaJual: $product->hargaJual,
                    quantity: $product->quantity
                );

                array_push($productDTOs, $productDTO);
            }

            return $productDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
