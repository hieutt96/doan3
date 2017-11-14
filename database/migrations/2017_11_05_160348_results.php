<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Results extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results',function(Blueprint $table){
            $table->increments('id');
            $table->integer('student_id');
            $table->text('nhan_xet_nha_truong')->nullable();
            $table->float('diem');
            $table->float('danh_gia_cua_cong_ty');
            $table->text('nhan_xet_cong_ty')->nullable();
            $table->string('nang_luc_it');
            $table->string('phuong_phap_lam_viec');
            $table->string('nang_luc_quan_li');
            $table->string('tieng_anh');
            $table->string('nang_luc_nam_bat_cv');
            $table->string('nang_luc_lam_viec_nhom');
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
        Schema::dropIfExists('results');
    }
}
