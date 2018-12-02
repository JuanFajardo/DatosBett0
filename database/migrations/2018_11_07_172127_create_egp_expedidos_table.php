<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgpExpedidosTable extends Migration
{
    public function up()
    {
        Schema::create('egp_expedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expedido');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('egp_expedidos');
    }
}
