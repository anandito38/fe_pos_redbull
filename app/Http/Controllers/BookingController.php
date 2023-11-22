<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Customer\GetAllCustomerService;
use App\Services\Booking\AddBookingService;
use App\Services\Booking\DeleteBookingService;
use App\Services\Booking\EditBookingService;
use App\Services\Booking\GetAllBookingWithCustomerService;
use App\Services\Customer\AddCustomerService;

class BookingController extends Controller
{
    public function __construct(
        private GetAllCustomerService $getAllCustomerService,
        private GetAllBookingWithCustomerService $getAllBookingWithCustomerService,
        private AddBookingService $addBookingService,
        private DeleteBookingService $deleteBookingService,
        private EditBookingService $editBookingService,
        private AddCustomerService $addCustomerService
    ) {}

    /**
     * Get all booking
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllBookWithCustomer(Request $request) {
        try {
            $resultData = $this->getAllBookingWithCustomerService->getAllBookingWithCustomer($request);
            $dataCustomer = $this->getAllCustomerService->getAllCustomer($request);

            return view('sales.booking', ['bookingInfo' => $resultData, 'customerInfo' => $dataCustomer]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function addBook(Request $request){
        try {
            $resultData = $this->addBookingService->AddBooking($request);

            toastr()->success('Booking added successfully!', 'Booking', ['timeOut' => 3000]);
            return redirect('/book')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Booking', ['timeOut' => 3000]);
            return redirect('/book')->with('status', $error->getMessage());
        }
    }

    public function deleteBook(Request $request){
        try {
            $resultData = $this->deleteBookingService->deleteBooking($request);

            toastr()->warning('Booking deleted successfully!', 'Booking', ['timeOut' => 3000]);
            return redirect('/book')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Booking', ['timeOut' => 3000]);
            return redirect('/book')->with('status', $error->getMessage());
        }
    }

    public function editBook(Request $request){
        try {
            $resultData = $this->editBookingService->editBooking($request);

            toastr()->info('Booking updated successfully!', 'Booking', ['timeOut' => 3000]);
            return redirect('/book')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Booking', ['timeOut' => 3000]);
            return redirect('/book')->with('status', $error->getMessage());
        }
    }

    public function addCustomerBook(Request $request){
        try {
            $resultData = $this->addCustomerService->addCustomer($request);

            toastr()->success('Customer added successfully!', 'Customer', ['timeOut' => 3000]);
            return redirect('/book')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Customer', ['timeOut' => 3000]);
            return redirect('/book')->with('status', $error->getMessage());
        }
    }
}
