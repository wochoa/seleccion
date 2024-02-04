@extends('main')
@section('titulorequi')
    CV DEL POSTULANTE
@endsection

@section('opcion')
    <form id="form_cursos_especializacion" method="post" action="{{ route('formunicoarchivo') }}" accept-charset="UTF-8"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="idplaza" name="idplaza" value="{{ Session('idpos') }}">
        <input type="hidden" id="idusuario" name="idusuario" value="{{ auth()->user()->id }}">

        {{-- <h4 class="text-primary" style="letter-spacing:-1px;">Cursos y/o capacitaciones</h4> --}}
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="">Adjuntar CV(Archivo PDF)</label>
                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                    <input type="file" id="file_ce" name="file_ce" accept="application/pdf" class="btn btn-default"
                        required>
                </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group float-right">
                  <label for="">&nbsp;</label>
                  <div>
                    @if(count($datacono)>=1)
                      {{-- <button type="submit" id="btn_subir_cu_es" class="btn btn-linkedin btn-sm">Agregar</button> --}}
                      <a href="{{url('enviarinsc/'.auth()->user()->id.'/'.Session('idpos'))}}" class="btn btn-danger btn-sm ">Siguiente <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                    @else
                      <button type="submit" id="btn_subir_cu_es" class="btn btn-linkedin btn-sm">Agregar</button>
                      @endif
                  </div>
              </div>
          </div>


        </div>


        <div class="clearfix">&nbsp;</div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm table-striped" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center mi_header">ID</th>
                        <th class="text-center mi_header">ARCHIVO CARGADO</th>                        
                        <th class="text-center mi_header">VER</th>
                        <th class="text-center mi_header"><strong>EDITAR</strong></th>
                        <th class="text-center mi_header">ELIMINAR</th>
                    </tr>
                </thead>
                <tbody data-bind="foreach: cursos_especializaciones">
                    @foreach ($datacono as $index)
                        <tr>
                            <td>{{ $index->idunico }}</td>
                            <td>{{ $index->nombreunicoarchivo }}</td>

                            <td align="center">
                              {{-- <a href="#" title="Ver " data-toggle="modal"
                                    data-target="#popupveracademica"
                                    onclick="cargaregistrofile({{ $index->idunico }},1)"><i
                                        class="fa fa-eye"></i></a> --}}
                                        <a href="/archivo/{{$index->archivo_unicoarchivo}}" title="Ver " target="_blanck"><i
                                        class="fa fa-eye"></i></a>
                                      </td>

                            <td align="center"><a href="#" title="Ver " data-toggle="modal"
                                    data-target="#popupeditaracademica"
                                    onclick="cargaregistrofile({{ $index->idunico }},2)"><i
                                        class="fa fa-edit"></i></a></td>

                            <td align="center"><a
                                    href="/eliminararchivounico/{{ $index->idunico }}/{{ auth()->user()->id }}/{{ Session('idpos') }}"
                                    title=""><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>


    {{-- MODAL PARA VER FORMACION ACADEMICA --}}
    <div class="modal fade" id="popupveracademica">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Conocimientos cargado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="verdormacionacad">
                    ....
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- FIN MODAL PARA VER FORMACION ACADEMICA --}}

    {{-- MODAL PARA editar FORMACION ACADEMICA --}}
    <div class="modal fade" id="popupeditaracademica">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar CV</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" action="{{ route('actualizaunicofile') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control form-control-sm" name="fridunico"
                            id="fridunico">
                        <input type="hidden" class="form-control form-control-sm" name="iduser" id="iduser"
                            value="{{ auth()->user()->id }}">
                        <input type="hidden" class="form-control form-control-sm" name="idplazaedit" id="idplazaedit"
                            value="{{ Session('idpos') }}">

                        {{-- <div class="form-group">
                            <label>Requerido</label>
                            <select class="form-control form-control-sm" name="requeridoedit" id="requeridoedit"
                                required>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>tema</label>
                            <select class="form-control form-control-sm" name="temaedit" id="temaedit" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Centro de estudios</label>
                            <input type="text" class="form-control form-control-sm" name="centroestudioedit" required
                                id="centroestudioedit">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Fecha de Inicio</label>
                                <input type="date" class="form-control form-control-sm" name="anioini" required
                                    id="anioini">
                            </div>
                            <div class="col-sm-6">
                                <label>Fecha de Fin</label>
                                <input type="date" class="form-control form-control-sm" name="aniofin" required
                                    id="aniofin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Duración (N° Horas) </label>
                            <input type="text" class="form-control form-control-sm" name="nhoras" required
                                id="nhoras">
                        </div>
                        <div class="form-group">
                            <label>Tipo Sustento</label>
                            <select class="form-control form-control-sm" id="tiposustento" name="tiposustento">
                                <option value="">[Seleccionar]</option>
                                <option value="Certificado">Certificado</option>
                                <option value="Constancia">Constancia</option>
                                <option value="Diploma">Diplomado de acuerdo al servicio</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>Reemplazar CV(Archivo PDF,máximo 4MB)</label>
                            <input type="file" class="form-control form-control-sm" name="fileconoc" id="fileconoc"
                                accept="application/pdf">
                            <small id="respfile"></small>
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
    {{-- FIN MODAL PARA VER FORMACION ACADEMICA --}}
@endsection

@section('script')
    <script type="text/javascript" charset="utf-8" async defer>
        //  cargamos el perfil
        perfil("#idperfiledet");
        formacion("#temas");

        perfil("#requeridoedit");
        formacion("#temaedit");

        function perfil(idperfil) {
            var idplazas = {{ Session('idperfil') }};
            $.ajax({
                // data: {reg:id},
                url: '/cargadetalleperfil/' + idplazas,
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {

                        var compuesto = '<option selected value=""> Seleccione...</option>';
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].categoria == "CONOCIMIENTO") {
                                compuesto = compuesto + '<option value="' + data[i].nomdet_perfil + '"> ' +
                                    data[i].nomdet_perfil + '</option>';
                            }
                        }

                        $(idperfil).html(compuesto);

                        //mostraralerta('success','Existe plazas registras para esta convocatoria');
                    } else {
                        mostraralerta('error', 'No existe plazas registras para esta convocatoria');
                    }
                    // console.log(data.data);             

                },
                error: function(X) {
                    alert("ha ocurrido un error");
                },
            });

        }

        function formacion(idperfil) {
            var idplaza = {{ Session('idpos') }};
            $.ajax({
                // data: {reg:id},
                url: '/cargaplazaseleccionada/' + idplaza,
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {

                        var objform = JSON.parse(data[0].conocimiento);

                        if (data[0].conocimiento != null) {
                            var compuesto = '<option selected value=""> Seleccione...</option>';
                            for (var i = 0; i < objform.length; i++) {
                                compuesto = compuesto + '<option value="' + objform[i].data_conocimiento +
                                    '"> ' + objform[i].data_conocimiento + '</option>';
                            }
                            $(idperfil).html(compuesto); // Add field html
                        }

                        // mostraralerta('success','Existe plazas registras para esta convocatoria');
                    } else {
                        mostraralerta('error', 'No existe plazas registras para esta convocatoria');
                    }
                    // console.log(data.data);             

                },
                error: function(X) {
                    alert("ha ocurrido un error");
                },
            });

        }

        // obtenemos el valor al hacer click en grado
        // $(document).on('change', '#pfacGrado', function(event) {
        //  var grado=$("#pfacGrado option:selected").text();
        //  $("#pfacEspecialidad_text").val(grado);
        // });

        function cargaregistrofile(id, ver) {


            var idformacion = id;
            $.ajax({
                // data: {reg:id},
                url: '/cargafileleccionada/' + idformacion,
                type: 'get',
                dataType: "json",
                success: function(data) {

                    if (data.length) {

                        if (ver == 1) {
                            // var html = '<table class="table table-bordered">'
                            // for (var i = 0; i < data.length; i++) {
                            //     var archivo = data[i].archivo_concoimiento;
                            //     var nuevacadena = archivo.substr(7);
                            //     html = html + '<tr><td><strong>REQUERIDO:</strong></td><td>' + data[i]
                            //         .requerido + '</td></tr><tr><td><strong>TEMA:</strong></td><td>' + data[i]
                            //         .tema + '</td></tr><tr><td><strong>CENTRO DE ESTUDIOS:</strong></td><td>' +
                            //         data[i].centro_estudio +
                            //         '</td></tr><tr><td><strong>FECHA INICIO:</strong></td><td>' + data[i]
                            //         .fecha_inicio + '</td></tr><tr><td><strong>FECHA FIN:</strong></td><td>' +
                            //         data[i].fecha_fin +
                            //         '</td></tr><tr><td><strong>dURACION HORAS:</strong></td><td>' + data[i]
                            //         .duracion + '</td></tr></tr><tr><td><strong>SUSTENTO:</strong></td><td>' +
                            //         data[i].tipo_sustento +
                            //         '</td></tr><tr><td><strong>ARCHIVO CARGADO:</strong></td><td><a href="/storage/' +
                            //         nuevacadena +
                            //         '" title="Arhcivo cargado" target="_blank">Archivo</a></td></tr>';
                            // }
                            // html = html + '</table>'
                            // $("#verdormacionacad").html(html);
                        }
                        if (ver == 2) {


                            // $("#requeridoedit").val(data[0].requerido);
                            // $("#temaedit").val(data[0].tema);
                            // $("#centroestudioedit").val(data[0].centro_estudio);
                            // $("#anioini").val(data[0].fecha_inicio);
                            // $("#aniofin").val(data[0].fecha_fin);
                            // $("#nhoras").val(data[0].duracion);
                            // $("#tiposustento").val(data[0].tipo_sustento);
                            $("#fridunico").val(data[0].idunico);

                            $("#respfile").html(data[0].archivo_unicoarchivo);


                        }

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

        @if (Session::has('cargafile'))
            toastr.success("Fue agregado satisfactoriamente");
        @endif

        @if (Session::has('cargaeliminado'))
            toastr.error("Fue eliminado satisfactoriamente");
        @endif
        @if (Session::has('actualizado'))
            toastr.info("Fue actualizado satisfactoriamente");
        @endif
    </script>
@endsection
