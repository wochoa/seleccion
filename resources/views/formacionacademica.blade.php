@section('headtitle')
  <h3 class="kt-subheader__title">Requisitos de convocatoria</h3>
  <span class="kt-subheader__separator kt-hidden"></span>
  <div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a><span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">Formacion académica </a>{{-- <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">Brand Aside </a> --}}
  </div>
@endsection
@extends('main')
@section('titulorequi')
FORMACION ACADEMICA
@endsection

@section('opcion')
 <form id="form_formacion_academica" autocomplete="off" method="post" action="{{route('formaacademica')}}" accept-charset="UTF-8" enctype="multipart/form-data">

                                    @csrf
                                    <input type="hidden" id="idplaza"  name="idplaza" value="{{Session('idpos')}}">
                                    <input type="hidden" id="idusuario" name="idusuario" value="{{auth()->user()->id}}">                               
                                    
                                    
                                    
                                    <h4 class="text-primary" style="letter-spacing:-1px;">Grado(s) / situación académica y estudios</h4>
                                    {{-- <div class="alert alert-primary">
                                                <p>Los grados y títulos deberán ser escaneados por <strong>ambas caras.</strong></p>
                                            </div> --}}
                                    <div class="alert alert-metal" role="alert"><strong>NOTA: </strong> Los grados y títulos deberán ser escaneados por ambas caras.</div>
                                    <div class="row">
                                        
                                            
                                            
                                            <div class="col-md-3" style="display: none;">
                                                <div class="form-group">
                                                    <label for="">Nivel</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <select class="form-control form-control-sm" id="pfacNivel" name="pfacNivel" >
                                                     
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Nivel</label> {{-- <label for="">Grado</label> --}}
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <select class="form-control form-control-sm" id="pfacGrado" name="pfacGrado" required>
                                                       <option value="" selected>Seleccione</option>
                                                        <option value="ESTUDIOS BASICOS REGULARES(PRIMARIO O SECUNDARIA)">ESTUDIOS BASICOS REGULARES(PRIMARIO O SECUNDARIA)</option>
                                                        <option value="ESTUDIOS TECNICOS">ESTUDIOS TECNICOS</option>
                                                        <option value="TITULO TECNICO">TITULO TECNICO</option>
                                                        <option value="ESTUDIOS UNIVERSITARIOS">ESTUDIOS UNIVERSITARIOS</option>
                                                        <option value="BACHILLER">BACHILLER</option>
                                                        <option value="TITULO PROFESIONAL">TITULO PROFESIONAL</option>
                                                        <option value="ESTUDIOS Y/O EGRESADO DE MAESTRIA">ESTUDIOS Y/O EGRESADO DE MAESTRIA</option>
                                                        <option value="GRADO DE MAESTRIA">GRADO DE MAESTRIA</option>
                                                        <option value="ESTUDIO Y/O EGRESADO DOCTORADO">ESTUDIO Y/O EGRESADO DOCTORADO</option>
                                                        <option value="GRADO DE DOCTORADO">GRADO DE DOCTORADO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Especialidad</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="text" id="pfacEspecialidad_text" name="pfacEspecialidad_text" maxlength="80" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Centro de Estudios</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="text" id="pfacCentroEstudios" name="pfacCentroEstudios" maxlength="80" autocomplete="off" required>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                            
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Año de Inicio</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="number" id="pfacAnioInicio" name="pfacAnioInicio" maxlength="4" min="1950" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Año Fin</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="number" id="pfacAnioFin" name="pfacAnioFin" maxlength="4" required min="1950">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Fecha Extensión Grado</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="date" id="pfacFechaExtensionTitulo" name="pfacFechaExtensionTitulo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Adjuntar Sustento(Archivo PDF,máximo 4MB)</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input type="file" name="file" id="file" accept="application/pdf"  required class="btn btn-default btn-sm">
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                            
                                            <div class="col-sm-12" id="botonagregar">
                                                <div class="form-group float-right">
                                                    <label for="">&nbsp;</label>
                                                    <div>
                                                      @if(count($formacion)>=1)
                                                        <button type="submit" id="btn_subir_fa" class="btn btn-linkedin btn-sm">Agregar</button>
                                                        <a href="{{url('experiencia/'.auth()->user()->id.'/'.Session('idpos'))}}" class="btn btn-danger btn-sm ">Siguiente <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                        @else
                                                        <button type="submit" id="btn_subir_fa" class="btn btn-linkedin btn-sm float-right">Agregar</button>
                                                      @endif
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    </form>
                                    <div class="row"  id="habilidadprof" style="border:1px dashed #ccc; display: none;">
                                      @php
                                      if(count($colegiatura)!=2){
                                      @endphp
                                      <div class="col-sm-8 p-2" style="border-right:1px dashed #ccc; ">
                                          <h4>Colegiatura y habilitación</h4>
                                          <form method="post" action="{{route('cargacolegiatura')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" id="idplaza"  name="idplaza" value="{{Session('idpos')}}">
                                            <input type="hidden" id="idusuario" name="idusuario" value="{{auth()->user()->id}}"> 
                                            <div class="form-group row">
                                              
                                                <label class="col-sm-2 col-form-label" >Seleccione</label>
                                                 <div class="col-sm-3">
                                                   <select class="custom-select" required name="Colegiatura">
                                                    <option value="" selected>Seleccione</option>
                                                    <option>Colegiatura</option>
                                                    <option>Habilitación_vigente</option>
                                                  </select>
                                                 </div> 
                                                 <input type="file" name="colegiatura"  accept="application/pdf" required>
                                              
                                              
                                              <div class="col-sm-2"><button class="btn btn-sm btn-info">Cargar colegiatura</button></div>
                                            </div>
                                            
                                          </form>
                                        </div>
                                        @php
                                        }
                                        @endphp
                                        <div class="col-sm-4 p-2">
                                          <table class="table table-bordered table-sm table-hover">
                                            <thead style="background-color: #ccc;"><tr><th>Descripcion</th><th>Archivo</th><th>Operación</th></tr></thead>
                                            <tbody>
                                              @foreach($colegiatura as $cole)
                                              <tr><td>{{ $cole->detalle_colegiatura }}</td><td><a href="{{Storage::url($cole->archivo)}}" target="_blank">ver</a></td><td><a href="/eliminarregscolegiatura/{{$cole->idcolegiatura}}/{{auth()->user()->id}}/{{Session('idpos')}}">Eliminar</a></td></tr>
                                              @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                    
                                    
                                    <h4 class="text-primary" style="letter-spacing:-1px;">REGISTROS DE FORMACION ACADEMICA</h4>
                                    <div class="table-responsive">{{-- style="display: none;" --}}
                                        
                                            <table class="table table-bordered table-hover table-sm" cellspacing="0">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th class="text-center mi_header"><strong>Nivel</strong></th>
                                                        {{-- <th class="text-center mi_header"> <strong>Grado</strong></th> --}}
                                                        <th class="text-center mi_header"><strong>Especialidad</strong></th>
                                                        <th class="text-center mi_header"><strong>Fecha Extensión Grado</strong></th>
                                                        <th class="text-center mi_header"><strong>Archivo sustento</strong></th>
                                                        <th class="text-center mi_header"><strong>Ver</strong></th>
                                                        <th class="text-center mi_header"><strong>Editar</strong></th>
                                                        <th class="text-center mi_header"><strong>Eliminar</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody data-bind="foreach: formaciones_academicas_total">
                                                @foreach($formacion as $index)

                                                <tr>
                                                  {{-- <td>{{$index->nivel}}</td> --}}
                                                  <td>{{$index->grado}}</td>
                                                  <td>{{$index->especialidad}}</td>
                                                  <td>{{$index->fecha_extension}}</td>
                                                  <td align="center"><a href="{{Storage::url($index->archivo_formacion)}}" title="Ver archivo cargado" class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill" target="_blank">Archivo</a></td>
                                                  <td><a href="#" title="Ver " data-toggle="modal" data-target="#popupveracademica" onclick="cargaregistroformacionacad({{$index->idformacion}},1)"><i class="fa fa-eye"></i></a></td>
                                                  <td><a href="#" title="Ver " data-toggle="modal" data-target="#popupeditaracademica" onclick="cargaregistroformacionacad({{$index->idformacion}},2)"><i class="fa fa-edit"></i></a></td>
                                                  <td><a href="/eliminarregsformacion/{{$index->idformacion}}/{{auth()->user()->id}}/{{Session('idpos')}}" title=""><i class="fa fa-trash"></i></a></td>
                                                </tr>

                                                @endforeach
                                                </tbody>

                                            </table>
                                            {{-- @php
                                             print_r($formacion);
                                            @endphp --}}
                                           {{--  <a href="{{Storage::url('public/a25QJzCUnuUCyPAbWQKTs5dY5wAlyZ4vIBisbyHB.pdf')}}" title="">archivo</a> --}}
                                            {{-- public/a25QJzCUnuUCyPAbWQKTs5dY5wAlyZ4vIBisbyHB.pdf --}}

                                        
                                    </div>
                                

  {{-- MODAL PARA VER FORMACION ACADEMICA --}}
