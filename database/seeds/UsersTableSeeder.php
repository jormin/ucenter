<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$SO5DP2djSNcNiHJ2lgD.bObrLX2Nt8WoRsNiq8WnQe0vPpN0.EOIa',
                'avatar' => NULL,
                'name' => 'admin',
                'mobile' => '18712345678',
                'email' => 'test@gmail.com',
                'sex' => 1,
                'is_active' => 1,
                'last_login_time' => '2017-05-28 21:34:45',
                'last_login_ip' => '192.168.10.1',
                'last_login_ip_area' => '局域网局域网',
                'remember_token' => '4ffsBELO7QXZ85adBtjTsjBVfNL5jbzcHZuiwB57xiQCUwVVFCkDXcjSmJZh',
                'deleted_at' => NULL,
                'created_at' => '2017-05-26 14:43:32',
                'updated_at' => '2017-05-28 21:34:46',
            ),
        ));
        
        
    }
}