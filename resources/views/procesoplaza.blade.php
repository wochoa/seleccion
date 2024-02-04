@extends('administracion')

@section('headtitle')
    <h3 class="kt-subheader__title">Administración del sistema</h3>
    <span class="kt-subheader__separator kt-hidden"></span>
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a><span
            class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">Procesos y plazas </a>{{-- <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">Brand Aside </a> --}}
    </div>
@endsection

@section('contadministrador')
    <div class="row">
        {{-- <div class="col-sm-4">
 		<div class="card">
 			 @php

 print_r($procesocas);

 @endphp
 		</div>
 	</div> --}}

        <div class="col-md-5">
            {{-- <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a> --}}

            <div class="kt-portlet">
                {{-- <div class="kt-portlet__head bg-gray">
              
              <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Proceso de la convocatoria</h3>
              </div>              

              <div class="card-tools">
              	<a class="btn btn-sm bg-success float-right" data-toggle="modal" data-target="#modal-default">Nuevo Proceso</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div> --}}
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Proceso de la convocatoria
                        </h3>
                    </div>
                    {{--               <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-toolbar">
                  <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-clean btn-sm " data-toggle="modal" data-target="#modal-default">
                      <i class="flaticon2-plus-1"></i> Nuevo
                    </button>
                    
                  </div>
                </div>
              </div> --}}
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-group">
                            <div class="kt-portlet__head-group">
                                <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm  btn-brand btn-circle"
                                    data-toggle="modal" data-target="#modal-default"><i class="la la-plus-circle"></i> Nuevo
                                    proceso</a>
                                {{-- <a href="#" data-ktportlet-tool="reload" class="btn btn-sm btn-icon btn-success btn-circle"><i class="la la-refresh"></i></a>
                            <a href="#" data-ktportlet-tool="remove" class="btn btn-sm btn-icon btn-danger btn-circle"><i class="la la-close"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2" style="font-size: 13.4px"><br>
                    <table class="table" id="listaproceso" data-order='[[0, "desc"]]'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Proceso</th>
                                <th>Fechas</th>
                                <th>Act/Desc</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($procesocas); $i++)
                                <tr>
                                    <td>{{ $procesocas[$i]->id_proc_sel_cas }}</td>
                                    <td>{{ $procesocas[$i]->proc_sel_cas_descripcion }}</td>
                                    <td nowrap>Fecha Inicio:{{ $procesocas[$i]->proc_sel_cas_fecha_inicio }}<br>
                                        fecha Fin insc.{{ $procesocas[$i]->cas_proc_sel_fecha_fin_inscripcion }}<br>
                                        fecha Resultados.{{ $procesocas[$i]->cas_proc_sel_fecha_resultados }}<br>
                                        fecha Finalización.{{ $procesocas[$i]->proc_sel_cas_fecha_termino }}<br>
                                    </td>
                                    <td>
                                        @if ($procesocas[$i]->cas_proc_sel_estado == 1)
                                            <a href="/desactivarproceso/{{ $procesocas[$i]->id_proc_sel_cas }}"
                                                title="El proceso esta activo"><i class="fa fa-toggle-on"></i></a>
                                        @else
                                            <a href="/activarproceso/{{ $procesocas[$i]->id_proc_sel_cas }}"
                                                title="El proceso esta desactivado"><i class="fa  fa-toggle-off"></i></a>
                                        @endif

                                    </td>
                                    <td nowrap>
                                        <a href="#" class="btn btn-info btn-sm" title="Ver las plazas"
                                            onclick="cargar({{ $procesocas[$i]->id_proc_sel_cas }},'{{ $procesocas[$i]->proc_sel_cas_descripcion }}');"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="#" class="btn btn-sm bg-warning" title="Editar las plazas"
                                            onclick="cargaprocesoeditar({{ $procesocas[$i]->id_proc_sel_cas }})"
                                            data-toggle="modal" data-target="#editarproceso"><i class="fa fa-edit"></i></a>
                                        <a href="/eliminaproceso/{{ $procesocas[$i]->id_proc_sel_cas }}"
                                            class="btn btn-danger btn-sm" title="Eliminar las plazas"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>

        {{-- mostramos las plazas del proceso --}}
        <div class="col-sm-7" style="display: none;" id="plazasco">
            <div class="kt-portlet">
                {{-- <div class="card-header bg-dark">
              <h3 class="card-title">Listado de plazas para el <small id="nompro" class="bg-danger"></small></h3>              

              <div class="card-tools">
                <a class="btn btn-sm bg-success float-right" data-toggle="modal" data-target="#nuevaplaza">Nueva plaza</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div> --}}
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Listado de plazas para el <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill"
                                id="nompro"></span>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-toolbar">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm " data-toggle="modal"
                                    data-target="#nuevaplaza">
                                    <i class="flaticon2-plus-1"></i> Nueva plaza
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2" style="font-size: 13.4px" id="plazasingresadas">

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>


    {{-- agreamos el modal para agregar nuevo proceso --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo proceso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" action="{{ route('nuevoproceso') }}">
                        @csrf
                        <div class="form-group">
                            <label>Proceso:</label>
                            <input type="text" class="form-control" name="procescas" placeholder="Ingrese el proceso"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Tipo proceso:</label>
                            <select name="tipoproceso" class="form-control form-control-sm">
                                <option value="0" selected>0-Normal</option>
                                <option value="1">1-Simple</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Inicio:</label>
                                    <input type="date" class="form-control" name="fechaini" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Fin inscripcion:</label>
                                    <input type="date" class="form-control" name="fechafininsc" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Resultados:</label>
                                    <input type="date" class="form-control" name="fecharesul" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Final proceso:</label>
                                    <input type="date" class="form-control" name="fechafinal" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
                            <button type="submit" class="btn btn-info float-right">Guardar</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- FIN MODAL nuevo proceso --}}

    {{-- modal para editar  nuevo proceso --}}
    <div class="modal fade" id="editarproceso">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar proceso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">

                    <form role="form" method="post" action="{{ route('procesoeditar') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="idproceso" id="idproceso">
                        <div class="form-group">
                            <label>Proceso:</label>
                            <input type="text" class="form-control form-control-sm" name="procescase" id="procescase"
                                placeholder="Ingrese el proceso" required>
                        </div>
                        <div class="form-group">
                          <label>Tipo proceso:</label>
                          <select name="tipoprocesoe" id="tipoprocesoe" class="form-control form-control-sm">
                              <option value="0" selected>0-Normal</option>
                              <option value="1">1-Simple</option>
                          </select>
                      </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Inicio:</label>
                                    <input type="date" class="form-control" name="fechainie" id="fechainie" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Fin inscripcion:</label>
                                    <input type="date" class="form-control" name="fechafininsce" id="fechafininsce"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Resultados:</label>
                                    <input type="date" class="form-control" name="fecharesule" id="fecharesule"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha Final proceso:</label>
                                    <input type="date" class="form-control" name="fechafinale" id="fechafinale"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
                            <button type="submit" class="btn btn-info float-right">Guardar</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- FIN MODAL nuevo proceso --}}

    {{-- AGREGAMOS NUEVA PLAZA EN EL MODAL --}}
    <div class="modal fade" id="nuevaplaza">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nueva plaza</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" action="{{ route('nuevasplazas') }}" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="idprocesos" id="idprocesos">




                        <div class="row">
                            <div class="col-sm-6" style="border-right: 1px #ccc dashed;">
                                <div class="form-group">
                                    <label>Seleccione la oficina:</label>
                                    <select class="form-control form-control-sm" name="oficinaplaza" id="oficinaplaza">
                                    </select>
                                    <input type="text" class="form-control form-control-sm" name="nuevaoficina"
                                        placeholder="Agregar oficina en caso no aperece la selección">
                                </div>
                                <div class="form-group">
                                    <label>Ingresar la plaza:</label>
                                    <input type="text" class="form-control form-control-sm" name="plazas"
                                        placeholder="Ingrese el proceso" required>
                                </div>
                                <div class="form-group">
                                    <label>Cargar el TDR:</label>
                                    <input type="file" class="form-control" name="tdr">
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Cantidad de Plaza:</label>
                                            <input type="number" class="form-control form-control-sm" name="numplazas"
                                                value="1" min="1" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Remuneración:</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="remuneracion" placeholder="Remuneración" min="1" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Perfil plaza:</label>
                                            <select class="form-control form-control-sm" name="perfilpostulante"
                                                id="perfilpostulante" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Experiencia(general/especfica):</label><a href="#" class="float-right"
                                        title="Add field" onclick="agregarexperiencia_new()"><i
                                            class="fa fa-plus-circle"></i></a>
                                    <div class="experiencia_wrapper_new">
                                        {{-- <div class="row">
                                    <input type="text" name="field_experiencia[]" value="" placeholder="P. Ejemplo: Abogado, Maestria en derecho,etc." class="form-control input-sm col-sm-10">
                                  </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Formación academica,Grado academico y/o nivel estudio:</label><a href="#"
                                        class="float-right" title="Add field" onclick="agregarespecialidad_new()"><i
                                            class="fa fa-plus-circle"></i></a>
                                    <div class="especialidad_wrapper_new">
                                        {{-- <div class="row">
                            <input type="text" name="field_especialidad[]" value="" placeholder="P. Ejemplo: Abogado, Maestria en derecho,etc." class="form-control input-sm col-sm-10">
                          </div> --}}
                                    </div>
                                </div>
                                <div class="form-group text-danger">
                                    <label class="text-danger">Requiere habilidad profesional y certificado
                                        :</label>&nbsp;&nbsp;&nbsp;

                                    <input type="radio" name="certificado" value="SI" required> SI
                                    <span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="certificado" value="NO" checked> NO
                                    <span></span>

                                </div>
                                <div class="form-group">
                                    <label>Conocimiento básicos pare puesto y/o cargo:</label><a href="#"
                                        class="float-right" title="Add field" onclick="agregarconocimiento_new()"><i
                                            class="fa fa-plus-circle"></i></a>
                                    <div class="conocimiento_wrapper_new">
                                        {{-- <div class="row">
                            <input type="text" name="field_conocimiento[]" value="" placeholder="P. Ejemplo: Conocimiento en Autocad, etc" class="form-control input-sm col-sm-10">
                          </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
                            <button type="submit" class="btn btn-info float-right">Guardar</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- FIN AGREGAMOS NUEVA PLAZA EN EL MODAL --}}

    {{-- EDITAMOS PLAZA EN EL MODAL --}}
    <div class="modal fade" id="editarplaza">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar plaza</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" action="{{ route('editaplazas') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="idplaza" id="idplaza">



                        <div class="row">
                            <div class="col-sm-6" style="border-right: 1px #ccc dashed;">
                                <div class="form-group">
                                    <label>Seleccione la oficina:</label>
                                    <select class="form-control" name="oficinadeplaza1" id="oficinadeplaza1" required>
                                    </select>
                                    <input type="text" class="form-control form-control-sm" name="nuevaoficina1"
                                        placeholder="Agregar oficina en caso no aperece la selección">
                                </div>

                                <div class="form-group">
                                    <label>Ingresar la plaza:</label>
                                    <input type="text" class="form-control form-control-sm" name="plazas1"
                                        id="plazas1" placeholder="Ingrese el proceso" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Cantidad de Plaza:</label>
                                            <input type="number" class="form-control form-control-sm" name="numplazas1"
                                                id="numplazas1" value="1" min="1" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Remuneración:</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="remuneracion1" id="remuneracion1" placeholder="Remuneración"
                                                min="1" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Perfil plaza:</label>
                                            <select class="form-control form-control-sm" name="perfilpostulante1"
                                                id="perfilpostulante1" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Experiencia(general/especfica):</label><a href="#" class="float-right"
                                        title="Add field" onclick="agregarexperiencia()"><i
                                            class="fa fa-plus-circle"></i></a>
                                    <div class="experiencia_wrapper">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Formación academica,Grado academico y/o nivel estudio:</label><a href="#"
                                        class="float-right" title="Add field" onclick="agregarespecialidad()"><i
                                            class="fa fa-plus-circle"></i></a>
                                    <div class="especialidad_wrapper">
                                        {{-- <div class="row">
                                  <input type="text" name="field_especialidad[]" value="" placeholder="P. Ejemplo: Abogado, Maestria en derecho,etc." class="form-control input-sm col-sm-10">
                                </div> --}}
                                    </div>
                                </div>

                                <div class="form-group text-danger">
                                    <label class="text-danger">Requiere habilidad profesional y certificado
                                        :</label>&nbsp;&nbsp;&nbsp;

                                    <input type="radio" name="certificado1" id="certificado11" value="SI"
                                        required> SI
                                    <span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="certificado1" id="certificado12" value="NO"> NO
                                    <span></span>

                                </div>

                                <div class="form-group">
                                    <label>Conocimiento básicos pare puesto y/o cargo:</label><a href="#"
                                        class="float-right" title="Add field" onclick="agregarconocimiento()"><i
                                            class="fa fa-plus-circle"></i></a>
                                    <div class="conocimiento_wrapper">
                                        {{-- <div class="row">
                                  <input type="text" name="field_conocimiento[]" value="" placeholder="P. Ejemplo: Conocimiento en Autocad, etc" class="form-control input-sm col-sm-10">
                                </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
                            <button type="submit" class="btn btn-info float-right">Guardar</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- FIN AGREGAMOS NUEVA PLAZA EN EL MODAL --}}
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <script>
        $(function() {
            $("#listaproceso").DataTable({
                "responsive": true,
                "autoWidth": true,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                language: {
                    processing: "Traitement en cours...",
                    search: "",
                    lengthMenu: "Cantidad por página _MENU_ ",
                    info: "Mostrando del _START_ al _END_ del(_TOTAL_) documentos",
                    infoEmpty: "No hay elementos para mostrar",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "No hay documentos con los parametros seleccionados",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    }
                }
            });
            $(".dataTables_filter input").addClass('form-control form-control-sm anchosear');
        });

        function cargar(id, descripcion) {
            $("#idprocesos").val(
            id); // en el id para nueva plaza (se tiene que cambiar el de editar las plazas de lo contrario no funcionara)
            cargarperfil("#perfilpostulante"); // cargamos los perfiles para la plaza a crear
            cargaroficinas("#oficinaplaza"); // cargamos las oficinas para crear nueva plaza

            cargarperfil("#perfilpostulante1"); // cargamos los perfiles para la plaza a crear
            cargaroficinas("#oficinadeplaza1"); // cargamos las oficinas para crear nueva plaza


            $("#plazas").focus();

            $.ajax({
                // data: {reg:id},
                url: '/cargarplzasporconvo/' + id,
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {
                        //alert('existe datos');
                        $("#nompro").html(descripcion);
                        $("#plazasco").show();

                        $("#plazasingresadas").show();
                        var compuesto =
                            '<table class="table table-sm table-hover table-bordered"><head><tr><th>N</th><th>PLAZA</th><th>SUELDO</th><th>FORMACION</th><th>EXPERIENCIA</th><th>CONOCIMIENTO</th><th></th></tr></head>';
                        for (var i = 0; i < data.length; i++) {
                            idp = data[i].id_cas_puesto; // id de la plaza
                            nomplaza = data[i].cas_pue_puesto;
                            sueldo = data[i].cas_pue_remuneracion;
                            formacion = data[i].formacion;
                            experiencia = data[i].experiencia;
                            conocimiento = data[i].conocimiento;
                            if (formacion != null) {
                                form = '<i class="fa fa-check-circle"></i>';
                            } else {
                                form = 'Falta agregar';
                            }
                            if (experiencia != null) {
                                exp = '<i class="fa fa-check-circle"></i>';
                            } else {
                                exp = 'Falta agregar';
                            }
                            if (conocimiento != null) {
                                cono = '<i class="fa fa-check-circle"></i>';
                            } else {
                                cono = 'Falta agregar';
                            }

                            compuesto = compuesto + '<tr><td>' + idp + '</td><td>' + nomplaza + '</td><td>' +
                                sueldo + '</td><td>' + form + '</td><td>' + exp + '</td><td>' + cono +
                                '</td><td nowrap><a href="#" class="btn btn-label-facebook btn-sm" title="Editar plaza" data-toggle="modal" data-target="#editarplaza" onclick="cargaplazaparedit(' +
                                idp + ')"><i class="flaticon-edit"></i></a> <a href="/eliminarplaza/' + idp +
                                '" class="btn btn-sm btn-danger" title="Eliminar perfil"><i class="flaticon2-trash"></i></a> </td></tr>';
                        }
                        compuesto = compuesto + '</table>';
                        $("#plazasingresadas").html(compuesto);

                        //mostraralerta('success','Existe plazas registras para esta convocatoria');

                    } else { //mostraralerta('error','No existe plazas registras para esta convocatoria');
                        $("#plazasco").show();
                        $("#nompro").html(descripcion);
                        $("#plazasingresadas").hide();
                    }
                    // console.log(data.data);


                },
                error: function(X) {
                    alert("ha ocurrido un error");
                },
            });
        }

        function cargaprocesoeditar(id) {
            $.ajax({
                // data: {reg:id},
                url: '/cargaprocesoeditar/' + id,
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {

                        $("#procescase").val(data[0].proc_sel_cas_descripcion);
                        $("#fechainie").val(data[0].proc_sel_cas_fecha_inicio);
                        $("#fechafininsce").val(data[0].cas_proc_sel_fecha_fin_inscripcion);
                        $("#fecharesule").val(data[0].cas_proc_sel_fecha_resultados);
                        $("#fechafinale").val(data[0].proc_sel_cas_fecha_termino);

                        $("#tipoprocesoe").val(data[0].simplificado);


                        $("#idproceso").val(data[0].id_proc_sel_cas);



                        // var compuesto='<option selected> Seleccione...</option>';
                        //  for(var i =0;i < data.length;i++)
                        //  { 

                        //    compuesto=compuesto+'<option value="'+data[i].idperfil+'"> '+data[i].nomperfil+'</option>';
                        //   }

                        //  $(idperfil).html(compuesto);

                        //mostraralerta('success','Existe plazas registras para esta convocatoria');

                    } else { //mostraralerta('error','No existe plazas registras para esta convocatoria');
                    }
                    // console.log(data.data);


                },
                error: function(X) {
                    alert("ha ocurrido un error");
                },
            });
        }

        function cargarperfil(idperfil) {
            $.ajax({
                // data: {reg:id},
                url: '/perfilescreados',
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {

                        var compuesto = '<option selected> Seleccione...</option>';
                        for (var i = 0; i < data.length; i++) {

                            compuesto = compuesto + '<option value="' + data[i].idperfil + '"> ' + data[i]
                                .nomperfil + '</option>';
                        }

                        $(idperfil).html(compuesto);

                        //mostraralerta('success','Existe plazas registras para esta convocatoria');

                    } else { //mostraralerta('error','No existe plazas registras para esta convocatoria');
                    }
                    // console.log(data.data);


                },
                error: function(X) {
                    alert("ha ocurrido un error");
                },
            });
        }

        function cargaroficinas(idoficinas) {
            $.ajax({
                // data: {reg:id},
                url: '/cargaoficinas',
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {

                        var compuesto = '<option value=""> Seleccione...</option>';
                        for (var i = 0; i < data.length; i++) {

                            compuesto = compuesto + '<option value="' + data[i].cas_pue_oficina + '"> ' + data[
                                i].cas_pue_oficina + '</option>';
                        }

                        $(idoficinas).html(compuesto);

                        //mostraralerta('success','Existe plazas registras para esta convocatoria');

                    } else { //mostraralerta('error','No existe plazas registras para esta convocatoria');
                    }
                    // console.log(data.data);


                },
                error: function(X) {
                    alert("ha ocurrido un error");
                },
            });
        }

        function cargaplazaparedit(id) {

            $("#idplaza").val(id);

            // ajx para cargar la plaza seleccinada
            $.ajax({
                // data: {reg:id},
                url: '/cargaplazaseleccionada/' + id,
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {

                        $("#oficinadeplaza1").val(data[0].cas_pue_oficina);
                        $("#plazas1").val(data[0].cas_pue_puesto);
                        $("#numplazas1").val(data[0].cas_pue_cantidad_plazas);
                        $("#remuneracion1").val(data[0].cas_pue_remuneracion);
                        $("#perfilpostulante1").val(data[0].idperfil);

                        //certificado12
                        if (data[0].certificado_habilidad == 'SI') {
                            $('#certificado11').prop("checked", true);
                        } else {
                            $('#certificado11').prop("checked", false);
                        }




                        if (data[0].conocimiento != null) {
                            var objcono = JSON.parse(data[0].conocimiento);
                            var textcono = '';
                            for (var i = 0; i < objcono.length; i++) {
                                textcono = textcono +
                                    '<div class="row"><input type="text" name="field_conocimiento[]" placeholder="P. Ejemplo: Curso o certificado en Gestión presupuestal " class="form-control col-sm-11" value="' +
                                    objcono[i].data_conocimiento +
                                    '"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarconocimiento()"><i class="far fa-times-circle"></i></a></div>';
                            }
                            x = i;
                            $('.conocimiento_wrapper').html(textcono); // Add field html
                        } else {
                            $('.conocimiento_wrapper').html('');
                        }

                        if (data[0].experiencia != null) {
                            var objexpe = JSON.parse(data[0].experiencia);
                            var textexpe = '';
                            for (var i = 0; i < objexpe.length; i++) {
                                textexpe = textexpe +
                                    '<div class="row"><input type="text" name="field_experiencia[]" placeholder="P. Ejemplo: Experiencia general Tres(3) años como mínimo en sector publico o privado" class="form-control col-sm-11" value="' +
                                    objexpe[i].data_experiencia +
                                    '"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarconocimiento()"><i class="far fa-times-circle"></i></a></div>';
                            }
                            x = i;
                            $('.experiencia_wrapper').html(textexpe); // Add field html
                        } else {
                            $('.experiencia_wrapper').html('');
                        }

                        if (data[0].formacion != null) {
                            var objform = JSON.parse(data[0].formacion);
                            var textform = '';
                            for (var i = 0; i < objform.length; i++) {
                                textform = textform +
                                    '<div class="row"><input type="text" name="field_especialidad[]" placeholder="P. Ejemplo: Experiencia general Tres(3) años como mínimo en sector publico o privado" class="form-control col-sm-11" value="' +
                                    objform[i].data_formacion +
                                    '"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarconocimiento()"><i class="far fa-times-circle"></i></a></div>';
                            }
                            x = i;
                            $('.especialidad_wrapper').html(textform); // Add field html
                        } else {
                            $('.especialidad_wrapper').html('');
                        }





                        //alert(objcono[0].data_conocimiento)
                        //alert(objcono.length);



                    } else { //mostraralerta('error','No existe plazas registras para esta convocatoria');
                    }
                    // console.log(data.data);


                },
                error: function(X) {
                    alert("ha ocurrido un error");
                },
            });
        }

        //las funciones siguuientes sivern para agregar nueo en detalles de la plaza

        // para agregar y eliminar especialidades
        function agregarespecialidad_new() {
            var maxField = 10; //Input fields increment limitation
            var wrapper = $('.especialidad_wrapper_new'); ////Input field wrapper que es el div
            var fieldHTML =
                '<div class="row"><input type="text" name="field_especialidad[]" value="" placeholder="P. Ejemplo: Titulado en Contabilida, Economía o Administración ..." class="form-control col-sm-11"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarespecialidad_new()"><i class="far fa-times-circle"></i></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        }

        function eliminarespecialidad_new() {
            var wrapper = $('.especialidad_wrapper_new'); //Input field wrapper que es el div
            var x = 1; //Initial field counter is 1
            $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        }
        // fin de para agregar y eliminar especialidades


        // para agregar y eliminar conocimiento
        function agregarconocimiento_new() {
            var maxField = 10; //Input fields increment limitation field_conocimiento
            var wrapper = $('.conocimiento_wrapper_new'); ////Input field wrapper que es el div
            var fieldHTML =
                '<div class="row"><input type="text" name="field_conocimiento[]" value="" placeholder="P. Ejemplo: Curso o certificado en Gestión presupuestal " class="form-control col-sm-11"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarconocimiento_new()"><i class="far fa-times-circle"></i></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        }

        function eliminarconocimiento_new() {
            var wrapper = $('.conocimiento_wrapper_new'); //Input field wrapper que es el div
            var x = 1; //Initial field counter is 1
            $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        }
        // fin de para agregar y eliminar conocimiento

        // para agregar y eliminar experiencia
        function agregarexperiencia_new() {
            var maxField = 10; //Input fields increment limitation field_conocimiento
            var wrapper = $('.experiencia_wrapper_new'); ////Input field wrapper que es el div
            var fieldHTML =
                '<div class="row"><input type="text" name="field_experiencia[]" value="" placeholder="P. Ejemplo: Experiencia general Tres(3) años como mínimo en sector publico o privado" class="form-control col-sm-11"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarexperiencia_new()"><i class="far fa-times-circle"></i></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        }

        function eliminarexperiencia_new() {
            var wrapper = $('.experiencia_wrapper_new'); //Input field wrapper que es el div
            var x = 1; //Initial field counter is 1
            $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        }
        // fin de para agregar y eliminar conocimiento


        // las funciones siguientes sirven para modificar o agregar los detalles de la plaza

        // para agregar y eliminar especialidades
        function agregarespecialidad() {
            var maxField = 10; //Input fields increment limitation
            var wrapper = $('.especialidad_wrapper'); ////Input field wrapper que es el div
            var fieldHTML =
                '<div class="row"><input type="text" name="field_especialidad[]" value="" placeholder="P. Ejemplo: Titulado en Contabilida, Economía o Administración ..." class="form-control col-sm-11"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarespecialidad()"><i class="far fa-times-circle"></i></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        }

        function eliminarespecialidad() {
            var wrapper = $('.especialidad_wrapper'); //Input field wrapper que es el div
            var x = 1; //Initial field counter is 1
            $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        }
        // fin de para agregar y eliminar especialidades


        // para agregar y eliminar conocimiento
        function agregarconocimiento() {
            var maxField = 10; //Input fields increment limitation field_conocimiento
            var wrapper = $('.conocimiento_wrapper'); ////Input field wrapper que es el div
            var fieldHTML =
                '<div class="row"><input type="text" name="field_conocimiento[]" value="" placeholder="P. Ejemplo: Curso o certificado en Gestión presupuestal " class="form-control col-sm-11"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarconocimiento()"><i class="far fa-times-circle"></i></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        }

        function eliminarconocimiento() {
            var wrapper = $('.conocimiento_wrapper'); //Input field wrapper que es el div
            var x = 1; //Initial field counter is 1
            $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        }
        // fin de para agregar y eliminar conocimiento

        // para agregar y eliminar experiencia
        function agregarexperiencia() {
            var maxField = 10; //Input fields increment limitation field_conocimiento
            var wrapper = $('.experiencia_wrapper'); ////Input field wrapper que es el div
            var fieldHTML =
                '<div class="row"><input type="text" name="field_experiencia[]" value="" placeholder="P. Ejemplo: Experiencia general Tres(3) años como mínimo en sector publico o privado" class="form-control col-sm-11"><a href="#" class="remove_button col-sm-1" title="Remove field" onclick="eliminarexperiencia()"><i class="far fa-times-circle"></i></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        }

        function eliminarexperiencia() {
            var wrapper = $('.experiencia_wrapper'); //Input field wrapper que es el div
            var x = 1; //Initial field counter is 1
            $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        }
        // fin de para agregar y eliminar conocimiento

        // tiempo para mostrar alertas
        function mostraralerta(tipomensaje, mensaje) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 6000 // 6 segundos se demora para desaparecer
            });
            Toast.fire({
                icon: tipomensaje,
                title: mensaje
            });
        }
    </script>
@endsection
