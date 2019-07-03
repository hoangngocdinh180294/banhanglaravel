<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typeproduct;
use DB;
use Illuminate\Support\Facades\Log;
use App\Product;

class TypeproductController extends Controller
{
    public function index()
    {
        $typeproduct=Typeproduct::all();
        return view('admin.loaisanpham.index',compact('typeproduct'));
    }
    public function create()
    {   
        
        $product =Product::all();
        return view('admin.loaisanpham.add',compact('product'));
    }
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ],
        [
            'name.required'=>'Bạn vui lòng nhập tên loại sản phẩm',
            'description.required'=>'Bạn vui lòng nhập mô tả',
            'image.required'=>'Bạn vui lòng nhập ảnh',
            'image.image'=>'Đây không phải là ảnh',
            'image.mimes'=>'Đuôi ảnh này không hợp lệ',
        ]);
        try {
            DB::beginTransaction();
            //lưu vào user
        $typeproduct= new Typeproduct();
        $typeproduct->name= $request->name;
        $typeproduct->description= $request->description;   
        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $name = $file -> getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("page_asset/image/product/".$image))
            {
                $image = str_random(4)."_".$name; 
            }
            $file->move("page_asset/image/product",$image);
            $typeproduct->image =$image;
        }else
        {
            $typeproduct->image="";
        }     
            $typeproduct->save();  
            DB::commit();
            return redirect()->route('typeproduct.index')->with('thongbao','Bạn đã thêm loại sản phẩm thành công');
        } catch (\Exception $exception){
            Log::error('Loi:'.$exception->getMessage().$exception->getLine());
            
            DB::rollback();
        }
    }
    public function edit($id)
    {       
            $typeproduct=Typeproduct::find($id);
            $product=Product:: all();
            //dd($typeproduct);
            //$listproduct=$typeproduct->products()->pluck('products.id');
            //dd($listproduct);
           // $typeproduct=Typeproduct::find($id)->products;
           
            return view('admin.loaisanpham.edit',compact('typeproduct','product'));      
    }
     public function update(Request $request,$id)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ],
        [
            'name.required'=>'Bạn vui lòng nhập tên loại sản phẩm',
            'description.required'=>'Bạn vui lòng nhập mô tả',
            'image.required'=>'Bạn vui lòng nhập ảnh',
            'image.image'=>'Đây không phải là ảnh',
            'image.mimes'=>'Đuôi ảnh này không hợp lệ',
        ]);
        try {

            DB::beginTransaction();
            $typeproduct= Typeproduct::find($id);
            if($request->hasFile('image'))
            {
                $file = $request->file('image');

                $name = $file -> getClientOriginalName();
                $image = str_random(4)."_".$name;
                while(file_exists("page_asset/image/product/".$image))
                {
                    $image = str_random(4)."_".$name; 
                }
                //unlink("image/slide/".$slide->image);
                $file->move("page_asset/image/product",$image);
                $typeproduct->image =$image;
            }else
            {
                $typeproduct->image="";
            }
            $typeproduct->name= $request->name;   
            $typeproduct->description= $request->description; 
            $typeproduct->save();    
            //dd($typeproduct)->all(); 
                DB::commit();
                return redirect()->route('typeproduct.index')->with('thongbao','Bạn đã sửa loại sản phẩm thành công');
            } catch (\Throwable $th) {
                Log::error('Loi:'.$th->getMessage().$th->getLine());
                DB::rollback();

        }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $typeproduct=Typeproduct::find($id);
            $typeproduct->delete();
            $typeproduct->products()->delete();
            DB::commit();
            return redirect()->route('typeproduct.index')->with('thongbao','Bạn đã xóa loại sản phẩm thành công');
        } catch (\Exception $exception){
            Log::error('Loi:'.$exception->getMessage().$exception->getLine());
            DB::rollback();
        }
    }
}
