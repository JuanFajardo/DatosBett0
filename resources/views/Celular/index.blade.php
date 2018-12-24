@extends('bett0')
@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Nuevo</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">

        <form class="" action="{{ asset('index.php/Celular/') }}" method="post">
           {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <label for="nombre_" > <b><i>nombre</i></b> </label>
              <input type="text" name="nombre" class="form-control" id="nombre" value="" required>
            </div>
            <div class="col-md-6">
              <label for="telefono_" > <b><i>telefono</i></b> </label>
              <input type="text" name="telefono" class="form-control" id="telefono" value="" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label for="origen_" > <b><i>origen</i></b> </label>
              <input type="text" name="origen" class="form-control" id="origen" value="" required>
            </div>
            <div class="col-md-6">
              <label for="archivo_" > <b><i>archivo</i></b> </label>
              <input type="text" name="archivo" class="form-control" id="archivo" value="" required>
            </div>
          </div>

          <input type="hidden" name="extra" value="nada" required>
          <input type="submit"  value="Registrar el Celular" class="btn btn-primary">

        </form>

      </div>

    </div>
  </div>
</div>
@endsection

@section('cuerpo')
<div class="row">
  <div class="col">
       <a href="#modalAgregar"  data-toggle="modal" data-target=""  class="btn btn-primary nuevo"> <i class="fa fa-plus"></i> Nuevo Celular </a> </td>
  </div>
</div>

<br><br>

<div class="row">
  <div class="col">
    <table id="tabla" class="table" width="100%">
      <thead>
        <tr>
            <th> Nombres  </th> <th> Celular </th> <th>Origen</th> <th> Archivo</th> <th> Extra </th>
        </tr>
      </thead>
      <tbody>
          @foreach($datos as $dato)
          <tr data-id="{{ $dato->id }}">
              <td>{{$dato->nombre}} </td>
              <td>{{$dato->telefono}} </td>
              <td>{{$dato->origen}} </td>
              <td>{{$dato->archivo}} </td>
              <td>{{$dato->extra}} </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection


@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').DataTable({
            "order": [[ 3, 'asc']],
            "language": {
                "bDeferRender": true,
                "sEmtpyTable": "No ay registros",
                "decimal": ",",
                "thousands": ".",
                "lengthMenu": "Mostrar _MENU_ datos por registros",
                "zeroRecords": "No se encontro nada,  lo siento",
                "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
                "infoEmpty": "No ay entradas permitidas",
                "search": "Buscar ",
                "infoFiltered": "(Busqueda de _MAX_ registros en total)",
                "oPaginate":{
                    "sLast":"Final",
                    "sFirst":"Principio",
                    "sNext":"Siguiente",
                    "sPrevious":"Anterior"
                }
            }
        });
    });

    $('.nuevo').click(function(event){
      event.preventDefault();
      $('#form-insert').closest('form').find("input[type=text], textarea").val("");
    });
</script>
@endsection
