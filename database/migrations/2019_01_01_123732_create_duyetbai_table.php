<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuyetbaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duyetbai', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->unsignedTinyInteger('db_trangThai')->default('1')->comment('1: Đạt, 2: Không đạt');
            $table->dateTime('db_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->unsignedInteger('db_nguoiDuyet');
            $table->unsignedInteger('db_baiViet');
            $table->primary(['db_nguoiDuyet','db_baiViet']);
            $table->foreign('db_nguoiDuyet')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('db_baiViet')->references('bv_ma')->on('baiviet')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duyetbai');
    }
}
