<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => '超级管理员',
                'description' => '超级管理员可以管理网站的全部内容',
                'created_at' => '2017-05-26 14:43:32',
                'updated_at' => '2017-05-26 14:43:32',
            ),
        ));
        
        
    }
}