<div class="modal fade" id="popupveracademica">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Formación académica cargada</h4>
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
  {{-- FIN MODAL PARA VER FORMACION ACADEMICA--}}

  {{-- MODAL PARA editar FORMACION ACADEMICA --}}
<div class="modal fade" id="popupeditaracademica">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Formación académica</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              <form  role="form" method="post" action="{{ route('actualizarformaacademico') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control form-control-sm" name="idregformacion" id="idregformacion">
                <input type="hidden" class="form-control form-control-sm" name="iduser" id="iduser" value="{{auth()->user()->id}}">
                <input type="hidden" class="form-control form-control-sm" name="idplazaedit" id="idplazaedit" value="{{Session('idpos')}}">
                
                <div class="form-group" style="display: none;">
                      <label >Nivel</label>
                      <select  class="form-control form-control-sm" name="editnivel" id="editnivel" >
                                                
                      </select>
                </div>
                <div class="form-group">
                      <label >Nivel</label>{{-- <label >Grado</label> --}}
                      <select  class="form-control form-control-sm" name="gradoedit" id="gradoedit" required>
                        <option value="" selected>Seleccione</option>
                        <option value="ESTUDIOS BASICOS REGULARES(PRIMARIO O SECUNDARIA)">ESTUDIOS BASICOS REGULARES(PRIMARIO O SECUNDARIA)</option>
                        <option value="ESTUDIOS TECNICOS">ESTUDIOS TECNICOS</option>
                        <option value="TITULO TECNICO">TITULO TECNICO</option>
                        <option value="ESTUDIOS UNIVERSITARIOS">ESTUDIOS UNIVERSITARIOS</option>
                        <option value="BACHILLER">BACHILLER</option>
                        <option value="TITULO PROFESIONAL">TITULO PROFESIONAL</option>
                        <option value="ESTUDIOS Y/O EGRESADO DE MAESTRIA">ESTUDIOS Y/O EGRESADO DE MAESTRIA</option>
                        <option value="GRADO DE MAESTRIA">GRADO DE MAESTRIA</option>
                        <option value="ESTUDIO Y/O EGRESADO DOCTORADO">ESTUDIO Y/O EGRESADO DOCTORADO</option>
                        <option value="GRADO DE DOCTORADO">GRADO DE DOCTORADO</option>                    
                      </select>
                </div>

                <div class="form-group">
                      <label >Especialidad</label>
                      <input type="text" class="form-control form-control-sm" name="especialidadedit"  required  id="especialidadedit">
                </div>
                <div class="form-group">
                      <label >centro de estudios</label>
                      <input type="text" class="form-control form-control-sm" name="centroestudioedit"  required  id="centroestudioedit">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <label >Año de Inicio</label>
                      <input type="number" class="form-control form-control-sm" name="anioini" required id="anioini">
                  </div>
                  <div class="col-sm-6">
                    <label >Año Fin</label>
                      <input type="number" class="form-control form-control-sm" name="aniofin"  required id="aniofin">
                  </div>
                </div>
                <div class="form-group">
                      <label >Fecha Extensión Grado</label>
                      <input type="date" class="form-control form-control-sm" name="fechaextensionedit"  required id="fechaextensionedit">
                </div>
                <div class="form-group">
                      <label >Adjuntar Sustento(Archivo PDF,máximo 4MB)</label>
                      <input type="file" class="form-control form-control-sm" name="fileforma" id="fileforma" accept="application/pdf">
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
  {{-- FIN MODAL PARA VER FORMACION ACADEMICA--}}
