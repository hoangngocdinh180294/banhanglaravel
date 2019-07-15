<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use DB;
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        return view('admin.hoadon.index', compact('bills'));
    }
    public function edit($id)
    {
        $bills = Bill::find($id);
        return view('admin.hoadon.edit', compact('bills'));
    }
    public function update(BillRequest $request, $id)
    {
        $bill=Bill::find($id);
        $data=$request->all();
        $bill->update($data);

        return redirect()->route('bill.index')->with('thongbao', 'Bạn đã thay đổi thành công trạng thái của hóa đơn');
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $bills = Bill::find($id);
            $bills->delete();
            $bills->customer()->delete();
            $bills->bill_details()->delete();
            DB::commit();
            return redirect()->back()->with('thongbao', 'Bạn đã xóa đơn hàng thành công');
        } catch (\Exception $exception) {
            Log::error('Loi:' . $exception->getMessage() . $exception->getLine());
            DB::rollback();
        }
    }
}
