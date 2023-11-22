<?php

namespace App\Repositories\Customer;

use Exception;
use App\Models\Customer;

class GetCustomerByIdRepository
{
    /**
     * Find customer by ID
     *
     * @param int $customerId
     * @return Customer|null
     * @throws Exception
     */
    public function GetCustomerById($customerId)
    {
        try {
            $customer = Customer::findOrFail($customerId);

            return $customer;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
