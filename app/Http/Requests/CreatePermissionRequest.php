<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
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
            'name' => 'required|unique:permissions,name',
            'display_name' => 'required',
            'description' => 'max:255',
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
            'name.required' => '请填写权限名称',
            'name.unique' => '权限已存在',
            'display_name.required' => '请填写显示名称',
            'description.max' => '描述最多为255个字符',
        ];
    }
}
