<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;
use App\DTO\CustomerDTO;

class GetAllCustomerRepository
{
    public function getAllCustomer()
    {
        try{
            $customers = Customer::all();

            $customerDTOs = [];
            foreach ($customers as $customer) {
                $customerDTO = new CustomerDTO(
                    id: $customer->id,
                    fullName: $customer->fullName,
                    nickname: $customer->nickname,
                    phoneNumber : $customer->phoneNumber,
                    address : $customer->address,
                );

                array_push($customerDTOs, $customerDTO);
            }

            return $customerDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
