<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('bl_ma');
            $table->string('bl_noiDung',1000);
            $table->dateTime('bl_ngayDang')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->unsignedTinyInteger('bl_trangThai')->default('1')->comment('1: Đạt, 2: Không đạt');
            $table->unsignedInteger('nv_duyet');
            $table->foreign('nv_duyet')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('bv_ma');
            $table->foreign('bv_ma')->references('bv_ma')->on('baiviet')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('nd_ma');
            $table->foreign('nd_ma')->references('nd_ma')->on('nguoidoc')->onDelete('cascade')->onUpdate('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
