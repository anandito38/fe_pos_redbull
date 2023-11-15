<?php

namespace App\Repositories\Vendor;

use Exception;
use App\DTO\VendorDTO;

use App\Models\Vendor;

class AddVendorRepository {
    /**
     * Register new Vendor
     * @param VendorDTO $VendorDTO
     * @return VendorDTO
     */
    public function AddVendor(VendorDTO $vendorDTO) {
        try {
            $vendor = new Vendor();
            $vendor->namaBarang = $vendorDTO->namaBarang;
            $vendor->merek = $vendorDTO->merek;
            $vendor->quantity = $vendorDTO->quantity;
            $vendor->hargaModal = $vendorDTO->hargaModal;
            $vendor->category_id = $vendorDTO->category_id;
            $vendor->save();

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
