<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    function indexadmin(){
        return view('admin.users.login');
    }
    function dangki(){
        return view('admin.users.dangki');
    }
    function index(){
        return view('admin.home');
    }
    function xdadmin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            // Xử lý khi dữ liệu không hợp lệ
            // Ví dụ: Redirect với thông báo lỗi
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
            ],$request -> input('remember')
            )){
                $user = Auth::user();

            // Kiểm tra vai trò của người dùng
            if ($user->role == 0) {
                // Nếu role = 0, điều hướng đến trang home
                return redirect()->route('home');
            } elseif ($user->role == 1) {
                // Nếu role = 1, điều hướng đến trang admin
                return redirect()->route('admin');
            }
          }
          session::flash('error','Tài khoản or Mật Khẩu không đúng');
          return redirect()->back();
    }
    function addusers(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed',Rules\Password::defaults()],
            'dia_chi' =>['required'],
            'dien_thoai'=>['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'diachi' => $request->diachi,
            'gioitinh'=>$request->gioitinh,
            'nghenghiep'=>$request->nghenghiep
        ]);
        event(new Registered($user));

    // Đăng nhập người dùng
    Auth::login($user);

    return redirect('/');


    }
}
