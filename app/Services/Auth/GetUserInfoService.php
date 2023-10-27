<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use Exception;
use App\DTO\UserDTO;

class GetUserInfoService {
    public function __construct(
    ) {}

    /**
     * Get user info by id
     * @param Request $request
     * @return UserDTO
     */
    public function getUserInfo(Request $request) {
        try {
            $user_id = $request->user()->id;
            $user_email = $request->user()->email;
            $user_role = $request->user()->role;
            $user_name = $request->user()->name;

            $userDTO = new UserDTO(
                $user_id,
                $user_email,
                null,
                $user_name,
                null,
                null,
                $user_role,
                null,
                null
            );

            return $userDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
