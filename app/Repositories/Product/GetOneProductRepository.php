<?php

namespace App\Repositories\Product;

use Exception;

use App\Models\Product;
use App\DTO\ProductDTO;

class GetOneProductRepository
{
    public function getOneProduct($productId)
    {
        try{
            return Product::find($productId);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
