<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use DB;
use Illuminate\Support\Facades\Log;

class SlideController extends Controller
{
    public function index()
    {
        $slide =Slide::all();
        return view('admin.slide.index',compact('slide'));
    }
    public function create()
    {
        return view('admin.slide.add');
    }
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'link'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ],
        [
            'link.required'=>'Bạn vui lòng nhập link ảnh là 1 ký tự bất kỳ',
            'image.required'=>'Bạn vui lòng nhập ảnh',
            'image.image'=>'Đây không phải là ảnh',
            'image.mimes'=>'Đuôi ảnh này không hợp lệ',
        ]);

        $slider= new Slide();
        $slider->link= $request->link;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $name = $file -> getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("page_asset/image/slide/".$image))
            {
                $image = str_random(4)."_".$name; 
            }
            $file->move("page_asset/image/slide",$image);
            $slider->image =$image;
        }else
        {
            $slider->image="";
        }     
        $slider->save();      
        return redirect()->route('slide.index')->with('thongbao','Slide của bạn đã được Thêm thành công');
    }
    public function edit($id)
    {
            $slide=Slide::find($id);
            return view('admin.slide.edit',compact('slide'));      
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'link'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ],
        [
            'link.required'=>'Bạn vui lòng nhập link ảnh là 1 ký tự bất kỳ',
            'image.required'=>'Bạn vui lòng nhập ảnh',
            'image.image'=>'Đây không phải là ảnh',
            'image.mimes'=>'Đuôi ảnh này không hợp lệ',
        ]);
        
        $slide= Slide::find($id);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $name = $file -> getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("page_asset/image/slide/".$image))
            {
                $image = str_random(4)."_".$name; 
            }
            //unlink("image/slide/".$slide->image);
            $file->move("page_asset/image/slide",$image);
            $slide->image =$image;
        }else
        {
            $slide->image="";
        }   
        $slide->save(); 
        return redirect()->route('slide.index')->with('thongbao','Slide của bạn đã được Sửa thành công');
    }
    public function delete($id)
    {
        $slide= Slide::find($id);
        $slide->delete();
        return redirect()->route('slide.index')->with('thongbao','Slide của bạn đã được Xóa thành công');
    }
}