@endsection

@section('script')
<script type="text/javascript" charset="utf-8" async defer>
    //  cargamos el perfil
    perfil("#pfacNivel");
    formacion("#pfacGrado2");

    perfil("#editnivel");
    //formacion("#gradoedit2");

    function perfil(idperfil)
    {
        var idplazas={{Session('idperfil')}};
        $.ajax({      
            // data: {reg:id},
            url: '/cargadetalleperfil/'+idplazas,
            type: 'get',
            dataType : "json",        
            success: function(data){ 

              if(data.length){                  

                 var compuesto='<option selected value=""> Seleccione...</option>';
                  for(var i =0;i < data.length;i++)
                  { 
                    if(data[i].categoria=="FORMACION ACADEMICA")
                    {compuesto=compuesto+'<option value="'+data[i].nomdet_perfil+'"> '+data[i].nomdet_perfil+'</option>';}
                   }
                  
                  $(idperfil).html(compuesto);

                  //mostraralerta('success','Existe plazas registras para esta convocatoria');
              }
                else{//mostraralerta('error','No existe plazas registras para esta convocatoria');
                }
               // console.log(data.data);             
             
            },
            error: function(X){
                  alert("ha ocurrido un error");            
              },
          });

    }

    function formacion(idperfil)
    {
        var idplaza={{Session('idpos')}};
        $.ajax({      
            // data: {reg:id},
            url: '/cargaplazaseleccionada/'+idplaza,
            type: 'get',
            dataType : "json",        
            success: function(data){ 

              if(data.length){

               var objform=JSON.parse(data[0].formacion);

               if(data[0].formacion!=null){
                  var compuesto='<option selected value=""> Seleccione...</option>';         
                  for(var i =0;i< objform.length;i++)
                  {
                    compuesto=compuesto+'<option value="'+objform[i].data_formacion+'"> '+objform[i].data_formacion+'</option>';
                  }
                  $(idperfil).html(compuesto); // Add field html
                } 

                if(data[0].certificado_habilidad=='SI')
                  {$("#habilidadprof").show();}
                  else{$('#botonagregar').addClass('col-sm-12');}                 

                  //mostraralerta('success','Existe plazas registras para esta convocatoria');
              }
                else{//mostraralerta('error','No existe plazas registras para esta convocatoria');
                }
               // console.log(data.data);             
             
            },
            error: function(X){
                  alert("ha ocurrido un error");            
              },
          });

    }

    // obtenemos el valor al hacer click en grado
    $(document).on('change', '#pfacGrado', function(event) {
     var grado=$("#pfacGrado option:selected").text();
     // $("#pfacEspecialidad_text").val(grado);
     $("#pfacEspecialidad_text").focus();
    });

