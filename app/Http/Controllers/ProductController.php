<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Product\AddProductService;
use App\Services\Product\DeleteProductService;
use App\Services\Product\EditProductService;
use App\Services\Product\GetAllProductService;

class ProductController extends Controller
{
    public function __construct(
        private GetAllProductService $getAllProductService,
        private AddProductService $addProductService,
        private DeleteProductService $deleteProductService,
        private EditProductService $editProductService
    ) {}

    /**
     * Get all Product
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllProduct(Request $request) {
        try {
            $resultData = $this->getAllProductService->getAllProduct($request);
            return view('stock.product', ['productInfo' => $resultData]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function addProduct(Request $request){
        try {
            $resultData = $this->addProductService->AddProduct($request);
            toastr()->success('Product added successfully!', 'Product', ['timeOut' => 3000]);
            return redirect('/product')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Product', ['timeOut' => 3000]);
            return redirect('/product')->with('status', $error->getMessage());
        }
    }

    public function deleteProduct(Request $request){
        try {
            $resultData = $this->deleteProductService->deleteProduct($request);

            toastr()->warning('Product deleted successfully!', 'Product', ['timeOut' => 3000]);
            return redirect('/product')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Product', ['timeOut' => 3000]);
            return redirect('/product')->with('status', $error->getMessage());
        }
    }

    public function editProduct(Request $request){
        try {
            $resultData = $this->editProductService->editProduct($request);

            toastr()->info('Product updated successfully!', 'Product', ['timeOut' => 3000]);
            return redirect('/product')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Product', ['timeOut' => 3000]);
            return redirect('/product')->with('status', $error->getMessage());
        }
    }
}
