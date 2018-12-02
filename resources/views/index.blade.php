@extends('bett0')
@section('modal2')
    <div id="modal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-primary">
                <div class="modal-header panel-heading">
                    <b> <span id="tituloModal"></span> </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">

                  <form action="{{asset('/index.php/Sistema')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-2">
                        <label> <b><i>Canitdad</i></b> </label>
                        <input name='cantidad' class='form-control' id='cantidad' />
                      </div>
                      <div class="col-md-3">
                        <label> <b><i>Sistema</i></b> </label>
                        <input name='sistema' class='form-control' id='sistema' />
                      </div>
                      <div class="col-md-7">
                        <label> <b><i>Link</i></b> </label>
                        <input name='link' class='form-control' id='link'  />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm">
                        <label> <b><i>Descripcion</i></b> </label><br>
                        <textarea name="descripcion" id="descripcion" rows="8" cols="30"></textarea>
                      </div>
                      <div class="col-sm">
                        <label> <b><i>Codigo</i></b> </label><br>
                        <textarea name="codigo" id="codigo" rows="8" cols="30"></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm">
                        <label> <b><i>Gestion</i></b> </label>
                        <input name='gestion' class='form-control' id='gestion' />
                      </div>
                      <div class="col-sm">
                        <label> <b><i>Mes</i></b> </label>
                        <input name='mes' class='form-control' id='mes' />
                      </div>
                      <div class="col-sm">
                        <label> <b><i>Tipo</i></b> </label>
                        <input name='tipo' class='form-control' id='tipo' />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm">
                        <label> <b><i></i>Tabla</b> </label>
                        <input name='tabla' class='form-control' id='tabla' />
                      </div>
                      <div class="col-sm">
                        <label> <b><i></i>Atacante</b> </label>
                        <input name='lenguaje_ataque' class='form-control' id='lenguaje_ataque' />
                      </div>
                      <div class="col-sm">
                        <label> <b><i>Victima</i></b> </label>
                        <input name='lenguaje_victima' class='form-control' id='lenguaje_victima' />
                      </div>
                    </div>

                    <br><br>

                    <div class="row">
                      <div class="col-sm">
                        <input type='submit' class='btn btn-primary' name='boton' id='boton' value='' />
                      </div>
                    </div>

                  </form>
                </div>
              </div>
        </div>
    </div>
@endsection

@section('cuerpo')
<br><br>
<a href="#modal"  data-toggle="modal" data-target=""  class="nuevo"> <i class="fa fa-plus"></i> Nuevo Sistema </a>
<br><br>

<table id="tabla" class="table" width="100%">
  <thead>
    <tr>
        <th> Sistema </th> <th> Tabla </th> <th> Ultima Carga de Datos </th> <th> Tipo</th> <th> Cantidad de Datos</th> <th> Link</th> <th> Acciones </th>
    </tr>
  </thead>
  <tbody>
      @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">
          <td>{{$dato->sistema}} </td>
          <td>{{$dato->tabla}} </td>
          <td>{{$dato->gestion}} - {{$dato->mes}} </td>
          <td>{{$dato->tipo}}</td>
          <td>{{$dato->cantidad}}</td>
          <td>{{$dato->link}}</td>
          <td>
            <div class="row">
              <div class="col-sm">
                <a href=""  data-toggle="modal" data-target=""  class=""> <i class="fa fa-archive"></i> Tablas </a>
              </div>
              <div class="col-sm">
                  <a href=""  data-toggle="modal" data-target=""  class=""> <i class="fa fa-columns"></i> Columnas </a>
              </div>
              <div class="col-sm">
                  <a href="#modal"  data-toggle="modal" data-target=""  class="actualizar"> <i class="fa fa-edit"></i> Actualizar </a>
              </div>
              <div class="col-sm">
                <a href="#modal"  data-toggle="modal" data-target=""  class="actualizar"> <i class="fa fa-cogs"></i> Generar </a>
              </div>
            </div>


          </td>
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

    $('.nuevo').click(function(event){
      $('#tituloModal').html('Nuevo Sistema');
      $('#boton').val('Ingresar Sistema');

      //alert('123');
    });

    $('.actualizar').click(function(event){
           event.preventDefault();
           var fila = $(this).parents('tr');
           var id = fila.data('id');
           link  = '{{ asset("/index.php/Egp/Ver/")}}/'+id;

           $.getJSON(link, function(data, textStatus) {
               if(data.length > 0){
                   $.each(data, function(index, el) {
                     $('#id_postulante').val(el.id_postulante);
                     $('#nombres').val(el.nombres);
                     $('#paterno').val(el.paterno);
                     $('#materno').val(el.materno);
                     $('#fec_nacimiento').val(el.fec_nacimiento);
                     $('#ci').val(el.ci);
                     $('#direccion_vive').val(el.direccion_vive);
                     $('#tel_fijo').val(el.tel_fijo);
                     $('#tel_movil').val(el.tel_movil);
                     $('#tel_fax').val(el.tel_fax);
                     $('#email').val(el.email);
                     $('#profesion').val(el.profesion);
                     $('#empresa').val(el.empresa);
                     $('#fec_alta').val(el.fec_alta);
                     $('#ciudad').val(el.ciudad);
                     $('#nacimiento').val(el.nacimiento);
                     $('#expedido').val(el.expedido);
                     $('#activo').val(el.activo);
                     $('#ci_explicativo').val(el.ci_explicativo);
                     $('#created_at').val(el.created_at);
                   });
               }
           });
       });
</script>
@endsection
