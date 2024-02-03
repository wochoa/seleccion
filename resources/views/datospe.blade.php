@section('headtitle')
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
	<a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a><span class="kt-subheader__breadcrumbs-separator"></span>
	<a href="" class="kt-subheader__breadcrumbs-link">Datos personales </a>{{-- <span class="kt-subheader__breadcrumbs-separator"></span>
	<a href="" class="kt-subheader__breadcrumbs-link">Brand Aside </a> --}}
	</div>
	{{-- <a href="javascript:;" class="btn btn-primary" id="showtoast">Show Toast</a> --}}
@endsection

@auth
<form role="form" method="post" action="{{ route('detalledatospersonales') }}">
	@csrf
			<h4 class="text-primary">Datos personales </h4>
			<div class="row">
				<input type="hidden" class="form-control form-control-sm" placeholder="iduser" name="iduser" value="{{ auth()->user()->id}}">
				<input type="hidden" class="form-control form-control-sm" placeholder="iduserdet" name="iduserdet" id="iduserdet">
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Nacionalidad</label>
			        <input type="text" class="form-control form-control-sm" placeholder="P.Ejem. PERUANO" name="nacionalidad" id="nacionalidad" required>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Tipo documento</label>
			        <select class="form-control form-control-sm" name="documento" id="documento" required>
			          <option selected value="">Seleccione</option>
			          <option value="DNI">DNI</option>
			          <option value="PASAPORTE">PASSAPORTE</option>
			          
			        </select>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Numero de documento</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Enter ..." required name="nrodoc" id="nrodoc">
			      </div>
			    </div>
			</div>
			<div class="row">
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Apellido paterno</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Ingrese" required name="appaterno" id="appaterno">
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Apellido Materno</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Ingrese" required name="apmaterno" id="apmaterno">
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Nombres</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Enter ..." required name="nombres" id="nombres">
			      </div>
			    </div>
			</div>
			<div class="row">
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Lugar nacimiento</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Ingrese" required name="lugarnac" id="lugarnac">
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Fecha nacimiento</label>
			        <input type="date" class="form-control form-control-sm" placeholder="Enter ..." required name="fechanac" id="fechanac">	        
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Estado civil</label>
			       <select class="form-control form-control-sm" id="crvEstadoCivil" name="crvEstadoCivil" required >
			       	<option selected value="">[Seleccione]</option>
			       	<option value="SOLTERO">SOLTERO</option>
			       	<option value="CASADO">CASADO</option>
			       	<option value="DIVORCIADO">DIVORCIADO</option>
			       	<option value="VIUDO">VIUDO</option>
			       </select>
			      </div>
			    </div>	    
			</div>
			<h4 class="text-primary">Datos domicilio</h4>
			<div class="row">
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Departamento</label>
			        <select class="form-control form-control-sm" name="departamento" id="departamento" required>
			          <option selected value="">Seleccione</option>

			          {{-- @foreach($data as $depa)
			          <option value="{{$depa->idDepa}}">{{$depa->departamento}}</option>
			          @endforeach --}}

			        </select>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Provincia</label>
			        <select class="form-control form-control-sm" name="provincia" id="provincia" required>
			          {{-- <option selected>Seleccione</option>
			          <option value="1">Dni</option>
			          <option value="2">Passaporte</option> --}}	          
			        </select>
			      </div>
			    </div>
			    <div class="col-sm-4">
			      <div class="form-group">
			        <label>Distrito</label>
			        <select class="form-control form-control-sm" name="distrito" id="distrito" required>
			          {{-- <option selected>Seleccione</option>
			          <option value="1">Dni</option>
			          <option value="2">Passaporte</option> --}}	          
			        </select>
			      </div>
			    </div>
			</div>
			<div class="row">
			    <div class="col-sm-3" style="display: none;">
			      <div class="form-group">
			        <label>Tipo zona</label>
			        <select id="crvTipoZona" name="crvTipoZona" class="form-control form-control-sm" id="crvTipoZona">
			        	<option value="Urbanizacion">Urbanizacion</option>
			        	<option value="Pueblo Joven">Pueblo Joven</option>
			        	<option value="Unidad Vecinal">Unidad Vecinal</option>
			        	<option value="Conjunto Habitacional">Conjunto Habitacional</option>
			        	<option value="Asentamiento Humano">Asentamiento Humano</option>
			        	<option value="Cooperativa">Cooperativa</option>
			        	<option value="Residencial">Residencial</option>
			        	<option value="Zona Industrial">Zona Industrial</option>
			        	<option value="Grupo">Grupo</option>
			        	<option value="Caserio">Caserio</option>
			        	<option value="Fundo">Fundo</option>
			        	<option value="-">Ninguna</option>
			        </select>
			      </div>
			    </div>
			    <div class="col-sm-2" style="display: none;">
			      <div class="form-group">
			        <label>Nombre zona</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Ingrese" name="urbanizacion" id="urbanizacion">
			      </div>
			    </div>
			    <div class="col-sm-2">
			      <div class="form-group">
			        <label>Via(Av.Calle.Jr.)</label>
			        <select class="form-control form-control-sm" id="crvViaDireccion" name="crvViaDireccion" >
			        	<option value="Avenida">Avenida</option>
			        	<option value="Calle">Calle</option>
			        	<option value="Jiron">Jiron</option>
			        	<option value="Pasaje">Pasaje</option>
			        	<option value="Alameda">Alameda</option>
			        	<option value="Malecon">Malecon</option>
			        	<option value="Ovalo">Ovalo</option>
			        	<option value="Parque">Parque</option>
			        	<option value="Plaza">Plaza</option>
			        	<option value="Carretera">Carretera</option>
			        	<option value="Bloque">Bloque</option>
			        </select>
			      </div>
			    </div>
			    <div class="col-sm-5">
			      <div class="form-group">
			        <label>Direccion</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Enter ..." required name="direccion" id="direccion">
			      </div>
			    </div>

			</div>
			<h4 class="text-primary">Datos contacto</h4>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
			        <label>Teléfono</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Enter ..." name="telefono" id="telefono">
			      </div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
			        <label>Celular</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Enter ..." required name="celular" id="celular">
			      </div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
			        <label>Correo</label>
			        <input type="text" class="form-control form-control-sm" placeholder="Enter ..."  name="correo" value="{{ auth()->user()->email}}" id="correo" required>
			      </div>
				</div>
			</div>
			<div class="row" style="display: none;">
				<div class="col-sm-8">
					 <label>Colegio profesional(Ej. Colegio de Ingenieros, Abogados, etc)</label>
					<select class="form-control form-control-sm" name="colegiopro" id="colegiopro">
			          <option selected>Seleccione</option>
			          <option value="Colegio de Abogados del Peru">Colegio de Abogados del Peru</option>
			          <option value="Colegio de Antropologos del Peru">Colegio de Antropologos del Peru</option>
			          <option value="Colegio de Arquitectos del Peru">Colegio de Arquitectos del Peru</option>
			          <option value="Colegio de Bibliotecologos del Peru">Colegio de Bibliotecologos del Peru</option>
			          <option value="Colegio de Biologos del Peru">Colegio de Biologos del Peru</option>
			          <option value="Colegio de Contadores Publicos del Peru">Colegio de Contadores Publicos del Peru</option>
			          <option value="Colegio de Economistas del Peru">Colegio de Economistas del Peru</option>
			          <option value="Colegio de Enfermeros del Peru">Colegio de Enfermeros del Peru</option>
			          <option value="Colegio de Ingenieros del Peru">Colegio de Ingenieros del Peru</option>
			          <option value="Colegio de Licenciados en Administracion del Peru">Colegio de Licenciados en Administracion del Peru</option>
			          <option value="Colegio de Matematicos del Peru">Colegio de Matematicos del Peru</option>
			          <option value="Colegio Medico del Peru">Colegio Medico del Peru</option>
			          <option value="Colegio Medico Veterinario del Peru">Colegio Medico Veterinario del Peru</option>
			          <option value="Colegio de Notarios del Peru">Colegio de Notarios del Peru</option>
			          <option value="Colegio de Nutricionistas del Peru">Colegio de Nutricionistas del Peru</option>
			          <option value="Colegio de Obstetras del Peru">Colegio de Obstetras del Peru</option>
			          <option value="Colegio Odontologico del Peru">Colegio Odontologico del Peru</option>
			          <option value="Colegio de Periodistas del Peru">Colegio de Periodistas del Peru</option>
			          <option value="Colegio de Psicologos del Peru">Colegio de Psicologos del Peru</option>
			          <option value="Colegio de Quimicos del Peru">Colegio de Quimicos del Peru</option>
			          <option value="Colegio Quimico Farmaceutico del Peru">Colegio Quimico Farmaceutico del Peru</option>
			          <option value="Colegio de Relacionadores Industriales del Peru">Colegio de Relacionadores Industriales del Peru</option>
			          <option value="Colegio de Sociologos del Peru">Colegio de Sociologos del Peru</option>
			          <option value="Colegio Tecnologo Medico del Peru">Colegio Tecnologo Medico del Peru</option>
			          <option value="Colegio de Trabajadores Sociales del Peru">Colegio de Trabajadores Sociales del Peru</option>
			          <option value="Colegio de Traductores del Peru">Colegio de Traductores del Peru</option>
			          <option value="Colegio de Arqueologos del Peru">Colegio de Arqueologos del Peru</option>
			          <option value="Colegio de Licenciados en Cooperativismo del Peru">Colegio de Licenciados en Cooperativismo del Peru</option>
			          <option value="Colegio de Relacionistas Publicos del Peru">Colegio de Relacionistas Publicos del Peru</option>
			          <option value="Colegio de Oficiales de Marina Mercante del Peru">Colegio de Oficiales de Marina Mercante del Peru</option>
			          <option value="Colegio de Estadisticos del Peru">Colegio de Estadisticos del Peru</option>
			          <option value="Colegio de Fisicos del Peru">Colegio de Fisicos del Peru</option>
			          <option value="Colegio de Profesores del Peru">Colegio de Profesores del Peru</option>
			          <option value="Colegio de Geografos del Peru">Colegio de Geografos del Peru</option>
			          <option value="Colegio de licenciados en Turismo">Colegio de licenciados en Turismo</option>
			          <option value="Ninguna">Ninguna</option>
			        </select>
				</div>
				<div class="col-sm-4">
					 <label>Numero de registro</label>
					 <input type="text" class="form-control form-control-sm" placeholder="Registro de colegiatura" name="numcolegio" id="numcolegio">
				</div>
			</div>

			<h4 class="text-primary">Otros datos</h4>
			<div class="row">
				<div class="col-sm-4" align="center">
			      <div class="form-group">
			        <label>Persona con discapacidad</label>
			        <div class="form-check">
                          <input class="form-check-input" type="radio" name="discpacidad" value="SI" id="discpacidad1" required>
                          <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input class="form-check-input" type="radio" name="discpacidad"  value="NO" id="discpacidad2">
                          <label class="form-check-label">NO</label>
                        </div>
			      </div>
			    </div>
			    <div class="col-sm-4" align="center">
			      <div class="form-group">
			        <label>Pertenece a las FF.AA</label>
			        <div class="form-check">
                          <input class="form-check-input" type="radio" name="fuerzasarm" value="SI" id="fuerzasarm1" required>
                          <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input class="form-check-input" type="radio" name="fuerzasarm" value="NO" id="fuerzasarm2">
                          <label class="form-check-label">NO</label>
                        </div>
			      </div>
			    </div>
			</div>
			@if(!Session('procesopostulado'))
			<div class="row float-right">
			    	<div class="col-sm-12 ">
			    		<button type="submit" class="btn btn-linkedin btn-sm">Guardar</button>
			    		<a href="{{url('anexos/'.auth()->user()->id.'/'.Session('idpos'))}}" class="btn btn-danger btn-sm" style="display: none;" id="Siguiente_dp">Siguiente <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
			    	</div>
			</div>
			@endif
			

			
		</form>
		<div id="idcardocSusten" style="display: none;">
			
		
			<form role="form" method="post" action="{{ route('formsustentatorio') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				@csrf
				 <input type="hidden" id="idplaza"  name="idplaza" value="{{Session('idpos')}}">
	             <input type="hidden" id="idusuario" name="idusuario" value="{{auth()->user()->id}}">
				@if(Session('procesoactual'))

					

					@if(!Session('procesopostulado'))
					<div class="dropdown-divider"></div>
					<h5 class="text-primary">Carga de documentos sustentatorios</h5>
					{{-- <span class="kt-badge kt-badge--primary kt-badge--inline">(Nota: Cargar certificado de habilidad si el perfil lo solicita)</span> --}}

					<div class="row" >
					
						<div class="col-sm-4" >
					      <div class="form-group">
					        <label>Seleccione tipo de documento</label><small></small>
					        <select class="form-control form-control-sm" name="sustentos" id="cbo_sustento" required>
		                        <option selected value="">[Seleccione Documento]</option>		                        
{{-- 		                        <option value="Conadis (Discapacidad)">Conadis (Discapacidad)</option>
		                        <option value="Licenciado FF.AA.">Licenciado FF.AA.</option> --}}
		                        {{-- <option value="Documento De Identidad">Documento de Identidad</option>
		                        <option value="Colegiatura">Colegiatura</option>
		                        <option value="Certificado Habilitación Profesional">Certificado Habilitación Profesional</option>
		                        <option value="Consulta  y/o ficha RUC">Consulta  y/o ficha RUC</option> --}}
		                    </select>
					      </div>
					    </div>
					    <div class="col-sm-4" >
					      <div class="form-group">
			                    <label for="exampleInputFile">Seleccione sustento</label>
			                    <div class="input-group">
			                      <div class="custom-file">
			                        <input type="file" class="custom-file-input" id="file" name="file" accept="application/pdf" required>
			                        <label class="custom-file-label" for="exampleInputFile">Archivo en pdf</label>
			                      </div>
			                      
			                    </div>
			                  </div>
					    </div>
					    <div class="col-sm-4" align="center">
					      <div class="form-group">
		                    {{-- <label for="exampleInputFile">Cargar</label><br> --}}
		                    <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-upload"></i> Cargar</button>
		                  </div>
			              
					    </div>
					</div>
					<div class="row">
						<table class="table table-sm table-bordered">
		                  <thead class="thead-dark">
		                    <tr >
		                      <th class="text-center mi_header">Tipo documento</th>
		                      <th class="text-center mi_header">Fecha de carga</th>
		                      <th class="text-center mi_header">Ver archivo</th>
		                      <th style="width: 40px">Eliminar</th>
		                    </tr>
		                  </thead>
		                  <tbody id="datasustento">
		                    {{-- <tr>
		                      <td>Update software</td>
		                      <td>fecha de carga</td>
		                      <td align="center"> <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i></button> </td>
		                      <td align="center"> <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button> </td>
		                    </tr> --}}

		                  </tbody>
		                </table>
					</div>
					@endif
					
					
				@endif
			</form>

		</div>
