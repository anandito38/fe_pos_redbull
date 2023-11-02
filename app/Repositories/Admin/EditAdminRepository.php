<?php

namespace App\Repositories\Admin;

use Exception;

use App\DTO\UserDTO;
use App\Models\User;

class EditAdminRepository {
    /**
     * Edit admin
     * @param UserDTO $UserDTO
     * @return UserDTO
     */
    public function editAdmin(UserDTO $userDTO) {
        try {
            $user = User::find($userDTO->id);
            $user->fullName = $userDTO->fullName;
            $user->phoneNumber = $userDTO->phoneNumber;
            $user->address = $userDTO->address;
            if($userDTO->role != null) {
                $user->role = $userDTO->role;
            }
            $user->save();

            return $user;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
