<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Customer\GetAllCustomerService;
use App\Services\Customer\AddCustomerService;
use App\Services\Customer\DeleteCustomerService;
use App\Services\Customer\EditCustomerService;

class CustomerController extends Controller
{
    public function __construct(
        private GetAllCustomerService $getAllCustomerService,
        // private AddCustomerService $addCustomerService,
        // private DeleteCustomerService $deleteCustomerService,
        // private EditCustomerService $editCustomerService
    ) {}

    /**
     * Get all customer
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCustomer(Request $request) {
        try {
            $resultData = $this->getAllCustomerService->getAllCustomer($request);

            return view('user.customer')->with('customerInfo', $resultData);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function addCustomer(Request $request){
        try {
            // $resultData = $this->addCustomerService->AddCustomer($request);
            toastr()->success('Customer added successfully!', 'Customer', ['timeOut' => 3000]);
            return redirect('/customer')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Customer', ['timeOut' => 3000]);
            return redirect('/customer')->with('status', $error->getMessage());
        }
    }

    public function deleteCustomer(Request $request){
        try {
            // $resultData = $this->deleteCustomerService->deleteCustomer($request);

            toastr()->warning('Customer deleted successfully!', 'Customer', ['timeOut' => 3000]);
            return redirect('/customer')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Customer', ['timeOut' => 3000]);
            return redirect('/customer')->with('status', $error->getMessage());
        }
    }

    public function editCustomer(Request $request){
        try {
            // $resultData = $this->editCustomerService->editCustomer($request);

            toastr()->info('Customer updated successfully!', 'Customer', ['timeOut' => 3000]);
            return redirect('/customer')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Customer', ['timeOut' => 3000]);
            return redirect('/customer')->with('status', $error->getMessage());
        }
    }
}
