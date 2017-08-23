<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{

    /**
     * 登录
     *
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request){
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user()->toArray();
            unset($user['password']);
            unset($user['remember_token']);
            return $this->responseData($user);
        }else{
            return $this->responseError('登录失败');
        }
    }
}
