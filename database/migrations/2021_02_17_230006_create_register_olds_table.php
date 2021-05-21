<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterOldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_olds', function (Blueprint $table) {
            $table->id('idregisterold');
            $table->integer('idmonitor')->nullable();
            $table->string('name_lastname')->nullable();
            $table->string('telephones')->nullable();
            $table->string('age')->nullable();
            $table->string('date_birthday')->nullable();
            $table->string('church')->nullable();
            $table->integer('idplace')->nullable();
            $table->string('ministery')->nullable();
            $table->string('time_converted')->nullable();
            $table->integer('idtipotiempo')->nullable();
            $table->string('franja')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('register_olds');
    }
}
