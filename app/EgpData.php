<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EgpData extends Model
{
  protected $table ='egp_datas';
  protected $fillable = ['id', 'id_postulante', 'nombres', 'paterno', 'materno', 'fec_nacimiento', 'lugar_nacimiento', 'sexo', 'ci', 'exp_depto', 'ciudad_vive', 'direccion_vive', 'tel_fijo', 'tel_movil', 'tel_fax', 'email', 'profesion', 'empresa', 'cargo', 'nivel_cargo', 'fec_alta', 'activo', 'ci_explicativo' ];


  public static function mostrar($id){
    return \DB::table('egp_datas')->join('egp_ciudads',     'egp_datas.ciudad_vive', '=', 'egp_ciudads.id')
                                  ->join('egp_nacimientos', 'egp_datas.lugar_nacimiento', '=', 'egp_nacimientos.id')
                                  ->join('egp_profesions',  'egp_datas.profesion', '=', 'egp_profesions.id')
                                  ->join('egp_empresas',    'egp_datas.empresa', '=', 'egp_empresas.id')
                                  ->join('egp_expedidos',   'egp_datas.exp_depto', '=', 'egp_expedidos.id')
                                  ->select('egp_datas.*', 'egp_ciudads.ciudad', 'egp_nacimientos.nacimiento', 'egp_profesions.profesion', 'egp_empresas.empresa', 'egp_expedidos.expedido')
                                  ->where('egp_datas.id', '=', $id)->get();
  }

}
