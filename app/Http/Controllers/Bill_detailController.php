<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;


class Bill_detailController extends Controller
{
    public function index($id)   
    {

        $bills=Bill::findOrfail($id);
        //dd($bills);
        $customers=Bill::findOrfail($id)->bill_details()->get();
        //dd($customers);
        if($customers){
            return view('admin.chitiethoadon.index',compact('bills','customers'));
        }
        return "<div>Không có dữ liệu</div>";

    }  
    
}
