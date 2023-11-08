<?php

namespace App\Services\Customer;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\DTO\CustomerDTO;
use Exception;

use App\Repositories\Customer\AddCustomerRepository;


class AddCustomerService {
    public function __construct(
        private AddCustomerRepository $addCustomerRepository
    ) {}

    /**
     * Register new customer
     * @param Request $request
     * @return CustomerDTO
     */
    public function addCustomer(Request $request) {
        try {
            $request->validate([
                'fullName' => 'required',
                'nickname' => 'required',
                'phoneNumber' => 'required',
                'address' => 'required'
            ]);

            $customerDTO = new CustomerDTO(
                id : null,
                fullName : $request->fullName,
                nickname : $request->nickname,
                phoneNumber : $request->phoneNumber,
                address : $request->address,
            );

            $userResult = $this->addCustomerRepository->AddCustomer($customerDTO);

            return ([
                'fullName' => $userResult->getFullName(),
                'nickname' => $userResult->getNickname(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
