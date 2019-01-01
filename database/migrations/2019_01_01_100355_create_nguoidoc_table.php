<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidoc', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('nd_ma');
            $table->string('nd_hoTen',100);
            $table->string('nd_email', 50);
            $table->unique('nd_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidoc');
    }
}
