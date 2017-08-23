<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ActiveAdminRequest;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{

    protected $userRepo;

    /**
     * AdminsController constructor.
     * @param UsersRepository $userRepo
     */
    public function __construct(UsersRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('permission:admins-index',['only'=>'index']);
        $this->middleware('permission:admins-create',['only'=>['create','store']]);
        $this->middleware('permission:admins-edit',['only'=>['edit','update']]);
        $this->middleware('permission:admins-destroy',['only'=>'destroy']);
        $this->middleware('permission:admins-active',['only'=>'active']);
    }

    /**
     * 管理员列表
     */
    public function index(){
        $query = User::with('roles.perms');
        if(!Auth::user()->hasRole('admin')){
            $query = $query->where('id','<>',1);
        }
        $admins = $query->paginate(30);
        $roles = Role::query()->get();
        return view('backend.auth.admin.index',compact('admins','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Role::query();
        if(!Auth::user()->hasRole('admin')){
            $query = $query->where('id','<>','1');
        }
        $roleOptions = $query->pluck('display_name','id')->toArray();
        return view('backend.auth.admin.create',compact('roleOptions'));
    }

    /**
     * 创建账号
     *
     * @param CreateAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAdminRequest $request)
    {
        $this->userRepo->createUser($request);
        return redirect()->back()->with('success','创建账号成功');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->hasRole('admin') && $id == 1){
            abort(403);
        }
        $admin = User::query()->findOrFail($id);
        $query = Role::query();
        if(!Auth::user()->hasRole('admin')){
            $query = $query->where('id','<>','1');
        }
        $roleOptions = $query->pluck('display_name','id')->toArray();
        return view('backend.auth.admin.edit',compact('admin','roleOptions'));
    }

    /**
     * 更新管理员
     *
     * @param UpdateAdminRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminRequest $request,$id)
    {
        if(!Auth::user()->hasRole('admin') && $id == 1){
            abort(403);
        }
        $this->userRepo->updateUser($request,$id);
        $this->userRepo->updateUserRoles($request,$id);
        return redirect()->back()->with('success','编辑账号成功');
    }

    /**
     * 删除管理员
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(!Auth::user()->hasRole('admin') && $id == 1){
            abort(403);
        }
        $this->userRepo->deleteUser($id);
        return redirect()->back()->with('success','删除账号成功');
    }

    /**
     * 激活账号
     *
     * @param ActiveAdminRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active(ActiveAdminRequest $request, $id){
        $this->userRepo->activeUser($request, $id);
        $msg = '账号成功';
        if($request->input('is_active')){
            $msg = '激活'.$msg;
        }else{
            $msg = '关闭'.$msg;
        }
        return redirect()->back()->with('success',$msg);
    }
}
