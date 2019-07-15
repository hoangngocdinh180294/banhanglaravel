<?php

namespace App\Http\Controllers;

use App\Models\Gioithieu;


use Illuminate\Http\Request;

class GioithieuController extends Controller
{
    public function index()
    {
        $gioithieu = Gioithieu::all();
        return view('admin.gioithieu.index', compact('gioithieu'));
    }

    public function create()
    {
        return view('admin.gioithieu.add');
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'title' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            ],
            [
                'name.required' => 'Bạn vui lòng nhập tên',
                'title.required' => 'Bạn vui lòng nhập nội dung',
                'image.required' => 'Bạn vui lòng nhập ảnh',
                'image.image' => 'Đây không phải là ảnh',
                'image.mimes' => 'Đuôi ảnh này không hợp lệ',
            ]);

        $data=$request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("page_asset/image/gioithieu/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("page_asset/image/gioithieu", $image);
            $data['image'] = $image;
        } else {
            $data['image'] = "";
        }
        Gioithieu::create($data);
        return redirect()->route('gioithieukhachhang.index')->with('thongbao', 'Giới thiệu của bạn đã được Thêm thành công');
    }

    public function edit($id)
    {
        $gioithieu = Gioithieu::find($id);
        return view('admin.gioithieu.edit', compact('gioithieu'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'title' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            ],
            [
                'name.required' => 'Bạn vui lòng nhập tên',
                'title.required' => 'Bạn vui lòng nhập nội dung',
                'image.required' => 'Bạn vui lòng nhập ảnh',
                'image.image' => 'Đây không phải là ảnh',
                'image.mimes' => 'Đuôi ảnh này không hợp lệ',
            ]);

        $gioithieu = Gioithieu::find($id);
        $data=$request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("page_asset/image/gioithieu/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            //unlink("image/slide/".$slide->image);
            $file->move("page_asset/image/gioithieu", $image);
            $data['image'] = $image;
        } else {
            $data['image'] = "";
        }
        $gioithieu->update($data);
        return redirect()->route('gioithieukhachhang.index')->with('thongbao', 'Giới thiệu của bạn đã được Sửa thành công');
    }

    public function delete($id)
    {
        $gioithieu = Gioithieu::find($id);
        $gioithieu->delete();
        return redirect()->route('gioithieukhachhang.index')->with('thongbao', 'Giới thiệu của bạn đã được Xóa thành công');
    }

}
