<?php

namespace App\Repositories\Customer;

use Exception;

use App\DTO\CustomerDTO;
use App\Models\Customer;

class EditCustomerRepository {
    /**
     * Edit customer
     * @param CustomerDTO $CustomerDTO
     * @return CustomerDTO
     */
    public function editCustomer(CustomerDTO $customerDTO) {
        try {
            $customer = Customer::find($customerDTO->id);
            $customer->fullName = $customerDTO->fullName;
            $customer->nickname = $customerDTO->nickname;
            $customer->phoneNumber = $customerDTO->phoneNumber;
            $customer->address = $customerDTO->address;
            $customer->save();

            return $customer;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
