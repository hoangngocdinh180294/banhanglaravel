<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeproductRequest extends FormRequest
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
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn vui lòng nhập tên loại sản phẩm',
            'description.required' => 'Bạn vui lòng nhập mô tả',
            'image.required' => 'Bạn vui lòng nhập ảnh',
            'image.image' => 'Đây không phải là ảnh',
            'image.mimes' => 'Đuôi ảnh này không hợp lệ',
        ];
    }
}
