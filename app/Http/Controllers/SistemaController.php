<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sistema;
class SistemaController extends Controller
{
    public function index(){
      $datos = Sistema::all();
      return view('index', compact('datos'));
    }

    public function save(Request $request){

      //return $request->all();

      $data = new Sistema;
      $data->fill( $request->all() );
      $data->save();

      return back();
    }

}
