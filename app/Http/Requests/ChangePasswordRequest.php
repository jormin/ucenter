<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password_old' => 'required|min:6',
            'password' => 'required|confirmed|min:6'
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
            'password_old.required' => '请填写旧密码',
            'password_old.min' => '密码最少为6个字符',
            'password.required' => '请填写新密码',
            'password.confirmed' => '新密码和确认密码不一致',
            'password.min' => '密码最少为6个字符'
        ];
    }
}
