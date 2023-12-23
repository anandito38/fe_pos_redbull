<?php

namespace App\Services\Invoice;

use Exception;
use App\Repositories\Invoice\GetAllInvoiceWithPaymentRepository;
use Illuminate\Http\Request;

class GetAllInvoiceWithPaymentService {
    public function __construct(
        private GetAllInvoiceWithPaymentRepository $getAllInvoiceWithPaymentRepository
    ) {}

    /**
     * Get all Invoice
     * @return array
     */
    public function GetAllInvoice(Request $request) {
        try {
            return $this->getAllInvoiceWithPaymentRepository->getAllInvoiceWithPayment($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

