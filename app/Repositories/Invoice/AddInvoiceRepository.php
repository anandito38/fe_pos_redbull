<?php

namespace App\Repositories\Invoice;

use Exception;
use App\Models\Invoice;

class AddInvoiceRepository
{
    public function addInvoice($data)
    {
        try {
            // Create a new invoice record
            $invoice = new Invoice($data);
            $invoice->save();

            return $invoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
