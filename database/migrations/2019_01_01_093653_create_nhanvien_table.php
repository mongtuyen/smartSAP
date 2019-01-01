<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('nv_ma');
            $table->string('nv_taiKhoan',50);
            $table->string('nv_matKhau',32);
            $table->string('nv_hoTen',100);
            $table->unsignedTinyInteger('nv_gioiTinh')->default('1')->comment('1: Nam, 2: Nu');
            $table->string('nv_email',100);
            $table->dateTime('nv_ngaySinh');            
            $table->string('nv_diaChi',250);
            $table->string('nv_dienThoai',11);
            $table->unique(['nv_taiKhoan','nv_email','nv_dienThoai']);
            $table->unsignedInteger('vt_ma');
            $table->foreign('vt_ma')->references('vt_ma')->on('vaitro')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
