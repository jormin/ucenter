<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    protected $repo;

    /**
     * UsersController constructor.
     * @param UsersRepository $repo
     */
    function __construct(UsersRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * 修改个人资料
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(){
        return view('backend.user.profile');
    }

    /**
     * 修改个人资料
     *
     * @param UpdateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $this->repo->updateUser($request,Auth::user()->id);
        return redirect()->back()->with('success','修改个人资料成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * 修改账号密码
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password(){
        return view('backend.user.password');
    }

    /**
     * 修改账号密码
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $password_old = $request->password_old;
        $validator = Validator::make($request->all(),$request->rules(),$request->messages());
        if(!Hash::check($password_old,Auth::user()->password)){
            $validator->errors()->add('password_old', '旧密码错误');
            return redirect('/?tab=password')->withErrors($validator);
        }
        $this->repo->changePassword($request,Auth::user()->id);
        Auth::logout();
        return redirect(route('login'))->with('success','修改密码成功，请重新登录');
    }
}
