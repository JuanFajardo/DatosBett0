<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencaTramite extends Model
{
	protected $table = 'renca_tramites' ;
	protected $fillable = ['id', 'nro', 'tramite', 'fecha', 'observacion', 'id_renca'];
}
