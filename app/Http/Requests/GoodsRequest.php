<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
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
            //
            'gname' => 'required|regex:/^\w{6,12}$/',
            'price' => 'required|regex:/^\d{1,7}$/'
        ];
    }
    public function messages()
    {
        return [
            'gname.required'=>'用户名不能为空',
            'price.regex'=>'用户名格式不正确' 
        ];
    }
}
