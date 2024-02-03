@extends('administracion')

@section('contadministrador')


 <div class="row">
 	{{-- <div class="col-sm-4">
 		<div class="card">
 			 @php

 print_r($procesocas);

 @endphp
 		</div>
 	</div> --}}

    <div class="col-md-5">
          {{-- <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a> --}}

        <div class="kt-portlet">

          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Perfiles por Proceso
              </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
              <div class="kt-portlet__head-toolbar">
                <div class="dropdown dropdown-inline">
                  <button type="button" class="btn btn-clean btn-sm " data-toggle="modal" data-target="#modal-default">
                    <i class="flaticon2-plus-1"></i> Nuevo perfil
                  </button>
                  
                </div>
              </div>
            </div>
            </div>
          <div class="card-body p-2" style="font-size: 13.4px" id="llenaperfiles" >
             
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        
    </div>
     <div class="col-md-5">
          {{-- <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a> --}}

        <div class="card bg-default" id="llenaperfilesdetalles" style="display: none;">
          <div class="card-header bg-gray">
            <h3 class="card-title">Formacion de la persona por perfil <small class="bg-danger" id="idperfilparapersona"></small></h3>              

            <div class="card-tools">
              <a class="btn btn-sm bg-success float-right" data-toggle="modal" data-target="#detalleperfil">Nuevo detalle del perfil</a>
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-2" style="font-size: 13.4px;" id="cargadetallepersona">
             
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        
    </div>


 </div>


{{-- agreamos el modal para agregar nuevo proceso --}}
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            	<form  role="form" method="post" action="{{ route('nuevoperfil') }}">
            		@csrf
                <div class="form-group">
                      <label >seleccion el proceso:</label>
                      <select class="form-control" id="llenaproceso" name="proceso" requerid>
                        
                      </select>
                  </div>
            		<div class="form-group">
	                    <label >Nombre perfil:</label>
	                    <input type="text" class="form-control" name="procescas" placeholder="Ingrese el proceso" required >
	                </div>
            	
            
            	<div class="modal-footer justify-content-between">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
	              <button type="submit" class="btn btn-info float-right">Guardar</button>
	            </div>
	         </form>
            </div>
            

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  {{-- FIN agreamos el modal para agregar nuevo proceso --}}

  {{-- agreamos el modal para agregar nuevo proceso --}}
<div class="modal fade" id="editarperfil">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              <form  role="form" method="post" action="{{ route('actualizaperfil') }}">
                @csrf
                <input type="hidden" class="form-control" name="idperfil" id="idperfil">
                <div class="form-group">
                      <label >seleccion el proceso:</label>
                      <select class="form-control" id="llenaprocesoedit" name="proceso" requerid>
                        
                      </select>
                  </div>
                <div class="form-group">
                      <label >Nombre perfil:</label>
                      <input type="text" class="form-control" name="nomperfil" id="nomperfil" placeholder="Ingrese el proceso" required >
                  </div>
              
            
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
                <button type="submit" class="btn btn-info float-right">Guardar</button>
              </div>
           </form>
            </div>
            

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  {{-- FIN agreamos el modal para agregar nuevo proceso --}}

  {{-- agreamos el modal para agregar NUEVO DETALLE PERFIL --}}
<div class="modal fade" id="detalleperfil">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Perfil de la persona/Puntuaciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              <form  role="form" method="post" action="{{ route('nuevodetalleperfil') }}">
                @csrf
                <input type="hidden" class="form-control" name="idperfil" id="idperfiln">
                
                <div class="form-group">
                      <label >Descripcion profesional</label>
                      <input type="text" class="form-control" name="descripcion" placeholder="P.ejemplo: Titulado, Grado magister,etc" required >
                </div>
                <div class="form-group">
                      <label >Categoria</label>
                      <select  class="form-control" name="categoria">
                        <option selected>Seleccionar..</option>
                        <option value="FORMACION ACADEMICA">FORMACION ACADEMICA</option>
                        <option value="CONOCIMIENTO">CONOCIMIENTO</option>
                        <option value="EXPERIENCIA">EXPERIENCIA</option>                        
                      </select>
                </div>
                <div class="form-group">
                      <label >Puntages máximo</label>
                      <input type="number" class="form-control" name="puntage"  required >
                </div>
                <div class="form-group">
                      <label >Puntages máximo</label>
                      <input type="number" class="form-control" name="puntagemin" value="0" required >
                </div>
              
            
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
                <button type="submit" class="btn btn-info float-right">Guardar</button>
              </div>
           </form>
            </div>
            

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  {{-- FIN agreamos el modal para DETALLE PERFIL --}}

  {{-- EDITAMOS LOS DETALLES DE PERFIL POR PUNTUACION --}}
