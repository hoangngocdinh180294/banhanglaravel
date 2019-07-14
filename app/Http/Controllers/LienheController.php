<?php

namespace App\Http\Controllers;
use App\Lienhe;
use Carbon\Carbon;
use Mail;

use Illuminate\Http\Request;

class LienheController extends Controller
{
    public function getlienhe()
    {
        return view('page.lienhe');
    }
    public function postlienhe(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'email'=>'required|email',
            'title'=>'required',
            'noidung'=>'required',
        ],
        [   
            'name.required'     =>'Bạn chưa nhập họ tên',
            'email.required'    =>'Bạn chưa nhập Email',
            'email.email'       =>'Vui lòng nhập đúng cú pháp Email',
            'title.required'    =>'Bạn chưa nhập tiêu đề',
            'noidung.required'  =>'Bạn chưa nhập nội dung',
        ]);
        
        $email=[
            'ten'=>$request->name,
            'email'=>$request->email,
            'tieude'=>$request->title,
            'noidung'=>$request->noidung
        ];
        Mail::send('Email.lienhe',$email,function($message) use($email){
            $message    ->from($email['email']);
            $message    ->to('hoangngocdinh180294@gmail.com');
            $message    ->cc('nanggiodaoxa@gmail.com');
            $message    ->subject('Cửa hàng Hoàng Định phản hồi lại khách hàng');
        });
        //dd($request->all());
        $data= $request->except('_token');
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        //dd($data);
        Lienhe::insert($data);
        return redirect()->back()->with('thongbao','Quý khách đã gửi Email thành công. Chúng tôi sẽ phản hồi lại quý khách trong thời gian gần nhất');
    }

}
