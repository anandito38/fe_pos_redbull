<?php

namespace App\Services\Customer;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Customer\GetAllCustomerRepository;

class GetAllCustomerService {
    public function __construct(
        private GetAllCustomerRepository $customerRepository
    ) {}

    /**
     * Get all customer
     * @return array
     */
    public function getAllCustomer(Request $request) {
        try {
            return $this->customerRepository->getAllCustomer($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
