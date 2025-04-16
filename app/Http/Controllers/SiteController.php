<?php

namespace App\Http\Controllers;
use App\Models\binh_luan;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    function index(){
   
        return view('home');
    }
    function detail($id){
        $data = DB::table('san_pham')
        ->where('id',$id)
        ->first();
        $binh_luan_arr = binh_luan::where('id_sp', $id)->orderBy('thoi_diem','asc')->get();
      return view('detail', ['data'=>$data, 'binh_luan_arr'=>$binh_luan_arr]);
    }
    function sptheoloai($idLoai){
        $loai =DB::table('nha_sx')->where('id',$idLoai)->value('ten');
        $data = DB::table('san_pham')->where('idnhasx', $idLoai)->orderByDesc('xem')
         ->paginate(12)->withQueryString();
        return view('sptheoloai', ['data'=>$data, 'loai'=>$loai]);
    }
    function shop(){
        $data = DB::table('san_pham')->orderBy('xem')->paginate(16); // Phân trang dữ liệu với mỗi trang hiển thị 10 bản ghi
    return view('shop', ['data' => $data]);
    }
    function luubinhluan(){
        if (!Auth::check()) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để bình luận.');
        }
        $id_user = Auth::id();
        $arr = request()->post(); 
        $id_sp = (Arr::exists($arr, 'id_sp'))? $arr['id_sp']:"-1";
        $noi_dung = (Arr::exists($arr, 'noidung'))? $arr['noidung']:"";
        if ($id_sp<=-1) return redirect()->back()->with(['success'=>'Không biết id_sp']);
        if ($noi_dung=="") return redirect()->back()->with(['success'=>'Nội dung không có']);
        binh_luan::insert(
          ['id_user'=>$id_user, 'id_sp'=>$id_sp, 'noi_dung'=>$noi_dung, 'thoi_diem'=>now()]
        );
        return redirect()->back()->with(['success'=>'Đã lưu bình luận']);
    }  
    
}
