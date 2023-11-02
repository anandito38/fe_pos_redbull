<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
            $userInfo = $this->getUserInfoService->getUserInfo($request);

            return $userInfo;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
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

            $getUserInfo = $this->getUserInfoService->getUserInfo($request);
            Session::put('userInfo', $getUserInfo);

            if($resultData['status'] == 'success'){
                toastr()->success('Login successfully!', 'Authentication', ['timeOut' => 3000]);
                return Redirect::to('/dashboard')->withCookie(cookie('sanctum_token', $resultData['token']));
            }else{
                toastr()->error('Please fill nickname and password!', 'Authentication', ['timeOut' => 3000]);
                return view('Auth.login');
            }
        } catch (Exception $error) {
            toastr()->error('Wrong nickname or password!', 'Authentication', ['timeOut' => 3000]);
            return view('Auth.login');
        }
    }

    public function logout(Request $request) {
        try {
            $user = $request->user();

            if ($user) {
                $user->tokens()->delete();

                Session::forget('userInfo');
                Session::flush();

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
