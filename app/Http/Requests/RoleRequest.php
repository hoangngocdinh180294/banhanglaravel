<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'display_name'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Bạn vui lòng nhập tên',
            'display_name.required'=>'Bạn vui lòng nhập tên đầy đủ',
        ];
    }
}
