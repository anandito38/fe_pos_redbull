<?php

namespace App\Repositories\Customer;

use Exception;
use App\DTO\CustomerDTO;

use App\Models\Customer;

class AddCustomerRepository {
    /**
     * Register new customer
     * @param CustomerDTO $customerDTO
     * @return CUstomerDTO
     */
    public function AddCustomer(CustomerDTO $customerDTO) {
        try {
            $customer = new Customer();
            $customer->fullName = $customerDTO->fullName;
            $customer->nickname = $customerDTO->nickname;
            $customer->phoneNumber = $customerDTO->phoneNumber;
            $customer->address = $customerDTO->address;
            $customer->save();

            return $customerDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
