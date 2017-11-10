<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('lop');
            $table->integer('mssv')->unique();
            $table->string('grade');
            $table->string('ctdt');
            $table->string('bomon');
            $table->boolean('gender');
            $table->boolean('laptop');
            $table->string('address');
            $table->string('phone');
            $table->float('CPA');
            $table->string('TA')->nullable();
            $table->string('ktlt_base')->nullable();
            $table->string('ktlt')->nullable();
            $table->string('ktlt_master')->nullable();
            $table->string('quan_tri_he_thong')->nullable();
            $table->string('Other')->nullable();
            $table->string('cty_da_thuc_tap')->nullable();
            $table->string('favorite');
            $table->string('ten_nv_phu_trach')->nullable();
            $table->string('email')->nullable();
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
       Schema::dropIfExists('students');
    }
}
