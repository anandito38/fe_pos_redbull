<?php

namespace App\Repositories\Vendor;

use Exception;

use App\DTO\VendorDTO;
use App\Models\Vendor;

class DeleteVendorRepository {
    /**
     * Delete Vendor
     * @param VendorDTO $VendorDTO
     * @return VendorDTO
     */
    public function deleteVendor(VendorDTO $vendorDTO) {
        try {
            $vendor = Vendor::findOrFail($vendorDTO->id);
            $vendor->delete();

            return $vendor;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
