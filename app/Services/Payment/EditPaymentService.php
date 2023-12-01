<?php

namespace App\Services\Payment;

use Exception;
use App\Repositories\Payment\EditPaymentRepository;

class EditPaymentService
{
    public function __construct(
        private EditPaymentRepository $editpaymentRepository
    )
    {}

    public function editPayment($request){
        try {
            return $this->editpaymentRepository->editPayment($request);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
