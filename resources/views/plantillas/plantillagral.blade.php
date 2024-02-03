<!DOCTYPE html>

<!--
Theme: Keen - The Ultimate Bootstrap Admin Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: You must have a valid license purchased only from https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/ in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		
		<meta charset="utf-8" />
		<title>Convocatoria | Gobierno regional Huanuco</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

		<!--begin::Page Vendors Styles(used by this page) -->
		{{-- <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
		<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		  
		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->
		<!--begin::Page Custom Styles(used by this page) -->
		<link href="{{ asset('assets/css/pages/wizards/wizard-v3.css') }}" rel="stylesheet" type="text/css" />

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		{{-- <link href="{{ asset('assets/css/sweetalert2.css') }}" rel="stylesheet" type="text/css" /> --}}

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="{{ asset('assets/css/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/skins/brand/brand.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/skins/aside/brand.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		{{-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" /> --}}
		<link rel="icon" type="image/png" href="{{ asset('logo-sm.png') }}">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
		  <style type="text/css">
		    body{
		       font-family: 'Oswald', sans-serif;
		    }
		    .anchosear{
		    	width: 400px;
		    }
		    
		  </style>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="{{ asset('logo2.png') }}" width="130"/>
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->

		<!-- begin:: Root -->
		<div class="kt-grid kt-grid--hor kt-grid--root">

			<!-- begin:: Page -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin::Aside Brand -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="#">
								<img alt="Logo" src="{{ asset('logo2.png') }}" width="130" />
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
						</div>
					</div>

					<!-- end:: Aside Brand -->

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<div class="kt-widget kt-widget--general-1" align="center">
								<div class="kt-media kt-media--brand kt-media--lg kt-media--circle" align="center">
									<img src="/{{auth()->user()->avatar}}" alt="image">
								</div>
								
							</div>
							<div class="kt-widget__wrapper" align="center">
									<div class="kt-widget__label">
										<span class="kt-widget__desc p-1" >
											<a href="#" class="text-success" data-toggle="modal" data-target="#idavatar">
											{{ auth()->user()->name}} <i class="flaticon-edit text-warning" ></i>
										</a>
										</span>
										
									</div>
									{{-- <div class="kt-widget__toolbar kt-widget__toolbar--top p-1">
										<a  href="" class="text-warning" data-toggle="modal" data-target="#idavatar"><i class="flaticon-edit"></i></a>
									</div> --}}
									
									<span class="kt-widget__desc p-2 text-danger">
										{{ auth()->user()->email}}
									</span>
								</div>		
							<hr>			
							@yield('menu')
						</div>
					</div>

					<!-- end:: Aside Menu -->

					<!-- begin:: Aside Footer -->


					<!-- end:: Aside Footer-->
				</div>

				<!-- end:: Aside -->

				<!-- begin:: Wrapper -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
								<ul class="kt-menu__nav ">
									<li class="kt-menu__item  " data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle" ><span class="kt-menu__link-text">Sistema de convocatoria</span></a>
										
									</li>
									
								</ul>
							</div>
						</div>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							


							<!--begin:: Languages -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper"  data-offset="10px,0px">
									<div class="kt-header__topbar-user">
										<a class="btn btn-sm btn-linkedin"  href="/"><i class="fa fa-arrow-circle-left"></i> IR PAGINA DE INICIO</a>
										

									</div>
								</div>
								
							</div>

							<!--end:: Languages -->

							{{-- cerarr sesion --}}
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper"  data-offset="10px,0px">
									<div class="kt-header__topbar-user">
										{{-- <a class="btn btn-sm btn-danger"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" target="_blank">CERRAR SESIÓN <i class="fa fa-arrow-circle-right"></i></a> --}}
										<a class="btn btn-sm btn-danger"  href="#" id="cerrar">CERRAR SESIÓN <i class="fa fa-arrow-circle-right"></i></a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									      @csrf
									    </form>

									</div>
								</div>
								
							</div>
							{{-- end cerrar sesion --}}

							<!--begin: User Bar -->
							{{-- <div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">

									
									<div class="kt-header__topbar-user kt-rounded-">
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hola,</span>
										<span class="kt-header__topbar-username kt-hidden-mobile">{{ auth()->user()->name}}</span>
										<img alt="Pic" src="/{{ auth()->user()->avatar}}" class="kt-rounded-" />

									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-sm">
									<div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile" style="background-image: url(assets/media/misc/head_bg_sm.jpg)">
										<div class="kt-user-card__wrapper">
											<div class="kt-user-card__pic">

												
												<img alt="Pic" src="{{ asset('assets/media/users/300_21.jpg') }}" class="kt-rounded-" />
											</div>
											<div class="kt-user-card__details">
												<div class="kt-font-warning">{{ auth()->user()->name}}</div>
												<div class="kt-user-card__position" style="margin-top:1rem !important;">{{ auth()->user()->email}}</div>
											</div>
										</div>
									</div>
									<ul class="kt-nav kt-margin-b-10">
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<span class="kt-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
												<span class="kt-nav__link-text">Mi Perfil</span>
											</a>
										</li>
										
										<li class="kt-nav__separator kt-nav__separator--fit"></li>
										<li class="kt-nav__custom kt-space-between">
											<a class="dropdown-item dropdown-footer" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" target="_blank" class="btn btn-label-brand btn-upper btn-sm btn-bold">
	                                        		{{ __('Cerrar sesion') }}
									          </a>
											<i class="flaticon2-information kt-label-font-color-2" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
											

									          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									                                        @csrf
									          </form>
										</li>
									</ul>
								</div>
							</div> --}}

							


						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
						<!-- begin:: Subheader -->
			            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
			              <div class="kt-container  kt-container--fluid ">
			                <div class="kt-subheader__main">
			                  @yield('headtitle')
			                  
			                </div>
			                
			              </div>
			            </div>

            			<!-- end:: Subheader -->

						@yield('content')


						{{-- cambiar avatar --}}
						{{-- MODAL PARA editar FORMACION ACADEMICA --}}
<div class="modal fade" id="idavatar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cargar una foto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-1">
             
              <form  role="form" method="post" action="{{ route('actualizaravatar') }}" enctype="multipart/form-data">
	                @csrf
	                <input type="hidden" class="form-control form-control-sm" name="iduser" id="iduser" value="{{auth()->user()->id}}">
	                
	                
	                <div class="form-group">
	                      <label >Seleccione la foto para cambiar <span class="kt-badge kt-badge--inline kt-badge--success  kt-badge--pill">TAMAÑO: 160 x 160 Pixeles</span></label>
	                      <input type="file" class="form-control form-control-sm" name="avatar" accept="image/,.png,.jpg,.jpeg,.gif" required>
	                </div>

	                <div class="form-group">
	                	
	                	<div align="center">
				           	<img src="{{ asset(auth()->user()->avatar) }}" width="160">
				           	<label class="col-sm-12">Su fotografía actual<br>(Esta foto aparecerá tambien en Resumen file)</label>
				        </div>
	                </div>
	  
	              
	            
	              <div class="modal-footer justify-content-between">
	                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar ventana</button>
	                <button type="submit" class="btn btn-linkedin float-right btn-sm">Guardar</button>
	              </div>
	           </form>
	           
            </div>
            

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
  {{-- FIN MODAL PARA VER FORMACION ACADEMICA--}}
					</div>

					<!-- begin:: Footer -->
					<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								2020&nbsp;&copy;&nbsp;<a href="#" target="_blank" class="kt-link">Gobierno Regional Huánuco</a>
							</div>
							<div class="kt-footer__menu">
								<a  class="kt-footer__menu-link kt-link">Versión 2.0</a>
								{{-- <a href="http://keenthemes.com/keen" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
								<a href="http://keenthemes.com/keen" target="_blank" class="kt-footer__menu-link kt-link">Contact</a> --}}
							</div>
						</div>
					</div>

					<!-- end:: Footer -->
				</div>

				<!-- end:: Wrapper -->
			</div>

			<!-- end:: Page -->
		</div>

		<!-- end:: Root -->

		<!-- begin:: Topbar Offcanvas Panels -->



		<!-- end:: Topbar Offcanvas Panels -->



		<!-- begin:: Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end:: Scrolltop -->





		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"metal": "#c4c5d6",
						"light": "#ffffff",
						"accent": "#00c5dc",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995",
						"focus": "#9816f4"
					},
					"base": {
						"label": [
							"#c5cbe3",
							"#a1a8c3",
							"#3d4465",
							"#3e4466"
						],
						"shape": [
							"#f0f3ff",
							"#d9dffa",
							"#afb4d4",
							"#646c9a"
						]
					}
				}
			};
		</script>

		<!-- end::Global Config -->


		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>



		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>

				<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('assets/js/pages/components/extended/sweetalert2.js') }}" type="text/javascript"></script>

		<script src="{{ asset('assets/js/pages/components/base/toasts.js') }}" type="text/javascript"></script>

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('assets/js/pages/components/extended/toastr.js') }}" type="text/javascript"></script>

		<!--begin::Page Scripts(used by this page) -->
		{{-- <script src="{{ asset('assets/js/pages/custom/wizards/wizard-v3.js') }}" type="text/javascript"></script> --}}

		<script type="text/javascript">
			toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-full-width",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			};
		</script>


		<!--end::Page Scripts -->
		@yield('script')
		<script type="text/javascript">
			 $('#cerrar').click(function(e) {swal.fire({title: "Está seguro de salir de la plataforma!",
														text: "Seleccione el botón!",
														type: "question",
														buttonsStyling: false,
														confirmButtonText: "<i class='la la-check-circle'></i> Aceptar",
														confirmButtonClass: "btn btn-primary",
														showCancelButton: true,
														cancelButtonText: "<i class='la la-thumbs-down'></i> Cancelar",
														cancelButtonClass: "btn btn-danger",
														reverseButtons: true})
			 											.then(function(result)
			 												{if (result.value) {//swal.fire('Deleted!','Your file has been deleted.','success')  
			 																	window.location.href = '{{ route('logout') }}'; 
			 																	event.preventDefault();document.getElementById('logout-form').submit();       
 															 					} else if (result.dismiss === 'cancel') {swal.fire('Fue cancelado el cierre de sessión','Usted decidió quedarse en la plataforma','info')}
 															});
				});
		</script>
	</body>

	<!-- end::Body -->
</html>