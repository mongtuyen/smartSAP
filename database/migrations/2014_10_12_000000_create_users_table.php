<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->increments('id');
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();

            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('password');
            $table->integer('level');
            $table->rememberToken();
            $table->timestamps();
            //$table->tinyInteger('level')->default(0);
           // $table->tinyInteger('status')->default(0);
            //$table->unsignedTinyInteger('sex')->default('1')->comment('1: Nam, 2: Nữ');
           // $table->string('sex');
           // $table->string('dateofbirth');            
            //$table->string('location',250);
            //$table->string('phone',11);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
