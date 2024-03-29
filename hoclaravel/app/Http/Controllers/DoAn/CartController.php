<?php

namespace App\Http\Controllers\DoAn;

use App\Http\Controllers\Controller;
use App\Models\DoAn\Product;
use App\Models\DoAn\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        // Đây chỉ là bản test vì chưa có login
            $maKH= $request->maKH;
            $maSP = $request->maSP;
            $soLuongSP = $request->soLuongSP;
            $spCheck = Product::where('maSP',$maSP)->first();
            if($spCheck)
            {
                    if(Cart::where('maSP',$maSP)->where('maKH',$maKH)->exists())
                    {
                        return response()->json([
                            'status'=>409 ,
                            'message'=>$spCheck->tenSP.'Sản phẩm đã có ở trong giỏ hàng',
                            ]);
                    }
                    else
                    {
                        $cartItem = new Cart;
                        $cartItem->maKH = $maKH;
                        $cartItem->maSP = $maSP;
                        $cartItem->soLuongSP=$soLuongSP;
                        $cartItem->save();
                        return response()->json([
                            'status'=>201 ,
                            'message'=>'Đã thêm vào giở hàng',
                            ]);
                    }
            }
            else
            {
                return response()->json([
                    'status'=>404 ,
                    'message'=>'Không tìm thấy sản phẩm',
                    ]);
            }


            //Bản chính Thức

        // if(auth('sanctum')->check())
        // {
        //     $maKH= auth('sanctum')->user()->id;
        //     $maSP = $request->maSP;
        //     $soLuongSP = $request->soLuongSP;
        //     $spCheck = Product::where('maSP',$maSP)->first();
        //     if($spCheck)
        //     {
        //             if(Cart::where('maSP',$maSP)->where('maKH',$maKH)->exist())
        //             {
        //                 return response()->json([
        //                     'status'=>409 ,
        //                     'message'=>$spCheck->tenSP.'Sản phẩm đã có ở trong giỏ hàng',
        //                     ]);
        //             }
        //             else
        //             {
        //                 $cartItem = new Cart;
        //                 $cartItem->maKH = $maKH;
        //                 $cartItem->maSP = $maSP;
        //                 $cartItem->soLuongSP=$soLuongSP;
        //                 $cartItem->save();
        //                 return response()->json([
        //                     'status'=>201 ,
        //                     'message'=>'Đã thêm vào giở hàng',
        //                     ]);
        //             }
        //     }
        //     else
        //     {
        //         return response()->json([
        //             'status'=>404 ,
        //             'message'=>'Không tìm thấy sản phẩm',
        //             ]);
        //     }
        // }
        // else
        // {
        //     return response()->json([
        //         'status'=>401,
        //         'message'=>'Đăng nhập để thêm vào giỏ hàng',
        //         ]);
        // }
    }
}
