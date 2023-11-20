<?php

namespace App\Repositories\ProductDetail;

use App\Models\Product;
use Exception;

class GetExternalIdLinkRepository
{
    public function getExternalIdLink($externalId)
    {
        try {
            $product = Product::where('external_id', $externalId)->firstOrFail();

            return '<a href="/product/detail/' . $product->id . '">' . $externalId . '</a>';
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
