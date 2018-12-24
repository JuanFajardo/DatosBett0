<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SibData extends Model
{
  protected $table = 'sib_datas';
  protected $fillable = ['id', 'sib', 'nombre', 'registro', 'especialidad', 'departamento', 'fecha_registro', 'universidad', 'fecha_diplomado', 'imgUrl', 'imagen'];

}
