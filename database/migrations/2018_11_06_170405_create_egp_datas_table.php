<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgpDatasTable extends Migration
{
    public function up()
    {
        Schema::create('egp_datas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_postulante');
          $table->string('nombres');
          $table->string('paterno');
          $table->string('materno');
          $table->dateTime('fec_nacimiento');
          $table->integer('lugar_nacimiento');
          $table->string('sexo');
          $table->string('ci');
          $table->integer('exp_depto');
          $table->integer('ciudad_vive');
          $table->string('direccion_vive');
          $table->string('tel_fijo');
          $table->string('tel_movil');
          $table->string('tel_fax');
          $table->string('email');
          $table->integer('profesion');
          $table->integer('empresa');
          $table->integer('cargo');
          $table->integer('nivel_cargo');
          $table->dateTime('fec_alta');
          $table->integer('activo');
          $table->string('ci_explicativo');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('egp_datas');
    }
}
