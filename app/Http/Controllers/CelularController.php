<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CelularData;
class CelularController extends Controller
{
  public function index(){
    $datos = CelularData::all();
    return view('Celular.index', compact('datos'));
  }

  public function save($id){
    $base64 = base64_decode($id);
    $datos  = json_decode($base64, true);

    $numero = \DB::table('celular_datas')->where('nombre', '=', $datos['nombre'])->where('telefono', '=', $datos['telefono'])->count();
    if( $numero < 1 ){
      $dato = new CelularData;
      $dato->nombre   = $datos['nombre'];
      $dato->telefono = $datos['telefono'];
      $dato->origen   = $datos['origen'];
      $dato->archivo  = $datos['archivo'];
      $dato->extra    = $datos['extra'];
      $dato->save();
    }
    return $datos['telefono'];
  }

  public function store(Request $request){
    //return $request->all();
    $numero = \DB::table('celular_datas')->where('nombre', '=', $request->nombre)->where('telefono', '=', $request->telefono)->count();
    if( $numero < 1 ){
      $dato = new CelularData;
      $dato->fill( $request->all() );
      $dato->save();
    }
    return redirect('/Celular');
  }



  public function show(Request $request, $id){
    $dato = CelularData::mostrar($id);
    if($request->ajax()){
      return $dato;
    }
    return "HTTP";
  }
}
