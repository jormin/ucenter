<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\Permission;
use App\Repositories\MenusRepository;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{

    protected $menuRepo;

    /**
     * MenusController constructor.
     */
    public function __construct(MenusRepository $menuRepo)
    {
        $this->menuRepo = $menuRepo;
        $this->middleware('permission:menus-index',['only'=>'index']);
        $this->middleware('permission:menus-create',['only'=>['create','store']]);
        $this->middleware('permission:menus-edit',['only'=>['edit','update']]);
        $this->middleware('permission:perms-destroy',['only'=>'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::whereNull('pid')->paginate(30);
        return view('backend.auth.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pmenuOptions = Menu::whereNull('pid')->pluck('name','id')->toArray();
        $pmenuOptions = array('0'=>'无') + $pmenuOptions;
        $permissionOptions = Permission::pluck('display_name','id')->toArray();
        $permissionOptions = array('0'=>'无') + $permissionOptions;
        return view('backend.auth.menu.create',compact('menus','pmenuOptions','permissionOptions'));
    }

    /**
     * 存储菜单
     *
     * @param CreateMenuRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateMenuRequest $request)
    {
        $this->menuRepo->createMenu($request);
        return redirect(route('menus.index'))->with('success','新建菜单成功');
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
        $menu = Menu::findOrFail($id);
        $pmenuOptions = Menu::whereNull('pid')->pluck('name','id')->toArray();
        $pmenuOptions = array('0'=>'无') + $pmenuOptions;
        $permissionOptions = Permission::pluck('display_name','id')->toArray();
        $permissionOptions = array('0'=>'无') + $permissionOptions;
        return view('backend.auth.menu.edit',compact('menu','pmenuOptions','permissionOptions'));
    }

    /**
     * 更新菜单
     *
     * @param UpdateMenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMenuRequest $request, $id)
    {
        $this->menuRepo->updateMenu($request,$id);
        return redirect(route('menus.index'))->with('success','编辑菜单成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menuRepo->deleteMenu($id);
        return redirect()->back()->with('success','删除菜单成功');
    }
}
