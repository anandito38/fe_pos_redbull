<?php

namespace App\Repositories\Invoice;

use Exception;
use App\Models\Invoice;

class AddInvoiceRepository
{
    public function addInvoice($paymentId)
    {
        try {
            $invoice = new Invoice();
            $invoice->payment_id = $paymentId;
            $invoice->save();

            return $invoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
