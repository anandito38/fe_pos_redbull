<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\VendorController;
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
    // Route::post('/register', 'register')->name('register');
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

Route::middleware('is_Auth')->group(function(){
    Route::get('/customer', [CustomerController::class, 'getAllCustomer'])->name('customer');
    Route::post('/customer/add', [CustomerController::class, 'addCustomer']);
    Route::put('/customer/edit', [CustomerController::class, 'editCustomer']);
    Route::delete('/customer/delete', [CustomerController::class, 'deleteCustomer']);
});

Route::middleware('is_Auth')->group(function(){
    Route::get('/category', [CategoryController::class, 'getAllCategory'])->name('category');
    Route::post('/category/add', [CategoryController::class, 'addCategory']);
    Route::put('/category/edit', [CategoryController::class, 'editCategory']);
    Route::delete('/category/delete', [CategoryController::class, 'deleteCategory']);
});

Route::middleware('is_Auth')->group(function(){
    Route::get('/vendors', [VendorController::class, 'getAllVendorWithCategory'])->name('vendors');
    Route::post('/vendors/add', [VendorController::class, 'addVendor']);
    Route::put('/vendors/edit', [VendorController::class, 'editVendor']);
    Route::delete('/vendors/delete', [VendorController::class, 'deleteVendor']);
});

Route::middleware('is_Auth')->group(function(){
    Route::get('/product', [ProductController::class, 'getAllProduct'])->name('product');
    Route::post('/product/add', [ProductController::class, 'addProduct']);
    Route::put('/product/edit', [ProductController::class, 'editProduct']);
    Route::delete('/product/delete', [ProductController::class, 'deleteProduct']);
});

Route::middleware('is_Auth')->group(function(){
    Route::get('/product/detail/{id}', [ProductDetailController::class, 'getAllProductDetail'])->name('productdetail');
    Route::post('/product/detail/add', [ProductDetailController::class, 'addProductDetail']);
    Route::delete('/product/detail/delete', [ProductDetailController::class, 'deleteProductDetail']);
});

Route::middleware('is_Auth')->group(function(){
    Route::get('/book', [BookingController::class, 'getAllBookWithCustomer'])->name('book');
    Route::post('/book/add', [BookingController::class, 'addBook']);
    Route::put('/book/edit', [BookingController::class, 'editBook']);
    Route::delete('/book/delete', [BookingController::class, 'deleteBook']);
});

Route::middleware('is_Auth')->group(function(){
    Route::get('/book/detail/{id}', [BookingDetailController::class, 'getAllBookDetail'])->name('bookdetail');
    Route::post('/book/detail/add', [BookingDetailController::class, 'addBookDetail']);
    Route::delete('/book/detail/delete', [BookingDetailController::class, 'deleteBookDetail']);
});

Route::group([], function(){
    Route::get('/404', function () {
        return view('error.404');
    });

    Route::get('/addcart', function () {
        return view('booking.cart');
    });

    Route::get('/checkout', function () {
        return view('booking.invoice');
    });
});

Route::any('{any}', function () {
    // return view('error.404');
    return response()->json([
        'status' => 'error',
        'message' => 'Page not found',
    ])->setStatusCode(404);
})->where('any', '.*');
