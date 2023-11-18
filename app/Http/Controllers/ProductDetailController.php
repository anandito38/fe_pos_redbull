<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\DTO\MemproduksiDTO;
use App\Services\ProductDetail\GetAllProductDetailService;
use App\Services\ProductDetail\AddProductDetailService;
use App\Services\ProductDetail\DeleteProductDetailService;

class ProductDetailController extends Controller
{

    public function __construct(
        private GetAllProductDetailService $getAllProductDetailService,
        private AddProductDetailService $addProductDetailService,
        private DeleteProductDetailService $deleteProductDetailService
    ) {}

    public function getAllProductDetail(Request $request) {
        try {
            $idProduct = $request->input('idProduct');
            $idVendor = $request->input('idVendor');

            $productDetailDTO = new MemproduksiDTO($idVendor, $idProduct);

            $resultData = $this->getAllProductDetailService->getAllProductDetail($productDetailDTO);

            return view('stock.productdetail', ['productDetailInfo' => $resultData]);

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

            $resultData = $this->addProductDetailService->addProductDetail($idProduct, $idVendor);

            toastr()->success('Material added successfully!', 'Product Detail', ['timeOut' => 3000]);
            return redirect('/productdetail')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Product Detail', ['timeOut' => 3000]);
            return redirect('/productdetail')->with('status', $error->getMessage());
        }
    }

    public function deleteProductDetail(Request $request){
        try {
            $idProduct = $request->input('idProduct');
            $idVendor = $request->input('idVendor');

            $resultData = $this->deleteProductDetailService->DeleteProductDetail($idProduct, $idVendor);


            toastr()->warning('Material deleted successfully!', 'Product Detail', ['timeOut' => 3000]);
            return redirect('/productdetail')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Product Detail', ['timeOut' => 3000]);
            return redirect('/productdetail')->with('status', $error->getMessage());
        }
    }
}
