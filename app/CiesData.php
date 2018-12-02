<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiesData extends Model
{
    protected $table = 'cies_datas';
    protected $fillable = ['id', 'status', 'message', 'ci', 'extendido', 'expediente', 'nombres', 'apellido_paterno', 'apellido_materno', 'genero', 'estado_civil', 'domicilio', 'zona', 'telefono', 'provincia', 'departamento', 'pais', 'nivel_instruccion', 'ocupacion' ];
}
