<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

use App\Services\Auth\GetUserInfoService;
use App\Services\Auth\RegisterService;
use App\Services\Auth\LoginService;

class AuthController extends Controller
{
    public function __construct(
        private GetUserInfoService $getUserInfoService,
        private RegisterService $registerService,
        private LoginService $loginService
    ) {}

    public function getUserInfo(Request $request) {
        try {
            return response()->json([
                'status' => 'success',
                'message' => 'User info retrieved successfully',
                'data' => $this->getUserInfoService->getUserInfo($request)
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function register(Request $request) {
        try {
            $resultData = $this->registerService->register($request);

            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    public function login(Request $request) {
        try {
            $resultData = $this->loginService->login($request);

            $token = $resultData['token'];
            $expiration = time() + 3600;
            setcookie('token', $token, $expiration, '/', '', false, true);

            if ($resultData['status'] == 'success') {
                toastr()->info('Login successfully!', 'Authentication', ['timeOut' => 3000]);
                return redirect('/dashboard');
            } else {
                toastr()->error('Invalid nickname or password!', 'Authentication', ['timeOut' => 3000]);
                return view('Auth.login');
            }

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function logout(Request $request) {
        try {
            if(Auth::check()){
                $request->user()->currentAccessToken()->delete();
                setcookie('token','', time() + 3600, '/', '', false, true);
                toastr()->info('Logout successfully!', 'Authentication', ['timeOut' => 3000]);
                return redirect('/login');
            }else{
                toastr()->error('Logout unsuccessfully!', 'Authentication', ['timeOut' => 3000]);
                return view('dashboard');
            }
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
