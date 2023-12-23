<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Services\Invoice\GetAllInvoiceWithPaymentService;
use App\Services\Invoice\GetDetailInvoiceService;

class InvoiceController extends Controller
{
    public function __construct(
        private GetAllInvoiceWithPaymentService $getAllInvoiceWithPaymentService,
        private GetDetailInvoiceService $getDetailInvoiceService
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

            return view('sales.invoice', ['invoiceInfo' => $invoiceInfo]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function createInvoiceDetail($id){
        try {
            $resultData = $this->getDetailInvoiceService->getInvoiceDetailsById($id);
            $invoiceInfo = array_values($resultData);

            return view('sales.createInvoice', ['invoiceInfo' => $invoiceInfo]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }
}

