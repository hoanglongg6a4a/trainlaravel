<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\DoAn\ProductController;
use  App\Http\Controllers\DoAn\NccController;
use  App\Http\Controllers\DoAn\NsxController;
use  App\Http\Controllers\DoAn\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Api sản phẩm
Route::resource('products', ProductController::class);

// Route::resource('products/add', ProductController::class)->only('store');
// Route::delete('products/delete/{id}', [ProductController::class,'destroy']);
// Route::get('products/edit/{id}', [ProductController::class,'edit']);
// Route::put('products/update/{id}', [ProductController::class,'update']);
        // Chi tiết sản phẩm
        Route::get('products/chitiet/{id}', [ProductController::class,'ctsp']);
// Api ncc , nsx
Route::resource('ncc', NccController::class);
Route::resource('nsx', NsxController::class);

//Api Thanh Toán
Route::post('pay', [PaymentController::class,'vnpay']);
Route::post('momo', [PaymentController::class,'momopay']);
Route::get('saveorder',[PaymentController::class,'saveorder']);