@endauth
 
 @if(Request::is('main'))
  @if(!Session('idpos'))
     
<!--  para poner notificaciones -->
      <div id="toastsContainerTopRight">
       

        <div class="toast toast-custom toast-fill fade show" role="alert" aria-live="assertive" aria-atomic="true" id="kt_toast_2" style="position: fixed;">
{{--           <div class="toast-header titulonot_2 bg-warning"><i class="mr-2 fas fa-envelope fa-lg"></i><strong class="mr-auto">Continue con su Inscripción a la convocatoria</strong><small>NOTA</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div> --}}
          <div class="toast-header bg-warning" >
				<i class="toast-icon flaticon2-attention kt-font-success"></i>
				<span class="toast-title "><i class="mr-2 fas fa-envelope fa-lg"></i>Continue con su Inscripción</span>
				{{-- <small class="toast-time">1 hour ago</small> --}}
				<button type="button" class="toast-close" data-dismiss="toast" aria-label="Close">
					<i class="la la-close"></i>
				</button>
			</div>
          <div class="toast-body bd-gray">
          	<strong>Sólo para los que no enviaron aún su postulación</strong>
          	<hr>
           Estimado postulante si estas en proceso de inscripción  y aún no terminastes de cargar toda la información, usted puede continuar con su inscripción, seleccionando el servicio y haciendo click en <strong>Postular</strong> en la página de inicio o puede hacer click en <a href="/" class="btn btn-danger btn-xs" target="_blank"> ir página inicio</a><br><strong>Ojo: Seleccione el servicio que estuvo postulando para continuar.</strong><hr>
            <div class="progress progress-xs" style="height: 6px;">
              <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 0%; font-size:9px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
          </div>
        </div>

        
        
      </div>


    <!-- fin de notificacione -->
    @endif
 @endif
