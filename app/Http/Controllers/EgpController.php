<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EgpData;
class EgpController extends Controller
{
    public function index(){
      $datos = EgpData::paginate(15);
      //return $datos;
      return view('Egp.index', compact('datos'));
    }

    public function save($id){
      $base64 = base64_decode($id);
      $datos = json_decode($base64, true);

      if( strlen($datos['id_postulante']) > 1 ){
        $dato = new EgpData;
        $dato->id_postulante    = $datos['id_postulante'];
        $dato->nombres          = $datos['nombres'];
        $dato->paterno          = $datos['paterno'];
        $dato->materno          = $datos['materno'];
        $dato->fec_nacimiento   = $datos['fec_nacimiento'];
        $dato->lugar_nacimiento = $datos['lugar_nacimiento'];
        $dato->sexo             = $datos['sexo'];
        $dato->ci               = $datos['ci'];
        $dato->exp_depto        = $datos['exp_depto'];
        $dato->ciudad_vive      = $datos['ciudad_vive'];
        $dato->direccion_vive   = $datos['direccion_vive'];
        $dato->tel_fijo         = $datos['tel_fijo'];
        $dato->tel_movil        = $datos['tel_movil'];
        $dato->tel_fax          = isset($datos['tel_fax']) ? $datos['tel_fax'] : ""  ;
        $dato->email            = $datos['email'];
        $dato->profesion        = $datos['profesion'];
        $dato->empresa          = $datos['empresa'];
        $dato->cargo            = $datos['cargo'];
        $dato->nivel_cargo      = $datos['nivel_cargo'];
        $dato->fec_alta         = $datos['fec_alta'];
        $dato->activo           = $datos['activo'];
        $dato->ci_explicativo   = isset($datos['ci_explicativo']) ?  $datos['ci_explicativo'] : ""  ;
        $dato->save();
      }
      return $datos['ci'];
    }

    public function show(Request $request, $id){
      $dato = EgpData::mostrar($id);
      if($request->ajax()){
        return $dato;
      }
      return "HTTP";
    }
}
