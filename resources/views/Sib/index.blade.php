@extends('bett0')


@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-primary ">

                <div class="modal-header panel-heading">
                    <b>Ver </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body panel-body">

                    <div class="row">
                      <div class="col-md-2">
                        <label> <b><i>id</i></b> </label>
                        <input name='id' class='form-control' id='id' />
                      </div>
                      <div class="col-md-2">
                        <label> <b><i>sib</i></b> </label>
                        <input name='sib' class='form-control' id='sib' />
                      </div>
                      <div class="col-md-2">
                        <label> <b><i>registro</i></b> </label>
                        <input name='registro' class='form-control' id='registro' />
                      </div>
                      <div class="col-md-6">
                        <label> <b><i>nombre</i></b> </label>
                        <input name='nombre'  class='form-control' id='nombre'  />
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-sm">
                        <label> <b><i>departamento</i></b> </label>
                        <input name='departamento' class='form-control' id='departamento'  />
                      </div>
                      <div class="col-sm">
                        <label> <b><i>universidad</i></b> </label>
                        <input name='universidad' class='form-control' id='universidad'  />
                      </div>
                      <div class="col-sm">
                        <label> <b><i>especialidad</i></b> </label>
                        <input name='especialidad' class='form-control' id='especialidad'  />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm">
                        <label> <b><i>fecha_registro</i></b> </label>
                        <input name='fecha_registro' class='form-control' id='fecha_registro'  />
                      </div>
                      <div class="col-sm">
                        <label> <b><i>fecha_diplomado</i></b> </label>
                        <input name='fecha_diplomado' class='form-control' id='fecha_diplomado'  />
                      </div>
                      <div class="col-sm">
                        <label> <b><i>imgUrl</i></b> </label>
                        <input name='imgUrl' class='form-control' id='imgUrl' />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm">
                        <label> <b><i></i>imagen</b> </label>
                        <img src=""  id="imagen" width="250">
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('cuerpo')
<table id="tabla" class="table" width="100%">
  <thead>
    <tr>
        <th> Sib ID  </th> <th> Nombres  </th> <th> Especialidad </th> <th> Departamento </th> <th>Universidad</th> <th>Img</th> <th> Acciones </th>
    </tr>
  </thead>
  <tbody>
      @foreach($datos as $dato)
      <tr data-id="{{ $dato->sib }}">

          <td>{{$dato->sib}} </td>
          <td>{{$dato->nombre}} </td>
          <td>{{$dato->especialidad}} </td>
          <td>{{$dato->departamento}} </td>
          <td>{{$dato->universidad}} </td>
          <td> <img src="data:image/jpeg;base64,{{$dato->imagen}}" width="150" alt="">
          </td>
          <td> <a href="#modalModifiar"  data-toggle="modal" data-target=""  class="actualizar"> <i class="fa fa-eye"></i> Ver </a> </td>
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

    $('.actualizar').click(function(event){
       event.preventDefault();
       var fila = $(this).parents('tr');
       var id = fila.data('id');
       link  = '{{ asset("/index.php/Sib/")}}/'+id;
       $.getJSON(link, function(data, textStatus) {
           if(data.length > 0){
               $.each(data, function(index, el) {
                 $('#id').val(el.id);
                 $('#sib').val(el.sib);
                 $('#nombre').val(el.nombre);
                 $('#registro').val(el.registro);
                 $('#especialidad').val(el.especialidad);
                 $('#departamento').val(el.departamento);
                 $('#fecha_registro').val(el.fecha_registro);
                 $('#universidad').val(el.universidad);
                 $('#fecha_diplomado').val(el.fecha_diplomado);
                 $('#imgUrl').val(el.imgUrl);
                 $('#imagen').attr("src", "data:image/png;base64, " + " " + el.imagen);
               });
           }
       });
   });
</script>
@endsection
