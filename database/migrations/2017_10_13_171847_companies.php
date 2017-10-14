<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Companies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('diaChi');
            $table->boolean('status')->default(0);
            $table->integer('soLuongNV');
            $table->integer('soLuongNVIT');
            $table->integer('namthanhlap');
            $table->string('moTa');
            $table->string('nhanVienPTTT');
            $table->string('phone');
            $table->string('emailnv');
            $table->string('diaChiTT');
            $table->string('thoiGianMongMuon');
            $table->string('linhVucHoatDong');
            $table->string('congNgheDaoTao');
            $table->integer('soLuongSinhVienTT');
            $table->string('yeuCauSV');
            $table->string('yeuCauNNSV');
            $table->string('picture')->default('/image/background/default-img.jpg');
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
        Schema::dropIfExists('companies');
    }
}
