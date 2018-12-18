<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencaTitulo extends Model
{
	protected $table = 'renca_titulos';
	protected $fillable = [ 'id', 'nro', 'tramite', 'fecha', 'observacion', 'id_renca'];
}
