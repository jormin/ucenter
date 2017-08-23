<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponder;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    use ApiResponder;

    /**
     * 当前登录用户
     *
     * @var
     */
    public $user;

    /**
     * BaseController constructor.
     */
    function __construct()
    {
        $this->user = Auth::guard('api')->user();
    }
}