function cargaregistroformacionacad(id,ver)
{
  
  
  var idformacion=id;
        $.ajax({      
            // data: {reg:id},
            url: '/cargaformacionsleccionada/'+idformacion,
            type: 'get',
            dataType : "json",        
            success: function(data){ 

              if(data.length){

                  if(ver==1)
                  {
                    var html='<table class="table table-bordered">'
                    for(var i =0;i < data.length;i++)
                    { 
                      var archivo= data[i].archivo_formacion;
                      var nuevacadena=archivo.substr(7);
                      html=html+'<!--<tr><td><strong>NIVEL:</strong></td><td>'+data[i].nivel+'</td></tr>--><tr><td><strong>GRADO:</strong></td><td>'+data[i].grado+'</td></tr><tr><td><strong>ESPECIALIDAD:</strong></td><td>'+data[i].especialidad+'</td></tr><tr><td><strong>CENTRO DE ESTUDIOS:</strong></td><td>'+data[i].centro_estudio+'</td></tr><tr><td><strong>AÑO INICIO:</strong></td><td>'+data[i].anio_inicio+'</td></tr><tr><td><strong>AÑO FIN:</strong></td><td>'+data[i].anio_fin+'</td></tr></tr><tr><td><strong>FECHA EXTENSIÓN:</strong></td><td>'+data[i].fecha_extension+'</td></tr><tr><td><strong>ARCHIVO CARGADO:</strong></td><td><a href="/storage/'+nuevacadena+'" title="Arhcivo cargado" target="_blank">Archivo</a></td></tr>';
                     }
                    html=html+'</table>'
                    $("#verdormacionacad").html(html);
                  }
                  if(ver==2){
                    

                    $("#editnivel").val(data[0].nivel);
                    $("#gradoedit").val(data[0].grado);
                    $("#especialidadedit").val(data[0].especialidad);
                    $("#anioini").val(data[0].anio_inicio);
                    $("#aniofin").val(data[0].anio_fin);
                    $("#fechaextensionedit").val(data[0].fecha_extension);     
                    $("#respfile").html(data[0].archivo_formacion);    
                    $("#idregformacion").val(data[0].idformacion);         
                    $("#centroestudioedit").val(data[0].centro_estudio); 
                  }

                  //mostraralerta('success','Existe plazas registras para esta convocatoria');
              }
                else{//mostraralerta('error','No existe plazas registras para esta convocatoria');
                }
               // console.log(data.data);             
             
            },
            error: function(X){
                  alert("ha ocurrido un error");            
              },
          });
}
    // tiempo para mostrar alertas
  function mostraralerta(tipomensaje,mensaje)
  {
    const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 6000// 6 segundos se demora para desaparecer
            });
      Toast.fire({
          icon: tipomensaje,
          title: mensaje
        });
  }

 @if(Session::has('cargadonoti'))      
        toastr.success("Fue agregado satisfactoriamente");
 @endif

 @if(Session::has('cargaeliminado'))      
        toastr.error("Fue eliminado satisfactoriamente");
 @endif
 @if(Session::has('actualizado'))      
        toastr.info("Fue actualizado satisfactoriamente");
 @endif
</script>
@endsection