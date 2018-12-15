<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RencaDato;
use App\RencaTitulo;
use App\RencaTramite;
class RencaController extends Controller
{
  public function index(){
    $datos = RencaDato::all();
    return view('Renca.index', compact('datos'));
  }

  public function save(Request $request){
  	if ( isset( $request->departamento ) ){
  		$dato = new RencaDato;
  		$dato->nit	        = $request->nit;
  		$dato->nombre 	    = $request->nombre;
  		$dato->direccion    = $request->direccion;
  		$dato->celular 	    = $request->celular;
  		$dato->correo       = $request->correo;
  		$dato->departamento = $request->departamento;
  		$dato->observacion	= strlen($request->observacion) > 2 ? $request->observacion : "NADA" ;
  		$dato->nro_renca    = $request->id_renca;
  		$dato->fecha_habilitado = $request->fecha_habilitado;
  		$dato->tipo_consultor 	= $request->tipo_consultor;
  		$dato->foto  	      = $request->foto;
  		$dato->fotografia 	= $request->fotografia;
  		$dato->link_url     = $request->link_url;
  		$dato->titulo 	    = $request->titulo;
  		$dato->save();
      return $dato->titulo;
  	}else{
  		$renca = \DB::table('renca_datos')->where('nit', '=', $request->nit)
                                       ->where('nro_renca', '=', $request->renca)
                                       ->select('nit', 'nro_renca', 'id')->get();
  		$id = $renca[0]->id;
  		if ($request->op == "titulo"){
  			$data = new RencaTitulo;
  			$data->nro 	 = $request->nro;
  			$data->fecha = $request->fecha;
  			$data->grado = $request->grado;
  			$data->titulo= strlen($request->titulo) > 2 ? $request->titulo : "NADA" ;
  			$data->id_renca = $id;
  			$data->save();
  		}elseif($request->op == "tramite"){
  			$data = new RencaTramite;
  			$data->nro  	 = $request->nro;
  			$data->tramite = $request->tramite;
  			$data->fecha 	 = $request->fecha;
  			$data->observacion = strlen($request->observacion) > 2 ? $request->observacion : "NADA" ;
  			$data->id_renca= $id;
  			$data->save();
  		}
  		return $id;
	}

  }

  public function show(Request $request, $id){
    $dato = RencaDato::mostrar($id);
    if($request->ajax()){
      return $dato;
    }
    return "HTTP";
  }

}
