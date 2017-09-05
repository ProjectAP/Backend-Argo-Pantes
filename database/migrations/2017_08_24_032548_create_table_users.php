<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Company', function (Blueprint $table) {
            $table->integer('code')->primary('code')->index();
            $table->string('name');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('Department', function (Blueprint $table) {
            $table->integer('code')->primary('code')->index();
            $table->string('name');
            $table->string('section');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('Position', function (Blueprint $table) {
            $table->integer('code')->primary('code')->index();
            $table->string('name');
            $table->text('desc');
            $table->timestamps();
        });
        
        Schema::create('Employees', function (Blueprint $table) {
            $table->string('nik')->primary('nik')->index();
            $table->string('name');
            $table->integer('comp')->references('code')->on('Company');
            $table->integer('dept')->references('code')->on('Department');
            $table->integer('pos')->references('code')->on('Position');
            $table->string('ext');
            $table->string('phone');
            $table->integer('gender');
            $table->string('photo');
            $table->string('mother');
            $table->timestamps();
        });

        Schema::create('Level_user', function (Blueprint $table) {
            $table->integer('code')->primary('code')->index();
            $table->string('name');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('Users', function (Blueprint $table) {
            $table->string('email')->primary('email')->index();
            $table->string('nik')->foreign('nik')->references('nik')->on('Employees');
            $table->string('pass');
            $table->integer('level')->foreign('level')->references('code')->on('Level_user');
            $table->integer('status')->unsigned()->default(0);
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
        Schema::dropIfExists('Users');
        Schema::dropIfExists('Level_user');
        Schema::dropIfExists('Employees');
        Schema::dropIfExists('Position');
        Schema::dropIfExists('Department');
        Schema::dropIfExists('Company');
    }
}
