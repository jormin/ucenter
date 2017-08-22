<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use App\Repositories\PermissionsRepository;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{

    protected $permRepo;

    /**
     * PermissionsController constructor.
     * @param PermissionsRepository $permRepo
     */
    public function __construct(PermissionsRepository $permRepo)
    {
        $this->permRepo = $permRepo;
        $this->middleware('permission:perms-index',['only'=>'index']);
        $this->middleware('permission:perms-create',['only'=>['create','store']]);
        $this->middleware('permission:perms-edit',['only'=>['edit','update']]);
        $this->middleware('permission:perms-destroy',['only'=>'destroy']);
    }

    /**
     * 权限列表
     */
    public function index(){
        $perms = Permission::paginate(30);
        return view('backend.auth.perm.index',compact('perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.auth.perm.create');
    }

    /**
     * 新建权限
     *
     * @param CreatePermissionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePermissionRequest $request)
    {
        $this->permRepo->createPermission($request);
        return redirect()->back()->with('success','创建权限成功');
    }

    /**
     * 编辑权限
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perm = Permission::findOrFail($id);
        $permOptions = Permission::pluck('display_name','id')->toArray();
        return view('backend.auth.perm.edit',compact('perm','permOptions'));
    }

    /**
     * 更新权限
     *
     * @param UpdatePermissionRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePermissionRequest $request,$id){
        $this->permRepo->updatePermission($request,$id);
        return redirect()->back()->with('success','编辑权限成功');
    }

    /**
     * 删除权限
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $this->permRepo->deletePermission($id);
        return redirect()->back()->with('success','删除权限成功');
    }
}
