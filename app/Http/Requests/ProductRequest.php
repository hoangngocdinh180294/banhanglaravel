<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'unit_price' => 'required',
            'promotion_price' => 'required',
            'unit' => 'required',
            'typeproduct_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Bạn vui lòng nhập tên sản phẩm',
            'description.required' => 'Bạn vui lòng nhập mô tả',
            'unit_price.required' => 'Bạn vui lòng nhập giá sản phẩm',
            'promotion_price.required' => 'Bạn vui lòng nhập giá khuyển mãi sản phẩm',
            'unit.required' => 'Bạn vui lòng nhập Chủng Loại là 1 hoặc 0',
            'typeproduct_id.required' => 'Bạn vui lòng chọn loại sản phẩm',
            'image.required' => 'Bạn vui lòng nhập ảnh',
            'image.image' => 'Đây không phải là ảnh',
            'image.mimes' => 'Đuôi ảnh này không hợp lệ',
        ];
    }
}
