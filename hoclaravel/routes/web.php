<?php

use App\Http\Controllers\Admin\ProduceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('form');
});

// Route::get('/', function () {
//     return '<h1> Hello </h1>';
// })->name('hometest');


// Route::get('/index/{id}', [homeController::class,'index'] );
 

// Route client 
// Route:Route::prefix('cates')->group(function(){
//     // lấy danh sách chuyên mục
//     Route::get('/',[CategoriesController::class,'index'])->name('categories.list');
//     // Lấy chi tiết các danh mục 
//     Route::get('/edit/{id}',[CategoriesController::class,'getCategories'])->name('categories.edit');
//     // Xử lý updaet chuyên mục 
//     Route::post('/edit/{id}',[CategoriesController::class,'updateCategories']);
//     // Hiển thị form add dữ liệu 
//     Route::get('/add',[CategoriesController::class,'addCategories'])->name('categories.add');
//     // Xử lý thêm chuyên mục 
//     Route::post('/add',[CategoriesController::class,'handleAddCategories']);
//     // Xóa chuyên mục 
//     Route::delete('/delete/{id}',[CategoriesController::class,'deleteCategories'])->name('categories.edit');


// });

 
//Admin routes
// Route::middleware('AuthAdmin')->prefix('admin')->group(function(){
//     Route::resource('products', ProductController::class);

// });






    