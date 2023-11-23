<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class PaymentController extends Controller
{
    public function __construct(

    ) {}

    /**
     * Get all Payment
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPaymentWithBooking(Request $request) {
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

    public function editPayment(Request $request){
        try {
            // $resultData = $this->editBookingService->editBooking($request);

            toastr()->info('Payment updated successfully!', 'Payment', ['timeOut' => 3000]);
            return redirect('/payment')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Payment', ['timeOut' => 3000]);
            return redirect('/payment')->with('status', $error->getMessage());
        }
    }

}
