<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NhaSxController;
use App\Http\Controllers\SiteController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');

route::get('home', [function (){
     return view('home');
}]);
// sanpham show sp
Route::get('/detail/{id}',[SiteController::class, 'detail']);
Route::get('/sptheoloai/{id}',[SiteController::class, 'sptheoloai']);
Route::get('/contact',function(){
     return view('contact');
});
// end sanpham show sp


// trang gio hang
Route::get('/shop',[SiteController::class, 'shop']);
Route::post('/cart',[CartController::class, 'cart']);
Route::get('/showcart',[CartController::class, 'showcart']);
Route::delete('/delete/{id}', [CartController::class,'deletesp']);
// end trang gio hang

//thanh toan
Route::get('checkcart',[CartController::class, 'checkcart']);


//end thanh toan

// quan ly admin
Route::get('login', [UserController::class, 'indexadmin'])->name('login');
Route::get('dangki', [UserController::class, 'dangki'])->name('dangki');
Route::post('/admin/users/login', [UserController::class, 'xdadmin']);
Route::post('/admin/users/dangki', [UserController::class, 'addusers']);
route::middleware('auth')->group(function(){
    route::prefix('admin')->group(function(){
     route::get('/',[UserController::class,'index'] )->name ('admin');
     route::get('/add',[AdminController::class,'themdm']);
     route::get('/list',[AdminController::class,'dsdm']);
     route::get('/products',[ProductsController::class,'dssp'])->name('admin/products');
     route::get('/addproducts',[ProductsController::class,'addsp'])->name('/admin/addproducts');
     route::post('/product/addsp',[ProductsController::class,'themsp']) ;
     route::post('/product/spedit',[ProductsController::class,'spedit']) ;
     route::get('/danhmuc', [NhaSxController::class,'addlist']);
     route::get('/menu/list',[AdminController::class,'dsdm']);
     route::get('admin/product/edit/{id}', [ProductsController::class, 'editsp']);
     route::delete('/product/delete/{id}', [ProductsController::class,'xoasp']);
     route::post('/adddanhmuc', [NhaSxController::class, 'adddanhmuc']);
    });
    route::get('/thoat',[function(){
     return view('home');
    }]);
 });
 Route::post('/logout', function () {
     Auth::logout();
     return redirect('/login');
 })->name('logout');
// end quan ly admin

Route::post('/luubinhluan', [SiteController::class,'luubinhluan']);

