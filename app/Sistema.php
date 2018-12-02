<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = 'sistemas';
    protected $fillable = ['id', 'sistema', 'descripcion', 'tabla', 'gestion', 'mes', 'tipo', 'cantidad', 'link', 'lenguaje_victima', 'lenguaje_ataque', 'codigo'];
}