<div class="modal fade" id="popupeditadetalleperfil">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Perfil de la persona/Puntuaciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              <form  role="form" method="post" action="{{ route('actualizadetalleperfil') }}">
                @csrf
                <input type="hidden" class="form-control" name="iddetalleperfil" id="iddetalleperfil">
                
                <div class="form-group">
                      <label >Descripcion profesional</label>
                      <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="P.ejemplo: Titulado, Grado magister,etc" required >
                </div>
                <div class="form-group">
                      <label >Categoria</label>
                      <select  class="form-control" name="categoria" id="categoria" required>
                        <option selected>Seleccionar..</option>
                        <option value="FORMACION ACADEMICA">FORMACION ACADEMICA</option>
                        <option value="CONOCIMIENTO">CONOCIMIENTO</option>
                        <option value="EXPERIENCIA">EXPERIENCIA</option>                        
                      </select>
                </div>
                <div class="form-group">
                      <label >Puntages máximo</label>
                      <input type="number" class="form-control" name="puntage"  required  id="puntage">
                </div>
                <div class="form-group">
                      <label >Puntages máximo</label>
                      <input type="number" class="form-control" name="puntagemin" value="0" required id="puntagemin">
                </div>
              
            
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar ventana</button>
                <button type="submit" class="btn btn-info float-right">Guardar</button>
              </div>
           </form>
            </div>
            

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  {{-- FIN EDITAMOS LOS DETALLES DE PERFIL POR PUNTUACION --}}



@endsection

@section('script')

