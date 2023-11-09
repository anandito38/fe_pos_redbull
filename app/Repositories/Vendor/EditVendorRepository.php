<?php

namespace App\Repositories\Vendor;

use Exception;

use App\DTO\VendorDTO;
use App\Models\Vendor;

class EditVendorRepository {
    /**
     * Edit Vendor
     * @param VendorDTO $VendorDTO
     * @return VendorDTO
     */
    public function editVendor(VendorDTO $vendorDTO) {
        try {
            $vendor = Vendor::find($vendorDTO->id);
            $vendor->namaBarang = $vendorDTO->namaBarang;
            $vendor->merek = $vendorDTO->merek;
            $vendor->quantity = $vendorDTO->quantity;
            $vendor->hargaModal = $vendorDTO->hargaModal;
            if($vendorDTO->category_id != null) {
                $vendor->category_id = $vendorDTO->category_id;
            }
            $vendor->save();

            return $vendor;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
