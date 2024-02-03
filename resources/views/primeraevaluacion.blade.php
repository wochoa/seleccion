@extends('evaluador')
@section('contevaluacion')
<div class="row">
          <div class="col-md-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    LISTADO DE INSCRITOS
                  </h3>

                </div>
                <div class="card-body">
                  <table id="listainscritos" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>N°</th><th>DNI</th><th>NOMBRES</th>{{-- <th>CELULAR</th> --}}<th>POSTULACION</th><th>FECHA</th><th>EVALUAR</th><th>PUNTAJE</th><th>OBSERVACION</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($inscritos as $index)
                      @php
                         $servicio="<strong>Unidad:</strong>".$index->cas_pue_oficina."<br>/<strong>Perfil:</strong>".$index->cas_pue_puesto;
                         $insc=0;
                         if(count($data_evalcurricular)>0)
                         {
                           for($insc=0;$insc<count($data_evalcurricular);$insc++)
                             {
                              if($index->iduser==$data_evalcurricular[$insc]->iduser)
                              {
                                $puntage=$data_evalcurricular[$insc]->puntagetotal;
                                $datoobservacion=$data_evalcurricular[$insc]->observacion;
                                $enlace='<a href="/editarcurricular/'.$index->idenvioinsc.'" class="btn btn-success btn-xs">Editar</a>&nbsp;&nbsp;&nbsp;<a href="/fichacurricular/'.$data_evalcurricular[$insc]->idevalcurricular.'" class="btn btn-warning btn-xs" target="_blank">Ficha Evaluación</a>';
                                break;
                              }
                              else{$puntage='';$enlace='<a href="/evalcurricular/'.$index->idenvioinsc.'" class="btn btn-primary btn-xs">Evaluar</a>';$datoobservacion='';}
                             }
                         }
                         else{$puntage='';$enlace='<a href="/evalcurricular/'.$index->idenvioinsc.'" class="btn btn-primary btn-xs">Evaluar</a>';$datoobservacion='';}
                         // echo count($data_evalcurricular);

                      @endphp
                       <tr>
                         <td>{{ $index->idenvioinsc  }}</td><td>{{ $index->num_doc  }}</td><td>{{ strtoupper($index->ap_paterno)   }} {{ strtoupper($index->ap_materno)   }},{{ strtoupper($index->nombres)   }}</td><td>{!! $servicio !!}</td><td>{{ $index->fechaenvio   }}</td>

                         <td nowrap>{!! $enlace?? '' !!}</td>
                         <td>{{ $puntage ??'' }}</td>
                        <td style="font-size: 13px">{{ $datoobservacion??'' }}</td>
                       </tr>
                       @php
                         $insc++;
                       @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
</div>
@php
// print_r($data_evalcurricular);
// echo $data_evalcurricular[0]->iduser;
@endphp

{{-- modal --}}
 <div class="modal fade" id="modalevaluar" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Evaluación curricular</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript">

  $(function () {
    $("#listainscritos").DataTable({
    	pageLength: 100,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "responsive": true,
      "autoWidth": false,
      language: {
        processing:     "Traitement en cours...",
        search:         "Buscar&nbsp;:",
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

  });

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

@foreach (['danger', 'warning', 'success', 'info'] as $msg) 
     @if(Session::has('alert-' . $msg)) 

     {{-- <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
     <div onload="mostraralerta('{{ $msg }}','Fue registrado satisfactoriamente');"> --}}
      
        mostraralerta('{{ $msg }}','{{ Session::get('alert-' . $msg) }}');

       
     {{-- </div> --}} 
     @endif 
@endforeach
function cargasiesevaluado(id)
{

}
</script>
@endsection