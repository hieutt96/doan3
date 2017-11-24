<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Semesters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters',function(Blueprint $table){
            $table->increments('id');
            $table->string('ten_hoc_ky')->unique();
            $table->date('thoi_gian_dn_bat_dau_dk');
            $table->date('thoi_gian_dn_ket_thuc_dk');
            $table->date('thoi_gian_sv_bat_dau_dk');
            $table->date('thoi_gian_sv_ket_thuc_dk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters');
    }
}
