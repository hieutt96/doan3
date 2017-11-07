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
            $table->string('Phone');
            $table->integer('User_id');
            $table->integer('registers_id');
            $table->string('anhdaidien');
            $table->string('lop');
            $table->string('khoa');
            $table->string('Ctdt');
            $table->string('bomon');
            $table->boolean('gioitinh');
            $table->boolean('laptop');
            $table->string('diachi');
            $table->float('CPA');
            $table->string('tienganh')->nullable();
            $table->string('kynanglaptrinh_cothedung')->nullable();
            $table->string('kynanglaptrinh_cothesudung')->nullable();
            $table->string('kynanglaptrinh_thanhthao')->nullable();
            $table->string('quantrihethong')->nullable();
            $table->string('kynangkhac')->nullable();
            $table->string('nentangmuonthuctap');
            $table->string('ctydathuctap')->nullable();
            $table->string('tennhanvienphutrach')->nullable();
            $table->string('emailnhanvienphutrach')->nullable();
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
