<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name' => 'required|max:15',
            'icon' => 'required_without:pid',
        ];
    }

    /**
     * 验证返回信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请填写菜单名称',
            'name.max' => '菜单名称最多为15个字符',
            'icon.required' => '请选择图标',
        ];
    }
}
