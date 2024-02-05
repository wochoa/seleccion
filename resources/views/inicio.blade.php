@extends('plantillas.plantillasini')

@section('clasebody')
    layout-top-nav
@endsection

@section('content')
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="/" class="navbar-brand">
                    {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> --}}
                    <img src="dist/img/logo2.png" alt="AdminLTE Logo" height="50">
                    {{-- <span class="brand-text font-weight-light">Convocatorias</span> --}}
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->



                    @if (Route::has('login'))
                        {{-- <div class="top-right links"> --}}
                        @auth
                            {{-- <a href="{{ url('/home') }}">Home</a> --}}
                            <li class="nav-item"><a class="btn btn-primary btn-sm" href="{{ url('main') }}"><i
                                        class="fas fa-user-cog"></i> Mi cuenta</a></li>
                        @else
                            {{-- <a href="{{ route('login') }}">Login</a> --}}
                            <li class="nav-item"><a class="btn btn-primary btn-sm" href="{{ route('login') }}"><i
                                        class="fas fa-user"></i> Ingresar</a></li>

                            @if (Route::has('register'))
                                {{-- <a href="{{ route('register') }}">Register</a> --}}
                                {{-- <li class="nav-item" style="padding-left:10px"><a class="btn btn-warning"  href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrar</a></li> --}}
                            @endif
                        @endauth
                        {{-- </div> --}}
                    @endif

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper fondo3">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Convocatorias | <small>Gobierno Regional Huánuco</small></h1>
                            {{-- <p>Instructivo para postulación en linea</p> --}}
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    {{-- <div class="row">
           <div class="col-md-12">
              <div class="card">
                      
                      
                      <div class="card-body titulonot_2" style="padding: 25px">
                                  
                        <h3 class="card-title titulonot_2"><strong class="bg-danger">NOTA:</strong> Ver el instructivo para la postulación en Línea: <a href="{{asset('documentos/instructivo.pdf')}}" class="btn btn-primary btn-sm" target="_blank">Ver Instructivo</a> </h3>

                      </div>
                      
                    </div>
           </div>
        </div> --}}

                    <div class="row">

                        <!-- /.col-md-6 -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h5 class="card-title m-0">Listado de servicios</h5>
                                </div>
                                {{-- <div class="card-body">
                <h6 class="card-title">Listado de plazas</h6>

                <p class="card-text">En esta sección se publicará las convocatorias del Gobierno Regional Huánuco</p>
                <a href="#" class="btn btn-primary">Muy pronto</a>
              </div> --}}
                                <div class="card-body" id="tablas">
                                    <table id="listConvocatorias" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>PROCESO</th>
                                                <th>DETALLE DE CONVOCATORIA</th>
                                                <th>INICIO</th>
                                                <th>FIN</th>{{-- <th>PERFIL</th> --}}<th>POSTULAR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  <tr><td>proceso</td><td>plaza </td><td>02/07/2020</td><td>08/07/2020</td><td><a class="btn btn-info btn-xs" target="_blank" href="#"><i class="fa fa-search"></i> TDR</a></td><td><a class="btn btn-primary btn-xs" href="/postulacion/120">POSTULAR</a></td></tr> --}}
                                            @for ($i = 0; $i < count($plazas); $i++)
                                                <tr>
                                                    <td>{{ $plazas[$i]->proc_sel_cas_descripcion }}</td>
                                                    <td><strong>Oficina:</strong>
                                                        {{ $plazas[$i]->cas_pue_oficina }}<br><strong>
                                                            Perfil:</strong>{{ $plazas[$i]->cas_pue_puesto }}<br><strong>Remuneración:
                                                        </strong>S/.{{ number_format($plazas[$i]->cas_pue_remuneracion,2) }}
                                                        <br><strong>Cantidad requerida:</strong>
                                                        {{ $plazas[$i]->cas_pue_cantidad_plazas }}<br></td>
                                                    <td nowrap>{{ $plazas[$i]->proc_sel_cas_fecha_inicio }}</td>
                                                    <td nowrap>{{ $plazas[$i]->cas_proc_sel_fecha_fin_inscripcion }}</td>
                                                    {{-- <td><a class="btn btn-info btn-xs" target="_blank" href="{{Storage::url($plazas[$i]->tdr)}}"><i class="fa fa-search"></i> Perfil</a></td> --}}
                                                    @php
                                                        $fecha_actual = strtotime(date('Y-m-d', time()));
                                                        $fecha_ini = strtotime($plazas[$i]->proc_sel_cas_fecha_inicio);
                                                        $fecha_fin = strtotime($plazas[$i]->cas_proc_sel_fecha_fin_inscripcion);
                                                        $hora = date('H');
                                                        $min = date('i');
                                                    @endphp
                                                    <td>
                                                        <a class="btn btn-primary btn-xs"
                                                            href="/postulacion/{{ $plazas[$i]->id_cas_puesto }}/{{ $plazas[$i]->cas_pue_puesto }}/{{ $plazas[$i]->cas_pue_oficina }}/{{ $plazas[$i]->cas_pue_remuneracion }}/{{ $plazas[$i]->idperfil }}">POSTULAR</a>
                                                        @if ($fecha_actual >= $fecha_ini and $fecha_actual <= $fecha_fin)
                                                            {{-- @if ($hora <= 18 and $min <= 30) --}}
                                                            <a class="btn btn-primary btn-xs"
                                                                href="/postulacion/{{ $plazas[$i]->id_cas_puesto }}/{{ $plazas[$i]->cas_pue_puesto }}/{{ $plazas[$i]->cas_pue_oficina }}/{{ $plazas[$i]->cas_pue_remuneracion }}/{{ $plazas[$i]->idperfil }}">POSTULAR</a>
                                                            {{-- 
                          @else
                            <p class="text-danger">Finalizado la postulación según cronograma</p>
                        @endif --}}
                                                            {{-- <a class="btn btn-primary btn-xs" href="/postulacion/{{$plazas[$i]->id_cas_puesto}}/{{$plazas[$i]->cas_pue_puesto}}/{{$plazas[$i]->cas_pue_oficina}}/{{$plazas[$i]->cas_pue_remuneracion}}/{{$plazas[$i]->idperfil}}">POSTULAR</a> --}}
                                                        @else
                                                            {{-- <p class="text-danger">Finalizado la postulación según cronograma</p> --}}


                                                            {{-- <p class="text-danger">Finalizado la postulación según cronograma</p> --}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>


                                    {{--  @php
                  print_r($plazas);
                  @endphp --}}
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div> --}}
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="container">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <b>Version</b> 1.0.0
            </div>

            <!-- Default to the left -->
            <strong>Copyright &copy; 2020-2021 <a href="#">GOBIERNO REGIONAL HUANUCO</a>.</strong> Todo los derechos
            reservados
        </div>
    </footer>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#listConvocatorias").DataTable({
                "responsive": true,
                "autoWidth": false,
                language: {
                    processing: "Traitement en cours...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Cantidad por página _MENU_ ",
                    info: "Mostrando del _START_ al _END_ del(_TOTAL_) documentos",
                    infoEmpty: "No hay elementos para mostrar",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "No hay documentos con los parametros seleccionados",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    }
                }
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //location.reload();
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });
    </script>
@endsection
