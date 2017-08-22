<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Menu;
use App\Models\Permission;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //关闭外键约束检查
        DB::statement('SET FOREIGN_KEY_CHECKS = 0 ');

        //清空权限相关的表
        Permission::truncate();
        Role::truncate();
        User::truncate();
        Menu::truncate();
        DB::table('role_user')->delete();
        DB::table('permission_role')->delete();

        //开启外键约束检查
        DB::statement('SET FOREIGN_KEY_CHECKS = 0 ');

        // 创建初始账号
        $admin_user = User::create([
            'username' => 'admin',
            'password' => bcrypt('111111'),
            'name' => 'admin',
            'mobile' => '18712345678',
            'email' => 'test@gmail.com',
            'sex' => 1,
            'is_active' => 1,
        ]);

        // 创建管理员角色
        $admin_role = Role::create([
            'name' => 'admin',
            'display_name' => '超级管理员',
            'description' => '超级管理员可以管理网站的全部内容',
        ]);

        //创建相应的初始权限
        $permissions = array(
            //权限相关
            array(
                'name' => 'create_permission',
                'display_name' => '创建权限',
                'description' => '创建权限的权限'
                ),
            array(
                'name' => 'edit_permission',
                'display_name' => '编辑权限',
                'description' => '编辑权限的权限'
                ),
            array(
                'name' => 'delete_permission',
                'display_name' => '删除权限',
                'description' => '删除权限的权限'
                ),
            //角色相关
            array(
                'name' => 'create_role',
                'display_name' => '创建角色',
                'description' => '创建角色的权限'
                ),
            array(
                'name' => 'edit_role',
                'display_name' => '编辑角色',
                'description' => '编辑角色的权限'
                ),
            array(
                'name' => 'delete_role',
                'display_name' => '删除角色',
                'description' => '删除角色的权限'
                ),
            //管理员相关
            array(
                'name' => 'create_admin',
                'display_name' => '创建管理员',
                'description' => '创建管理员的权限'
                ),
            array(
                'name' => 'edit_admin',
                'display_name' => '编辑管理员',
                'description' => '编辑管理员的权限'
                ),
            array(
                'name' => 'delete_admin',
                'display_name' => '删除管理员',
                'description' => '删除管理员的权限'
                ),
            //菜单相关
            array(
                'name' => 'create_menu',
                'display_name' => '创建菜单',
                'description' => '创建菜单的权限'
            ),
            array(
                'name' => 'edit_menu',
                'display_name' => '编辑菜单',
                'description' => '编辑菜单的权限'
            ),
            array(
                'name' => 'delete_menu',
                'display_name' => '删除菜单',
                'description' => '删除菜单的权限'
            ),
            //用户相关
            array(
                'name' => 'create_user',
                'display_name' => '创建用户',
                'description' => '创建用户的权限'
            ),
            array(
                'name' => 'edit_user',
                'display_name' => '编辑用户',
                'description' => '编辑用户的权限'
            ),
            array(
                'name' => 'delete_user',
                'display_name' => '删除用户',
                'description' => '删除用户的权限'
            ),
            );
        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);
            //给角色赋予相应的权限
            $admin_role->attachPermission($permission);
        }

        //给用户赋予相应的角色
        $admin_user->attachRole($admin_role);
    }
}
