<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment("用户ID")->unsigned();
            $table->string('username',15)->comment("账号");
            $table->string('password',64)->comment("密码");
            $table->string('avatar',100)->comment("头像")->nullable();
            $table->string('name',15)->comment("姓名");
            $table->string('mobile',11)->comment("电话")->nullable();
            $table->string('email',50)->comment("邮箱");
            $table->tinyInteger('sex')->comment("性别 0:未知 1:男 2:女")->default(0);
            $table->tinyInteger('is_active')->comment("是否激活 0:否 1:是")->default(0);
            $table->timestamp('last_login_time')->comment("最近一次登录时间")->nullable();
            $table->string('last_login_ip')->comment("最近一次登录IP")->nullable();
            $table->string('last_login_ip_area')->comment("最近一次登录IP区域")->nullable();
            $table->rememberToken();
            $table->timestamp('deleted_at')->comment("删除时间")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
