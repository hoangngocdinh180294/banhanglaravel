<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\Typeproduct;
use Illuminate\Http\Request;
use App\Gioithieu;

class PageController extends Controller
{
    /**
     * giao diẹn trang chủ
     */
    public function getindex()
    {
        $slide=Slide::all();
        $new_product = Product::where('unit',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    /**
     * Giao diện từng loại sản phẩm
     */
    public function getloaisp($id)
    {
        $loaisanphammoi = Typeproduct::find($id)->products()->where('unit',1)->paginate(4);
        $loaisanphamkhuyenmai = Typeproduct::find($id)->products()->where('promotion_price','<>',0)->paginate(4);
        $loaisanpham =Typeproduct::all();
        return view('page.loaisanpham',\compact('loaisanphammoi','loaisanphamkhuyenmai','loaisanpham'));
    }
    /**
     * giao diên trang chi tiết loại sản phẩm
     */
    public function getchitietloaisp(Request $request)
    {
        $sanpham_cu = Product::orderBy('id','asc')->limit(4)->get();
        $sanpham_moi = Product::orderBy('id', 'desc')->limit(4)->get();
        $chitiet = Product::where('id',$request->id)->first();
        $sanpham_cungloai = Product::where('typeproduct_id',$chitiet->typeproduct_id)->paginate(3);
        return view('page.chitietloaisanpham',compact('chitiet','sanpham_cungloai','sanpham_moi','sanpham_cu'));
    }
    /**
     * giao diên trang tìm kiém
     */
    public function gettimkiem(Request $request)
    {
        $timkiem = Product::where('name','like','%'.$request->timkiem.'%')
                           ->OrWhere('unit_price','like','%'.$request->timkiem.'%')
                           ->paginate(4);
        return view('page.timkiem',compact('timkiem'));                   
    }
    public function getgioithieu()
    {
        $gioithieu=Gioithieu::paginate(4);
        return view('page.gioithieu',compact('gioithieu'));
    }
//    public  function profile(){
//        return view('profile');
//    }
//    public  function setting(){
//        return view('setting');
//    }

}

