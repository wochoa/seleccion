@extends('evaluador')
@section('contevaluacion')


<div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-header bg-secondary">
                  <h3 class="card-title">Servicio requerido</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0" style="font-size: 13px">
                   @php
                      $oficina=$inscritos[0]->cas_pue_oficina;
                      $puesto=$inscritos[0]->cas_pue_puesto;

                      //print_r($inscritos);
                      //echo $inscritos[0]->idenvioinsc;
                    @endphp
                  <ul class="nav nav-pills flex-column">                 
                    
                    <li class="nav-item"><a href="#" class="nav-link">{{-- <i class="far fa-circle text-info"></i> --}}<strong>Oficina:</strong>{{ $oficina}} <br><strong>Servicio:</strong>{{ $puesto}} </a></li>
                     <li class="nav-item"><a href="#" class="nav-link"><strong>El perfil para este serevicio es: </strong>{{ $perfil[0]->nomperfil}} </a></li>
                    <li class="nav-item"><a href="#" class="nav-link">{{-- <i class="far fa-circle text-info"></i> --}}<strong>Cantidad requerida: </strong>{{ $inscritos[0]->cas_pue_cantidad_plazas}} <br><strong>remuneración:</strong> S/.{{ $inscritos[0]->cas_pue_remuneracion}}.00 </a></li>
                    <li class="nav-item"><a href="{{Storage::url($inscritos[0]->tdr)}}" class="nav-link text-danger" target="_blank"><i class="far fa-file-alt"></i> <strong>Ver archivo de perfil de la base</strong></a></li>
                    
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="card collapsed-card">
                <div class="card-header bg-gray">
                  <h3 class="card-title">
                    @php
                      $nomperfil=$perfil[0]->nomperfil;
                    @endphp
                    Puntuación del perfil: <strong>{{ $nomperfil }}</strong>
                  </h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>

                </div>
                <div class="card-body p-0" style="font-size: 13px">
                 
                  <table class="table table-bordered table-sm table-hover">
                    <thead class="bg-secondary">
                      <tr>
                        <th>N</th><th>Descripción</th><th>Puntage máx.</th><th>Puntage mín.</th>
                      </tr>
                    </thead>
                    <tbody>
                       @php
                    $i=0;
                    $pmax=0;
                    $pmin=0;
                    @endphp
                    @foreach($perfil as $idper)
                      @php
                        $i++;
                        $pmax=$pmax+$idper->puntuaciones;
                        $pmin=$pmin+$idper->puntagemin;
                      @endphp
                      <tr>
                        <td>{{ $i }}</td> <td>{{ $idper->nomdet_perfil }}</td><td>{{ $idper->puntuaciones }}</td><td>{{ $idper->puntagemin }}</td>
                      </tr>
                    @endforeach
                    <tr class="table-active">
                        <td colspan="2"><strong>PUNTAGE</strong></td><td><strong>{{ $pmax }}</strong></td><td><strong>{{ $pmin  }}</strong></td>
                      </tr>
                    </tbody>
                    
                    
                  </table>
                </div>
              </div>
              <div class="card collapsed-card">
                <div class="card-header bg-info">
                  <h3 class="card-title">Requisito requerido en Formación</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0" style="font-size: 13px">
                  <ul class="nav nav-pills flex-column">
                    @php
                      $formacion=json_decode($inscritos[0]->formacion);
                      //print_r($inscritos);
                    @endphp
                    @foreach($formacion as $vaform)
                    
                    
                    <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle text-info"></i>{{ $vaform->data_formacion }}</a></li>
                    
                    @endforeach
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="card collapsed-card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Requisito requerido de Experiencia</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0" style="font-size: 13px">
                  <ul class="nav nav-pills flex-column">
                    @php
                      $experiencia=json_decode($inscritos[0]->experiencia);
                    @endphp
                    @foreach($experiencia as $vaexp)                    
                    
                    <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle text-primary"></i>{{ $vaexp->data_experiencia }}</a></li>
                    @endforeach
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>              
              <div class="card collapsed-card">
                <div class="card-header bg-success">
                  <h3 class="card-title">Requisito en curos y/o capacitación</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0" style="font-size: 13px">
                  <ul class="nav nav-pills flex-column">
                    @php
                      $conocimiento=json_decode($inscritos[0]->conocimiento);
                      //print_r($inscritos);
                    @endphp
                    @foreach($conocimiento as $vacono)
                    
                    
                    <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle text-success"></i>{{ $vacono->data_conocimiento }}</a></li>
                    {{-- <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle text-warning"></i> Promotions</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle text-primary"></i>Social</a></li> --}}
                    @endforeach
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <a href="#" class="btn btn-danger btn-block mb-3" data-toggle="modal" data-target="#modalpuntuacion"><i class="fas fa-arrow-circle-right fa-1x"></i> PUNTUACION DE EVALUACION CURRICULAR</a>
          </div>
          <div class="col-md-9">
              <div class="card card-dark">{{-- <div class="card card-dark collapsed-card"> --}}
                <div class="card-header">
                  <h3 class="card-title">
                   DATOS PERSONALES DEL POSTULANTE
                  </h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  @php
                    //print_r($inscritos);
                  @endphp
                  <table class="table table-bordered table-sm">
                    <tr><td><strong>Nacionalidad</strong></td><td>{{ $inscritos[0]->nacionalidad }}</td><td><strong>Tipo doc/Nro:</strong></td><td>{{ $inscritos[0]->tipo_doc }} :{{ $inscritos[0]->num_doc }} </td></tr>
                    <tr><td><strong>Nombres y Ape.</strong></td><td>{{ $inscritos[0]->nombres }} {{ $inscritos[0]->ap_paterno }} {{ $inscritos[0]->ap_materno }}</td><td><strong>Lugar nac.:</strong></td><td>{{ $inscritos[0]->lugar_nac }} </td></tr>
                    <tr><td><strong>Fecha nac.</strong></td><td>{{ date('d/m/Y', strtotime($inscritos[0]->fecha_nac)) }}</td><td><strong>Estado civil:</strong></td><td>{{ $inscritos[0]->estadocivil }} </td></tr>
                    <tr><td colspan="4"><strong>Domicilio Departamento.</strong> {{ $domiciliodepartamento[0]->departamento}} <strong>Provincia.</strong> {{ $domiciliopronvincia[0]->provincia }} <strong>Distrito.</strong> {{ $domiciliodistrito[0]->distrito }}</td></tr>
                    <tr><td colspan="4"><strong>Ubicación Domicilio.</strong>{{ $inscritos[0]->tipo_zona }}: {{ $inscritos[0]->nom_zona }} <strong>Dirección:</strong> {{ $inscritos[0]->direccion }}</td></tr>
                    <tr><td><strong>Número celular.</strong></td><td>{{ $inscritos[0]->celular }}</td><td><strong>Número teléfono:</strong></td><td>{{ $inscritos[0]->telefono }} </td></tr>
                    <tr><td><strong>Correo electrónico.</strong></td><td>{{ $inscritos[0]->correo }}</td><td><strong>Colegio profesional/Nro.reg:</strong></td><td>{{ $inscritos[0]->colegio_prof }} , <strong>Reg</strong> {{ $inscritos[0]->num_colegio }}</td></tr>
                    <tr><td><strong>Discapacidad.</strong></td><td>{{ $inscritos[0]->discapcidad }}</td><td><strong>Fuerzas armadas:</strong></td><td>{{ $inscritos[0]->fuerza_arm }} </td></tr>

                  </table><br>
                 {{--< h5 class="text-info">Documentos de sustento</h5> --}}
                 <h3 class="card-title text-info" style="padding-left: 10px;"><strong>Documentos de sustento</strong> 
                  {{-- @if($editacurricular_data[0]->docadjunto==0) --}}
                  <a href="" data-toggle="modal" data-target="#modalarchivocargar" class="btn btn-sm btn-danger"> Documento a subsanar</a>
                  {{-- @endif --}}
                </h3>
                  <table class="table table-bordered table-sm table-hover table-striped">
                    <thead>
                      <tr><th>Descripcion</th><th>Fecha cargado</th><th>Archivo</th></tr>
                    </thead>
                    <tbody>
                      @foreach($documentosdata as $docsustento)
                      
                      <tr><td>{{ $docsustento->sustento }}</td><td>{{ $docsustento->fecha }}</td><td><a href="#" data-toggle="modal" data-target="#modalarchivo" onclick="mostrar_archivo('{{Storage::url($docsustento->archivo)}}');"><i class="fa fa-eye"></a></td></tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{-- @php
                    print_r($documentosdata);
                  @endphp --}}
                </div>
              </div>

              <div class="card card-gray collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title">
                     Anexos cargados
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    @php
                      //print_r($formacion);
                    @endphp
                    <table class="table table-bordered table-sm table-hover table-striped">
                      <thead>
                        <tr>
                          <td>Descripción</td><td>Archivo</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($anexos as $anx)
                        
                        <tr>
                          <td>{{ $anx->nombreanexo }}</td><td align="center"><a href="#" data-toggle="modal" data-target="#modalarchivo" onclick="mostrar_archivo('{{Storage::url($anx->archivo_anexo)}}');"><i class="fa fa-eye"></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>

              <div class="card collapsed-card">
                  <div class="card-header bg-info">
                    <h3 class="card-title">
                     Formación académica
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0" style="font-size: 13px">
                    @php
                      //print_r($formaciondata);
                    @endphp
                    <table class="table table-bordered table-sm table-hover table-striped">
                      <thead>
                        <tr>
                          {{-- <td>Nivel</td> --}}<th>Grado</th><th>Especialidad</th><th>Centro estudios</th><th>Año Inicio</th><th>Año Fin</th><th>Fecha extension</th><th>Archivo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($formaciondata as $form)
                        
                        <tr>
                          {{-- <td>{{ $form->nivel }}</td> --}}<td>{{ $form->grado }}</td><td>{{ $form->especialidad }}</td><td>{{ $form->centro_estudio }}</td><td>{{ $form->anio_inicio }}</td><td>{{ $form->anio_fin }}</td><td>{{ date('d/m/Y', strtotime($form->fecha_extension)) }}</td><td align="center"><a href="#" data-toggle="modal" data-target="#modalarchivo" onclick="mostrar_archivo('{{Storage::url($form->archivo_formacion)}}');"><i class="fa fa-eye"></a></td>
                        </tr>
                        @endforeach

                        @foreach($colegiatura_data as $colegg)
                        
                        <tr>
                          <td colspan=6 class="text-danger"><strong>{{ $colegg->detalle_colegiatura }}</strong></td><td align="center"><a href="#" data-toggle="modal" data-target="#modalarchivo" onclick="mostrar_archivo('{{Storage::url($colegg->archivo)}}');"><i class="fa fa-eye"></a></td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
   
                  </div>
              </div>
              
              <div class="card collapsed-card">
                  <div class="card-header bg-primary">
                    <h3 class="card-title">
                     Experiencia laboral
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0" style="font-size: 13px">
                    <h4>Total acumulado de experiencia</h4><br>
                     @php
                                    $i=0;
                                    
                                    $j=0;//incrments para array
                                    $p=0;
                      @endphp
                      @foreach($exprienciadata as $index)

                        @php
                        $i++;                         

                        if($i==1)
                          { $tipoexpini=$index->tipo_experiencia; 
                            $dato[$j]=$tipoexpini;
                            $j++;                                                                 
                          }
                          else
                          {
                            if($index->tipo_experiencia<>$tipoexpini)
                              {
                                $tipoexpini=$index->tipo_experiencia;
                                $dato[$j]=$tipoexpini;
                                $j++;  
                              }    
                          }
                        @endphp              
                      @endforeach
                      @if(isset($dato))                         
                      
                                          @for($i=0;$i<count($dato);$i++)
                                              {{-- {{ $dato[$i] }}<br> --}}
                                               @php
                                                $anios=0;  
                                                $meses=0;
                                                $dias=0;

                                                 foreach($exprienciadata as $val)
                                                 {
                                                   if($dato[$i]==$val->tipo_experiencia)
                                                   {
                                                    $fecha1 = new DateTime($val->fecha_inicio);
                                                    $fecha2 = new DateTime($val->fecha_fin);
                                                    $fecha = $fecha1->diff($fecha2);
                                                    $anios=$anios+$fecha->y;
                                                    $meses=$meses+$fecha->m;
                                                    $dias=$dias+$fecha->d;
                                                   }
                                                 }
                                              //
                                                 if($dias>30)
                                                 {
                                                  $mes=intdiv($dias, 30);// numero de meses
                                                  $dia=$dias%30;//numero de dias
                                                  $meses=$meses+$mes;
                                                  $dias=$dia;
                                                  if($meses>12){
                                                    $an=intdiv($meses, 12);// numero de anios
                                                    $mes=$meses%12;//numero de meses definitivo
                                                    $meses=$mes;
                                                    $anios=$anios+$an;
                                                   }
                                                 }
                                                 else{
                                                    if($meses>12){
                                                      $an=intdiv($meses, 12);// numero de anios
                                                      $mes=$meses%12;//numero de meses definitivo
                                                      $meses=$mes;
                                                      $anios=$anios+$an;
                                                     }
                                                 }
                                               @endphp
                                               <div class="row text-dark" style="padding-left: 5px; font-size: 14px">
                                                 <div class="col-md-8"><strong >{{ $dato[$i] }}:</strong ></div>
                                                 <div class="col-md-4"><strong >Total acumulados: {{ $anios }} años {{ $meses }} meses {{ $dias }} días</strong></div>
                                               </div> 
                                              @endfor                                    
                      @endif
                      <br>
                    @php
                      //print_r($exprienciadata);
                    @endphp
                    <table class="table table-bordered table-sm table-hover table-striped">
                      <thead class="bg-secondary">
                        <tr>
                          <td>Tipo experiencia</td><td>Cargo</td><td>Tipo entidad</td><td>Nombre entidad</td><td>Fecha Inicio</td><td>Fecha Fin</td><td>Archivo</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($exprienciadata as $exp)
                        
                        <tr>
                          <td>{{ $exp->tipo_experiencia }}</td><td>{{ $exp->cargo }}</td><td>{{ $exp->tipo_entidad }}</td><td>{{ $exp->nombre_entidad }}</td><td>{{ date('d/m/Y', strtotime($exp->fecha_inicio)) }}</td><td>{{ date('d/m/Y', strtotime($exp->fecha_fin)) }}</td><td align="center"><a href="#" data-toggle="modal" data-target="#modalarchivo" onclick="mostrar_archivo('{{Storage::url($exp->archivo_experiencia)}}');"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>

              <div class="card collapsed-card">
                  <div class="card-header bg-success">
                    <h3 class="card-title">
                     Cursos y/o capacitación
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0" style="font-size: 13px">
                    @php
                      //print_r($conocimientodata);
                    @endphp
                    <table class="table table-bordered table-sm table-hover table-striped">
                      <thead>
                        <tr>
                          <td>Requerido</td><td>Tema</td><td>Centro estudios</td><td>Fecha inicio</td><td>Fecha Fin</td><td>Duración(Horas)</td><td>Tipo sustento</td><td>Archivo</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($conocimientodata as $conoc)
                        
                        <tr>
                          <td>{{ $conoc->requerido }}</td><td>{{ $conoc->tema }}</td><td>{{ $conoc->centro_estudio }}</td><td>{{ date('d/m/Y', strtotime($conoc->fecha_inicio)) }}</td><td>{{ date('d/m/Y', strtotime($conoc->fecha_fin)) }}</td><td>{{ $conoc->duracion }}</td><td>{{ $conoc->tipo_sustento }}</td><td align="center"><a href="#" data-toggle="modal" data-target="#modalarchivo" onclick="mostrar_archivo('{{Storage::url($conoc->archivo_concoimiento)}}');"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
