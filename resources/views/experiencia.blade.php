@extends('main')
@section('titulorequi')
EXPERIENCIA LABORAL
@endsection

@section('opcion')
<form id="form_experiencia_laboral" autocomplete="off" method="post" action="{{route('formexperiencia')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                     @csrf
                                    <input type="hidden" id="idplaza"  name="idplaza" value="{{Session('idpos')}}">
                                    <input type="hidden" id="idusuario" name="idusuario" value="{{auth()->user()->id}}">
                                    
                                    <h4 class="text-primary" style="letter-spacing:-1px;">Experiencia laboral</h4>
                                    <div class="row">
                                        
                                            
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                  
                                                    <label for="">Tipo de Experiencia mín.</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span> 
                                                    {{-- <small class="bg-warning p-2" style="font-size: 14px"> </small> --}}

                                                    <span class="kt-badge kt-badge--primary kt-badge--inline"><strong>Nota:</strong>&nbsp;Ud. puede seleccionar la misma OPCIÓN las veces que considere necesario </span>

                                                    <select class="form-control form-control-sm" id="pelabTipoExperiencia" name="pelabTipoExperiencia" required>
                                                        <option value="G">Experiencia General</option>
                                                        <option value="E">Experiencia Específica</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Cargo</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                     <input class="form-control form-control-sm" type="text" name="pelabCargo_text" maxlength="80" id="pelabCargo_text" autocomplete="off" required>
                                                    
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Tipo de Entidad</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <select class="form-control form-control-sm" id="pelabTipoEntidad" name="pelabTipoEntidad" required><option value="">[Seleccionar]</option><option value="Publico">Público</option><option value="Privado">Privado</option></select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Nombre Entidad</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="text" name="pelabEmpresa" maxlength="80" id="pelabEmpresa" autocomplete="off" required>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                        
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Fecha de Inicio</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="date" name="FechaInicio" id="FechaInicio" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Fecha Fin</label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input class="form-control form-control-sm" type="date" name="FechaFin" id="FechaFin" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Adjuntar Constancia(Archivo PDF,máximo 4MB) </label>
                                                    <span style="color:red; font-size: 16px; vertical-align: middle;">(*)</span>
                                                    <input type="file" name="file" id="file" accept="application/pdf" class="btn btn-default" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">&nbsp;</label>
                                                    <div>
                                                      @if(count($dataexpe)>=3)
                                                     
                                                      <button type="submit" id="btn_subir_experiencia" class="btn btn-linkedin btn-sm">Agregar</button>
                                                       <a href="{{url('conocimiento/'.auth()->user()->id.'/'.Session('idpos'))}}" class="btn btn-danger btn-sm">Siguiente <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>

                                                      @else
                                                        <button type="submit" id="btn_subir_experiencia" class="btn btn-linkedin btn-sm">Agregar</button>
                                                      @endif
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                    @php
                                    $i=0;                                    
                                    $j=0;//incrments para array
                                    $p=0;
                                    @endphp
                                    @foreach($dataexpe as $index)
                                                              @php
                                                              $i++;
                                                                

                                                              if($i==1)
                                                                { $tipoexpini=$index->tipo_experiencia; 
                                                                  $tipoexpini=$index->tipo_experiencia;
                                                                  $dato[$j]=$tipoexpini;
                                                                  $j++;                                                                 
                                                                }
                                                                else
                                                                {
                                                                  if($index->tipo_experiencia<>$tipoexpini)
                                                                    {
                                                                      $tipoexpini=$index->tipo_experiencia;
                                                                      $dato[$j]=$tipoexpini;
                                                                      $j++;  
                                                                    }    
                                                                } 
                                                              @endphp
                                    @endforeach
 
                                    @if(isset($dato))                         
                      
                                          @for($i=0;$i<count($dato);$i++)
                                              {{-- {{ $dato[$i] }}<br> --}}
                                               @php
                                                $anios=0;  
                                                $meses=0;
                                                $dias=0;

                                                 foreach($dataexpe as $val)
                                                 {
                                                   if($dato[$i]==$val->tipo_experiencia)
                                                   {
                                                    $fecha1 = new DateTime($val->fecha_inicio);
                                                    $fecha2 = new DateTime($val->fecha_fin);
                                                    $fecha = $fecha1->diff($fecha2);
                                                    $anios=$anios+$fecha->y;
                                                    $meses=$meses+$fecha->m;
                                                    $dias=$dias+$fecha->d;
                                                   }
                                                 }
                                              //
                                                 if($dias>30)
                                                 {
                                                  $mes=intdiv($dias, 30);// numero de meses
                                                  $dia=$dias%30;//numero de dias
                                                  $meses=$meses+$mes;
                                                  $dias=$dia;
                                                  if($meses>12){
                                                    $an=intdiv($meses, 12);// numero de anios
                                                    $mes=$meses%12;//numero de meses definitivo
                                                    $meses=$mes;
                                                    $anios=$anios+$an;
                                                   }
                                                 }
                                                 else{
                                                    if($meses>12){
                                                      $an=intdiv($meses, 12);// numero de anios
                                                      $mes=$meses%12;//numero de meses definitivo
                                                      $meses=$mes;
                                                      $anios=$anios+$an;
                                                     }
                                                 }
                                               @endphp
                                               <div class="row text-dark" style="padding-left: 5px; font-size: 14px">
                                                 <div class="col-md-8"><strong >{{ $dato[$i] }}:</strong ></div>
                                                 <div class="col-md-4"><strong >Total acumulados: {{ $anios }} años {{ $meses }} meses {{ $dias }} días</strong></div>
                                               </div> 
                                              @endfor                                    
                      @endif
                                    
                                    <div class="clearfix">&nbsp;</div>
                                    <div class="row">
                                        
                                            <div class="table-responsive">
                                                <hr>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-sm">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th class="text-center mi_header">TIPO EXPERIENCIA</th>
                                                                <th class="text-center mi_header">CARGO</th>
                                                                <th class="text-center mi_header">TIPO ENTIDAD</th>
                                                                <th class="text-center mi_header">EMPRESA</th>
                                                                <th class="text-center mi_header">INICIO</th>
                                                                <th class="text-center mi_header">FIN</th>
                                                                <th class="text-center mi_header">VER SUSTENTO</th>
                                                                <th class="text-center mi_header"><strong>EDITAR</strong></th>
                                                                <th class="text-center mi_header">ELIMINAR</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-bind="foreach: experiencias">
                                                            @foreach($dataexpe as $index)
                                                             <tr>
                                                              <td>{{$index->tipo_experiencia}}</td>
                                                              <td>{{$index->cargo}}</td>
                                                              <td>{{$index->tipo_entidad}}</td>
                                                              <td>{{$index->nombre_entidad}}</td>
                                                              <td nowrap>{{$index->fecha_inicio}}</td>
                                                              <td nowrap>{{$index->fecha_fin}}</td>
                                                              
                                                              
                                                              <td align="center"><a href="{{Storage::url($index->archivo_experiencia)}}" title="Ver " target="_blank"><i class="fa fa-eye"></i></a></td>
                                                              <td align="center"><a href="#" title="Ver " data-toggle="modal" data-target="#popupeditarexperiencia" onclick="cargaregistroformacionacad({{$index->idexperiencia}})"><i class="fa fa-edit"></i></a></td>
                                                              <td align="center"><a href="/eliminarregsexperiencia/{{$index->idexperiencia}}/{{auth()->user()->id}}/{{Session('idpos')}}" title=""><i class="fa fa-trash"></i></a></td>
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
              <h4 class="modal-title">Editar experiencia laboral</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              <form  role="form" method="post" action="{{ route('actualizaexperiencia') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control form-control-sm" name="idregformacion" id="idregformacion">
                <input type="hidden" class="form-control form-control-sm" name="iduser" id="iduser" value="{{auth()->user()->id}}">
                <input type="hidden" class="form-control form-control-sm" name="idplazaedit" id="idplazaedit" value="{{Session('idpos')}}">
                
                <div class="form-group">
                      <label >Tipo de Experiencia</label>
                      <select  class="form-control form-control-sm" name="tipoexperiencia" id="tipoexperiencia" required>                    
                      </select>
                </div>
                
                <div class="form-group">
                      <label >Cargo</label>
                      <input type="text" class="form-control form-control-sm" name="cargo"  required  id="cargo">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                      <label >Tipo entidad</label>
                      
                      <select class="form-control form-control-sm" id="tipoentidad" name="tipoentidad" required><option value="">[Seleccionar]</option><option value="Publico">Público</option><option value="Privado">Privado</option></select>
                  </div>
                  <div class="col-sm-6">
                    <label >Nombre entidad</label>
                      <input type="text" class="form-control form-control-sm" name="nomentidad"  required id="nomentidad">
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <label >Fecha inicio </label>
                      <input type="date" class="form-control form-control-sm" name="fechaini"  required  id="fechaini">  
                    </div>
                    <div class="col-sm-6">
                      <label >Fecha fin</label>
                      <input type="date" class="form-control form-control-sm" name="fechafin"  required  id="fechafin">  
                    </div>
                    
                </div>
                
                <div class="form-group">
                      <label >Adjuntar Sustento(Archivo PDF,máximo 4MB)</label>
                      <input type="file" class="form-control form-control-sm" name="fileexpe" id="fileexpe" accept="application/pdf">
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
    //perfil("#idperfiledet");
    formacion("#pelabTipoExperiencia");

    //perfil("#requeridoedit");
    formacion("#tipoexperiencia");

    

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

               var objform=JSON.parse(data[0].experiencia);

               if(data[0].experiencia!=null){
                  var compuesto='<option selected value=""> Seleccione la opción...</option>';         
                  for(var i =0;i< objform.length;i++)
                  {
                    compuesto=compuesto+'<option value="'+objform[i].data_experiencia+'"> '+objform[i].data_experiencia+'</option>';
                  }
                  $(idperfil).html(compuesto); // Add field html
                }                  

                  //mostraralerta('success','Existe plazas registras para esta convocatoria');
              }
                else{mostraralerta('error','No existe plazas registras para esta convocatoria');
                }
               // console.log(data.data);             
             
            },
            error: function(X){
                  alert("ha ocurrido un error");            
              },
          });

    }

    // obtenemos el valor al hacer click en grado
    // $(document).on('change', '#pfacGrado', function(event) {
    //  var grado=$("#pfacGrado option:selected").text();
    //  $("#pfacEspecialidad_text").val(grado);
    // });

function cargaregistroformacionacad(id)
{
  
  
  var idexperiencia=id;
        $.ajax({      
            // data: {reg:id},
            url: '/cargaexperiencialeccionada/'+idexperiencia,
            type: 'get',
            dataType : "json",        
            success: function(data){ 

              if(data.length){

                  
                    
                    $("#idregformacion").val(data[0].idexperiencia);

                    $("#tipoexperiencia").val(data[0].tipo_experiencia);
                    $("#cargo").val(data[0].cargo);
                    $("#tipoentidad").val(data[0].tipo_entidad); 
                    $("#nomentidad").val(data[0].nombre_entidad);
                    $("#fechaini").val(data[0].fecha_inicio);
                    $("#fechafin").val(data[0].fecha_fin);

                    $("#respfile").html(data[0].archivo_experiencia);    
                             
                    
                  

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

