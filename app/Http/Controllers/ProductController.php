<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Typeproduct;
use DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        if ($product) {
            return view('admin.sanpham.index', compact('product'));
        }
        return "<div class='alert alert-success'>Không có dữ liệu</div>";
    }

    public function create()
    {
        $typeproduct = Typeproduct::all();
        return view('admin.sanpham.add', compact('typeproduct'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
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
        Product::create($data);

        return redirect()->route('product.index')->with('thongbao', 'Sản phẩm đã được Update thành công');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $typeproduct = Typeproduct::all();
        return view('admin.sanpham.edit', compact('product', 'typeproduct'));
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $data = $request->all();

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
            $product->update($data);
            DB::commit();
            return redirect()->route('product.index')->with('thongbao', 'Sản phẩm đã được Sửa thành công');
        } catch (\Throwable $th) {
            Log::error('Loi:' . $th->getMessage() . $th->getLine());
            DB::rollback();
        }
    }

    public function delete($id)
    {
        // sua ngay 18/7
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->delete();
            $product->bill_details()->delete();

            DB::commit();
            return redirect()->route('product.index')->with('thongbao', 'Sản phẩm đã được Xóa thành công');
            
        } catch (\Throwable $th) {
            Log::error('Loi:' . $th->getMessage() . $th->getLine());
            DB::rollback();

        }
        
        
    }
}
