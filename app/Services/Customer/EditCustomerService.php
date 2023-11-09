<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CustomerDTO;

use App\Repositories\Customer\EditCustomerRepository;

class EditCustomerService {
    public function __construct(
        private EditCustomerRepository $customerRepository
    ) {}

    /**
     * Edit customer
     * @param Request $request
     * @return CustomerDTO
     */
    public function editCustomer(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:customers,id',
                'fullName' => 'required',
                'nickname' => 'required',
                'phoneNumber' => 'required',
                'address' => 'required'
            ]);

            $customerDTO = new CustomerDTO(
                id: $request->id,
                fullName: $request->fullName,
                nickname: $request->nickname,
                phoneNumber: $request->phoneNumber,
                address: $request->address
            );

            $customerDTO = $this->customerRepository->editCustomer($customerDTO);

            return $customerDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
