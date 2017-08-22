<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSigninLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signin_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment("用户ID")->unsigned();
            $table->string('ip',15)->comment("IP地址");
            $table->string('ip_area')->comment("IP地区");
            $table->timestamp('login_time')->comment("登录时间")->nullable();
            $table->timestamp('logout_time')->comment("退出时间")->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signin_logs');
    }
}
