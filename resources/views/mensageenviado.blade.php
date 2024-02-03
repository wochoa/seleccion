@extends('main')
@section('titulorequi')
Resultado de la postulación
@endsection

@section('opcion')

    <h4>Descargar el cargo <a href="{{url('descargacargo')}}/{{ Session('idpos') }}" class="btn btn-sm btn-dark">Descargar</a></h4>

    <div class="p-3" style="border: 1px dashed #ccc;">
    	<div align="center"> <strong>ROTURADO GENERADO EN LA PREINSCRIPCION</strong></div>
    	<p><strong>Señores:</strong> Gobierno regional Huánuco</p>
    	<p><strong>Oficina Regional de Administracion</strong></p>
    	<p><strong>{{ Session('nomprecesosesion') }}</strong></p>
    	<hr>
    	<p><strong>Contrato Administrativo de Servicios - CAS</strong></p>
    	<P>Objeto de la convocatoria:</P>
    	<p>Contratación de un(a) <strong>{{ Session('nomplaza') }}</strong> (Puesto al que postula)</p>
    	<p>Unidad Orgánica  <strong> {{ Session('ofi')  }} </strong>(oficina al que postula)</p>
    	<P>Nombres y apellidos: <strong> {{ Session('nomape')  }}</P>
    	<P>DNI: <strong> {{ Session('dni')  }}</P>
    	<P>Dirección: {{ Session('direccion')  }}</P>
    </div>
    

@endsection

@section('script')
 <script type="text/javascript">
     function mostraralerta(tipomensaje,mensaje)
  {
    swal.fire("Bien echo!", mensaje, tipomensaje);
  }

@foreach (['danger', 'warning', 'success', 'info'] as $msg) 
     @if(Session::has('alert-' . $msg))      
        mostraralerta('{{ $msg }}','{{ Session::get('alert-' . $msg) }}');
     @endif 
@endforeach
 </script>
@endsection


