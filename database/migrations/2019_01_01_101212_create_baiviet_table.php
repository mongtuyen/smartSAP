<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('bv_ma');
            $table->string('bv_tieuDe',50);
            $table->dateTime('bv_ngayDang')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->string('bv_moTaNgan',1000);
            $table->longText('bv_noiDung');
            $table->unsignedInteger('bv_soLuotXem');
            $table->unsignedTinyInteger('bv_noiBat')->default('1')->comment('1: Nổi bật, 2: Không nổi bật');
            $table->unsignedInteger('nv_tacGia');
            $table->foreign('nv_tacGia')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('cd_ma');
            $table->foreign('cd_ma')->references('cd_ma')->on('chude')->onDelete('cascade')->onUpdate('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baiviet');
    }
}
