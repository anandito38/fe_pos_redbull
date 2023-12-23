<?php

namespace App\Services\Invoice;
use Exception;
use App\Repositories\Invoice\GetDetailInvoiceRepository;

class GetDetailInvoiceService
{
    public function __construct(
        private GetDetailInvoiceRepository $getDetailInvoiceRepository
    ) {}

    public function getInvoiceDetailsById($id) {
        try {
            return $this->getDetailInvoiceRepository->getInvoiceDetailsById($id);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
