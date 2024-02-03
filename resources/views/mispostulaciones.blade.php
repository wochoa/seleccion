@section('headtitle')
  <h3 class="kt-subheader__title">Dashboard</h3>
  <span class="kt-subheader__separator kt-hidden"></span>
  <div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a><span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">Mis postulaciones </a>{{-- <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">Brand Aside </a> --}}
  </div>
@endsection

@extends('main')
@section('titulorequi')
Mis postulaciones
@endsection

@section('opcion')

<table id="listainscritos" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>N°</th><th>DNI</th><th>NOMBRES</th><th>CELULAR</th><th>POSTULACION</th><th>FECHA POSTULADO</th><th>CARGO</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($mispostulaciones as $index)
                       <tr>
                         <td>{{ $index->idenvioinsc  }}{{-- {{ $index->iduser  }} --}}</td><td>{{ $index->num_doc  }}</td><td>{{ $index->ap_paterno   }} {{ $index->ap_materno   }},{{ $index->nombres   }}</td><td>{{ $index->celular  }}</td><td><strong>Unidad:</strong> {{ $index->cas_pue_oficina  }}<br><strong>Perfil:</strong> {{ $index->cas_pue_puesto   }}</td><td>{{ $index->fechaenvio   }}</td><td><a href="{{url('descargacargo')}}/{{ $index->plaza  }}" class="btn btn-info btn-sm" target="_blank">Descargar</a> <a href="{{url('resufile')}}/{{ $index->iduser }}/{{ $index->plaza  }}" class="btn btn-primary btn-sm" target="_blank">Anexo 7</a></td>
                       </tr>
                      @endforeach
                    </tbody>
                  </table>

@php
  //print_r($mispostulaciones);
@endphp
@endsection

@section('script')
<script type="text/javascript">

  $(function () {
    $("#mispostulaciones").DataTable({
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