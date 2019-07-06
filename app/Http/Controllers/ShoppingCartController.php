<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Bill_detail;
use Cart;
use Mail;
use DB;
use Illuminate\Support\Facades\Log;


class ShoppingCartController extends Controller
{
    public function addProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) return redirect('page.trangchu');
        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->unit_price,
            'options' => ['image' => $product->image
            ]]);
        return redirect()->back();
    }

    public function getlistshoppingcart()
    {
        $products = Cart::content();
        return view('page.shoppingcart', compact('products'));
    }

    public function updateshoppingcart(Request $request, $rowId)
    {
        Cart::update($rowId, ['qty' => $request->qty]);
        return redirect()->back()->with('thongbao', 'Bạn đã Update thành công');
    }

    public function delete($rowId)
    {
        if ($rowId == 'all') {
            Cart::destroy();
            return redirect()->back()->with('thongbao', 'Bạn đã xóa hết giỏ hàng');
        } else {
            Cart::remove($rowId);
            return redirect()->back()->with('thongbao', 'Bạn đã xóa 1 sản phẩm');
        }
    }

    public function thanhtoan()
    {

        $products = Cart::content();
        return view('page.thanhtoan', compact('products'));
    }

    public function sendemail(Request $request)
    {
        $cart = Cart::content();
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'phone_number' => 'required|digits_between:10,12'
            ],
            [
                'name.required' => 'Bạn vui lòng nhập họ tên',
                'email.required' => 'Bạn vui lòng nhập email',
                'email.email' => 'Bạn vui lòng nhập đúng email hợp lệ',
                'address.required' => 'Bạn vui lòng nhập địa chỉ',
                'phone_number.required' => 'Bạn vui lòng nhập số điện thoại',
                'phone_number.digits_between' => 'Bạn vui lòng nhập đúng cú pháp số điện thoại....'
            ]);


        try {
            DB::beginTransaction();
            //TODO:Cach 2
            // save
            //$customer = new Customer;
            //$customer->name = $request->name;
            //$customer->email = $request->email;
            //$customer->address = $request->address;
            //$customer->phone_number = $request->phone_number;
            //$customer->note = $request->note;
            //$customer->save();

            //$bill = new Bill;
            //$bill->customer_id = $customer->id;
            //$bill->date_order = date('Y-m-d H:i:s');
            //$bill->total = str_replace(',', '', Cart::subtotal());
            //$bill->note = $request->note;
            //$bill->save(); 

            //if (count($cart) >0) {
            //foreach ($cart as $key => $item) {
            //$billDetail = new Bill_detail;
            //$billDetail->bill_id = $bill->id;
            //$billDetail->product_id = $item->id;
            //$billDetail->quantily = $item->qty;
            //$billDetail->price = $item->price;
            //$billDetail->save();
            //}
            //}

            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'note' => $request->note,
            ]);
            $bill = $customer->bills()->create([
                'date_order' => date('Y-m-d H:i:s'),
                'total' => str_replace(',', '', Cart::subtotal()),
                'note' => $request->note,
            ]);
            if (count($cart) > 0) {
                foreach ($cart as $item) {
                    $billDetail = new Bill_detail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantily = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                    //$bill->bill_details()->create([
                    //'product_id'=>$item->id,
                    //'quantily'=>$item->qty,
                    //'price'=>$item->price,
                    //]);
                }
            }
            /**
             * MAil
             *  */
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'diachi' => $request->diachi,
                'phone' => $request->phone,
            ];
            $data['cart'] = Cart::content();
            $data['total'] = Cart::subtotal();
            Mail::send('Email.thanhtoan', $data, function ($message) use ($data) {
                $message->from('hoangngocdinh180294@gmail.com', 'Hoàng Ngọc Định');
                $message->to($data['email'], $data['email']);
                $message->cc('nanggiodaoxa@gmail.com', 'Hoàng Ngọc Định');
                $message->subject('Đơn hàng gửi khách hàng');
            });
            Cart::destroy();
            DB::commit();
            return redirect()->back()->with('thongbao', 'Thông tin đơn hàng đã dc gửi qua Email bạn vui lòng kiểm tra lại');
        } catch (\Throwable $th) {
            Log::error('Loi:' . $th->getMessage() . $th->getLine());
            DB::rollback();
        }
    }
}
