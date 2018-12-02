<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemasTable extends Migration
{

    public function up()
    {
        Schema::create('sistemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sistema');
            $table->string('descripcion');
            $table->string('tabla')->comment('Alcance, nacional - lugar');
            $table->integer('gestion');
            $table->integer('mes');
            $table->string('tipo');
            $table->integer('cantidad');
            $table->text('link');
            $table->string('lenguaje_victima');
            $table->string('lenguaje_ataque');
            $table->text('codigo');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('sistemas');
    }
}
