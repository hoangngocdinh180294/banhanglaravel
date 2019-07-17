<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:6',
            'password1'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Bạn vui lòng nhập tên',
            'email.required'=>'Bạn vui lòng nhập Email',
            'email.unique'=>'Email này đã tồn tại',
            'email.email'=>'Đây không phải là Email',
            'password.required'=>'Bạn vui lòng nhập Mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 6 ký tư',
            'password1.required'=>'Bạn vui lòng nhập lại Mật khẩu',
            'password1.same'=>'Mật khẩu của bạn không giống nhau',
        ];
    }
}
