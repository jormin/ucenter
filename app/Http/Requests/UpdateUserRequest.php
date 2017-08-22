<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'avatar' => 'sometimes|required',
            'name' => 'required|max:15',
            'sex' => 'required|in:0,1,2|integer',
            'email' => 'required|email',
            'mobile' => 'required|max:11|zh_mobile'
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
            'name.required' => '请填写姓名',
            'name.max' => '姓名最多为15个字符',
            'mobile.max' => '手机号最多为11个字符',
            'mobile.zh_mobile' => '请输入正确格式的中国大陆手机',
            'sex.in' => '请选择正确的性别'
        ];
    }
}
