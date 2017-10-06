<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('IT_HW_List', function (Blueprint $table) {
            $table->string('code')->primary('code')->index();
            $table->string('name');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('IT_HW_Req', function (Blueprint $table) {
            $table->string('no_id')->primary('no_id')->index();
            $table->integer('type'); // Request or troubleshooting
            $table->string('code')->foreign('code')->references('code')->on('IT_HW_List');
            $table->text('note');
            $table->text('desc');
        });

        Schema::create('IT_SW_Req', function (Blueprint $table) {
            $table->string('no_id')->primary('no_id')->index();
            $table->integer('type'); // Request or troubleshooting
            $table->text('note');
        });

        Schema::create('IT_Request', function (Blueprint $table) {
            $table->string('no_id')->primary('no_id')->index();
            $table->string('nik')->foreign('nik')->references('nik')->on('Employees');
            $table->string('engineer')->foreign('nik')->references('nik')->on('Employees');;
            $table->string('status');
            $table->string('approve');
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
        Schema::dropIfExists('IT_Request');
    }
}
