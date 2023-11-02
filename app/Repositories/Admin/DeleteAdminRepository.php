<?php

namespace App\Repositories\Admin;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class DeleteAdminRepository {
    /**
     * Delete Admin
     * @param UserDTO $UserDTO
     * @return UserDTO
     */
    public function deleteAdmin(UserDTO $userDTO) {
        try {
            $user = User::findOrFail($userDTO->id);
            $user->delete();

            return $user;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
