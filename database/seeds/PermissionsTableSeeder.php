<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admins-index',
                'display_name' => '查看管理员列表',
                'description' => '查看管理员列表的权限',
                'created_at' => '2017-05-27 16:00:41',
                'updated_at' => '2017-05-27 16:00:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admins-create',
                'display_name' => '创建管理员账号',
                'description' => '创建管理员账号的权限',
                'created_at' => '2017-05-27 16:01:05',
                'updated_at' => '2017-05-27 16:01:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'admins-edit',
                'display_name' => '编辑管理员账号',
                'description' => '编辑管理员账号的权限',
                'created_at' => '2017-05-27 16:01:28',
                'updated_at' => '2017-05-27 16:01:28',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admins-destroy',
                'display_name' => '删除管理员账号',
                'description' => '删除管理员账号的权限',
                'created_at' => '2017-05-27 16:01:50',
                'updated_at' => '2017-05-27 16:01:50',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'admins-active',
                'display_name' => '激活/停用管理员账号',
                'description' => '激活/停用管理员账号的权限',
                'created_at' => '2017-05-27 16:02:19',
                'updated_at' => '2017-05-27 16:02:19',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'roles-index',
                'display_name' => '查看角色列表',
                'description' => '查看角色列表的权限',
                'created_at' => '2017-05-27 16:02:36',
                'updated_at' => '2017-05-27 16:02:36',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'roles-create',
                'display_name' => '创建角色',
                'description' => '创建角色的权限',
                'created_at' => '2017-05-27 16:02:53',
                'updated_at' => '2017-05-27 16:02:53',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'roles-edit',
                'display_name' => '编辑角色',
                'description' => '编辑角色的权限',
                'created_at' => '2017-05-27 16:03:08',
                'updated_at' => '2017-05-27 16:03:08',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'roles-destroy',
                'display_name' => '删除角色',
                'description' => '删除角色的权限',
                'created_at' => '2017-05-27 16:03:27',
                'updated_at' => '2017-05-27 16:03:27',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'perms-index',
                'display_name' => '查看权限列表',
                'description' => '查看权限列表的权限',
                'created_at' => '2017-05-27 16:03:50',
                'updated_at' => '2017-05-27 16:03:50',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'perms-create',
                'display_name' => '创建权限',
                'description' => '创建权限的权限',
                'created_at' => '2017-05-27 16:04:04',
                'updated_at' => '2017-05-27 16:04:04',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'perms-edit',
                'display_name' => '编辑权限',
                'description' => '编辑权限的权限',
                'created_at' => '2017-05-27 16:04:17',
                'updated_at' => '2017-05-27 16:04:17',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'perms-destroy',
                'display_name' => '删除权限',
                'description' => '删除权限的权限',
                'created_at' => '2017-05-27 16:04:43',
                'updated_at' => '2017-05-27 16:04:43',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'menus-index',
                'display_name' => '查看菜单列表',
                'description' => '查看菜单列表的权限',
                'created_at' => '2017-05-27 16:05:04',
                'updated_at' => '2017-05-27 16:05:55',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'menus-create',
                'display_name' => '创建菜单',
                'description' => '创建菜单的权限',
                'created_at' => '2017-05-27 16:05:16',
                'updated_at' => '2017-05-27 16:05:16',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'menus-edit',
                'display_name' => '编辑菜单',
                'description' => '编辑菜单的权限',
                'created_at' => '2017-05-27 16:05:28',
                'updated_at' => '2017-05-27 16:05:28',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'menus-destroy',
                'display_name' => '删除菜单',
                'description' => '删除菜单的权限',
                'created_at' => '2017-05-27 16:05:40',
                'updated_at' => '2017-05-27 16:05:40',
            ),
        ));
        
        
    }
}