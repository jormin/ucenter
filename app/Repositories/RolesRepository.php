<?php

namespace App\Repositories;

use App\Models\Role;

class RolesRepository
{

    /**
     * 添加角色
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createRole($request)
    {

        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        activity()->on($role)->log('创建角色['.$request->name.']成功');
        if($request->perms){
            $role->attachPermissions($request->perms);
            activity()->on($role)->log('设定角色['.$request->name.']权限成功');
        }
    }


    /**
     * 编辑角色
     * @param $request
     * @param $id
     */
    public function updateRole($request,$id)
    {
        $role = Role::findOrFail($id);
        $properties = [
            'old' => $role
        ];
        if($role->name !== 'admin'){
            $role->name = $request->name;
        }
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        $role['new'] = $role;
        activity()->on($role)->withProperties($properties)->log('修改角色['.$role->name.']成功');
        $role->savePermissions($request->perms);
        activity()->on($role)->log('修改角色['.$role->name.']权限成功');
    }


    /**
     * 删除角色
     *
     * @param  $id
     */
    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->users()->detach();
        $role->perms()->detach();
        $role->menus()->detach();
        $role->delete();
        activity()->on($role)->log('删除角色['.$role->name.']成功');
    }

}
