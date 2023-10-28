<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

use App\Repositories\Auth\LoginRepository;

class LoginService {
    public function __construct(
        // Repository
        private LoginRepository $loginRepository
    ) {}

    /**
     * Login new user
     * @param Request $request
     * @return UserDTO
     */
    public function login(Request $request) {
        try {
            // Validate user data
            $request->validate([
                'nickname' => 'required|exists:users',
                'password' => 'required',
            ]);

            $userDTO = new UserDTO(
                id: null,
                nickname: $request->nickname,
                password: $request->password,
            );

            // Get user from database
            $validUserDTO = $this->loginRepository->login($userDTO);

            return ([
                'fullName' => $validUserDTO->getFullName(),
                'nickname' => $validUserDTO->getNickname(),
                'role' => $validUserDTO->getRole(),
                'token' => $validUserDTO->getToken(),
                'status' => 'success'
            ]);

        } catch (Exception $error) {
            return ([
                'status' => 'error',
                'message' => $error->getMessage(),
            ]);
        }
    }
}

?>
