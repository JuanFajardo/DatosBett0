<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SibData;
class SibController extends Controller
{
  public function index(){
    $datos = SibData::select('id', 'sib', 'nombre', 'registro', 'especialidad', 'departamento', 'universidad', 'imagen')->get();
    return view('Sib.index', compact('datos'));
  }

  public function save(Request $request){
    if ( isset( $request->sib ) ){
      $dato = new SibData;
      $dato->sib	          = $request->sib;
      $dato->nombre 	      = $request->nombre;
      $dato->registro       = $request->registro;
      $dato->especialidad 	= $request->especialidad;
      $dato->departamento   = $request->departamento;
      $dato->fecha_registro	= $request->fecha_registro == "00/00/0000" ? "1900-01-01" : date('Y-m-d', strtotime($request->fecha_registro) );
      $dato->universidad    = $request->universidad;
      $dato->fecha_diplomado= $request->fecha_diplomado == "00/00/0000" ? "1900-01-01" : date('Y-m-d', strtotime($request->fecha_diplomado) );
      $dato->imgUrl 	      = $request->imgUrl;
      $dato->imagen  	      = $request->imagen;
      $dato->save();
      return $request->sib . " --> " . $request->nombre;
    }else{
      return "Bett0 :)";
    }

  }

  public function show(Request $request, $id){
    $dato = SibData::Where('sib', '=', $id)->get();
    if($request->ajax()){
      return $dato;
    }
    return "HTTP :)";
  }
}
