<?php

namespace App\Http\Controllers\DoAn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoAn\Product;
use App\Models\DoAn\loaisp;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
// use File;
use Illuminate\Support\Facades\File;
use Omnipay\Common\Message\ResponseInterface;
use PhpParser\Node\Expr\Isset_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$product= new Product ;
         //return $product::all(Product::paginate(2));

         $prd = Product::paginate();
         return $prd;
        //return ProductResource::collection(Product::paginate(2));
    }
    public function ctsp($product)
    {
        $LoaiSP=Product::find($product);
        $tenLoai= $LoaiSP->loaisp->tenLoai;
        $product = Product::find($product);
        return response()->json([
            'sanPham'=>$product,
            'product'=>$tenLoai,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'TenSP' => 'required',
        //     'Gia' => 'required',
        //     'Mota' => 'required',
        // ]);
        // $product = Product::create($request->all());
        // return new ProductResource($product);
        $product = new Product();
        $product->maSP = $request->maSP;
        $product->tenSP = $request->tenSP;
        $product->soLuongSP = $request->soLuongSP;
        $product->maLoai = $request->maLoai;
        $product->maNSX = $request->maNSX;
        $product->maNCC = $request->maNCC;
        $product->gia = $request->gia;
        $product->baoHanh = $request->baoHanh;
        $product->description= $request->description;
        $product->detailProduct= $request->detailProduct;
        if($request->hasFile('hinh'))
        {
            $hinh = $request->file('hinh');
            $ext= $hinh->getClientOriginalExtension();
            $name = time().'_'.$hinh->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($hinh));
            $product->hinh=$name;
        }else{
            $product->hinh='default.jpg';
        }
        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Product $product)
    {

        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status'=>200,
            'product'=>$product,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$product)
    {
        $product =  Product::find($product);
        $product->tenSP = $request->tenSP;
        $product->soLuongSP = $request->soLuongSP;
        $product->maLoai = $request->maLoai;
        $product->maNSX = $request->maNSX;
        $product->maNCC = $request->maNCC;
        $product->gia = $request->gia;
        $product->baoHanh = $request->baoHanh;
        $product->description= $request->description;
        $product->detailProduct= $request->detailProduct;
        if($request->hasFile('hinh'))
        {
            $hinh = $request->file('hinh');
            $ext= $hinh->getClientOriginalExtension();
            $name = time().'_'.$hinh->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($hinh));
            $product->hinh=$name;
        }else{
            $product->hinh='default.jpg';
        }
        $product->save();
        return response()->json([
            'status'=>1,
            'message'=>'oke',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();
        return response($product);
    }

}
