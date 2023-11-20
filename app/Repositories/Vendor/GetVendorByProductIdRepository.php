<?php

namespace App\Repositories\Vendor;

use Exception;

use App\Models\Memproduksi;

class GetVendorByProductIdRepository
{
    public function GetVendorByProductId($productId)
    {
        try{
            return Memproduksi::where('idProduct', $productId)->get();

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
