<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableApproveRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Approve_Request', function (Blueprint $table) {
            $table->string('no_id'); // not foreign because for approve request global log.
            $table->string('nik')->foreign('nik')->references('nik')->on('Employees');
            $table->integer('approve');
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
        Schema::dropIfExists('Approve_Request');
    }
}
