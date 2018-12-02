<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CiesData;
class CiesController extends Controller
{
  public function index(){
    $datos = CiesData::all();
    //return $datos;
    return view('Cies.index', compact('datos'));
  }

  public function save($id){
    $base64 = base64_decode($id);
    $datos = json_decode($base64, true);

    $carnet = explode(" ", $datos['data']['ci'] );

    if( strlen($datos['data']['ci']) > 1 ){
      $dato = new CiesData;
      $dato->status           = $datos['status']."" == "1" ?  "Verdad" : "Falso"  ;
      $dato->message          = $datos['message'];
      $dato->ci               = $carnet[0];
      $dato->extendido        = $carnet[1];
      $dato->expediente       = $datos['data']['expediente'];
      $dato->nombres          = $datos['data']['nombres'];
      $dato->apellido_paterno = $datos['data']['apellido_paterno'];
      $dato->apellido_materno = $datos['data']['apellido_materno'];
      $dato->genero           = $datos['data']['genero'];
      $dato->estado_civil     = $datos['data']['estado_civil'];
      $dato->domicilio        = $datos['data']['domicilio'];
      $dato->zona             = $datos['data']['zona'];
      $dato->telefono         = $datos['data']['telefono'];
      $dato->provincia        = $datos['data']['provincia'];
      $dato->departamento     = $datos['data']['departamento'];
      $dato->pais             = $datos['data']['pais'];
      $dato->nivel_instruccion= $datos['data']['nivel_instruccion'];
      $dato->ocupacion        = $datos['data']['ocupacion'];
      $dato->save();
    }
    return $datos['data']['ci'];
  }

  public function show(Request $request, $id){
    $dato = CiesData::mostrar($id);
    if($request->ajax()){
      return $dato;
    }
    return "HTTP";
  }
}
