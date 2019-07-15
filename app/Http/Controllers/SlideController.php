<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    public function index()
    {
        $slide = Slide::all();
        return view('admin.slide.index', compact('slide'));
    }

    public function create()
    {
        return view('admin.slide.add');
    }

    public function store(SlideRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("page_asset/image/slide/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("page_asset/image/slide", $image);
            $data['image'] = $image;
        } else {
            $data['image'] = "";
        }
        Slide::create($data);
        return redirect()->route('slide.index')->with('thongbao', 'Slide của bạn đã được Thêm thành công');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit', compact('slide'));
    }

    public function update(SlideRequest $request, $id)
    {
        $slide = Slide::find($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("page_asset/image/slide/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            //unlink("image/slide/".$slide->image);
            $file->move("page_asset/image/slide", $image);
            $data['image'] = $image;
        } else {
            $data['image'] = "";
        }
        $slide->update($data);
        return redirect()->route('slide.index')->with('thongbao', 'Slide của bạn đã được Sửa thành công');
    }

    public function delete($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->route('slide.index')->with('thongbao', 'Slide của bạn đã được Xóa thành công');
    }
}
