<?php

namespace App\Services\Admin;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTO;

use App\Repositories\Admin\DeleteAdminRepository;

class DeleteAdminService {
    public function __construct(
        private DeleteAdminRepository $adminRepository
    ) {}

    /**
     * Delete admin
     * @param Request $request
     * @return UserDTO
     */
    public function deleteAdmin(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
            ]);

            $userDTO = new UserDTO(
                id : $request->id
            );

            $userDTO = $this->adminRepository->deleteAdmin($userDTO);

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
