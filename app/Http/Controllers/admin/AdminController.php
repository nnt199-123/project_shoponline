<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NhaSx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class AdminController extends Controller
{
    function themdm(Request $request){
        $danhmuc = new NhaSx();
    }
    function dsdm(){
        $data = DB::table('nha_sx')->orderBy('id')->get();
        return view('admin.menu.list', ['data'=>$data]);
    }
    
}
