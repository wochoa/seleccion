@section('headtitle')
  <h3 class="kt-subheader__title">Requisitos de convocatoria</h3>
  <span class="kt-subheader__separator kt-hidden"></span>
  <div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a><span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">Anexos </a>{{-- <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">Brand Aside </a> --}}
  </div>
@endsection
@extends('main')
@section('titulorequi')
ANEXOS
@endsection

@section('opcion')
<form id="form_anexos" method="post" autocomplete="off" method="post" action="{{route('formanexo')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                     @csrf
                                    <input type="hidden" id="idplaza"  name="idplaza" value="{{Session('idpos')}}">
                                    <input type="hidden" id="idusuario" name="idusuario" value="{{auth()->user()->id}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Estimado(a) postulante, para el cumplimiento de postulacion tiene que descargar los anexos, rellenar sus datos y luego convertir a formato(.pdf) y esto se debe de subir en la sección donde corresponda 
                                            {{-- <a href="{{asset('documentos/anexos.zip')}}" title="" class="btn btn-google btn-sm">Descargar anexos</a> --}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12" {{-- style="border-right: 1px #ccc dashed;" --}}>
 
                                              <div class="row">
                                                    <label class="col-sm-6 col-form-label">ANEXO 1: Carta de presentación del postulante(Archivo PDF)<span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> </label>
                                                    <div class="col-sm-6">
                                                      <input type="hidden" name="datofile1" id="datofile1" value="ANEXO 1: Carta de presentación del postulante">
                                                      <input type="file" name="file1" id="file1" accept="application/pdf"  required>
                                                    </div>
                                              </div>
                                              <div class="row">
                                                    <label class="col-sm-6 col-form-label">ANEXO 2: Declaración Jurada de no encontrarse inscrito en el registro de deudores alimenticios morosos - REDAM(Archivo PDF)<span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> </label>                                                    
                                                    <div class="col-sm-6">
                                                      <input type="hidden" name="datofile2" id="datofile2" value="ANEXO 2: Declaración Jurada de no encontrarse inscrito en el registro de deudores alimenticios morosos - REDAM">
                                                      <input type="file" name="file2" id="file2" accept="application/pdf"  required>
                                                    </div>
                                              </div>
                                              <div class="row">
                                                    <label class="col-sm-6 col-form-label">ANEXO 3: Declaración jurada de ausencias de incompatibilidades(Archivo PDF) <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span></label>
                                                    
                                                    <div class="col-sm-6">
                                                      <input type="hidden" name="datofile3" id="datofile3" value="ANEXO 3: Declaración jurada de ausencias de incompatibilidades">
                                                      <input type="file" name="file3" id="file3" accept="application/pdf"  required>
                                                    </div>
                                              </div>
                                              <div class="row">
                                                    <label class="col-sm-6 col-form-label">ANEXO 4: Declaración jurada de parentesco(Archivo PDF)<span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> </label>
                                                    
                                                    <div class="col-sm-6">
                                                      <input type="hidden" name="datofile4" id="datofile4" value="ANEXO 4: Declaración jurada de parentesco">
                                                      <input type="file" name="file4" id="file4" accept="application/pdf"  required>
                                                    </div>
                                              </div>
                                              <div class="row">
                                                    <label class="col-sm-6 col-form-label">ANEXO 5: Declaración jurada de conocimiento del código de ética de la función pública(Archivo PDF) <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span></label>
                                                    
                                                    <div class="col-sm-6">
                                                      <input type="hidden" name="datofile5" id="datofile5" value="ANEXO 5: Declaración jurada de conocimiento del código de ética de la función pública">
                                                      <input type="file" name="file5" id="file5" accept="application/pdf"  required>
                                                    </div>
                                              </div>
                                              <div class="row">
                                                    <label class="col-sm-6 col-form-label">ANEXO 6: Declaración jurada de notificación virtual(Archivo PDF)<span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> </label>
                                                    
                                                    <div class="col-sm-6">
                                                      <input type="hidden" name="datofile6" id="datofile6" value="ANEXO 6: Declaración jurada de notificación virtual">
                                                      <input type="file" name="file6" id="file6" accept="application/pdf" required>
                                                    </div>
                                              </div>
                                              <div class="row">
                                                <label class="col-sm-6 col-form-label">ANEXO 7: Cumplimiento de Requisitos de Idoneidad y Honestidad para el Ingreso al Gobierno Regional de Huánuco(Archivo PDF)<span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> </label>
                                                
                                                <div class="col-sm-6">
                                                  <input type="hidden" name="datofile7" id="datofile7" value="ANEXO 7: Cumplimiento de Requisitos de Idoneidad y Honestidad para el Ingreso al Gobierno Regional de Huánuco">
                                                  <input type="file" name="file7" id="file7" accept="application/pdf" required>
                                                </div>
                                          </div>

                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <div class="alert alert-success" role="alert">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      </button>
                                                      <strong>Nota: </strong> &nbsp;&nbsp;El ANEXO 8, se generará automaticamente en el&nbsp; <strong class="text-dark">paso 6</strong>, debido que es un resumen file(luego de haber rellenado los pasos 1,3,4 y 5)
                                                    </div>
                                                </div>
                                              </div>

                                              <div class="form-group row">
                                                      <label class="col-sm-6 col-form-label">DNI:(Archivo PDF)<span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> </label>
                                                      <div class="col-sm-6">
                                                        <input type="hidden" name="datofile8" id="datofile8" value="Documento de identidad(DNI)">
                                                        <input type="file" name="file8" id="file8" accept="application/pdf"  required>
                                                      </div>
                                                </div>
                                                <div class="form-group row">
                                                      <label class="col-sm-6 col-form-label">FICHA RUC:(Archivo PDF)<span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> </label>
                                                      <div class="col-sm-6">
                                                        <input type="hidden" name="datofile9" id="datofile9" value="FICHA RUC">
                                                        <input type="file" name="file9" id="file9" accept="application/pdf"  required>
                                                      </div>
                                                </div>

                                        </div>
                                        {{-- <div class="col-md-6">
                                                
                                        </div>  --}}   
                                    </div>
                                    
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              @if(count($dataanexo)<>null)
                                                <a href="{{url('formacionacademica/'.auth()->user()->id.'/'.Session('idpos'))}}" class="btn btn-danger float-right btn-sm">Siguiente <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                @else
                                                <button type="submit" id="btn_guardar_anexos" class="btn btn-linkedin float-right btn-sm">Guardar</button>
                                              @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="clearfix">&nbsp;</div> --}}
                                    <div class="row">
                                        
                                            <div class="table-responsive">
                                                <hr>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-sm table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th class="text-center mi_header">ANEXO CARGADOS</th>
                                                                
                                                                <th class="text-center mi_header">VER SUSTENTO</th>
                                                                <th class="text-center mi_header"><strong>EDITAR</strong></th>
                                                                <th class="text-center mi_header">{{-- ELIMINAR --}}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-bind="foreach: experiencias">
                                                            @foreach($dataanexo as $index)
                                                             <tr>
                                                              <td>{{$index->nombreanexo}}</td>
                                                              
                                                              <td align="center"><a href="{{Storage::url($index->archivo_anexo)}}" title="Ver " target="_blank"><i class="fa fa-eye"></i></a></td>
                                                              <td align="center"><a href="#" title="Ver " data-toggle="modal" data-target="#popupeditarexperiencia" onclick="cargaregistroformacionacad({{$index->idanexos}})"><i class="fa fa-edit"></i></a></td>
                                                              <td align="center">
                                                                <a href="/eliminarregsanexo/{{$index->idanexos}}/{{auth()->user()->id}}/{{Session('idpos')}}" title=""><i class="fa fa-trash"></i></a>
                                                              </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                        
                                    </div>
                                </form>
  {{-- MODAL PARA editar FORMACION ACADEMICA --}}
