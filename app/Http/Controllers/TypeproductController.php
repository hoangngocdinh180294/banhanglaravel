<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeproduct;
use DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\TypeproductRequest;

class TypeproductController extends Controller
{
    public function index()
    {
        $typeproduct = Typeproduct::all();
        if ($typeproduct) {
            return view('admin.loaisanpham.index', compact('typeproduct'));
        }
        return "<div class='alert alert-success'>Khong co du lieu</div>";
    }

    public function create()
    {
        return view('admin.loaisanpham.add');
    }

    public function store(TypeproductRequest $request)
    {
        try {
            DB::beginTransaction();
            $data=$request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $name = $file->getClientOriginalName();
                $image = str_random(4) . "_" . $name;
                while (file_exists("page_asset/image/product/" . $image)) {
                    $image = str_random(4) . "_" . $name;
                }
                $file->move("page_asset/image/product", $image);
                $data['image'] = $image;
            } else {
                $data['image'] = "";
            }
            Typeproduct::create($data);
            DB::commit();
            return redirect()->route('typeproduct.index')->with('thongbao', 'Bạn đã thêm loại sản phẩm thành công');
        } catch (\Exception $exception) {
            Log::error('Loi:' . $exception->getMessage() . $exception->getLine());

            DB::rollback();
        }
    }

    public function edit($id)
    {
        $typeproduct = Typeproduct::find($id);
         return view('admin.loaisanpham.edit', compact('typeproduct'));
    }

    public function update(TypeproductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $typeproduct = Typeproduct::find($id);
            $data=$request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $name = $file->getClientOriginalName();
                $image = str_random(4) . "_" . $name;
                while (file_exists("page_asset/image/product/" . $image)) {
                    $image = str_random(4) . "_" . $name;
                }
                //unlink("image/slide/".$slide->image);
                $file->move("page_asset/image/product", $image);
                $data['image'] = $image;
            } else {
                $data['image']->image = "";
            }
            $typeproduct->create($data);
            DB::commit();
            return redirect()->route('typeproduct.index')->with('thongbao', 'Bạn đã sửa loại sản phẩm thành công');
        } catch (\Throwable $th) {
            Log::error('Loi:' . $th->getMessage() . $th->getLine());
            DB::rollback();

        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $typeproduct = Typeproduct::find($id);
            $typeproduct->delete();
            $typeproduct->products()->delete();
            DB::commit();
            return redirect()->route('typeproduct.index')->with('thongbao', 'Bạn đã xóa loại sản phẩm thành công');
        } catch (\Exception $exception) {
            Log::error('Loi:' . $exception->getMessage() . $exception->getLine());
            DB::rollback();
        }
    }
}
