<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
   public function __construct()
   {
    
   }
   //hiển thị danh sách chuyên mục (GET)
   public function index()
   {
    return view('categories/list');
    
   }
   // Lấy ra 1 chuyên mục theo id (GET)
   public function getCategories($id)
   {
    return view('categories/edit');
  
    
   }
   // Cập nhật 1 chuyên mục(POST)
   public function updateCategories($id)
   {
    return 'submit sửa chuyển mục id = '.$id;
    
   }

    // show form thêm dữ liệu(get)
    public function addCategories()
    {
        return view('categories/add');
     
    }
   // Thêm dữ liệu vào cate(POST)
   public function handleAddCategories()
   {
   // return ' Đã thêm ! ';
    return redirect(route('categories.add'));
    
   }

     // Xóa dữ liệu vào cate(Delete)
   public function deleteCategories($id)
   {
    return 'submit xóa chuyển mục id = '.$id;
    
   }

}
