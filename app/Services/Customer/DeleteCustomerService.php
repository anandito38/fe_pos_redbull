<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CustomerDTO;

use App\Repositories\Customer\DeleteCustomerRepository;

class DeleteCustomerService {
    public function __construct(
        private DeleteCustomerRepository $customerRepository
    ) {}

    /**
     * Delete customer
     * @param Request $request
     * @return CustomerDTO
     */
    public function deleteCustomer(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:customers,id',
            ]);

            $customerDTO = new CustomerDTO(
                id : $request->id
            );

            $customerDTO = $this->customerRepository->deleteCustomer($customerDTO);

            return $customerDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
