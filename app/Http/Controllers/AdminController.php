<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Admin\GetAllAdminService;
use App\Services\Admin\AddAdminService;
use App\Services\Admin\DeleteAdminService;
use App\Services\Admin\EditAdminService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct(
        private GetAllAdminService $getAllAdminService,
        // private AddAdminService $addAdminService,
        // private DeleteAdminService $deleteAdminService,
        // private EditAdminService $editAdminService
    ) {}

    /**
     * Get all admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllAdmin(Request $request) {
        try {
            $resultData = $this->getAllAdminService->getAllAdmin($request);
            return view('user.admin')->with('adminInfo', $resultData);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(404);
        }
    }

    public function addAdmin(Request $request){
        try{

        }catch(Exception $error){

        }
    }

    public function deleteAdmin(Request $request){
        try{

        }catch(Exception $error){

        }
    }

    public function editAdmin(Request $request){
        try{

        }catch(Exception $error){

        }
    }
}