@section('script')
<script type="text/javascript" charset="utf-8" async defer>
	var nrosi=0;

// para poner comunicados

 


  // para simular la carga
  $(document).ready(function() {

   
    var percent = 0;
 
    timerId = setInterval(function() {
        //increment progress bar
        percent += 1;
        $('.progress-bar').css('width', percent+'%');
        $('.progress-bar').attr('aria-valuenow', percent);
        $('.progress-bar').text(percent+'%');
 
        //complete
        if (percent == 100) {
            clearInterval(timerId);
            $('.information').show();
        }
 
    }, 100);
});
</script>


<script>
        //Al cargar la página, asignar evento al botón de notificaciones para mostrarlas.
        $('.toast').toast({ delay: 10000 });
        
        //$('.toast').toast('show');// para que oculte al llegar a 100%
</script>


<script  type="text/javascript" charset="utf-8" async defer>


$(document).ready(function(){
	carga_departamento();

	// autocargamos todo los datos de de la persona detalles
	@auth var datospersona={{auth()->user()->id}}; 
	$.ajax({      
        data: {reg:datospersona},
        url: '/cargadatospersona/'+{{auth()->user()->id}},
        type: 'get',
        dataType : "json",        
        success: function(data){ 
        	 //console.log(data.data);

       		$("#nacionalidad").val(data[0].nacionalidad);
       		$("#documento").val(data[0].tipo_doc);
       		$("#nrodoc").val(data[0].num_doc);
       		$("#appaterno").val(data[0].ap_paterno);
       		$("#apmaterno").val(data[0].ap_materno);
       		$("#nombres").val(data[0].nombres);
       		$("#lugarnac").val(data[0].lugar_nac);
       		$("#fechanac").val(data[0].fecha_nac);
       		$("#crvEstadoCivil").val(data[0].estadocivil);
       		//if(data[0].dom_deparatmento){
       			valor_provincia(data[0].dom_deparatmento);
       		    valor_distrito(data[0].dom_provincia);
       		//}
       		


       		$("#departamento").val(data[0].dom_deparatmento);
       		$("#provincia").val(data[0].dom_provincia);
       		$("#distrito").val(data[0].dom_distrito);

       		$("#crvTipoZona").val(data[0].tipo_zona);
       		$("#urbanizacion").val(data[0].nom_zona);
       		$("#crvViaDireccion").val(data[0].via);
       		$("#direccion").val(data[0].direccion);
       		$("#telefono").val(data[0].telefono);
       		$("#celular").val(data[0].celular);
       		$("#correo").val(data[0].correo);
       		$("#colegiopro").val(data[0].colegio_prof);
       		$("#numcolegio").val(data[0].num_colegio);

       		$("#provincia").val(data[0].dom_provincia);

       		// var discap=$("#discpacidad").val();
       		if(data[0].discapcidad=='SI'){$('#discpacidad1').prop("checked",true);$('#discpacidad2').prop("checked",false); nrosi=nrosi+1;mostraractivo_otrosdatos();$("#cbo_sustento").append('<option value="CONADIS (Discapacidad)">CONADIS (Discapacidad)</option>');}
       			else{$('#discpacidad1').prop("checked",false);$('#discpacidad2').prop("checked",true); }

       		if(data[0].fuerza_arm=='SI'){$('#fuerzasarm1').prop("checked",true);$('#fuerzasarm2').prop("checked",false); nrosi=nrosi+1;mostraractivo_otrosdatos(); $("#cbo_sustento").append('<option value="LICENCIADO FF.AA.">LICENCIADO FF.AA.</option>');}
       			else{$('#fuerzasarm1').prop("checked",false);$('#fuerzasarm2').prop("checked",true); }


       		if(data.length){$("#Siguiente_dp").show();}
       		else{$("#Siguiente_dp").hide();}


       		//var fuerzas=$("#fuerzasarm").val(data[0].fuerza_arm);

       		$("#iduser").val(data[0].iduser);
       		$("#iduserdet").val(data[0].iduserdet);

        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });
	@endauth

	// finalizamos el autocargado de personas detalles
});



// if($("#discpacidad2").val()=='NO' && $("#fuerzasarm2").val()=='NO')
// 	{$("#idcardocSusten").show();}

cargadocsustento();
function cargadocsustento()
{
	// Autocargamos las regiones
	
	$.ajax({      
        //data: {reg:depa},
        url: '/cargadocussustento/'+{{auth()->user()->id}},
        type: 'get',
        dataType : "json",        
        success: function(data){ 
        	 // console.log(data.data);
          //var conpuesto='<option value="">Selecione</option>';
          for(var i =0;i < data.length;i++)
		      {
		        //conpuesto=conpuesto+'<option value="'+data[i].idDepa +'">'+data[i].departamento +'</option>';
		        var archivo= data[i].archivo;
                var nuevacadena=archivo.substr(7);

		        var compuesto='<tr><td>'+data[i].sustento+'</td><td align="center">'+data[i].fecha+'</td><td align="center"><a href="/storage/'+nuevacadena+'" title="Arhcivo cargado" target="_blank"><i class="fa fa-eye"></i></a></td><td align="center"><a href="/eliminardocsustento/'+data[i].iddocpersonal+'/{{auth()->user()->id}}/{{Session('idpos')}}" title=""><i class="fa fa-trash"></i></a></td></tr>';
		        $("#datasustento").append(compuesto);
		       }
       		//$("#departamento").html(conpuesto);
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });
	// finalzamos el cargado de las regiones
}

// para cargar datos de provincias al hacer click en departamento
$(document).on('change', '#departamento', function(event) {
  var region=$("#departamento").val();
  valor_provincia(region);
  
});

// cargar datos de distrito al seleccionar la provincia
$(document).on('change', '#provincia', function(event) {
  var provincia=$("#provincia").val();
  valor_distrito(provincia);  
});
function carga_departamento()
{
	// Autocargamos las regiones
	var depa=1;
	$.ajax({      
        data: {reg:depa},
        url: '/departamento/'+depa,
        type: 'get',
        dataType : "json",        
        success: function(data){ 
        	 // console.log(data.data);
          var conpuesto='<option value="">Seleccione</option>';
          for(var i =0;i < data.length;i++)
		      {
		        conpuesto=conpuesto+'<option value="'+data[i].idDepa +'">'+data[i].departamento +'</option>';
		       }
       		$("#departamento").html(conpuesto);
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });
	// finalzamos el cargado de las regiones
}
function valor_provincia(region)// para cargar datos de puestos
{
  $.ajax({      
        data: {reg:region},
        url: '/provincia/'+region,
        type: 'get',
        dataType : "json",        
        success: function(data){ 
        	 // console.log(data.data);
          var conpuesto='<option value="">Seleccione</option>';
          for(var i =0;i < data.length;i++)
		      {
		        conpuesto=conpuesto+'<option value="'+data[i].idProv +'">'+data[i].provincia +'</option>';
		       }
       		$("#provincia").html(conpuesto);
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });

 }


function valor_distrito(provincia)// para cargar datos de puestos
{
  $.ajax({      
        data: {regpro:provincia},
        url: '/distrito/'+provincia,
        type: 'get',
        dataType : "json",       
        success: function(data){ 
          var conpuesto='<option value="">Seleccione</option>';
          for(var i =0;i < data.length;i++)
	      {
	        conpuesto=conpuesto+'<option value="'+data[i].idDist +'">'+data[i].distrito +'</option>';
	       }
	       $("#distrito").html(conpuesto);
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });

 }
</script>
<script type="text/javascript">
	//$('#kt_sweetalert_demo_3_33').click(function(e) {swal.fire("Good job!", "You clicked the button-wilmer!", "success");});


$('input[type=radio][name=discpacidad]').change(function() {
if (this.value =='SI') {nrosi=nrosi+1;
						mostraractivo_otrosdatos();
						$("#cbo_sustento").append('<option value="CONADIS (Discapacidad)">CONADIS (Discapacidad)</option>');
                       }
else{nrosi=nrosi-1;mostraractivo_otrosdatos();$("#cbo_sustento").find("option[value='CONADIS (Discapacidad)']").remove();}
});


$('input[type=radio][name=fuerzasarm]').change(function() {
if (this.value =='SI') {nrosi=nrosi+1;
						mostraractivo_otrosdatos();
						$("#cbo_sustento").append('<option value="LICENCIADO FF.AA.">LICENCIADO FF.AA.</option>');
						}
else{nrosi=nrosi-1;mostraractivo_otrosdatos();$("#cbo_sustento").find("option[value='LICENCIADO FF.AA.']").remove();}
});
// tiempo para mostrar alertas



  function mostraralerta(tipomensaje,mensaje)
  {
    swal.fire("Bien echo!", mensaje, tipomensaje);
  }

  function mostraractivo_otrosdatos()
  {

		switch(nrosi)
		{
			case 0:$("#idcardocSusten").hide();break
			case 1:$("#idcardocSusten").show();break
			case 2:$("#idcardocSusten").show();break
		}
		//alert(nrosi);
  }

@foreach (['danger', 'warning', 'success', 'info'] as $msg) 
     @if(Session::has('alert-' . $msg))      
        mostraralerta('{{ $msg }}','{{ Session::get('alert-' . $msg) }}');
     @endif 
@endforeach




//





 @if(Session::has('cargadonoti'))      
        toastr.success("Fue agregado satisfactoriamente");
 @endif

 @if(Session::has('cargaeliminado'))      
        toastr.error("Fue eliminado satisfactoriamente");
 @endif


</script>
@endsection