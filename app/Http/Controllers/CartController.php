<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{    
    function showcart(){
        $successMessage = session('success');
        return view('cart',['successMessage' => $successMessage]);
     }
    function cart(Request $request)
    {
        $idsp = $request->idsp;
        $soluong = $request->soluong;
    
        $data = DB::table('san_pham')->where('id', $idsp)->first();
        $cart = session()->get('cart', []);
    
        if (isset($cart[$idsp])) {
            // Update quantity if product is already in the cart
            $cart[$idsp]['soluong'] += $soluong;
        } else {
            // Add new item to the cart
            $cart[$idsp] = [
                'id' => $data->id,
                'ten' => $data->ten,
                'gia' => $data->giakm,
                'soluong' => $soluong,
                'hinh' => $data->hing
            ];
        }
       
        session()->put('cart', $cart);
         $tongsoluong = 0;
        foreach ($cart as $item) {
            $tongsoluong += $item['soluong'];
        }
        session()->flash('success', 'Đã thêm vào giỏ hàng');

    return redirect()->back();
    }
     function deletesp(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Sản phẩm đã được xóa');
        }
       return redirect()->back();
     }
     public function checkcart(Request $request)
     {
         // 1. Kiểm tra người dùng đã đăng nhập chưa
         if (!Auth::check()) {
             return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục thanh toán.');
         }
     
         // 2. Lấy thông tin giỏ hàng
     
         // 3. Hiển thị thông tin đơn hàng
         return view('thanhtoan');
     }
    
}