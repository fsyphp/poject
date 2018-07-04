<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequest extends FormRequest
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
            'title' => 'required|unique:integral',
            'stock' => 'required|regex:/^\d+$/',
            'desc' => 'required',
            'static' => 'required|regex:/[0,1,2]/',
            'price' => 'required|regex:/^\d+$/',
            'img' => 'required',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * 重写错误信息
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => '商品名称不能为空',
            'title.unique' => '商品名称已存在',
            'stock.required' => '请输入库存数量',
            'stock.regex' => '库存只能是数量',
            'desc.required' => '请输入商标介绍',
            'static.required' => '请选择状态',
            'static.regex' => '非法操作',
            'price.required' => '所需积分不能为空',
            'price.regex' => '所需商品只能是数字',
            'img.required' => '请上传商品图片',
        ];
    }
    
}
