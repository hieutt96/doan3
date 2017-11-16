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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('user_id');
            $table->primary('user_id');
            $table->string('MSSV');
            $table->string('lop');
            $table->string('khoa');
            $table->string('ctdt');
            $table->string('boMon');
            $table->string('avatar');
            $table->boolean('gioiTinh');
            $table->boolean('laptop');
            $table->string('diaChi');
            $table->string('sdt');
            $table->float('CPA');
            $table->string('tiengAnh')->nullable();
            $table->string('kTLTCoTheDung')->nullable();
            $table->string('kTLTThanhThao')->nullable();
            $table->string('kyNangKhac')->nullable();
            $table->string('nenTangMongMuonTT');
            $table->string('tenNVPhuTrach')->nullable();
            $table->string('idGVPhuTrach')->nullable();
            $table->string('idCongTyTT')->nullable();

            $table->rememberToken();
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
