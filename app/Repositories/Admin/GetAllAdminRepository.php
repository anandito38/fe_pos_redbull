<?php

namespace App\Repositories\Admin;

use Exception;

use App\Models\User;
use App\DTO\UserDTO;

class GetAllAdminRepository
{
    public function getAllAdmin()
    {
        try{
            $admins = User::all();

            $adminDTOs = [];
            foreach ($admins as $admin) {
                $adminDTO = new UserDTO(
                    id: $admin->id,
                    nickname: $admin->nickname,
                    fullName: $admin->fullName,
                    phoneNumber : $admin->phoneNumber,
                    address : $admin->address,
                    role : $admin->role
                );

                array_push($adminDTOs, $adminDTO);
            }

            return $adminDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
