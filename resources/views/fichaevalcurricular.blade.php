@extends('plantillas.plantillaresumen')
@section('content')
<div class="p-2" style="border: 1px dashed #ccc; font-size: 12px">

      <div align="center">
            <img src="{{ asset('dist/img/logo2.png') }}" height="50"><br>
            {{-- CARGO DEL POSTULANTE  --}}<br><br> <strong>FICHA DE EVALUACIÓN</strong><br>
            <strong>{{ $nomproceso[0]->proc_sel_cas_descripcion }}</strong>
          </div><br>

      <p><strong>Nombres y apellidos:</strong> {{ $ficha[0]->nombres }} {{ $ficha[0]->ap_paterno }} {{ $ficha[0]->ap_materno }}<br>
      <strong>Oficina:</strong> {{ $ficha[0]->cas_pue_oficina }}<br>
      <strong>Servicio:</strong> {{ $ficha[0]->cas_pue_puesto}}</p>
      <hr>
      <div align="center">
        <strong>CUMPLIMIENTO</strong>
      </div>
      <p>
        <strong>Foliado:</strong>@if($ficha[0]->folios==1) SI @else NO @endif &nbsp;&nbsp;&nbsp;<strong>Anexos:</strong>@if($ficha[0]->anexos_cump==1) SI @else NO @endif&nbsp;&nbsp;&nbsp;<strong>Formación:</strong>@if($ficha[0]->formacion_cump==1) SI @else NO @endif&nbsp;&nbsp;&nbsp;<strong>Cursos y/o capacitación:</strong>@if($ficha[0]->conocimiento_cump==1) SI @else NO @endif&nbsp;&nbsp;&nbsp;<strong>Experiencia:</strong>@if($ficha[0]->experiencia_cump==1) SI @else NO @endif&nbsp;&nbsp;&nbsp;<strong>Documentos adjuntos:</strong>@if($ficha[0]->docadjunto==1) SI @else NO @endif
      </p>
      <div align="center">
        <strong>EVALUACION CURRICULAR</strong>
      </div>
      <p>
             <table class="table table-bordered table-sm table-hover">
                        <thead class="bg-secondary">
                          <tr>
                            <th>N</th><th>Descripción</th><th>Puntaje máx.</th><th>Puntaje mín.</th><th>Puntuación.</th>
                          </tr>
                        </thead>
                        <tbody>
                           @php
                        $i=0;
                        $j=0;
                        $pmax=0;
                        $pmin=0;
                        $puntos=json_decode($ficha[0]->arraypontage);
                        @endphp
                        @foreach($perfil as $idper)
                          @php
                            $i++;
                            $pmax=$pmax+$idper->puntuaciones;
                            $pmin=$pmin+$idper->puntagemin;
                          @endphp
                          <tr>
                            <td>{{ $i }}</td> <td>{{ $idper->nomdet_perfil }}</td><td>{{ $idper->puntuaciones }}</td><td>{{ $idper->puntagemin }}</td><td align="center" class="bg-secondary">{{ $puntos[$j]->data_puntages }}</td>
                          </tr>
                          @php
                            $j++;
                          @endphp
                        @endforeach
                        <tr class="table-active">
                            <td colspan="2"><strong>PUNTAJE</strong></td><td><strong>{{ $pmax }}</strong></td><td><strong>{{ $pmin  }}</strong></td><td align="center">{{ $ficha[0]->puntagetotal }}</td>
                          </tr>
                        </tbody>
                    </table>
      </p>
      <p>
        <strong>Puntaje obtenido:</strong> {{ $ficha[0]->puntagetotal }}
      </p>
      <p>
        <strong>Observación:</strong> {{ $ficha[0]->observacion }}
      </p>
      <hr><br>
      <div class="row">
        <div align="center">
          ...........................................<br>
PRESIDENTE <br>  
ECON. FIDEL F. MONTES GODOY
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div align="left">
                      ...........................................<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIEMBRO <br>
Ing. JHONY ALEX ORIZANO PEREZ
          </div>
        </div>
        <div class="col-md-6">
          <div align="right">
                      ......................................................<br>
SECRETARIO TÉCNICO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>  
Mg. ROBERTO LOPEZ CAHUAZA
          </div>
        </div>
      </div>
        @php
         //print_r($ficha);
        @endphp
    </div>
    @endsection