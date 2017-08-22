<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'max:255',
            'perms' => 'sometimes|array',
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
            'name.required' => '请填写角色名称',
            'name.unique' => '角色已存在',
            'display_name.required' => '请填写显示名称',
            'description.max' => '描述最多为255个字符',
            'perms.array' => '请选择权限'
        ];
    }
}
