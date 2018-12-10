<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencaDato extends Model
{
	protected $table = 'renca_datos';
	protected $fillable = ['id','nit','nombre','direccion','celular','correo','departamento', 'observacion','nro_renca','id_renca','fecha_habilitado', 'tipo_consultor', 'titulo'];
}
