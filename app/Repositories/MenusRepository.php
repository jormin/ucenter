<?php

namespace App\Repositories;


use App\Models\Menu;
use App\Models\Role;

class MenusRepository
{


    /**
     * 新建菜单
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createMenu($request)
    {
        $menu = Menu::query()->create([
            'pid' => $request->pid ? : null,
            'name' => $request->name,
            'icon' => $request->icon,
            'route' => $request->route,
            'permission_id' => $request->permission_id
        ]);
        activity()->on($menu)->log('创建菜单['.$request->name.']成功');
    }


    /**
     * 编辑菜单
     * @param $request
     * @param $id
     */
    public function updateMenu($request,$id)
    {
        $pid = $request->pid ? : null;
        $menu = Menu::query()->findOrFail($id);
        $properties = [
            'old' => $menu
        ];
        $menu->pid = $pid;
        $menu->name = $request->name;
        $menu->icon = $request->icon;
        $menu->route = $request->route;
        $menu->permission_id = $request->permission_id;
        $menu->save();
        $properties['new'] = $menu;
        if($pid){
            Menu::query()->where('pid',$menu->id)->update(['pid'=>null]);
        }
        activity()->on($menu)->withProperties($properties)->log('编辑菜单['.$request->name.']成功');
    }


    /**
     * 删除菜单
     *
     * @param  $id
     */
    public function deleteMenu($id)
    {
        $menu = Menu::query()->find($id);
        $menu->roles()->detach();
        $menu->delete();
        activity()->on($menu)->log('删除菜单['.$menu->name.']成功');
    }

}
