<?php

namespace App\Services\Admin;

use Exception;
use Illuminate\Http\Request;

use App\DTO\UserDTO;

use App\Repositories\Admin\EditAdminRepository;

class EditAdminService {
    public function __construct(
        private EditAdminRepository $adminRepository
    ) {}

    /**
     * Edit admin
     * @param Request $request
     * @return UserDTO
     */
    public function editAdmin(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:users,id',
                'fullName' => 'required',
                'phoneNumber' => 'required',
                'address' => 'required',
            ]);

            $userDTO = new UserDTO(
                id: $request->id,
                nickname: $request->nickname,
                fullName: $request->fullName,
                phoneNumber: $request->phoneNumber,
                role: $request->role,
                address: $request->address
            );

            $userDTO = $this->adminRepository->editAdmin($userDTO);

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
