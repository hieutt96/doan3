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
            $table->integer('idCompany');
            $table->primary('idCompany');
            $table->string('name');
            $table->mediumText('CTDT');
            $table->string('diaChi');
            $table->tinyInteger('thoiGianMongMuon');
            $table->longText('linhVucHoatDong');
            $table->longText('congNgheDaoTao');
            $table->integer('soLuongSVTT');
            $table->longText('yCSV');
            $table->string('yCNgoaiNgu');
            $table->tinyInteger('status')->default(0);
            $table->integer('namThanhLap');
            $table->string('picture')->default('/image/background/default-img.jpg');
            $table->integer('soLuongNV');
            $table->longText('moTa');
            $table->string('soDienThoai');
            $table->string('emailNV');
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
