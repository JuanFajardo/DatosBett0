<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencaTramitesTable extends Migration
{
    public function up()
    {
        Schema::create('renca_tramites', function (Blueprint $table) {
		$table->increments('id');
		$table->string('nro');
		$table->string('tramite');
 		$table->string('fecha');
 		$table->string('observacion');
 		$table->integer('id_renca');
            	$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renca_tramites');
    }
}
