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
Puesto vigentes
@endsection

@section('opcion')

@php
//print_r($datosplazas);
@endphp

<table id="tablapplazas" class="table table-bordered table-hover table-striped">
    <thead>
    <tr><th >PROCESO</th><th >DETALLE DE CONVOCATORIA</th><th >INICIO</th><th >FIN</th>{{-- <th>PERFIL</th> --}}<th>POSTULAR</th></tr>
   </thead>
   <tbody>
   {{--  <tr><td>proceso</td><td>plaza </td><td>02/07/2020</td><td>08/07/2020</td><td><a class="btn btn-info btn-xs" target="_blank" href="#"><i class="fa fa-search"></i> TDR</a></td><td><a class="btn btn-primary btn-xs" href="/postulacion/120">POSTULAR</a></td></tr> --}}
   @for($i=0;$i<count($datosplazas);$i++)
       <tr>
        <td>{{$datosplazas[$i]->proc_sel_cas_descripcion}}</td>
        <td ><strong>Oficina:</strong> {{$datosplazas[$i]->cas_pue_oficina}}<br><strong> Perfil:</strong>{{$datosplazas[$i]->cas_pue_puesto}}<br><strong>Remuneración: </strong>S/.{{$datosplazas[$i]->cas_pue_remuneracion}}.00 <br><strong>Cantidad requerida:</strong> {{$datosplazas[$i]->cas_pue_cantidad_plazas}}<br></td>
        <td nowrap>{{$datosplazas[$i]->proc_sel_cas_fecha_inicio}}</td>
        <td nowrap>{{$datosplazas[$i]->cas_proc_sel_fecha_fin_inscripcion}}</td>
        {{-- <td><a class="btn btn-info btn-xs" target="_blank" href="{{Storage::url($datosplazas[$i]->tdr)}}">PERFIL</a></td> --}}
        @php
          $fecha_actual = strtotime(date("Y-m-d",time()));
          $fecha_ini = strtotime($datosplazas[$i]->proc_sel_cas_fecha_inicio);
          $fecha_fin= strtotime($datosplazas[$i]->cas_proc_sel_fecha_fin_inscripcion);
          $hora=date('H');
          $min=date('i');
        @endphp
        <td>
       @if($fecha_actual>=$fecha_ini and $fecha_actual<=$fecha_fin) {{-- 
         @if($hora<=18 and $min<=30) --}}
          <a class="btn btn-primary btn-xs" href="/postulacion/{{$datosplazas[$i]->id_cas_puesto}}/{{$datosplazas[$i]->cas_pue_puesto}}/{{$datosplazas[$i]->cas_pue_oficina}}/{{$datosplazas[$i]->cas_pue_remuneracion}}/{{$datosplazas[$i]->idperfil}}"> POSTULAR</a>
          {{-- @else
                <p class="text-danger">Finalizado la postulación según cronograma</p>
                
            @endif--}}

            @else
              
                <p class="text-danger">Finalizado la postulación según cronograma</p>
                
              
                

                        
       @endif 
        
        </td>
      </tr>
    @endfor
   </tbody>
</table>



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
<!--begin::Page Vendors(used by this page) -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>


<!--end::Page Vendors -->


<!--begin::Page Vendors(used by this page) -->

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
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#tablapplazas').DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
        processing:     "Traitement en cours...",
        search:         "",
        searchPlaceholder: "INGRESE SU BUSQUEDA AQUI....",
        lengthMenu:    "Cantidad por página _MENU_ ",
        info:           "Mostrando del _START_ al _END_ del(_TOTAL_) documentos",
        infoEmpty:      "No hay elementos para mostrar",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Chargement en cours...",
        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable:     "No hay documentos con los parametros seleccionados",
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Ultimo"
          }
        } 
    });

    //$('.dataTables_filter input').AddClass('form-control form-control-sm');
    $(".dataTables_filter input").addClass('form-control form-control-sm anchosear');
    // $(".dataTables_paginate a").addClass('paginate_button page-item previous disabled');
  } );
</script>
@endsection