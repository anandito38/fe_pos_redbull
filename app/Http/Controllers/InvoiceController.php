<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Services\Invoice\GetAllInvoiceWithPaymentService;

class InvoiceController extends Controller
{
    public function __construct(
        private GetAllInvoiceWithPaymentService $getAllInvoiceWithPaymentService
    ) {}

    /**
     * Get all Invoice
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllInvoiceWithPayment(Request $request) {
        try {
            $resultData = $this->getAllInvoiceWithPaymentService->GetAllInvoice($request);
            $invoiceInfo = array_values($resultData);
            // dd($invoiceInfo);
            return view('sales.invoice', ['invoiceInfo' => $invoiceInfo]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }
}

