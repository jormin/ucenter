<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id')->comment('配置项ID');
            $table->enum('type',['SIZE','AREA','GRAMS','PAGETYPE','RATE','TECHNICS'])->comment('配置类型')->default('SIZE');
            $table->string('value',20)->comment('配置项值');
            $table->tinyInteger('default')->comment('是否默认(0:否  1:是)')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
