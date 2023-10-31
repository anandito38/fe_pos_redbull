<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Redirect;

use App\Services\Auth\GetUserInfoService;
use App\Services\Auth\RegisterService;
use App\Services\Auth\LoginService;
use Illuminate\Support\Facades\Auth;

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
            if($resultData['status'] == 'success'){
                toastr()->info('Login successfully!', 'Authentication', ['timeOut' => 3000]);
                return Redirect::to('/dashboard')->withCookie(cookie('sanctum_token', $resultData['token']));
            }else{
                toastr()->error('Login failed!', 'Authentication', ['timeOut' => 3000]);
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
            $user = $request->user();

            if ($user) {
                $user->tokens()->delete();
                toastr()->success('Logout successful', 'Authentication', ['timeOut' => 3000]);
                return redirect()->route('login')->withCookie(cookie('sanctum_token', null, -1));
            } else {
                toastr()->error('Token access not found or user not authenticated', 'Authentication', ['timeOut' => 3000]);
                return redirect('/dashboard');
            }

        } catch (Exception $error) {
            toastr()->error('An error occurred during logout: ' . $error->getMessage(), 'Authentication', ['timeOut' => 3000]);
            return redirect('/dashboard');
        }
    }
}
