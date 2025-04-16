<?php

namespace App\Http\Controllers\admin;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;
Use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    function dssp(){
        
        $data = DB::table('san_pham')->orderByDesc('ngay')
         ->paginate(12)->withQueryString();
      
        return view('admin.product.products', ['data'=>$data]);
    }
    function addsp(){

        return view('admin.product.addproducts');
    }
    function themsp(Request $request){
        $validatedData = $request->validate([
            'ten' => 'required',
            'idnhasx' => 'required',
            'gia' => 'required',
            'giakm' => 'required',
            'hing' => 'required',
            'ngay' => 'required',
            'xem' => 'required',
            'hot' => 'required',
            'anhien' => 'required',
            'tinhchat' => 'required',
            'mausac' => 'required',
            'cannang' => 'required',
        ]);
        $sanPham = new SanPham();
        $sanPham->ten = $validatedData['ten'];
        $sanPham->idnhasx = $validatedData['idnhasx'];
        $sanPham->gia = $validatedData['gia'];
        $sanPham->giakm = $validatedData['giakm'];
        $sanPham->hing = $validatedData['hing'];
        $sanPham->ngay = $validatedData['ngay'];
        $sanPham->xem = $validatedData['xem'];
        $sanPham->hot = $validatedData['hot'];
        $sanPham->anhien = $validatedData['anhien'];
        $sanPham->tinhchat = $validatedData['tinhchat'];
        $sanPham->mausac = $validatedData['mausac'];
        $sanPham->cannang = $validatedData['cannang'];
    
        // Lưu sản phẩm vào cơ sở dữ liệu
        $sanPham->save();
    
       return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào');
    }
    function editsp($id){
        $data = DB::table('san_pham')->where('id',$id)->first();
        return view('admin.product.editsp', ['data'=>$data]);
    }
    function spedit(Request $request){
        $validatedData = $request->validate([
            'ten' => 'required',
            'idnhasx' => 'required',
            'gia' => 'required',
            'giakm' => 'required',
            'hing' => 'required',
            'ngay' => 'required',
            'xem' => 'required',
            'hot' => 'required',
            'anhien' => 'required',
            'tinhchat' => 'required',
            'mausac' => 'required',
            'cannang' => 'required',
        ]);
        $sanPham = new SanPham();
        $sanPham->ten = $validatedData['ten'];
        $sanPham->idnhasx = $validatedData['idnhasx'];
        $sanPham->gia = $validatedData['gia'];
        $sanPham->giakm = $validatedData['giakm'];
        $sanPham->hing = $validatedData['hing'];
        $sanPham->ngay = $validatedData['ngay'];
        $sanPham->xem = $validatedData['xem'];
        $sanPham->hot = $validatedData['hot'];
        $sanPham->anhien = $validatedData['anhien'];
        $sanPham->tinhchat = $validatedData['tinhchat'];
        $sanPham->mausac = $validatedData['mausac'];
        $sanPham->cannang = $validatedData['cannang'];
    
        // Lưu sản phẩm vào cơ sở dữ liệu
        $sanPham->save();
    
       return redirect()->back()->with('success', 'Sản phẩm đã được sửa');
    }
    function xoasp($id)
    {
        // Tìm sản phẩm theo ID
        $product = SanPham::find($id);

        if (!$product) {
            // Xử lý khi không tìm thấy sản phẩm
            return redirect()->back()->withErrors('Không tìm thấy sản phẩm');
        }

        // Xóa sản phẩm
        $product->delete();

        // Xử lý khi xóa thành công
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
   
}
