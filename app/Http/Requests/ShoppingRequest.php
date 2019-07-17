<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required|digits_between:10,12'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Bạn vui lòng nhập họ tên',
            'email.required' => 'Bạn vui lòng nhập email',
            'email.email' => 'Bạn vui lòng nhập đúng email hợp lệ',
            'address.required' => 'Bạn vui lòng nhập địa chỉ',
            'phone_number.required' => 'Bạn vui lòng nhập số điện thoại',
            'phone_number.digits_between' => 'Bạn vui lòng nhập đúng cú pháp số điện thoại....'
        ];
    }
}
