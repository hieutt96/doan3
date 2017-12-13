<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Leaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaders',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('phone');
            $table->string('chuyenmon')->nullable();
            $table->string('phong_ban')->nullable();
            $table->string('chuc_vu')->nullable();
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
        Schema::dropIfExists('leaders');
    }
}
