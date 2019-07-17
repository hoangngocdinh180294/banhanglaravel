<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LienheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'title'=>'required',
            'noidung'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'     =>'Bạn chưa nhập họ tên',
            'email.required'    =>'Bạn chưa nhập Email',
            'email.email'       =>'Vui lòng nhập đúng cú pháp Email',
            'title.required'    =>'Bạn chưa nhập tiêu đề',
            'noidung.required'  =>'Bạn chưa nhập nội dung',
        ];
    }
    
}
