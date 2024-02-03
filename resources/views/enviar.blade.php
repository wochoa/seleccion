@extends('main')
@section('titulorequi')
ENVÍO DE POSTULACIÓN
@endsection

@section('opcion')
<div class="flash-message"> 
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
     @if(Session::has('alert-' . $msg)) 

     {{-- <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> --}}
      
     <div class="alert alert-{{ $msg }}" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">{{ Session::get('alert-' . $msg) }}</div>
        <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
          </button>
        </div>
      </div>
     @endif 
    @endforeach 
    </div> <!-- end .flash-message --> 
<form id="form_experiencia_laboral" autocomplete="off" method="post" action="{{route('formenviarinsc')}}" >
     @csrf
    <input type="hidden" id="idplaza"  name="idplaza" value="{{Session('idpos')}}">
    <input type="hidden" id="idusuario" name="idusuario" value="{{auth()->user()->id}}">
    
    

    <div class="row">
      <div class="col-md-6">
        <h4 class="text-primary" style="letter-spacing:-1px;" align="center">ANEXOS Y HOJA DE VIDA</h4>
         <table class="table table-bordered table-sm table-striped">
              <thead class="thead-dark">
                <tr><th>N</th><th>Nombre Ficha</th><th>ver</th></tr>
              </thead>
              <tbody>
                @php
                $numanx=1;
                @endphp
                @foreach($dataanexo as $anx=>$val)
                  <tr> <td>{{$numanx}}</td><td>{{$val->nombreanexo}}</td><td nowrap><a href="{{Storage::url($val->archivo_anexo)}}" class="btn btn-sm  btn-instagram" target="_blank"> {{-- <i class="fa fa-eye"></i> --}} Ver</a></td> </tr>
                  @if($numanx==7)
                  <tr> <td>{{ $numanx+1 }}</td><td>ANEXO 8: Resumen del curriculum vitae <span class="kt-badge kt-badge--success kt-badge--inline">GENERADO AUTOMATICAMENTE POR EL SISTEMA</span></td><td><a href="{{url('resufile/'.auth()->user()->id.'/'.Session('idpos'))}}" class="btn btn-sm btn-instagram" > {{-- <i class="fa fa-eye"></i> --}} Ver</a></td> 
                  </tr>
                @php
                $numanx=8;
                @endphp
                @endif
                @php
                
                  $numanx++;
                @endphp

                @endforeach

                

                @foreach($archivoscargados as $cargados)
                <tr><td colspan="2">{{ $cargados->sustento }}</td><td><a href="{{Storage::url($cargados->archivo)}}" class="btn btn-sm btn-instagram" target="_blank">{{-- <i class="fa fa-eye"></i> --}}Ver</a></td></tr>
                @endforeach

                @foreach($colegiatura_dat as $coleg)
                <tr><td colspan="2">{{ $coleg->detalle_colegiatura }}</td><td><a href="{{Storage::url($coleg->archivo)}}" class="btn btn-sm btn-instagram" target="_blank">{{-- <i class="fa fa-eye"></i> --}}Ver</a></td></tr>
                @endforeach()

              </tbody>
            </table>
      </div>
      <div class="col-md-6">
        @if(count($formacion)>=1 and count($experiencia)>=1 and count($conocimiento)>=1 and count($dataanexo)==9)

            

        <div class="alert alert-metal" role="alert">
          <div class="alert-icon"><i class="flaticon-warning"></i></div>
          <div class="alert-text">Una vez enviada la postulación, ya no podrá realizar las modificaciones de los datos, se le recuerda revisar que todo esté conforme al perfil requerido, tambien no podrá postular a otra plaza del mimso proceso</div>
          <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
          </div>
        </div>



                @if($activo==0)
                <button type="submit" id="btn_subir_fa" class="btn btn-linkedin float-right btn-sm">Enviar mi postulación</button>
                @endif    
          
                 


            @else
            

            <div class="alert alert-warning" role="alert">
              <div class="alert-icon"><i class="flaticon-warning"></i></div>
              <div class="alert-text">Estimado postulante, para el envío de su postulación a la plaza seleccionada, al parecer falta algunos datos que es requisito indespensable, se le invoca a revisar los terminos de referencia</div>
              <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"><i class="la la-close"></i></span>
                </button>
              </div>
            </div>
            

            @endif
      </div>              
    </div>

            

        
    
                                    
</form>


@endsection

@section('script')
<script type="text/javascript">
  var dirweb='{{ auth()->user()->avatar }}';
  if(dirweb=='uploads/avatars/default.png'){
    // alert('Tiene que cambiar la foto de su perfil');//
    $("#idavatar").modal("show");
  }

</script>

@endsection



