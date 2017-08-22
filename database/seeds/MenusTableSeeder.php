<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            array (
                'id' => 1,
                'name' => '管理中心',
                'route' => 'home',
                'permission_id' => 0,
                'icon' => 'fa-home',
                'pid' => NULL,
                'created_at' => '2017-04-26 10:00:33',
                'updated_at' => '2017-05-28 15:49:18',
            ),
            array (
                'id' => 2,
                'name' => '权限管理',
                'route' => NULL,
                'permission_id' => NULL,
                'icon' => 'fa-male',
                'pid' => NULL,
                'created_at' => '2017-04-26 10:00:33',
                'updated_at' => '2017-04-26 10:00:33',
            ),
            array (
                'id' => 3,
                'name' => '管理员',
                'route' => 'admins.index',
                'permission_id' => 1,
                'icon' => '',
                'pid' => 2,
                'created_at' => '2017-04-26 10:00:33',
                'updated_at' => '2017-05-28 20:31:50',
            ),
            array (
                'id' => 4,
                'name' => '角色',
                'route' => 'roles.index',
                'permission_id' => 6,
                'icon' => '',
                'pid' => 2,
                'created_at' => '2017-04-26 10:00:33',
                'updated_at' => '2017-05-28 20:32:02',
            ),
            array (
                'id' => 5,
                'name' => '权限',
                'route' => 'perms.index',
                'permission_id' => 10,
                'icon' => '',
                'pid' => 2,
                'created_at' => '2017-04-26 10:00:33',
                'updated_at' => '2017-05-28 20:32:12',
            ),
            array (
                'id' => 6,
                'name' => '菜单',
                'route' => 'menus.index',
                'permission_id' => 14,
                'icon' => '',
                'pid' => 2,
                'created_at' => '2017-04-26 10:00:33',
                'updated_at' => '2017-05-28 20:32:21',
            ),
            array (
                'id' => 7,
                'name' => '操作日志',
                'route' => '',
                'permission_id' => NULL,
                'icon' => 'fa-file-text-o',
                'pid' => NULL,
                'created_at' => '2017-05-17 07:59:43',
                'updated_at' => '2017-05-17 07:59:43',
            ),
            array (
                'id' => 8,
                'name' => '所有日志',
                'route' => 'logs.index',
                'permission_id' => 63,
                'icon' => 'fa-bars',
                'pid' => 24,
                'created_at' => '2017-05-17 08:00:28',
                'updated_at' => '2017-05-28 20:38:28',
            ),
            array (
                'id' => 9,
                'name' => '我的日志',
                'route' => 'logs.mine',
                'permission_id' => NULL,
                'icon' => 'fa-bars',
                'pid' => 24,
                'created_at' => '2017-05-17 08:01:07',
                'updated_at' => '2017-05-17 08:01:07',
            ),
            array (
                'id' => 10,
                'name' => '登录日志',
                'route' => 'logs.signin',
                'permission_id' => NULL,
                'icon' => 'fa-bars',
                'pid' => 24,
                'created_at' => '2017-05-17 08:01:43',
                'updated_at' => '2017-05-17 08:01:43',
            ),
            array (
                'id' => 11,
                'name' => '导出日志',
                'route' => 'logs.export',
                'permission_id' => 64,
                'icon' => 'fa-bars',
                'pid' => 24,
                'created_at' => '2017-05-17 08:02:01',
                'updated_at' => '2017-05-28 20:38:43',
            ),
            array (
                'id' => 12,
                'name' => '系统设置',
                'route' => '',
                'permission_id' => NULL,
                'icon' => 'fa-cogs',
                'pid' => NULL,
                'created_at' => '2017-04-26 10:23:56',
                'updated_at' => '2017-04-26 10:26:05',
            ),
            array (
                'id' => 13,
                'name' => '选项设置',
                'route' => 'configs.option',
                'permission_id' => 65,
                'icon' => 'fa-bars',
                'pid' => 29,
                'created_at' => '2017-04-26 10:26:38',
                'updated_at' => '2017-05-28 20:39:16',
            ),
        ));
        
        
    }
}