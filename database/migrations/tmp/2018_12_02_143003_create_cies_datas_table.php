<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiesDatasTable extends Migration
{
    public function up()
    {
        Schema::create('cies_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('message');
            $table->string('ci');
            $table->string('extendido');
            $table->string('expediente');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('genero');
            $table->string('estado_civil');
            $table->string('domicilio');
            $table->string('zona');
            $table->string('telefono');
            $table->string('provincia');
            $table->string('departamento');
            $table->string('pais');
            $table->string('nivel_instruccion');
            $table->string('ocupacion');
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('cies_datas');
    }
}
