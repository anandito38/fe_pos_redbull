<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

use App\Repositories\Auth\RegisterRepository;


class RegisterService {
    public function __construct(
        // Repository
        private RegisterRepository $registerRepository
    ) {}

    /**
     * Register new user
     * @param Request $request
     * @return UserDTO
     */
    public function register(Request $request) {
        try {
            $request->validate([
                'nickname' => 'required|unique:users',
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 'max:20'],
                'fullName' => 'required',
                'phoneNumber' => 'required',
                'role' => 'required',
                'address' => 'required'
            ]);

            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                null,
                $request->nickname,
                $hashedPassword,
                $request->fullName,
                $request->phoneNumber,
                $request->role,
                $request->address,
                null
            );

            // Add user to database
            $userResult = $this->registerRepository->register($userDTO);

            return ([
                'fullName' => $userResult->getFullName(),
                'nickname' => $userResult->getNickname(),
                'role' => $userResult->getRole(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
