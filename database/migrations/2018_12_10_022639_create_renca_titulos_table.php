<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencaTitulosTable extends Migration
{
    public function up()
    {
        Schema::create('renca_titulos', function (Blueprint $table) {
		$table->increments('id');
                $table->string('nro');
           	$table->string('fecha');
           	$table->string('grado');
           	$table->string('titulo');
           	$table->integer('id_renca');
            	$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renca_titulos');
    }
}
