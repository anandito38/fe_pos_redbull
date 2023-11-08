<?php

namespace App\Repositories\Customer;

use Exception;

use App\DTO\CustomerDTO;
use App\Models\Customer;

class DeleteCustomerRepository {
    /**
     * Delete Customer
     * @param CustomerDTO $CustomerDTO
     * @return CustomerDTO
     */
    public function deleteCustomer(CustomerDTO $customerDTO) {
        try {
            $customer = Customer::findOrFail($customerDTO->id);
            $customer->delete();

            return $customer;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
