<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActiveAdminRequest extends FormRequest
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
            'is_active' => 'required|in:0,1'
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
            'is_active.required' => '请选择激活状态',
            'is_active.in' => '请选择激活状态'
        ];
    }
}
