@extends('plantillas.plantillaresumen')

@section('clasebody')
layout-top-nav
@endsection

@section('content')
<div class="wrapper">

 <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         {{--  <a href="#" title="" onclick="imprimir()">Descargar</a> --}}
        </div>
        <div class="row">
           <div class="col-md-12">  
                                  
                        <h4 class="title" align="center">ANEXO 8<br>RESUMEN DEL CURRICULUM VITAE</h4>
           </div>
        </div>
        <div class="row">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-12" style="font-size: 10px">

                  <h4 style="background: #ccc; padding:4px">A. DATOS PERSONALES</h4><br><br>
                  <table align="center" border="1" cellspacing="0" cellpadding="3">
                    <tr>
                      <td width="80" height="80" align="center"><img src="{{asset(auth()->user()->avatar)}}" width="100"></td>
                    </tr>
                  </table>
                  <br>
                  

                  <table border="1" cellspacing="0" cellpadding="3" width='100%'>
                      <tr><td><strong>APELLIDOS Y NOMBRES</strong></td><td id="apenombre">{{$datospersona[0]->ap_paterno}} {{$datospersona[0]->ap_materno}}, {{$datospersona[0]->nombres}}</td></tr>
                      <tr><td><strong>DNI</strong></td><td id="dni">{{$datospersona[0]->num_doc}}</td></tr>
                      <tr><td><strong>RUC</strong></td><td id="ruc"></td></tr>
                      <tr><td><strong>FECHA DE NACIMIENTO</strong></td><td id="fechanac">{{$datospersona[0]->fecha_nac}}</td></tr>
                      <tr><td><strong>SISTEMA DE PENSIONES (AFP O ONP)</strong></td><td></td></tr>
                      <tr><td><strong>ESTADO CIVIL</strong></td><td id="estadocivil">{{$datospersona[0]->estadocivil}}</td></tr>
                      <tr><td><strong>DOMICILIO ACTUAL</strong></td><td id="domicilio">{{$datospersona[0]->direccion}}</td></tr>
                      <tr><td><strong>DISTRITO</strong></td><td id="distrito">{{$datospersona[0]->distrito}}</td></tr>
                      <tr><td><strong>N° DE CELULAR</strong></td><td id="ncel">{{$datospersona[0]->celular}}</td></tr>
                      <tr><td><strong>TELEFONO FIJO</strong></td><td id="telefono">{{$datospersona[0]->telefono}}</td></tr>
                      <tr><td><strong>CORREO</strong></td><td id="correo">{{$datospersona[0]->correo}}</td></tr>
                  </table>
                  <div class="page-break"></div> {{-- salto de linea --}}
                  <br>
                  <h4 style="background: #ccc; padding:4px">B. FORMACIÓN ACADEMICA</h4><br><br>
                  <p> (en base al perfil solicitado, rellenar de acuerdo a lo que usted acredita)</p>
                  
                  <table  border="1" cellspacing="0" cellpadding="3" width='100%'>
                      <thead>
                          <tr style="background: #aeaeae">
                              <th class="text-center mi_header"><strong>Nivel</strong></th>
                              <th class="text-center mi_header"> <strong>Centro de Estudios</strong></th>
                              <th class="text-center mi_header"><strong>Especialidad</strong></th>
                              <th class="text-center mi_header"><strong>Fecha de Emisión(dia/mes/año)</strong></th>
                              <th class="text-center mi_header"><strong>Ciudad País</strong></th>
                              <th class="text-center mi_header"><strong>N° FOLIO</strong></th>
                              
                          </tr>
                      </thead>
                      <tbody id="formacion">
                        @foreach($formacion as $form)
                          <tr><td>{{$form->nivel}}</td><td>{{$form->centro_estudio}}</td><td>{{$form->especialidad}}</td><td>{{$form->fecha_extension}}</td><td></td><td></td></tr>
                        @endforeach
                      </tbody>
                  </table>
                  <div class="page-break"></div> {{-- salto de linea --}}
                  <br>
                  <h4 style="background: #ccc; padding:4px">C. EXPERIENCIA LABORAL </h4><br><br><p>(en base al perfil solicitado, ordenar cronológicamente: del actual a lo anterior)</p>

                  <table border="1" cellspacing="0" cellpadding="3" width='100%'>
                        <thead>
                            <tr style="background: #aeaeae">
                                <th class="text-center mi_header">TIPO EXPERIENCIA</th>
                                <th class="text-center mi_header">Nombre de la Entidad o Empresa</th>
                                <th class="text-center mi_header">CARGO</th>                               
                                <th class="text-center mi_header">INICIO</th>
                                <th class="text-center mi_header">FIN</th>
                                <th class="text-center mi_header">Tiempo Permanencia</th>
                                <th class="text-center mi_header"><strong>N° FOLIO</strong></th>
                            </tr>
                        </thead>
                        <tbody id="experiencia">
                          @php
                                    $i=0;                                    
                                    $j=0;//incrments para array
                                   
                                    @endphp
                                    @foreach($dataexpe as $index)

                                        @php
                                        $i++;                                          

                                        if($i==1)
                                          { $tipoexpini=$index->tipo_experiencia; 
                                            $datoarray[$j]=$tipoexpini;
                                            $j++;                                                                 
                                          }
                                          else
                                          {
                                            if($index->tipo_experiencia<>$tipoexpini)
                                              {
                                                $tipoexpini=$index->tipo_experiencia;
                                                $datoarray[$j]=$tipoexpini;
                                                $j++;  
                                              }    
                                          }
                                                
                                          

                                        @endphp
                                                              
                                                              
                                                            
                                    @endforeach

                                    @if(isset($datoarray))
                                        
                                    
                                                        @for($i=0;$i<count($datoarray);$i++)
                                                            {{-- {{ $dato[$i] }}<br> --}}
                                                             @php
                                                              $anios=0;  
                                                              $meses=0;
                                                              $dias=0;

                                                               foreach($dataexpe as $val)
                                                               {
                                                                 if($datoarray[$i]==$val->tipo_experiencia)
                                                                 {
                                                                  $fecha1 = new DateTime($val->fecha_inicio);
                                                                  $fecha2 = new DateTime($val->fecha_fin);
                                                                  $fecha = $fecha1->diff($fecha2);
                                                                  $anios=$anios+$fecha->y;
                                                                  $meses=$meses+$fecha->m;
                                                                  $dias=$dias+$fecha->d;

                                                                  $dataimprimir="<tr><td>".$val->tipo_experiencia."</td><td>".$val->nombre_entidad."</td><td>".$val->cargo."</td><td>".$val->fecha_inicio."</td><td>".$val->fecha_fin."</td><td>".$fecha->y." años, ".$fecha->m." meses y ".$fecha->d." dias</td><td></td></tr>";
                                                                  echo $dataimprimir;

                                                                 }

                                                               }
                                                             @endphp
                                                             <tr style="background: #97b7bb;"><td colspan="5" align="right"><strong >TOTAL ({{ $datoarray[$i] }}):</strong ></td><td><strong > {{ $anios }} años {{ $meses }} meses {{ $dias }} días</strong></td><td></td></tr>
                                                             {{-- <div class="row">
                                                               <div class="col-md-8"><strong >{{ $dato[$i] }}:</strong ></div>
                                                               <div class="col-md-4"><strong >Total acumulados: {{ $anios }} años {{ $meses }} meses {{ $dias }} días</strong></div>
                                                             </div> --}} 

                                                            @endfor
                                    
                                    @endif
                          {{-- @foreach($dataexpe as $exp)
                          @php
                            $fecha1 = new DateTime($exp->fecha_inicio);
                            $fecha2 = new DateTime($exp->fecha_fin);
                            $fecha = $fecha1->diff($fecha2);
                            
                          @endphp
                           <tr><td>{{$exp->tipo_experiencia}}</td><td>{{$exp->nombre_entidad}}</td><td>{{$exp->cargo}}</td><td>{{$exp->fecha_inicio}}</td><td>{{$exp->fecha_fin}}</td><td>{{$fecha->y}} años, {{$fecha->m}} meses y {{$fecha->d}} dias</td><td></td></tr>
                           @endforeach  --}}
                        </tbody>
                    </table>
                    {{-- {{ count($datoarray) }} --}}
                    <div class="page-break"></div> {{-- salto de linea --}}
                    <br>
                  <h4 style="background: #ccc; padding:4px">D. CURSOS Y/O CAPACITACIONES</h4><br><br>
                  <p>(en base al perfil solicitado, ordenar cronológicamente: del actual a lo anterior, los cursos deben ser capacitaciones con antigüedad de los cuatro (04) últimos años)</p>
                  <table border="1" cellspacing="0" cellpadding="3" width='100%'>
                      <thead>
                          <tr style="background: #ccc">
                              <th class="text-center mi_header">Nivel</th>
                              <th class="text-center mi_header">CENTRO DE ESTUDIOS</th>
                              <th class="text-center mi_header">TEMA</th>
                              <th class="text-center mi_header">F. INICIO</th>
                              <th class="text-center mi_header">F. FIN</th>
                              <th class="text-center mi_header">DURACION<br>(horas)</th>
                              <th class="text-center mi_header"><strong>N° FOLIO</strong></th>
                              
                          </tr>
                      </thead>
                      <tbody id="conocimiento">
                        @foreach($datacono as $con)
                          
                           <tr><td>{{$con->requerido}}</td><td>{{$con->centro_estudio}}</td><td>{{$con->tema}}</td><td>{{$con->fecha_inicio}}</td><td>{{$con->fecha_fin}}</td><td>{{$con->duracion}}</td><td></td></tr>
                        @endforeach  
                      </tbody>
                  </table>

                  <br>
                  <p style="text-align: justify;">
                    Nota 01:<br> 
La no presentación de la documentación establecida de manera obligatoria será calificada como no admitido en el presente proceso no existiendo la posibilidad de subsanación. </p> <p style="text-align: justify;">
  Nota 02: <br>
Concluido el concurso público el Gobierno Regional Huánuco, mediante control posterior verificara la veracidad de los documentos presentados por el postulante ganador, así como no estar incurso en las causales señaladas en las disposiciones anteriores (Como nepotismo, antecedentes judiciales y penales, no estar inhabilitado para ejercer cargo público, entre otros). En caso de verificar documentos que no se ajusten a lo establecido en la presente base del concurso, se iniciaran las acciones que correspondan para declarar la nulidad de la contratación, sin perjuicio de las responsabilidades penales y administrativas a que dieran lugar.
</p>
                  
                
            
          </div>


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->



  
</div>
@endsection


