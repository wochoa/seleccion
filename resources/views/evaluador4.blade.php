@extends('plantillas.plantillasini')

@section('clasebody')
sidebar-mini
@endsection



@section('content')
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    	<li class="nav-item dropdown">
        <a class="btn btn-sm btn-danger"  href="/">
          <i class="fa fa-arrow-circle-left"></i> ir pagina inicio
          {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
        </a>&nbsp;&nbsp;&nbsp;

      </li>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="btn btn-sm btn-primary" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> Mi cuenta
          {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Bienevido {{ auth()->user()->name}}</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mi perfil
            <span class="float-right text-muted text-sm">Datos</span>
          </a>

          <div class="dropdown-divider"></div>
          {{-- <a href="#" class="dropdown-item dropdown-footer">cerrar sesion</a> --}}
          <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-navy">
    <!-- Brand Logo -->
    <a href="{{url('main')}}" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sist. Convocatoria</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/inscritos" class="nav-link {{ urlactiva('inscritos') }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Listado de inscritos
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/primeraevaluacion" class="nav-link {{ urlactiva('primeraevaluacion') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Evaluacion curricular
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Evaluación de la convocatoria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Evaluacion</a></li>
              <li class="breadcrumb-item active">Acceso</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     {{--  {{ request()->routeIs('main') }} --}}
      {{-- @if(request()->routeIs('home')==1) --}}
      {{-- @if (Request::is('main'))
        @include('inscritos')
       @else --}}
        @yield('contevaluacion')
      {{-- @endif --}}
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="#">Consultoria en Informática</a>.</strong> Todo los derechos reservados
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection