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
                        <th>N°</th><th>DNI</th><th>NOMBRES</th><th>CELULAR</th><th>POSTULACION</th><th>FECHA</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($inscritos as $index)
                       <tr>
                         <td>{{ $index->idenvioinsc  }}{{-- {{ $index->iduser  }} --}}</td><td>{{ $index->num_doc  }}</td><td>{{ $index->ap_paterno   }} {{ $index->ap_materno   }},{{ $index->nombres   }}</td><td>{{ $index->celular  }}</td><td><strong>Unidad:</strong> {{ $index->cas_pue_oficina  }}<br><strong>Perfil:</strong> {{ $index->cas_pue_puesto   }}</td><td>{{ $index->fechaenvio   }}</td>
                       </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
</div>
@php
 // print_r($inscritos);
@endphp
@endsection

@section('script')
<script type="text/javascript">

  $(function () {
    $("#listainscritos").DataTable({
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

</script>
@endsection