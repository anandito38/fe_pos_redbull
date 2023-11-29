<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Admin\GetAllAdminService;
use App\Services\Payment\GetAllPaymentWithBookingService;

class PaymentController extends Controller
{
    public function __construct(
        private GetAllPaymentWithBookingService $getAllPaymentWithBookingService,
        private GetAllAdminService $getAllAdminService
    ) {}

    /**
     * Get all Payment
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPaymentWithBooking(Request $request) {
        try {
            $resultData = $this->getAllPaymentWithBookingService->getAllPaymentWithBooking($request);
            $dataAdmin = $this->getAllAdminService->getAllAdmin($request);
            return view('sales.payment', ['paymentInfo' => $resultData, 'adminInfo' => $dataAdmin]);

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
