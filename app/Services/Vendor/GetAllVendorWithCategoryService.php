<?php

namespace App\Services\Vendor;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Vendor\GetAllVendorWithCategoryRepository;

class GetAllVendorWithCategoryService {
    public function __construct(
        private GetAllVendorWithCategoryRepository $vendorRepository
    ) {}

    /**
     * Get all Vendor with Category name
     * @param Request $request
     * @return array VendorDTO, Category name
     */
    public function getAllVendorWithCategory(Request $request) {
        try {
            return $this->vendorRepository->getAllVendorWithCategoryRepository($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