<div class="modal fade" id="popupeditarexperiencia">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar anexos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              <form  role="form" method="post" action="{{ route('actualizaanexo') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="idregformacion" id="idregformacion">
                <input type="hidden" class="form-control" name="iduser" id="iduser" value="{{auth()->user()->id}}">
                <input type="hidden" class="form-control" name="idplazaedit" id="idplazaedit" value="{{Session('idpos')}}">
                
                <div class="form-group">
                    <label for="Flag_Discapacidad" class="col-sm-8" >Anexos a cargar</label>                                                
                        <select class="form-control" id="anexosedit" name="anexosedit" required>
                            <option value="">[Seleccionar]</option>
                            <option value="ANEXO 1: Carta de presentación del postulante">ANEXO 1: Carta de presentación del postulante</option>
                            <option value="ANEXO 2: Declaración Jurada de no encontrarse inscrito en el registro de deudores alimenticios morosos - REDAM">ANEXO 2: Declaración Jurada de no encontrarse inscrito en el registro de deudores alimenticios morosos - REDAM</option>
                            <option value="ANEXO 3: Declaración jurada de ausencias de incompatibilidades">ANEXO 3: Declaración jurada de ausencias de incompatibilidades</option>
                            <option value="ANEXO 4: Declaración jurada de parentesco">ANEXO 4: Declaración jurada de parentesco</option>
                            <option value="ANEXO 5: Declaración jurada de conocimiento del código de ética de la función pública">ANEXO 5: Declaración jurada de conocimiento del código de ética de la función pública</option>
                            <option value="ANEXO 6: Declaración jurada de notificación virtual">ANEXO 6: Declaración jurada de notificación virtual</option>
                            <option value="ANEXO 7: Cumplimiento de Requisitos de Idoneidad y Honestidad para el Ingreso al Gobierno Regional de Huánucol">ANEXO 7: Cumplimiento de Requisitos de Idoneidad y Honestidad para el Ingreso al Gobierno Regional de Huánuco</option>
                            <option value="Documento de identidad(DNI)">Documento de identidad(DNI)</option>
                            <option value="FICHA RUC">FICHA RUC</option>
                        </select>      
                </div>
                                        
                
                <div class="form-group">
                      <label >Adjuntar Sustento(Archivo PDF,máximo 4MB)</label>
                      <input type="file" class="form-control" name="fileexpe" id="fileexpe" accept="application/pdf">
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


    // obtenemos el valor al hacer click en grado
    // $(document).on('change', '#pfacGrado', function(event) {
    //  var grado=$("#pfacGrado option:selected").text();
    //  $("#pfacEspecialidad_text").val(grado);
    // });

function cargaregistroformacionacad(id)
{
  
  
  var idanexo=id;
        $.ajax({      
            // data: {reg:id},
            url: '/cargaanexoleccionada/'+idanexo,
            type: 'get',
            dataType : "json",        
            success: function(data){ 

              if(data.length){

                  
                    
                    $("#idregformacion").val(data[0].idanexos);

                    $("#anexosedit").val(data[0].nombreanexo);

                    $("#respfile").html(data[0].archivo_anexo);    
                             
                    
                  

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

 @if(Session::has('actualizado'))      
        toastr.info("Fue actualizado satisfactoriamente");
 @endif
</script>
@endsection