<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nit');
            $table->string('adress');
            $table->string('delete');
            $table->timestamps();
        });

        DB::table('companies')->insert([
            ['name' => 'Empresa 1', 'nit' => '123123', 'adress' => 'Carrera 112', 'delete' => '1'],
            ['name' => 'Solati', 'nit' => '22424', 'adress' => 'Calle 100', 'delete' => '1'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
