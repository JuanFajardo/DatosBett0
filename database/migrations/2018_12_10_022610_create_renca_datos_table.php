<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencaDatosTable extends Migration
{
    public function up()
    {
        Schema::create('renca_datos', function (Blueprint $table) {
		$table->increments('id');
		$table->string('nit');
		$table->string('nombre');
		$table->string('direccion');
		$table->string('celular');
		$table->string('correo');		
		$table->string('departamento');
		$table->string('observacion');
		$table->string('nro_renca');
		$table->string('id_renca');
		$table->string('fecha_habilitado');
		$table->string('tipo_consultor');
		$table->string('titulo');
            	$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renca_datos');
    }
}
