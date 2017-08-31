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
        Schema::create('Employees', function (Blueprint $table) {
            $table->string('nik')->primary('nik')->index();
            $table->string('name');
            $table->integer('comp');
            // $table->foreign('comp')->references('code')->on('Company');
            $table->integer('dept');
            // $table->foreign('dept')->references('code')->on('Department');
            /*$table->integer('section');
            $table->foreign('section')->references('code')->on('Section');*/
            $table->integer('pos');
            // $table->foreign('pos')->references('code')->on('Position');
            $table->string('ext');
            $table->string('phone');
            $table->integer('gender');
            $table->string('photo');
            $table->string('mother');
        });

        Schema::create('Level_user', function (Blueprint $table) {
            $table->integer('code')->primary('code')->index();
            $table->string('name');
            $table->text('desc');

        });

        Schema::create('Users', function (Blueprint $table) {
            $table->string('email')->primary('email')->index();
            $table->string('nik')->foreign('nik')->references('nik')->on('Employees');
            $table->string('pass');
            $table->integer('level')->foreign('level')->references('code')->on('Level_user');
            $table->integer('status')->unsigned()->default(0);
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
    }
}
