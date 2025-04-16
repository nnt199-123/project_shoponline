<?php

namespace App\Http\Controllers;

use App\Models\NhaSx;
use Illuminate\Http\Request;

class NhaSxController extends Controller
{
    function addlist(){
        $menu = NhaSx::all();
        return view('admin.menu.danhmuc', ['menus'=>$menu]);
    }
    function adddanhmuc(Request $request){
        $dm= $request ->validate([   
            'ten' => ['required', 'min:3', 'max:20'],
            'anhien' =>['required'],
        ]);

        $dsdm = new Nhasx;
        $dsdm->ten = $dm['ten'];
        $dsdm -> anhien = $dm['anhien'];
        $dsdm -> save();
        return redirect()->back()->with('success', 'Danh mục đã được thêm vào');

    }
}
