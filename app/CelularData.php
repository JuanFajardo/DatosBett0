<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CelularData extends Model
{
  protected $table    = 'celular_datas';
  protected $fillable = ['id', 'nombre', 'telefono', 'origen', 'archivo', 'extra'];
}
