<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Product\GetAllProductService;
use App\Services\BookingDetail\GetAllBookingDetailService;
use App\Services\BookingDetail\AddBookingDetailService;
use App\Services\BookingDetail\DeleteBookingDetailService;

class BookingDetailController extends Controller
{

    public function __construct(
        private GetAllProductService $getAllProductService,
        private GetAllBookingDetailService $getAllBookingDetailService,
        private AddBookingDetailService $addBookingDetailService,
        private DeleteBookingDetailService $deleteBookingDetailService
    ) {}

    public function getAllBookingDetail(Request $request, $bookingId) {
        try {
            $resultData = $this->getAllBookingDetailService->getAllBookingDetail($bookingId);
            $productData = $this->getAllProductService->getAllProduct($request);

            $bookingData = $resultData['booking'];
            $productsData = $resultData['products'];
            $qtyMemilih = $resultData['selectedProducts'];

            return view('sales.bookingdetail', ['bookingInfo' => $bookingData, 'productsInfo' => $productsData, 'dataProduct' => $productData, 'qtyMemilih' => $qtyMemilih]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function addBookingDetail(Request $request){
        try {
            $idBook = $request->input('idBook');
            $idProduct = $request->input('idProduct');
            $qtyMemilih = $request->input('qtyMemilih');

            if ($idProduct == 0) {
                throw new Exception("Please select product!");
            }else{

                $resultData = $this->addBookingDetailService->AddBookingDetail($idBook, $idProduct, $qtyMemilih);

                toastr()->success('Product added successfully!', 'Booking Detail', ['timeOut' => 3000]);
                return redirect('/book/detail/'.$idBook)->with('status', 'success');
            }
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Booking Detail', ['timeOut' => 3000]);
            return redirect('/book/detail/'.$idBook)->with('status', $error->getMessage());
        }
    }

    public function deleteBookingDetail(Request $request){
        try {
            $idBook = $request->input('idBook');
            $idProduct = $request->input('idProduct');

            $resultData = $this->deleteBookingDetailService->DeleteBookingDetail($idBook, $idProduct);

            toastr()->warning('Product deleted successfully!', 'Booking Detail', ['timeOut' => 3000]);
            return redirect('/book/detail/'.$idBook)->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Booking Detail', ['timeOut' => 3000]);
            return redirect('/book/detail/'.$idBook)->with('status', $error->getMessage());
        }
    }
}
