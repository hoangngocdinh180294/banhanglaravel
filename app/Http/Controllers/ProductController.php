<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Typeproduct;
use DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.sanpham.index', compact('product'));
    }

    public function create()
    {
        $typeproduct = Typeproduct::all();
        return view('admin.sanpham.add', compact('typeproduct'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'unit' => 'required',
                'typeproduct_id' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            ],
            [
                'name.required' => 'Bạn vui lòng nhập tên sản phẩm',
                'description.required' => 'Bạn vui lòng nhập mô tả',
                'unit_price.required' => 'Bạn vui lòng nhập giá sản phẩm',
                'promotion_price.required' => 'Bạn vui lòng nhập giá khuyển mãi sản phẩm',
                'unit.required' => 'Bạn vui lòng nhập Chủng Loại là 1 hoặc 0',
                'typeproduct_id.required' => 'Bạn vui lòng chọn loại sản phẩm',
                'image.required' => 'Bạn vui lòng nhập ảnh',
                'image.image' => 'Đây không phải là ảnh',
                'image.mimes' => 'Đuôi ảnh này không hợp lệ',
            ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->typeproduct_id = $request->typeproduct_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;
            while (file_exists("page_asset/image/product/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("page_asset/image/product", $image);
            $product->image = $image;
        } else {
            $product->image = "";
        }
        $product->save();

        return redirect()->route('product.index')->with('thongbao', 'Sản phẩm đã được Update thành công');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $typeproduct = Typeproduct::all();
        //$list=$product->typeproduct;
        //dd($list);
        return view('admin.sanpham.edit', compact('product', 'typeproduct'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'unit' => 'required',
                'typeproduct_id' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            ],
            [
                'name.required' => 'Bạn vui lòng nhập tên sản phẩm',
                'description.required' => 'Bạn vui lòng nhập mô tả',
                'unit_price.required' => 'Bạn vui lòng nhập giá sản phẩm',
                'promotion_price.required' => 'Bạn vui lòng nhập giá khuyển mãi sản phẩm',
                'unit.required' => 'Bạn vui lòng nhập Chủng Loại là 1 hoặc 0',
                'typeproduct_id.required' => 'Bạn vui lòng chọn loại sản phẩm',
                'image.required' => 'Bạn vui lòng nhập ảnh',
                'image.image' => 'Đây không phải là ảnh',
                'image.mimes' => 'Đuôi ảnh này không hợp lệ',
            ]);
        try {
            DB::beginTransaction();
            $product = Product::find($id);

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $name = $file->getClientOriginalName();
                $image = str_random(4) . "_" . $name;
                while (file_exists("page_asset/image/product/" . $image)) {
                    $image = str_random(4) . "_" . $name;
                }
                $file->move("page_asset/image/product", $image);
                $product->image = $image;
            } else {
                $product->image = "";
            }

        $product->name= $request->name;
        $product->description= $request->description;
        $product->unit_price= $request->unit_price;
        $product->promotion_price= $request->promotion_price;
        $product->unit= $request->unit;
        $product->typeproduct_id= $request->typeproduct_id;
        $product->save();

            DB::commit();
            return redirect()->route('product.index')->with('thongbao', 'Sản phẩm đã được Sửa thành công');
        } catch (\Throwable $th) {
            Log::error('Loi:' . $th->getMessage() . $th->getLine());
            DB::rollback();
        }
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('thongbao', 'Sản phẩm đã được Xóa thành công');
    }
}
