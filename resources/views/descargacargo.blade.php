@extends('plantillas.plantillaresumen')
@section('content')
<div class="p-3" style="border: 1px dashed #ccc;">

    	<div align="center">
            <img src="{{ asset('dist/img/logo2.jpg') }}" height="50"><br>
            {{-- CARGO DEL POSTULANTE  --}}<br><br> <strong>ROTULADO GENERADO EN LA PREINSCRIPCION</strong></div><br>
    	<p><strong>Señores:</strong> Gobierno Regional Huánuco</p>
    	<p><strong>Oficina Regional de Administracion</strong></p>
    	<p><strong>{{ $datoscargo["nomproceso"] }}</strong></p>
    	<hr>
    	<p><strong>Contrato Administrativo de Servicios - CAS</strong></p>
    	<P>Objeto de la convocatoria:</P>
    	<p>Contratación de un(a) <strong>{{ $datoscargo["nomplaza"] }}</strong> (Puesto al que postula)</p>
    	<p>Unidad Orgánica  <strong> {{ $datoscargo["ofi"]  }} </strong>(oficina al que postula)</p>
    	<P>Nombres y apellidos: {{ $datoscargo["nomape"]}}<strong></P>
    	<P>DNI: <strong> {{ $datoscargo["dni"]  }}</P>
    	<P>Dirección: {{ $datoscargo["direccion"] }}</P>
        <hr>
        <p style="font-size: 10px">Este documento es considerado como <strong>cargo</strong> a puesto que postula.</p>
        {{-- @php
         print_r($datoscargo);
        @endphp --}}
       {{-- <img src="{!!$message->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png')!!}"> --}}
    </div>
    @endsection