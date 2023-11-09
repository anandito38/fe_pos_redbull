<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Category\GetAllCategoryService;
use App\Services\Vendor\AddVendorService;
use App\Services\Vendor\DeleteVendorService;
use App\Services\Vendor\EditVendorService;
use App\Services\Vendor\GetAllVendorWithCategoryService;

class VendorController extends Controller
{
    public function __construct(
        private GetAllCategoryService $getAllCategoryService,
        private GetAllVendorWithCategoryService $getAllVendorWithCategoryService,
        private AddVendorService $addVendorService,
        private DeleteVendorService $deleteVendorService,
        private EditVendorService $editVendorService
    ) {}

    /**
     * Get all vendor
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllVendorWithCategory(Request $request) {
        try {
            $resultData = $this->getAllVendorWithCategoryService->getAllVendorWithCategory($request);
            $dataCategory = $this->getAllCategoryService->getAllCategory($request);

            return view('stock.vendors', ['vendorInfo' => $resultData, 'categoryInfo' => $dataCategory]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function addVendor(Request $request){
        try {
            $resultData = $this->addVendorService->AddVendor($request);
            toastr()->success('Vendor added successfully!', 'Vendor', ['timeOut' => 3000]);
            return redirect('/vendors')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Vendor', ['timeOut' => 3000]);
            return redirect('/vendors')->with('status', $error->getMessage());
        }
    }

    public function deleteVendor(Request $request){
        try {
            $resultData = $this->deleteVendorService->deleteVendor($request);

            toastr()->warning('Vendor deleted successfully!', 'Vendor', ['timeOut' => 3000]);
            return redirect('/vendors')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Vendor', ['timeOut' => 3000]);
            return redirect('/vendors')->with('status', $error->getMessage());
        }
    }

    public function editVendor(Request $request){
        try {
            $resultData = $this->editVendorService->editVendor($request);

            toastr()->info('Vendor updated successfully!', 'Vendor', ['timeOut' => 3000]);
            return redirect('/vendors')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Vendor', ['timeOut' => 3000]);
            return redirect('/vendors')->with('status', $error->getMessage());
        }
    }
}
