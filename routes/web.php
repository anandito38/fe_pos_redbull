<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth:sanctum');
});

Route::group([], function(){
    Route::get('/login', function () {
        return view('Auth.login');
    })->middleware('is_TokenValid');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('is_Auth');
});

Route::middleware('is_Auth')->group(function(){
    Route::get('/admin', [AdminController::class, 'getAllAdmin'])->name('admin');
    Route::post('/admin/add', [AdminController::class, 'addAdmin']);
    Route::put('/admin/edit', [AdminController::class, 'editAdmin']);
    Route::delete('/admin/delete', [AdminController::class, 'deleteAdmin']);
});

Route::group([], function(){
    Route::get('/customer', function () {
        return view('user.customer');
    });

    // Route::get('/admin', function () {
    //     return view('user.admin');
    // });

    Route::get('/vendors', function () {
        return view('stock.vendors');
    });

    Route::get('/product', function () {
        return view('stock.product');
    });

    Route::get('/category', function () {
        return view('stock.category');
    });

    Route::get('/404', function () {
        return view('error.404');
    });

    Route::get('/addcart', function () {
        return view('checkout.cart');
    });

    Route::get('/checkout', function () {
        return view('checkout.invoice');
    });
});

Route::any('{any}', function () {
    // return view('error.404');
    return response()->json([
        'status' => 'error',
        'message' => 'Page not found',
    ])->setStatusCode(404);
})->where('any', '.*');
