<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class InvoiceController extends Controller
{
    public function __construct(

    ) {}

    /**
     * Get all Invoice
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllInvoiceWithPayment(Request $request) {
        try {
            // $resultData = $this->getAllBookingWithCustomerService->getAllBookingWithCustomer($request);
            // $dataCustomer = $this->getAllCustomerService->getAllCustomer($request);

            // return view('sales.booking', ['bookingInfo' => $resultData, 'customerInfo' => $dataCustomer]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

}
