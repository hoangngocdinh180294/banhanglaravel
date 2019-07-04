<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

class KhachhangController extends Controller
{
    public function index()
    {
        $khachhang = Customer::all();
        return view('admin.khachhang.index', compact('khachhang'));
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $khachhang = Customer::find($id);
            $khachhang->delete();
            $khachhang->bills()->delete();
            DB::commit();
            return redirect()->route('khachhang.index')->with('thongbao', 'Bạn đã xóa khách hàng thành công');
        } catch (\Throwable $th) {
            Log::error('Loi:' . $th->getMessage() . $th->getLine());
            DB::rollback();
        }
    }
}
