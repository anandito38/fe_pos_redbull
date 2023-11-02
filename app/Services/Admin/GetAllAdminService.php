<?php

namespace App\Services\Admin;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Admin\GetAllAdminRepository;

class GetAllAdminService {
    public function __construct(
        private GetAllAdminRepository $adminRepository
    ) {}

    /**
     * Get all admin
     * @return array
     */
    public function getAllAdmin(Request $request) {
        try {
            return $this->adminRepository->getAllAdmin($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
