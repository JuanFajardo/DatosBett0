<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgpCiudadsTable extends Migration
{
    public function up()
    {
        Schema::create('egp_ciudads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ciudad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('egp_ciudads');
    }
}
