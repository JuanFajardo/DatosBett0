@extends('bett0')

@section('cuerpo')
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
</script>
@endsection
