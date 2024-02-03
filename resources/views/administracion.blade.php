@extends('plantillas.plantillagral')

@section('menu')
<ul class="kt-menu__nav ">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="kt-menu__item {{ urlactiva('procesoconvocatoria') }}" aria-haspopup="true">
            
            <a href="{{url('publiconvocatoria')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-user"></i><span class="kt-menu__link-text">Convocatorias</span></a>
          </li>

          <li class="kt-menu__item {{urlactiva('perfiles')}}" aria-haspopup="true"><a href="{{url('perfiles')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-copy"></i><span class="kt-menu__link-text">Perfiles</span></a></li>

         {{--  <li class="nav-item">
            <a href="{{url('perfiles')}}" class="nav-link {{urlactiva('perfiles')}}"><i class="nav-icon fas fa-th"></i><p>Perfiles</p></a>
          </li> --}}
        {{--   <li class="nav-item">
            <a href="{{url('tiposdeformacion')}}" class="nav-link"><i class="nav-icon fas fa-th"></i><p>Tipos de formacion</p></a>
          </li> --}}

        </ul>
@endsection



@section('content')
@php
// aqui tiene que cargar
        // definimos los niveles de acceso por los usuarios(administrador,evaluador,postulante)

if(empty(auth()->user()->nivel)){return redirect()->route('login');}
else {if(auth()->user()->nivel==3 or auth()->user()->nivel==2){return redirect()->route('login');}}
       
@endphp
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

 @yield('contadministrador')

</div>
<!-- ./wrapper -->
@endsection