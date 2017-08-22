<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Menu;
use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{

    protected $roleRepo;

    /**
     * RolesController constructor.
     * @param RolesRepository $roleRepo
     */
    public function __construct(RolesRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->middleware('permission:roles-index',['only'=>'index']);
        $this->middleware('permission:roles-create',['only'=>['create','store']]);
        $this->middleware('permission:roles-edit',['only'=>['edit','update']]);
        $this->middleware('permission:roles-destroy',['only'=>'destroy']);
    }

    /**
     * 角色列表
     */
    public function index(){
        $query = Role::query();
        if(!Auth::user()->hasRole('admin')){
            $query = $query->where('id','<>',1);
        }
        $roles = $query->paginate(30);
        $perms = Permission::get();
    	return view('backend.auth.role.index',compact('roles','perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Permission::query();
        if(!Auth::user()->hasRole('admin')){
            $query = $query->where('name','not like','%perms%')->where('name','not like','%menus%');
        }
        $permOptions = $query->pluck('display_name','id')->toArray();
        $menuOptions = Menu::pluck('name','id')->toArray();
        return view('backend.auth.role.create',compact('permOptions','menuOptions'));
    }

    /**
     * 新建角色
     *
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    {
        $this->roleRepo->createRole($request);
        return redirect()->back()->with('success','创建角色成功');
    }

    /**
     * 编辑角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->hasRole('admin') && $id == 1){
            abort(403);
        }
        $role = Role::findOrFail($id);
        $query = Permission::query();
        if(!Auth::user()->hasRole('admin')){
            $query = $query->where('name','not like','%perms%')->where('name','not like','%menus%');
        }
        $permOptions = $query->pluck('display_name','id')->toArray();
        return view('backend.auth.role.edit',compact('role','permOptions'));
    }

    /**
     * 更新角色
     *
     * @param UpdateRoleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request,$id){
        if(!Auth::user()->hasRole('admin') && $id == 1){
            abort(403);
        }
        $this->roleRepo->updateRole($request,$id);
        return redirect()->back()->with('success','编辑角色成功');
    }

    /**
     * 删除角色
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        if(!Auth::user()->hasRole('admin') && $id == 1){
            abort(403);
        }
        $this->roleRepo->deleteRole($id);
        return redirect()->back()->with('success','删除角色成功');
    }
}
