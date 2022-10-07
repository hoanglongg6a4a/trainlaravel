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

Route::resource('products', ProductController::class);
Route::resource('ncc', NccController::class);
Route::resource('nsx', NsxController::class);
Route::post('pay', [PaymentController::class,'vnpay']);
Route::post('momo', [PaymentController::class,'momopay']);
Route::get('saveorder',[PaymentController::class,'saveorder']);