<script>
  $(document).ready(function(e){

   cargaproceso();

  cargarperfiles();

  });
  function cargaproceso()
  {
    $.ajax({      
        // data: {reg:id},
        url: '/cargaprocesoparaperfiles',
        type: 'get',
        dataType : "json",        
        success: function(data){ 

          if(data.length){

             var compuesto='<option selected>Seleccione</option>';
              for(var i =0;i < data.length;i++)
              { 
                compuesto=compuesto+'<option value="'+data[i].id_proc_sel_cas+'">'+data[i].id_proc_sel_cas+'-'+data[i].proc_sel_cas_descripcion+'</option>';
               }
               
              $("#llenaproceso").html(compuesto);
              
              $("#llenaprocesoedit").html(compuesto);

              //mostraralerta('success','Existe plazas registras para esta convocatoria');

          }
            else{//mostraralerta('error','No existe plazas registras para esta convocatoria');
            }
           // console.log(data.data);
          
         
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });
  }
  function cargarperfiles()
  {
    $.ajax({      
        // data: {reg:id},
        url: '/perfilescreados',
        type: 'get',
        dataType : "json",        
        success: function(data){ 

          if(data.length){

             var compuesto="<table class='table table-bordered'><thead><th>ID</th><th>Proceso</th><th>Perfil </th><th>acciones</th></thead><tbody>";
              for(var i =0;i < data.length;i++)
              { 
                compuesto=compuesto+"<tr><td>"+data[i].idperfil+"</td><td>"+data[i].proc_sel_cas_descripcion+"</td><td>"+data[i].nomperfil+"</td><td><a href='#' class='btn btn-sm btn-primary' title='Editar perfil' data-toggle='modal' data-target='#editarperfil' onclick='cargaperfilparaeditar("+data[i].idperfil+")'><i class='fa fa-edit btn-sm'></i></a> <a href='/eliminarperfil/"+data[i].idperfil+"' class='btn btn-sm btn-danger' title='Eliminar perfil'><i class='fa fa-trash'></i></a> <a href='#'' class='btn btn-sm btn-info' onclick='cargardetalleperfil("+data[i].idperfil+");' title='ver detalles y puntuación'><i class='fa fa-eye'></i></a></td></tr>";
               }
               compuesto=compuesto+"</tbody>";
              $("#llenaperfiles").html(compuesto);

              //mostraralerta('success','Existe plazas registras para esta convocatoria');

          }
            else{//mostraralerta('error','No existe plazas registras para esta convocatoria');
            }
           // console.log(data.data);
          
         
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });
  }

  // function cargar detalle de los perfiles seleccionados en ver informacion
  function cargardetalleperfil(id)
  { $("#llenaperfilesdetalles").show();
    $("#idperfiln").val(id);
    $("#idperfilparapersona").html('ID PERFIL :'+id);
    

    $.ajax({      
        // data: {reg:id},
        url: '/cargadetalleperfil/'+id,
        type: 'get',
        dataType : "json",        
        success: function(data){ 

          if(data.length){

             var compuesto='<table class="table table-bordered"><thead><th>ID</th><th>PERFIL</th><th>FORMACION</th><th>P.MAX </th><th>P.MIN </th><th>CATEGORIA</th><th>acciones</th></thead><tbody>';
              for(var i =0;i < data.length;i++)
              { 
                compuesto=compuesto+'<tr><td>'+data[i].iddetalle_perfil+'</td><td>'+data[i].nomperfil+'</td><td>'+data[i].nomdet_perfil+'</td><td>'+data[i].puntuaciones+'</td><td>'+data[i].puntagemin+'</td><td>'+data[i].categoria+'</td><td nowrap><a href="#" class="btn btn-sm btn-primary" onclick="cargaeditardetapuntuacion('+data[i].iddetalle_perfil+')" data-toggle="modal" data-target="#popupeditadetalleperfil"><i class="fa fa-edit"></i></a> <a href="/eliminardetalleperfil/'+data[i].iddetalle_perfil+'" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></a> </td></tr>';
               }
               compuesto=compuesto+'</tbody>'
              $("#cargadetallepersona").html(compuesto);
              $("#cargadetallepersona").show();

              mostraralerta('success','Existe los detalles de pefil seleccionado');

          }
            else{mostraralerta('error','No existe los detalles de pefil selecciona'); $("#cargadetallepersona").hide();
            }
           // console.log(data.data);
          
         
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });

  }

  // carga DETALLE PUNTUACION
  function cargaeditardetapuntuacion(id)
  {
       $.ajax({      
        // data: {reg:id},
        url: '/cargadetalleparaeditar/'+id,
        type: 'get',
        dataType : "json",        
        success: function(data){ 

          if(data.length){

             $("#iddetalleperfil").val(data[0].iddetalle_perfil);
             $("#descripcion").val(data[0].nomdet_perfil);
             $("#categoria").val(data[0].categoria);
             $("#puntage").val(data[0].puntuaciones);
             $("#puntagemin").val(data[0].puntagemin);

              //mostraralerta('success','Existe los detalles de pefil seleccionado');

          }
            else{mostraralerta('error','No existe los detalles de pefil selecciona'); $("#cargadetallepersona").hide();
            }
           // console.log(data.data);
          
         
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });
  }

  function cargaperfilparaeditar(id)
  {
    
       $.ajax({      
        // data: {reg:id},
        url: '/cargaperfileditar/'+id,
        type: 'get',
        dataType : "json",        
        success: function(data){ 

          if(data.length){

             $("#idperfil").val(data[0].idperfil);
             $("#nomperfil").val(data[0].nomperfil);
             $("#llenaprocesoedit").val(data[0].ide_proceso);


              //mostraralerta('success','Existe los detalles de pefil seleccionado');

          }
            else{mostraralerta('error','No existe los detalles de pefil selecciona'); $("#cargadetallepersona").hide();
            }
           // console.log(data.data);
          
         
        },
        error: function(X){
              alert("ha ocurrido un error");            
          },
      });
  }
  
  // tiempo para mostrar alertas
  function mostraralerta(tipomensaje,mensaje)
  {
    const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 6000// 6 segundos se demora para desaparecer
            });
      Toast.fire({
          icon: tipomensaje,
          title: mensaje
        });
  }
</script>
@endsection