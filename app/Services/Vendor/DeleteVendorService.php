<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\DTO\VendorDTO;

use App\Repositories\Vendor\DeleteVendorRepository;

class DeleteVendorService {
    public function __construct(
        private DeleteVendorRepository $vendorRepository
    ) {}

    /**
     * Delete Vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function deleteVendor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:vendors,id',
            ]);

            $vendorDTO = new VendorDTO(
                id : $request->id
            );

            $vendorDTO = $this->vendorRepository->deleteVendor($vendorDTO);

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
