<?php

namespace App\Repositories\Vendor;

use Exception;

use App\Models\Vendor;

class GetAllVendorWithCategoryRepository
{
    public function getAllVendorWithCategoryRepository()
    {
        try{
            $vendors = Vendor::join('categories', 'vendors.category_id', '=', 'categories.id')
                ->select('vendors.*', 'categories.namaCategory')->get();

            $vendorDTOs = [];

            foreach ($vendors as $vendor) {
                $vendorDTO = [
                    'id' => $vendor->id,
                    'namaBarang' => $vendor->namaBarang,
                    'merek' => $vendor->merek,
                    'quantity' => $vendor->quantity,
                    'hargaModal' => $vendor->hargaModal,
                    'category_id' => $vendor->category_id,
                    'category_name' => $vendor->namaCategory
                ];

                array_push($vendorDTOs, $vendorDTO);
            }

            return $vendorDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
