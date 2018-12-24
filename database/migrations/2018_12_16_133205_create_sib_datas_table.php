<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSibDatasTable extends Migration
{
    public function up()
    {
        Schema::create('sib_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sib');
            $table->string('nombre');
            $table->integer('registro');
            $table->string('especialidad');
            $table->string('departamento');
            $table->date('fecha_registro');
            $table->string('universidad');
            $table->date('fecha_diplomado');
            $table->string('imgUrl');
            $table->longText('imagen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sib_datas');
    }
}
