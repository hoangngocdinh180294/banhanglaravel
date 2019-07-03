<?php

namespace App\Http\Controllers;

use App\Lienhe;

use Illuminate\Http\Request;

class AdminlienheController extends Controller
{
    public function index()
    {
        $lienhe = Lienhe::all();
        return view('admin.lienhe.index', compact('lienhe'));
    }


    public function delete($id)
    {
        $lienhe = Lienhe::find($id);
        $lienhe->delete();
        return back()->with('thongbao', 'Bạn đã xóa liên hệ thành công');
    }



}
