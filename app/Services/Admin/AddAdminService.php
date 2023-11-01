<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\UserDTO;
use Exception;

use App\Repositories\Admin\AddAdminRepository;


class AddAdminService {
    public function __construct(
        private AddAdminRepository $addAdminRepository
    ) {}

    /**
     * Register new user
     * @param Request $request
     * @return UserDTO
     */
    public function addAdmin(Request $request) {
        try {
            $request->validate([
                'nickname' => 'required|unique:users',
                // 'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 'max:20'],
                'password' => 'required|min:8|max:20',
                'fullName' => 'required',
                'phoneNumber' => 'required',
                'role' => 'required',
                'address' => 'required'
            ]);

            $hashedPassword = Hash::make($request->password);

            $userDTO = new UserDTO(
                id : null,
                fullName : $request->fullName,
                nickname : $request->nickname,
                password : $hashedPassword,
                phoneNumber : $request->phoneNumber,
                address : $request->address,
                role : $request->role
            );

            $userResult = $this->addAdminRepository->AddAdmin($userDTO);

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
