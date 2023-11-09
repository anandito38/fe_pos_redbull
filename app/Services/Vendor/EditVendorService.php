<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\DTO\VendorDTO;

use App\Repositories\Vendor\EditVendorRepository;

class EditVendorService {
    public function __construct(
        private EditVendorRepository $vendorRepository
    ) {}

    /**
     * Edit Vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function editVendor(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:vendors,id',
                'namaBarang' => 'required',
                'merek' => 'required',
                'quantity' => 'required',
                'hargaModal' => 'required',
                'category_id' => 'exists:categories,id'
            ]);

            $vendorDTO = new VendorDTO(
                id: $request->id,
                namaBarang: $request->namaBarang,
                merek: $request->merek,
                quantity: $request->quantity,
                hargaModal: $request->hargaModal,
                category_id: $request->category_id
            );

            $vendorDTO = $this->vendorRepository->editVendor($vendorDTO);

            return $vendorDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
