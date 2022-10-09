<?php

namespace App\Http\Controllers\DoAn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoAn\Product;
use App\Models\DoAn\loaisp;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;
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
      
         $prd = DB::table('product')->paginate();
         return $prd;
        //return ProductResource::collection(Product::paginate(2));
    }
    public function ctsp($id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        $product->id_sanpham = $request->id_sanpham;
        $product->TenSP = $request->TenSP;
        $product->Gia = $request->Gia;
        $product->soLuong = $request->soLuong; 
        $product->Mota= $request->Mota;
        $product->ctSanPham = $request->ctSanPham;
        $product->maLoai = $request->maLoai;
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
    public function update(Request $request,$id)
    {
        $product =  Product::find($id);
        $product->TenSP = $request->TenSP;
        $product->Gia = $request->Gia;
        $product->soLuong = $request->soLuong; 
        $product->Mota= $request->Mota;
        $product->ctSanPham = $request->ctSanPham;
        $product->maLoai = $request->maLoai;
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
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response($product);  
    }
}
