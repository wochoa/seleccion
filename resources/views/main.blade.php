
@extends('plantillas.plantillagral')


@section('menu')
<ul class="kt-menu__nav ">
                @if(Request::is('resultadoenv'))
                @else
                <li class="kt-menu__item {{ urlactiva('home') }}" aria-haspopup="true"><a href="main" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-user"></i><span class="kt-menu__link-text">Mis datos</span></a></li>
              @if(!Session('idpos'))
             <li class="kt-menu__item {{ urlactiva('relacionplaza') }}" aria-haspopup="true"><a href="/relacionplaza" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-layers"></i><span class="kt-menu__link-text">Puestos vigentes</span></a></li>
              @endif

                <li class="kt-menu__item {{ urlactiva('mispostulaciones') }}" aria-haspopup="true"><a href="/mispostulaciones" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-copy"></i><span class="kt-menu__link-text">Mis postulaciones</span></a></li>
                @endif
                
                @if(Session('idpos'))
                <li class="kt-menu__section ">
                  <h4 class="kt-menu__section-text">Información</h4>                  
                </li>
                <li class="kt-menu__item ">
                         @php
                                    $nomplaza = Session('nomplaza');
                                    $oficina = Session('ofi');
                                    $remuneracion = Session('remu');
                                   // Session('idperfil')
                                    $texto='<p style="color:#fff"> DETALLLES DEL PUESTO AL QUE DESEAS POSTULAR PLAZA:</p><p style="color:#fff"> '.$nomplaza.'<br>REMUNERACION : S/. '.$remuneracion.'.00 OFICINA: '.$oficina.'</p>';//.'-'.Session('procesopostulado');


                                    
                          @endphp
                          
                          <div class="alert" style="background: #17668b;border-radius: 0px !important;" role="alert">
                              <div class="alert-text">{!! $texto !!}</div>
                          </div> 
                  @endif
                  </li>
               @if(Session('procesoactual'))
                  @if(Session('procesoactual')==Session('procesopostulado'))
                  <li class="alert" style="background: #0296ff;border-radius: 0px !important;color:#fff">
                   <a>Usted ya se encuentra inscrito en este proceso, por la tanto no puede postular ni hacer modificacion de sus datos para este proceso.</a>
                  </li>
                  <li class="nav-item col-md-12">
                  <a href="{{url('descargacargo')}}/{{ Session('idpos') }}" class="btn btn-sm btn-warning" target="_blank">Ver mi cargo de postulación</a>
                  </li>
                  @endif
                @endif
                  <hr>
                  <li class="kt-menu__item p-2">
                     <a class="kt-font-success">Cualquier consultas referente a la inscripción al correo:<br>
                      <span class="kt-font-warning">comisioncasgorehco@gmail.com</span></a>
                  </li> 
              </ul>
@endsection


@section('content')
      

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

              <!--begin::Dashboard 2-->

              <!--begin::Row-->
               @if(Request::is('resultadoenv'))
                {{-- aqui no se coloca nada --}}
                @else
              <div class="row">
                 @if(Session('procesoactual')<>Session('procesopostulado'))
                 <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                      <div class="kt-wizard-v3"  data-ktwizard-state="between">

                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v3__nav">
                          <div class="kt-wizard-v3__nav-line"></div>
                          <div class="kt-wizard-v3__nav-items">

                            <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                            @if(!Session('idpos'))
                            <a class="kt-wizard-v3__nav-item" href="{{url('relacionplaza')}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('relacionplaza') !!} >0</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">Puestos</div>
                            </a>
                            @endif
                            
                            <a class="kt-wizard-v3__nav-item" href="{{url('datospersonales')}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('datospersonales') !!} >1</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">DATOS PERSONALES</div>
                            </a>

                            <a class="kt-wizard-v3__nav-item" href="{{url('anexos/'.auth()->user()->id.'/'.Session('idpos'))}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('anexos') !!}>2</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">ANEXOS</div>
                            </a>
                            <a class="kt-wizard-v3__nav-item" href="{{url('formacionacademica/'.auth()->user()->id.'/'.Session('idpos'))}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('formacionacademica') !!}>3</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">FORMACIÓN ACADÉMICA</div>
                            </a>
                            <a class="kt-wizard-v3__nav-item" href="{{url('experiencia/'.auth()->user()->id.'/'.Session('idpos'))}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('experiencia') !!}>4</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">EXPERIENCIA LABORAL</div>
                            </a>
                            <a class="kt-wizard-v3__nav-item" href="{{url('conocimiento/'.auth()->user()->id.'/'.Session('idpos'))}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('conocimiento') !!}>5</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">CURSOS Y/O CAPACITACIONES</div>
                            </a>

                            {{-- <a class="kt-wizard-v3__nav-item" href="{{url('datospersonales')}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('datospersonales') !!} >6</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">GENERAR ANEXO 7</div>
                            </a> --}}

                            <a class="kt-wizard-v3__nav-item" href="{{url('enviarinsc/'.auth()->user()->id.'/'.Session('idpos'))}}" data-ktwizard-type="step" >
                              <span {!! pintaopcion('enviarinsc') !!}>6</span>
                              <i class="fa fa-check"></i>
                              <div class="kt-wizard-v3__nav-label">ENVIAR POSTULACIÓN</div>
                            </a>
                          </div>
                        </div>

                        <!--end: Form Wizard Nav -->

                      
                      </div>
                    </div>
                 </div>
                 @endif
              </div>
              @endif


              <div class="row">
                  
                <div class="col-md-12">
                  <div class="kt-portlet">
                    <div class="kt-portlet__head bg-info" >
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title" style="color: #fff">
                          @if (Request::is('main')) 
                           DATOS PERSONALES {{-- - {{Session('idpos')}} --}}
                                        
                          @else
                           @yield('titulorequi')  
                         @endif</h3>
                      </div>
                    </div>
                    <div class="kt-portlet__body">
                      @if (Request::is('main')) 
                       @include('datospe')
                       @else
                        @yield('opcion')
                     @endif
                    </div>
                  </div>
                </div>

              </div>

              <!--end::Row-->

              <!--end::Dashboard 2-->
            </div>

            <!-- end:: Content -->



@endsection