</div>

{{-- inicio de modal --}}
<div class="modal fade" id="modalarchivo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Archivo cargado</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-0" id="archivo" >
              {{-- <p>One fine body&hellip;</p> --}}
            </div>
            {{-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">cerras</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
{{-- fin de modal --}}

{{-- inicio de modal para puntuacion --}}
<div class="modal fade" id="modalpuntuacion" {{-- data-backdrop="static" --}}>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Puntuación de evaluación curricular</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-1" style="font-size: 12px">
              <form class="form" method="post" action="{{ route('updateevalcurricular') }}">
                @csrf
                <input type="hidden" class="form-control" name="iduser" id="iduser" value="{{ $inscritos[0]->iduser }}">
                <input type="hidden" class="form-control" name="idplaza" id="idplaza" value="{{$inscritos[0]->plaza}}">
                <input type="hidden" class="form-control" name="idenvioinscedit" id="idenvioinscedit" value="{{$inscritos[0]->idenvioinsc}}">

                @php
                  //print_r($editacurricular_data);
                @endphp

                <h5>Cumplimiento</h5>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="inputEmail3" class="col-sm-12">Cumplió en los folios</label>
                        <div class="col-sm-12">
                          <div class="form-check">
                            @if($editacurricular_data[0]->folios==1)
                            <input class="form-check-input" type="radio" name="folios_cump" value="1" required onclick="puntuacion()" checked>
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="folios_cump" value="0">
                            <label class="form-check-label">NO</label>
                            @else
                             <input class="form-check-input" type="radio" name="folios_cump" value="1" required onclick="puntuacion()" >
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="folios_cump" value="0" checked>
                            <label class="form-check-label">NO</label>
                            @endif
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label  class="col-sm-12">Cumplió con ANEXOS de 1-6</label>
                        <div class="col-sm-12">
                          <div class="form-check">
                            @if($editacurricular_data[0]->anexos_cump==1)
                            <input class="form-check-input" type="radio" name="anexos_cump" value="1" required onclick="puntuacion()" checked>
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="anexos_cump" value="0">
                            <label class="form-check-label">NO</label>
                            @else
                            <input class="form-check-input" type="radio" name="anexos_cump" value="1" required onclick="puntuacion()" >
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="anexos_cump" value="0" checked>
                            <label class="form-check-label">NO</label>
                             @endif
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label  class="col-sm-12">Cumple en formación académica</label>
                        <div class="col-sm-12">
                          <div class="form-check">
                            @if($editacurricular_data[0]->formacion_cump==1)
                            <input class="form-check-input" type="radio" name="formacion_acad" value="1" required onclick="puntuacion()" checked>
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="formacion_acad" value="0">
                            <label class="form-check-label">NO</label>
                            @else
                               <input class="form-check-input" type="radio" name="formacion_acad" value="1" required onclick="puntuacion()" >
                                <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="formacion_acad" value="0" checked>
                                <label class="form-check-label">NO</label>
                            @endif
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail3" class="col-sm-12">Cumple en cursos y/o capacitacion</label>
                        <div class="col-sm-12">
                          <div class="form-check">
                            @if($editacurricular_data[0]->conocimiento_cump==1)
                            <input class="form-check-input" type="radio" name="conocimiento_cump" value="1" required onclick="puntuacion()" checked>
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="conocimiento_cump" value="0">
                            <label class="form-check-label">NO</label>
                            @else
                            <input class="form-check-input" type="radio" name="conocimiento_cump" value="1" required onclick="puntuacion()">
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="conocimiento_cump" value="0" checked>
                            <label class="form-check-label">NO</label>
                            @endif
                          </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3">
                        <label  class="col-sm-12">Cumple con la Experiencia</label>
                        <div class="col-sm-12">
                          <div class="form-check">
                            @if($editacurricular_data[0]->experiencia_cump==1)
                            <input class="form-check-input" type="radio" name="experiencia_cump" value="1"required onclick="puntuacion()" checked>
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="experiencia_cump" value="0">
                            <label class="form-check-label">NO</label>
                            @else
                            <input class="form-check-input" type="radio" name="experiencia_cump" value="1"required onclick="puntuacion()" >
                            <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="experiencia_cump" value="0" checked>
                            <label class="form-check-label">NO</label>
                            @endif
                          </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                      <div class="col-md-12">
                          <label>Cumplió con los adjuntos(Doc. de identidad, Ficha ruc, colegiatura, fuerzas armadas, discapcidad,Certificados de habilidad,etc)</label>
                      </div>
                      <div class="col-md-4">

                            <div class="form-check">
                              @if($editacurricular_data[0]->docadjunto==1)
                              <input class="form-check-input" type="radio" name="docuadjunto_cump" value="1"required onclick="puntuacion()" checked>
                              <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input class="form-check-input" type="radio" name="docuadjunto_cump" value="0">
                              <label class="form-check-label">NO</label>
                              @else
                              <input class="form-check-input" type="radio" name="docuadjunto_cump" value="1"required onclick="puntuacion()">
                              <label class="form-check-label">SI</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input class="form-check-input" type="radio" name="docuadjunto_cump" value="0" checked>
                              <label class="form-check-label">NO</label>
                              @endif
                            </div>

                      </div>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-8">
                     <table class="table table-bordered table-sm table-hover">
                        <thead class="bg-secondary">
                          <tr>
                            <th>N</th><th>Descripción</th><th>Puntage máx.</th><th>Puntage mín.</th><th>Puntuación.</th>
                          </tr>
                        </thead>
                        <tbody>
                           @php
                        $i=0;
                        $j=0;
                        $pmax=0;
                        $pmin=0;
                        $data_putuacion=json_decode($editacurricular_data[0]->arraypontage);
                        //print_r(x);
                        //echo $data_putuacion[0]->data_puntages;
                        @endphp
                        @foreach($perfil as $idper)
                          @php
                            $i++;
                            $pmax=$pmax+$idper->puntuaciones;
                            $pmin=$pmin+$idper->puntagemin;
                          @endphp
                          <tr>
                            <td>{{ $i }}</td> <td>{{ $idper->nomdet_perfil }}</td><td>{{ $idper->puntuaciones }}</td><td>{{ $idper->puntagemin }}</td><td><input type="number" name="arraypuntages[]" class="form-control form-control-sm" value="{{ $data_putuacion[$j]->data_puntages }}" id="puntages{{$i}}" onchange="puntuacion()" min="{{ $idper->puntagemin }} " max="{{ $idper->puntuaciones}}" step="{{ $idper->puntagemin }}"></td>
                          </tr>
                          @php
                            $j++;
                          @endphp
                        @endforeach
                        <tr class="table-active">
                            <td colspan="2"><strong>PUNTAGE</strong></td><td><strong>{{ $pmax }}</strong></td><td><strong>{{ $pmin  }}</strong></td><td><input type="hidden" name="puntage" id="sumpuntage" value="{{ $editacurricular_data[0]->puntagetotal }}"></td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  <div class="col-md-4">
                    <div class="col-md-12" id="puntuacion">
                      <strong>Puntuación:</strong> <h3>{{ $editacurricular_data[0]->puntagetotal }}</h3>
                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-12">Observaciones</label>
                        <div class="col-sm-12">
                          <textarea placeholder="Ingrese su observacion" class="form-control" id="obs" rows="4" name="obs">{{ $editacurricular_data[0]->observacion }}</textarea>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Ocultar</button>
                  <button type="submit" class="btn btn-primary">Guardar puntuación</button>
                </div>
              </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
{{-- fin de modal  puntuacion--}}


{{-- inicio de modal para agregar fica ruc, etc --}}
<div class="modal fade" id="modalarchivocargar" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Subsanar Documento</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-2">
              
              <form role="form" method="post" action="{{ route('formsustentatoriocargar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" id="idplaza"  name="idplaza" value="{{Session('idpos')}}">
                <input type="hidden" id="idusuario" name="idusuario" value="{{auth()->user()->id}}"> --}}
                <input type="hidden" class="form-control" name="iduser" id="iduser" value="{{ $inscritos[0]->iduser }}">
                <input type="hidden" class="form-control" name="idplaza" id="idplaza" value="{{$inscritos[0]->plaza}}">
                <input type="hidden" class="form-control" name="idenvioinscedit" id="idenvioinscedit" value="{{$inscritos[0]->idenvioinsc}}">
                <div class="row">
                  <div class="col-sm-4" >
                      <div class="form-group">
                        <label>Seleccione tipo de documento</label><small></small>
                        <select class="form-control" name="sustentos" id="cbo_sustento" required>
                                  <option selected value="">[Seleccione Documento]</option>
                                  <option value="Documento De Identidad">Documento De Identidad</option>
                                  <option value="Colegiatura">Colegiatura</option>
                                  <option value="Certificado Habilitación Profesional">Certificado Habilitación Profesional</option>
                                  <option value="Licenciado FF.AA.">Licenciado FF.AA.</option>
                                  <option value="Conadis (Discapacidad)">Conadis (Discapacidad)</option>
                                  <option value="Consulta  y/o ficha RUC">Consulta  y/o ficha RUC</option>
                              </select>
                      </div>
                    </div>
                    <div class="col-sm-4" >
                      <div class="form-group">
                                <label for="exampleInputFile">Seleccione sustento</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" accept="application/pdf">
                                    <label class="custom-file-label" for="exampleInputFile">Archivo en pdf</label>
                                  </div>
                                  
                                </div>
                              </div>
                    </div>
                    <div class="col-sm-4" align="center">
                      <div class="form-group">
                              <label for="exampleInputFile">Cargar</label><br>
                              <button type="submit" class="btn btn-warning "><i class="fas fa-upload"></i> Cargar</button>
                            </div>
                          
                    </div>
                </div>
              </form>
            </div>
            {{-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">cerras</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
{{-- fin de modal --}}


@endsection

@section('script')
<script type="text/javascript">

 
 function mostrar_archivo(archivo)
 {
  //cadena='<embed src="'+archivo+'" type="application/pdf" frameborder="0" width="100%" height="930" style="overflow-x: hidden;"/>';
  cadena='<object id="pdfdoc" data="'+archivo+'" type="application/pdf" width="100%" height="700px">';
  $("#archivo").html(cadena);
 }

function puntuacion()
{
  valor={{ $i }};

 sum=0;
  for (var i = 1; i <= valor; i++) 
  {
    dat=$("#puntages"+i).val();
    sum=sum+parseInt(dat);
  }
  //alert(sum);
  if(sum<{{ $pmin  }})
  {
    $("#obs").val("No cumple con los requisitos mínimos según perfil");$("#sumpuntage").val(0);
  }
  else{$("#obs").val("Ninguna");$("#sumpuntage").val(sum);}
  cadena="<strong>Puntuación:</strong> <h3>"+sum+"</h3>";
  $("#puntuacion").html(cadena);
  
}

// para ver los cumplimientos 

// foliados

$('input[type=radio][name=folios_cump]').change(function() {
    if (this.value != '1') {$('#obs').val('NO CUMPLIÓ CON EL FOLIADO');$('#puntuacion').html("<strong>Puntuación:</strong> <h3>0</h3>");$("#sumpuntage").val(0);}
    else{$("#obs").val("Ninguna");}
  });

//anexos_cump
$('input[type=radio][name=anexos_cump]').change(function() {
    if (this.value != '1') {$('#obs').val('NO CARGÓ ANEXO CORRECTO');$('#puntuacion').html("<strong>Puntuación:</strong> <h3>0</h3>");$("#sumpuntage").val(0);}
    else{$("#obs").val("Ninguna");}
  });
//formacion_acad
$('input[type=radio][name=formacion_acad]').change(function() {
    if (this.value != '1') {$('#obs').val('NO CUMPLE CON LA FORMACION ADECUADA PARA EL PERFIL');$('#puntuacion').html("<strong>Puntuación:</strong> <h3>0</h3>");$("#sumpuntage").val(0);}
    else{$("#obs").val("Ninguna");}
  });
//conocimiento_cump
$('input[type=radio][name=conocimiento_cump]').change(function() {
    if (this.value != '1') {$('#obs').val('NO CUMPLE CON CURSOS Y/O CAPACITACIONES PARA EL PERFIL');$('#puntuacion').html("<strong>Puntuación:</strong> <h3>0</h3>");$("#sumpuntage").val(0);}
    else{$("#obs").val("Ninguna");;}
  });
//experiencia_cump
$('input[type=radio][name=experiencia_cump]').change(function() {
    if (this.value != '1') {$('#obs').val('NO CUMPLE CON LA EXPERIENCIA REQUERIDA PARA ESTE PERFIL');$('#puntuacion').html("<strong>Puntuación:</strong> <h3>0</h3>");$("#sumpuntage").val(0);}
    else{$("#obs").val("Ninguna");}
  });
//docuadjunto_cump
$('input[type=radio][name=docuadjunto_cump]').change(function() {
    if (this.value != '1') {$('#obs').val('NO ADJUNTO LOS DOCUMENTOS REQUERIDOS PARA ESTA CONVOCATORIA');$('#puntuacion').html("<strong>Puntuación:</strong> <h3>0</h3>");$("#sumpuntage").val(0);}
    else{$("#obs").val("Ninguna");}
  });


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

@foreach (['danger', 'warning', 'success', 'info'] as $msg) 
     @if(Session::has('alert-' . $msg))      
        mostraralerta('{{ $msg }}','{{ Session::get('alert-' . $msg) }}');
     @endif 
@endforeach

</script>
@endsection