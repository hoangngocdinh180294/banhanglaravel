<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Typeproduct;
use DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        if ($product){
            return view('admin.sanpham.index', compact('product'));
        }
            echo "<div class='alert alert-success'>Không có dữ liệu</div>";
     }

    public function create()
    {
        $typeproduct = Typeproduct::all();
        return view('admin.sanpham.add', compact('typeproduct'));
    }

    public function store(ProductRequest $request)
    {
        // $product = new Product();
//        $product->name = $request->name;
//        $product->description = $request->description;
//        $product->unit_price = $request->unit_price;
//        $product->promotion_price = $request->promotion_price;
//        $product->unit = $request->unit;
//        $product->typeproduct_id = $request->typeproduct_id;
        $product = Product::create($request->all());
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

    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->update($request->all());

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

//        $product->name= $request->name;
//        $product->description= $request->description;
//        $product->unit_price= $request->unit_price;
//        $product->promotion_price= $request->promotion_price;
//        $product->unit= $request->unit;
//        $product->typeproduct_id= $request->typeproduct_id;
//        $product->save();


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
