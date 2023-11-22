<?php

namespace App\Services\Vendor;

use Illuminate\Http\Request;

use App\DTO\VendorDTO;
use Exception;

use App\Repositories\Vendor\AddVendorRepository;


class AddVendorService {
    public function __construct(
        private AddVendorRepository $addVendorRepository
    ) {}

    /**
     * Register new vendor
     * @param Request $request
     * @return VendorDTO
     */
    public function addVendor(Request $request) {
        try {
            $request->validate([
                'namaBarang' => 'required|unique:vendors',
                'merek' => 'required',
                'quantity' => 'required',
                'hargaModal' => 'required',
                'category_id' => 'required|exists:categories,id'
            ]);

            $vendorDTO = new VendorDTO(
                id : null,
                namaBarang: $request->namaBarang,
                merek : $request->merek,
                quantity : $request->quantity,
                hargaModal : $request->hargaModal,
                category_id : $request->category_id,
            );

            $vendorResult = $this->addVendorRepository->AddVendor($vendorDTO);

            return ([
                'namaBarang' => $vendorResult->getNamaBarang(),
                'merek' => $vendorResult->getMerek()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
