<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionsRepository
{

    /**
     * 添加权限
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createPermission($request)
    {

        $perm = Permission::query()->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        activity()->on($perm)->log('创建权限['.$request->name.']成功');
    }


    /**
     * 编辑权限
     * @param $request
     * @param $id
     */
    public function updatePermission($request,$id)
    {
        $perm = Permission::query()->findOrFail($id);
        $properties = [
            'old' => $perm
        ];
        if($perm->name !== 'admin'){
            $perm->name = $request->name;
        }
        $perm->display_name = $request->display_name;
        $perm->description = $request->description;
        $perm->save();
        $properties['new'] = $perm;
        activity()->on($perm)->withProperties($properties)->log('修改权限['.$perm->name.']成功');
    }


    /**
     * 删除权限
     *
     * @param  $id
     */
    public function deletePermission($id)
    {
        $perm = Permission::query()->findOrFail($id);
        $perm->roles()->detach();
        $perm->delete();
        activity()->on($perm)->log('删除权限['.$perm->name.']成功');
    }

}
