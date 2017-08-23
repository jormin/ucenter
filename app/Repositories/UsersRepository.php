<?php

namespace App\Repositories;


use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersRepository
{


    /**
     * 添加账号
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createUser($request)
    {
        $data = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'sex' => $request->sex,
            'is_active' => 1
        ];
        if($request->hasFile('avatar')){
            $data['avatar'] = $request->file('avatar')->store('avatars');
        }
        $user = User::query()->create($data);

        activity()->on($user)->log('创建账号['.$request->username.']成功');

        $roles = $request->roles;
        if($roles){
            foreach ($roles as $roleId){
                $role = Role::query()->find($roleId);
                if($role){
                    $role->users()->attach($user->id);
                }
            }
            activity()->on($user)->log('设定账号['.$request->username.']角色成功');
        }
    }


    /**
     * 编辑账号
     * @param $request
     * @param $id
     */
    public function updateUser($request,$id)
    {
        $user = User::query()->findOrFail($id);
        $properties = [
            'old' => $user
        ];
        if($request->hasFile('avatar')){
            $user->avatar = $request->file('avatar')->store('avatars');
        }
        if(Auth::user()->can('admins-edit')){
            if($request->username){
                $user->username = $request->username;
            }
        }
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();
        $properties['new'] = $user;
        activity()->on($user)->withProperties($properties)->log('编辑账号['.$user->username.']成功');
    }

    /**
     * 更新账号角色
     * @param $request
     * @param $id
     */
    public function updateUserRoles($request,$id){
        $user = User::query()->findOrFail($id);
        if($roles = $request->roles){
            $user->roles()->sync($roles);
        }else{
            $user->roles()->detach();
        }
        activity()->on($user)->log('设定账号['.$user->username.']角色成功');

    }

    /**
     * 删除账号
     *
     * @param  $id
     */
    public function deleteUser($id)
    {
        $user = User::query()->findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        activity()->on($user)->log('删除账号['.$user->username.']成功');
    }

    /**
     * 激活账号
     *
     * @param $request
     * @param $id
     */
    public function activeUser($request,$id)
    {
        $user = User::query()->findOrFail($id);
        $user->is_active = $request->is_active;
        $user->save();
        $log = '账号['.$user->username.']成功';
        if($request->is_active){
            $log = '激活'.$log;
        }else{
            $log = '关闭'.$log;
        }
        activity()->on($user)->log($log);
    }

    /**
     * 修改账号密码
     * @param $request
     * @param $id
     */
    public function changePassword($request,$id){
        $user = User::query()->findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        activity()->on($user)->log('修改账号['.$user->username.']密码成功');
    }

    /**
     * 读取选项数组
     *
     * @return mixed
     */
    public function options(){
        return User::query()->pluck('name','id')->toArray();
    }

}
