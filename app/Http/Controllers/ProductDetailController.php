<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\ProductDetail\GetAllProductDetailService;
use App\Services\ProductDetail\AddProductDetailService;
use App\Services\ProductDetail\DeleteProductDetailService;
use App\Repositories\ProductDetail\GetExternalIdLinkRepository;
use App\Services\Vendor\GetAllVendorWithCategoryService;

class ProductDetailController extends Controller
{

    public function __construct(
        private GetAllProductDetailService $getAllProductDetailService,
        private AddProductDetailService $addProductDetailService,
        private DeleteProductDetailService $deleteProductDetailService,
        private GetExternalIdLinkRepository $getExternalIdLinkRepository,
        private GetAllVendorWithCategoryService $getAllVendorWithCategoryService
    ) {}

    public function getAllProductDetail(Request $request, $productId) {
        try {
            $resultData = $this->getAllProductDetailService->getAllProductDetail($productId);
            $dataVendor = $this->getAllVendorWithCategoryService->getAllVendorWithCategory($request);

            $productData = $resultData['product'];
            $vendorsData = $resultData['vendors'];

            // $externalIdLink = $this->getExternalIdLinkRepository->getExternalIdLink($productData['external_id']);

            return view('stock.productdetail', ['productInfo' => $productData, 'vendorsInfo' => $vendorsData, 'dataVen' => $dataVendor]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function addProductDetail(Request $request){
        try {
            $idProduct = $request->input('idProduct');
            $idVendor = $request->input('idVendor');

            if ($idVendor == 0) {
                throw new Exception("Please select material!");
            }else{
                $resultData = $this->addProductDetailService->addProductDetail($idProduct, $idVendor);

                toastr()->success('Material added successfully!', 'Product Detail', ['timeOut' => 3000]);
                return redirect('/product/detail/'.$idProduct)->with('status', 'success');
            }
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Product Detail', ['timeOut' => 3000]);
            return redirect('/product/detail/'.$idProduct)->with('status', $error->getMessage());
        }
    }

    public function deleteProductDetail(Request $request){
        try {
            $idProduct = $request->input('idProduct');
            $idVendor = $request->input('idVendor');

            $resultData = $this->deleteProductDetailService->DeleteProductDetail($idProduct, $idVendor);

            toastr()->warning('Material deleted successfully!', 'Product Detail', ['timeOut' => 3000]);
            return redirect('/product/detail/'.$idProduct)->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Product Detail', ['timeOut' => 3000]);
            return redirect('/product/detail/'.$idProduct)->with('status', $error->getMessage());
        }
    }
}
