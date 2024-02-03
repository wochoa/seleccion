<?php

namespace App\Http\Controllers;

use App\personal;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Http;
use Image;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('auth')->only('create','store');// aqui protegemos solo create y store
        $this->middleware('auth')->except('index');// aqui protegemos a todos excepto las
    }
    public function index()
    {
        $plazas=DB::table('cas_puesto')->join('cas_proceso_seleccion','cas_puesto.cas_pue_proceso_seleccion','=','cas_proceso_seleccion.id_proc_sel_cas')->where(['id_ejecutora'=>1,'cas_proc_sel_estado'=>1])->orderByRaw('id_cas_puesto DESC')->get();

        return view('inicio',compact('plazas'));
        //return view('inicio',compact('publicacion','popup'));
    }

    /**  datospersonales
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response  nuevodetalleperfil
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $idexiste=$datos["iduserdet"];

        // consulta para actualizar al usuario
        $sql="update user_conv_detalle set nacionalidad='".$datos["nacionalidad"]."', tipo_doc='".$datos["documento"]."',num_doc='".$datos["nrodoc"]."',ap_paterno='".$datos["appaterno"]."',ap_materno='".$datos["apmaterno"]."',nombres='".$datos["nombres"]."',lugar_nac='".$datos["lugarnac"]."',fecha_nac='".$datos["fechanac"]."',estadocivil='".$datos["crvEstadoCivil"]."',dom_deparatmento='".$datos["departamento"]."',dom_provincia='".$datos["provincia"]."',dom_distrito='".$datos["distrito"]."',tipo_zona='".$datos["crvTipoZona"]."',nom_zona='".$datos["urbanizacion"]."',via='".$datos["crvViaDireccion"]."',direccion='".$datos["direccion"]."',telefono='".$datos["telefono"]."',celular='".$datos["celular"]."',correo='".$datos["correo"]."',colegio_prof='".$datos["colegiopro"]."',num_colegio='".$datos["numcolegio"]."',discapcidad='".$datos["discpacidad"]."',fuerza_arm='".$datos["fuerzasarm"]."' where iduserdet =".$idexiste;

        //$iduser = $request->input('iduser'); 
        if(!empty ($idexiste)){
            
            //echo 'pude ingresar para actualizar';
            $affected=DB::update($sql);

        }
        else{
            // creamos sus datos del usuario
            DB::insert('insert into user_conv_detalle (iduser, nacionalidad,tipo_doc,num_doc,ap_paterno,ap_materno,nombres,lugar_nac,fecha_nac,estadocivil,dom_deparatmento,dom_provincia,dom_distrito,tipo_zona,nom_zona,via,direccion,telefono,celular,correo,colegio_prof,num_colegio,discapcidad,fuerza_arm) values (?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$datos["iduser"],$datos["nacionalidad"],$datos["documento"],$datos["nrodoc"],$datos["appaterno"],$datos["apmaterno"],$datos["nombres"],$datos["lugarnac"],$datos["fechanac"],$datos["crvEstadoCivil"],$datos["departamento"],$datos["provincia"],$datos["distrito"],$datos["crvTipoZona"],$datos["urbanizacion"],$datos["crvViaDireccion"],$datos["direccion"],$datos["telefono"],$datos["celular"],$datos["correo"],$datos["colegiopro"],$datos["numcolegio"],$datos["discpacidad"],$datos["fuerzasarm"]]);

            //echo 'pude ingresar para insertar';
        }
        // visualizamos el datospersonales.balde.php
        //return view('datospersonales');
        session()->flash('alert-success', 'Fue guardado satisfactoriamente los datos personales');
        return redirect('/datospersonales');
    }
    function datospersonales()
    {
        return view('datospersonales');
    }
    function formacionacademica($iduser,$idplaza)
    {
        $formacion=DB::table('formacion')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idformacion','DESC')->get();
        $colegiatura=DB::table('colegiatura')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idcolegiatura','asc')->get();
        

        return view('formacionacademica',compact('formacion','colegiatura'));
        // /return view('formacionacademica');
    }
    function conocimiento($iduser,$idplaza)
    {   $datacono=DB::table('conocimiento')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idconocimiento','DESC')->get();
        
        return view('conocimiento',compact('datacono'));
    }
    function experiencia($iduser,$idplaza)
    {   $dataexpe=DB::table('experiencia')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('tipo_experiencia','DESC')->get();
        return view('experiencia',compact('dataexpe'));
    }
    function anexos($iduser,$idplaza)
    {   $dataanexo=DB::table('anexos')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idanexos','ASC')->get();
        return view('anexos',compact('dataanexo'));
    }

    // esta funcion carga los datos de las personas
    public function cargadatospersona($id)
    {
        $datospersona=DB::table('user_conv_detalle')->where('iduser',$id)->get();
        return response()->json($datospersona);
    }
    

    // esta funcion carga los procesos de la convocatoria actnuevasplazasiva

    public function procesoconvocatoria()
    {
        $procesocas=DB::table('cas_proceso_seleccion')->where('id_ejecutora',1)->orderByRaw('id_proc_sel_cas DESC')->get();

        return view('procesoplaza',compact('procesocas'));
    }
     public function desactivarproceso($id)
    {
        $sql="UPDATE cas_proceso_seleccion SET cas_proc_sel_estado=0 WHERE id_proc_sel_cas=".$id;
        $procesocas=DB::update($sql);
        
        return redirect('/publiconvocatoria');
    }
     public function activarproceso($id)
    {
        $sql="UPDATE cas_proceso_seleccion SET cas_proc_sel_estado=1 WHERE id_proc_sel_cas=".$id;
        $procesocas=DB::update($sql);
        
        return redirect('/publiconvocatoria');
    }
    // agregamos nuevo proceso cas
    public function nuevoproceso(Request $request)
    {
        $datos = $request->all();
        //$idexiste=$datos["iduserdet"];

        // creamos sus datos del usuario
            DB::insert('insert into cas_proceso_seleccion (proc_sel_cas_descripcion,proc_sel_cas_fecha_inicio,proc_sel_cas_fecha_termino,cas_proc_sel_fecha_fin_inscripcion,cas_proc_sel_fecha_resultados,cas_proc_sel_estado,id_ejecutora) values (?,?,?,?,?,?,?)', [$datos["procescas"],$datos["fechaini"],$datos["fechafininsc"],$datos["fecharesul"],$datos["fechafinal"],1,1]);
        // return response()->json($datos);

            return redirect('/publiconvocatoria');

    }
    public function eliminaproceso($id)
    {
        $sql="DELETE FROM cas_proceso_seleccion where id_proc_sel_cas=".$id;
        DB::delete($sql);
        return redirect('/publiconvocatoria');
    }//
    public function eliminarplaza($id)
    {
        $sql="DELETE FROM cas_puesto where id_cas_puesto=".$id;
        DB::delete($sql);
        return redirect('/publiconvocatoria');
    }//eliminarplaza

    public function cargaprocesoeditar($id)
    {
        $procesoedit=DB::table('cas_proceso_seleccion')->where('id_proc_sel_cas',$id)->get();
        return response()->json($procesoedit);
    }
    public function procesoeditar(Request $request)
    {
        $datos = $request->all();

        $idproceso=$datos["idproceso"];
        $procescase=$datos["procescase"];
        $fechainie=$datos["fechainie"]; // inicio inscripcion
        $fechafininsce=$datos["fechafininsce"]; // fin inscripcion
        $fecharesule=$datos["fecharesule"]; // fecah resultados
        $fechafinale=$datos["fechafinale"]; // final proceso

        //$idexiste=$datos["iduserdet"];

        // creamos sus datos del usuario
            // DB::insert('insert into cas_proceso_seleccion (proc_sel_cas_descripcion,proc_sel_cas_fecha_inicio,proc_sel_cas_fecha_termino,cas_proc_sel_fecha_fin_inscripcion,cas_proc_sel_fecha_resultados,cas_proc_sel_estado,id_ejecutora) values (?,?,?,?,?,?,?)', [$datos["procescas"],$datos["fechaini"],$datos["fechafininsc"],$datos["fecharesul"],$datos["fechafinal"],1,1]);
         //return response()->json($datos);

          $sql="UPDATE cas_proceso_seleccion SET proc_sel_cas_descripcion='$procescase',proc_sel_cas_fecha_inicio='$fechainie',proc_sel_cas_fecha_termino='$fechafinale',cas_proc_sel_fecha_fin_inscripcion='$fechafininsce',cas_proc_sel_fecha_resultados='$fecharesule' WHERE id_proc_sel_cas=".$idproceso;
        $procesocas=DB::update($sql);

        return redirect('/publiconvocatoria');

    }

    

    public function cargarplzasporconvo($id)
    {
        $plazasconv=DB::table('cas_puesto')->where('cas_pue_proceso_seleccion',$id)->get();
        return response()->json($plazasconv);
    }
    public function cargaprocesoparaperfiles()
    {
        $procesocas=DB::table('cas_proceso_seleccion')->where('id_ejecutora',1)->orderByRaw('id_proc_sel_cas DESC')->get();
        return response()->json($procesocas);
    }

    public function nuevoperfil(Request $request)
    {
        $datosperfil = $request->all();
        //$idexiste=$datos["iduserdet"];

        // creamos sus datos del usuario
        DB::insert('insert into perfiles_convocatoria (nomperfil,ide_proceso) values (?,?)', [$datosperfil["procescas"],$datosperfil["proceso"]]);
       //return response()->json($datosperfil);

       $procesocas=DB::table('cas_proceso_seleccion')->where('id_ejecutora',1)->orderByRaw('id_proc_sel_cas DESC')->get();

        return view('perfiles');

    }

    public function perfilescreados()
    {
        // $procesocas=DB::table('perfiles_convocatoria')->join('cas_proceso_seleccion','perfiles_convocatoria.ide_proceso','=','cas_proceso_seleccion.id_proc_sel_cas')->where('id_ejecutora',1)->orderBy('idperfil','DESC')->get();
        $procesocas=DB::table('perfiles_convocatoria')->orderBy('idperfil','DESC')->get();
        return response()->json($procesocas);
    }

    public function cargadetalleperfil($id)
    {
        $procesocas=DB::table('detalle_perfil')->join('perfiles_convocatoria','detalle_perfil.id_perfil','=','perfiles_convocatoria.idperfil')->where('id_perfil',$id)->orderBy('iddetalle_perfil','DESC')->get();
        return response()->json($procesocas);
    }

    public function nuevodetalleperfil(Request $request)
    {
        $datosperfil = $request->all();
        $idexiste=$datosperfil["idperfil"];

        // creamos sus datos del usuario
        DB::insert('insert into detalle_perfil (nomdet_perfil,puntuaciones,id_perfil,puntagemin,categoria) values (?,?,?,?,?)', [$datosperfil["descripcion"],$datosperfil["puntage"],$datosperfil["idperfil"],$datosperfil["puntagemin"],$datosperfil["categoria"]]);
       //return response()->json($datosperfil);

       

       return redirect('/perfiles');
    }
    public function perfiles()
    {
        return view('perfiles');
    }
    public function cargadetalleparaeditar($id)
    {
        $procesocas=DB::table('detalle_perfil')->where('iddetalle_perfil',$id)->get();
        return response()->json($procesocas);
    }
    public function actualizadetalleperfil(Request $request)
    {
        $data = $request->all();
        $idexiste=$data["iddetalleperfil"];
        $sql="UPDATE detalle_perfil SET nomdet_perfil='".$data["descripcion"]."',puntuaciones='".$data["puntage"]."',puntagemin='".$data["puntagemin"]."',categoria='".$data["categoria"]."'  WHERE iddetalle_perfil=".$idexiste;
        $affected=DB::update($sql);        
       //return response()->json($data);
        return redirect('/perfiles');
    }

    public function eliminardetalleperfil($id)
    {
        $sql="DELETE FROM detalle_perfil where iddetalle_perfil=".$id;
        DB::delete($sql);
        return redirect('/perfiles');
    }
    public function cargaperfileditar($id)
    {
        $procesocas=DB::table('perfiles_convocatoria')->where('idperfil',$id)->get();
        return response()->json($procesocas);
    }
    public function actualizaperfil(Request $request)
    {
        $data = $request->all();
        $idexiste=$data["idperfil"];
        $sql="UPDATE perfiles_convocatoria SET nomperfil='".$data["nomperfil"]."',ide_proceso='".$data["proceso"]."'WHERE idperfil=".$idexiste;
        $affected=DB::update($sql);        
       //return response()->json($data);
        return redirect('/perfiles');
    }
    public function eliminarperfil($id)
    {
        $sql="DELETE FROM perfiles_convocatoria where idperfil=".$id;
        DB::delete($sql);
        return redirect('/perfiles');
    }  
    public function cargaoficinas()
    {
        $procesocas=DB::table('cas_puesto')->select('cas_pue_oficina')->distinct()->orderBy('cas_pue_oficina','asc')->get();//FROM cas_puesto ORDER BY cas_pue_oficina asc
        return response()->json($procesocas);
    }
    public function nuevasplazas(Request $request)
    {
        $datosperfil = $request->all();        
        
        

        $ubicacionfile="";//$request->file('tdr')->store('public');

        if(isset($datosperfil["field_experiencia"]))
        {   $experiencia=$datosperfil["field_experiencia"];
            foreach($experiencia as $indexexp=>$valorexp)
            {
                $arrayexpe[$indexexp] = array('data_experiencia' => $valorexp);
            }
            $jsonexperiencia=json_encode($arrayexpe,JSON_UNESCAPED_UNICODE);
        }else{$jsonexperiencia=NULL;}

        if(isset($datosperfil["field_especialidad"]))
        { $formacion=$datosperfil["field_especialidad"];
            foreach($formacion as $indexform=>$valorform)
            {
                $arrayform[$indexform] = array('data_formacion' => $valorform);
            }
            $jsonformacion=json_encode($arrayform,JSON_UNESCAPED_UNICODE);
        }else{$jsonformacion=NULL;}

        if(isset($datosperfil["field_conocimiento"]))
        {$conocimiento=$datosperfil["field_conocimiento"];
            foreach($conocimiento as $indexcono=>$valorcono)
            {
                $arraycono[$indexcono] = array('data_conocimiento' => $valorcono);
            }
            $jsonconocimiento=json_encode($arraycono,JSON_UNESCAPED_UNICODE);
        }else{$jsonconocimiento=NULL;}


        
        
        

        // comprobamos si ingresaron en oficina nueva
        if($datosperfil["oficinaplaza"]<>null){$oficina=$datosperfil["oficinaplaza"];}// cuando la oficina fue ingresado
        else{$oficina=$datosperfil["nuevaoficina"];}


     //Guardar en Base de Datos

        // creamos sus datos del usuario
        DB::insert('insert into cas_puesto (cas_pue_oficina,cas_pue_puesto,cas_pue_remuneracion,cas_pue_cantidad_plazas,cas_pue_proceso_seleccion,idperfil,experiencia,formacion,conocimiento,tdr,certificado_habilidad) values (?,?,?,?,?,?,?,?,?,?,?)', [$oficina,$datosperfil["plazas"],$datosperfil["remuneracion"],$datosperfil["numplazas"],$datosperfil["idprocesos"],$datosperfil["perfilpostulante"],$jsonexperiencia,$jsonformacion,$jsonconocimiento,$ubicacionfile,$datosperfil["certificado"]]);
        //echo $numexp;
       //return response()->json($datosperfil);       
        return redirect('/publiconvocatoria');
    }
    public function cargaplazaseleccionada($id)//SELECT *FROM cas_puesto WHERE id_cas_puesto=1542
    {
        $puesto=DB::table('cas_puesto')->where('id_cas_puesto',$id)->get();//FROM cas_puesto ORDER BY cas_pue_oficina asc
        return response()->json($puesto);
    }

    public function editaplazas(Request $request)
    {
        $datosperfil = $request->all();

        $id=$datosperfil["idplaza"];// id de la plaza a modificar
        

        if(isset($datosperfil["field_experiencia"]))
        {   $experiencia=$datosperfil["field_experiencia"];      
            foreach($experiencia as $indexexp=>$valorexp)
            {
                $arrayexpe[$indexexp] = array('data_experiencia' => $valorexp);
            } 
             $jsonexperiencia=json_encode($arrayexpe,JSON_UNESCAPED_UNICODE);
        }else{$jsonexperiencia=NULL;}

         if(isset($datosperfil["field_especialidad"]))
         {
            $formacion=$datosperfil["field_especialidad"];
            foreach($formacion as $indexform=>$valorform)
            {
                $arrayform[$indexform] = array('data_formacion' => $valorform);
            }
            $jsonformacion=json_encode($arrayform,JSON_UNESCAPED_UNICODE);

         }else{$jsonformacion=NULL;}
        
          if(isset($datosperfil["field_conocimiento"]))
          {
            $conocimiento=$datosperfil["field_conocimiento"];
            foreach($conocimiento as $indexcono=>$valorcono)
            {
                $arraycono[$indexcono] = array('data_conocimiento' => $valorcono);
            }
            $jsonconocimiento=json_encode($arraycono,JSON_UNESCAPED_UNICODE);
          }else{$jsonconocimiento=NULL;}  
        

        // comprobamos si ingresaron en oficina nueva
        if($datosperfil["oficinadeplaza1"]<>null){$oficina=$datosperfil["oficinadeplaza1"];}// cuando la oficina fue ingresado
        else{$oficina=$datosperfil["nuevaoficina1"];}

        $plaza=$datosperfil["plazas1"];
        $numplazas=$datosperfil["numplazas1"];
        $remuneracion=$datosperfil["remuneracion1"];
        $perfilpostulante=$datosperfil["perfilpostulante1"]; 
        $certificado1=$datosperfil["certificado1"];



        $sql="UPDATE cas_puesto SET cas_pue_oficina='$oficina',cas_pue_puesto='$plaza',cas_pue_remuneracion=$remuneracion,cas_pue_cantidad_plazas=$numplazas,idperfil=$perfilpostulante,experiencia='$jsonexperiencia',formacion='$jsonformacion',conocimiento='$jsonconocimiento',certificado_habilidad='$certificado1' WHERE id_cas_puesto=".$id;
        $affected=DB::update($sql);
       //return response()->json($datosperfil);        
        return redirect('/publiconvocatoria');
    }

    public function formaacademica(Request $request)
    {
        $data = $request->all();
        $idplaza=$data["idplaza"];
        $idusuario=$data["idusuario"];
        $nivel=$data["pfacNivel"];
        $grado=$data["pfacGrado"];
        $especilaidad=$data["pfacEspecialidad_text"];
        $centroestudio=$data["pfacCentroEstudios"];
        $anioinicio=$data["pfacAnioInicio"];
        $aniofin=$data["pfacAnioFin"];
        $extension=$data["pfacFechaExtensionTitulo"];

        $ubicacionfila=$request->file('file')->store('public');



        // creamos sus datos del usuario
        DB::insert('insert into formacion (idusuario,idplaza,nivel,grado,especialidad,centro_estudio,anio_inicio,anio_fin,fecha_extension,archivo_formacion) values (?,?,?,?,?,?,?,?,?,?)', [$idusuario,$idplaza,$nivel,$grado,$especilaidad,$centroestudio,$anioinicio,$aniofin,$extension,$ubicacionfila]);

       //return response()->json($data);
        session()->flash('cargadonoti');
        $url='/formacionacademica/'.$idusuario.'/'.$idplaza;
       return redirect($url);
    }
    public function cargaformacionsleccionada($id)
    {
        $consulta=DB::table('formacion')->where('idformacion',$id)->orderBy('idformacion','DESC')->get();
        return response()->json($consulta);   
        
    }
    public function actualizarformaacademico(Request $request)
    {
        $data = $request->all();
        $id=$data["idregformacion"];
        $nivel=$data["editnivel"];
        $grado=$data["gradoedit"];
        $especialidad=$data["especialidadedit"];
        $centro_estudio=$data["centroestudioedit"];
        $anioini=$data["anioini"];
        $aniofin=$data["aniofin"];
        $fecha_extension=$data["fechaextensionedit"];
        $file=$request->file('fileforma');

        $idplaza=$data["idplazaedit"]; 
        $iduser=$data["iduser"];

        if($file<>null){
            $ubicacionfila=$request->file('fileforma')->store('public'); 
            $sql="UPDATE formacion SET nivel='$nivel',grado='$grado',especialidad='$especialidad',centro_estudio='$centro_estudio',anio_inicio='$anioini',anio_fin='$aniofin',fecha_extension='$fecha_extension', archivo_formacion='$ubicacionfila' WHERE idformacion=".$id;
        }
        else{
         $sql="UPDATE formacion SET nivel='$nivel',grado='$grado',especialidad='$especialidad',centro_estudio='$centro_estudio',anio_inicio='$anioini',anio_fin='$aniofin',fecha_extension='$fecha_extension'  WHERE idformacion=".$id;
        }

        $affected=DB::update($sql);

        session()->flash('actualizado');

       $url='/formacionacademica/'.$iduser.'/'.$idplaza;
       return redirect($url);
        //$url='/formacionacademica/'.$idusuario.'/'.$idplaza;
       //return redirect($url);
    }

    public function eliminarregsformacion($idreg,$iduser,$idplaza)
    {
        $sql="DELETE FROM formacion where idformacion=".$idreg;
        DB::delete($sql);
        session()->flash('cargaeliminado');
       $url='/formacionacademica/'.$iduser.'/'.$idplaza;
       return redirect($url);
    }

    public function formconcimiento(Request $request)
    {
        $data = $request->all();
        $idplaza=$data["idplaza"];
        $idusuario=$data["idusuario"];
        $idperfiledet=$data["idperfiledet"];
        $temas=$data["temas"];
        $pcesCentroEstudios=$data["pcesCentroEstudios"];
        $pcesFechaInicio=$data["pcesFechaInicio"];
        $pcesFechaFin=$data["pcesFechaFin"];
        $pcesDuracion=$data["pcesDuracion"];
        $pcesTipoConstancia=$data["pcesTipoConstancia"];

        $ubicacionfila=$request->file('file_ce')->store('public');



        // creamos sus datos del usuario
        DB::insert('insert into conocimiento (idusuario,idplaza,requerido,tema,centro_estudio,fecha_inicio,fecha_fin,duracion,tipo_sustento,archivo_concoimiento) values (?,?,?,?,?,?,?,?,?,?)', [$idusuario,$idplaza,$idperfiledet,$temas,$pcesCentroEstudios,$pcesFechaInicio,$pcesFechaFin,$pcesDuracion,$pcesTipoConstancia,$ubicacionfila]);

       //return response()->json($data);
        session()->flash('cargadonoti');
       $url='/conocimiento/'.$idusuario.'/'.$idplaza;
       return redirect($url);
    }
    public function cargaconocimientoleccionada($id)
    {
        $consulta=DB::table('conocimiento')->where('idconocimiento',$id)->orderBy('idconocimiento','DESC')->get();
        return response()->json($consulta);   
        
    }
     public function actualizaconocimiento(Request $request)
    {
        $data = $request->all();
        $id=$data["idregformacion"];
        $iduser=$data["iduser"];
        $idplaza=$data["idplazaedit"];


        $requerido=$data["requeridoedit"];
        $tema=$data["temaedit"];
        $centro_estudio=$data["centroestudioedit"];
        $anioini=$data["anioini"];
        $aniofin=$data["aniofin"];
        $nhoras=$data["nhoras"];
        $tiposustento=$data["tiposustento"];
        $file=$request->file('fileconoc');


        if($file<>null){

            $ubicacionfila=$request->file('fileconoc')->store('public');

            $sql="UPDATE conocimiento SET requerido='$requerido',tema='$tema',centro_estudio='$centro_estudio',fecha_inicio='$anioini',fecha_fin='$aniofin',duracion='$nhoras',tipo_sustento='$tiposustento', archivo_concoimiento='$ubicacionfila' WHERE idconocimiento=".$id;
        }
        else{
         $sql="UPDATE conocimiento SET requerido='$requerido',tema='$tema',centro_estudio='$centro_estudio',fecha_inicio='$anioini',fecha_fin='$aniofin',duracion='$nhoras',tipo_sustento='$tiposustento'  WHERE idconocimiento=".$id;
        }

        $affected=DB::update($sql);
        //return response()->json($data);
        session()->flash('actualizado');

       $url='/conocimiento/'.$iduser.'/'.$idplaza;
       return redirect($url);

    }
    public function eliminarregsconocimiento($idreg,$iduser,$idplaza)
    {
        $sql="DELETE FROM conocimiento where idconocimiento=".$idreg;
        DB::delete($sql);
        session()->flash('cargaeliminado');
       $url='/conocimiento/'.$iduser.'/'.$idplaza;
       return redirect($url);
    } 
    public function formexperiencia(Request $request)
    {
        $data = $request->all();
        $idplaza=$data["idplaza"];
        $idusuario=$data["idusuario"];

        $tipo_experiencia=$data["pelabTipoExperiencia"];
        $cargo=$data["pelabCargo_text"];
        $tipo_entidad=$data["pelabTipoEntidad"];
        $nombre_entidad=$data["pelabEmpresa"];
        $fecha_inicio=$data["FechaInicio"];
        $fecha_fin=$data["FechaFin"];


        $ubicacionfila=$request->file('file')->store('public');



        // creamos sus datos del usuario
        DB::insert('insert into experiencia (idusuario,idplaza,tipo_experiencia,cargo,tipo_entidad,nombre_entidad,fecha_inicio,fecha_fin,archivo_experiencia) values (?,?,?,?,?,?,?,?,?)', [$idusuario,$idplaza,$tipo_experiencia,$cargo,$tipo_entidad,$nombre_entidad,$fecha_inicio,$fecha_fin,$ubicacionfila]);

       //return response()->json($data);
        session()->flash('cargadonoti');
       $url='/experiencia/'.$idusuario.'/'.$idplaza;
       return redirect($url);
    }
    public function cargaexperiencialeccionada($id)
    {
        $consulta=DB::table('experiencia')->where('idexperiencia',$id)->orderBy('idexperiencia','DESC')->get();
        return response()->json($consulta);   
        
    }
  public function actualizaexperiencia(Request $request)
    {
        $data = $request->all();
        $id=$data["idregformacion"];
        $iduser=$data["iduser"];
        $idplaza=$data["idplazaedit"];


        $tipo_experiencia=$data["tipoexperiencia"];
        $cargo=$data["cargo"];
        $tipo_entidad=$data["tipoentidad"];
        $nombre_entidad=$data["nomentidad"];
        $fecha_inicio=$data["fechaini"];
        $fecha_fin=$data["fechafin"];
        $file=$request->file('fileexpe');


        if($file<>null){

            $ubicacionfila=$request->file('fileexpe')->store('public');

            $sql="UPDATE experiencia SET tipo_experiencia='$tipo_experiencia',cargo='$cargo',tipo_entidad='$tipo_entidad',nombre_entidad='$nombre_entidad',fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin',archivo_experiencia='$ubicacionfila' WHERE idexperiencia=".$id;
        }
        else{
         $sql="UPDATE experiencia SET tipo_experiencia='$tipo_experiencia',cargo='$cargo',tipo_entidad='$tipo_entidad',nombre_entidad='$nombre_entidad',fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin'  WHERE idexperiencia=".$id;
        }

        $affected=DB::update($sql);
        //return response()->json($data);
        session()->flash('actualizado');

       $url='/experiencia/'.$iduser.'/'.$idplaza;
       return redirect($url);

    }
    public function eliminarregsexperiencia($idreg,$iduser,$idplaza)
    {
        $sql="DELETE FROM experiencia where idexperiencia=".$idreg;
        DB::delete($sql);

        session()->flash('cargaeliminado');

       $url='/experiencia/'.$iduser.'/'.$idplaza;
       return redirect($url);
    } 
    public function formanexo(Request $request)
    {
        $data = $request->all();
        $idplaza=$data["idplaza"];
        $idusuario=$data["idusuario"];

        $nombreanexo[1]=$data["datofile1"];
        $nombreanexo[2]=$data["datofile2"];
        $nombreanexo[3]=$data["datofile3"];
        $nombreanexo[4]=$data["datofile4"];
        $nombreanexo[5]=$data["datofile5"];
        $nombreanexo[6]=$data["datofile6"];
        $nombreanexo[7]=$data["datofile7"];
        $nombreanexo[8]=$data["datofile8"];
        $nombreanexo[9]=$data["datofile9"];

        $ubicacionfila[1]=$request->file('file1')->store('public');
        $ubicacionfila[2]=$request->file('file2')->store('public');
        $ubicacionfila[3]=$request->file('file3')->store('public');
        $ubicacionfila[4]=$request->file('file4')->store('public');
        $ubicacionfila[5]=$request->file('file5')->store('public');
        $ubicacionfila[6]=$request->file('file6')->store('public');
        $ubicacionfila[7]=$request->file('file7')->store('public');
        $ubicacionfila[8]=$request->file('file8')->store('public');
        $ubicacionfila[9]=$request->file('file9')->store('public');



        // // creamos sus datos del usuario
        for($i=1;$i<=9;$i++)
        {
         DB::insert('insert into anexos (idusuario,idplaza,nombreanexo,archivo_anexo) values (?,?,?,?)', [$idusuario,$idplaza,$nombreanexo[$i],$ubicacionfila[$i]]);  
        }
        

       //return response()->json($data);
        session()->flash('cargadonoti');
       $url='/anexos/'.$idusuario.'/'.$idplaza;
       return redirect($url);
    }
    public function cargaanexoleccionada($id)
    {
        $consulta=DB::table('anexos')->where('idanexos',$id)->orderBy('idanexos','DESC')->get();
        return response()->json($consulta);   
        
    }

    public function actualizaanexo(Request $request)
    {
        $data = $request->all();
        $id=$data["idregformacion"];
        $iduser=$data["iduser"];
        $idplaza=$data["idplazaedit"];


        $anexosedit=$data["anexosedit"];

        $file=$request->file('fileexpe');


        if($file<>null){

            $ubicacionfila=$request->file('fileexpe')->store('public');

            $sql="UPDATE anexos SET nombreanexo='$anexosedit',archivo_anexo='$ubicacionfila' WHERE idanexos=".$id;
        }
        else{
         $sql="UPDATE anexos SET nombreanexo='$anexosedit' WHERE idanexos=".$id;
        }

        $affected=DB::update($sql);
        //return response()->json($data);
        session()->flash('actualizado');

       $url='/anexos/'.$iduser.'/'.$idplaza;
       return redirect($url);

    }
    public function eliminarregsanexo($idreg,$iduser,$idplaza)
    {
        $sql="DELETE FROM anexos where idanexos=".$idreg;
        DB::delete($sql);

       $url='/anexos/'.$iduser.'/'.$idplaza;
       return redirect($url);
    }

    public function resufile($iduser,$idplaza)
    {
        $datospersona=DB::table('user_conv_detalle')->join('ubdistrito','user_conv_detalle.dom_distrito','=','ubdistrito.idDist')->where('iduser',$iduser)->get();
        $formacion=DB::table('formacion')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idformacion','DESC')->get();
        $datacono=DB::table('conocimiento')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idconocimiento','DESC')->get();
        $dataexpe=DB::table('experiencia')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('tipo_experiencia','DESC')->get();
        //$dataanexo=DB::table('anexos')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idanexos','DESC')->get();

        //$data=array('adatos'=>$datospersona,'bformacion'=>$formacion,'cexperiencia'=>$dataexpe,'dcapacitacion'=>$datacono,'eanexo'=>$dataanexo);
        if($datospersona->count()>0 and $formacion->count()>0 and $datacono->count()>0 and $dataexpe->count()>0)

        {$pdf=\PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView ('resumenfile',compact('datospersona','formacion','datacono','dataexpe'));
         $pdf->setPaper('A4', 'landscape');
         return $pdf->stream();
        }
       else{
        session()->flash('alert-danger', 'Algunos requisitos falta ingresar como(Formación, experiencia, cursos y/o capacitaciones)');
        return back();
       }

        //return response()->json($data);
        //return view('resumenfile');
 
    }
    public function enviarinsc($iduser,$idplaza)
    {
       $dataanexo=DB::table('anexos')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->orderBy('idanexos','ASC')->get(); 
       $formacion=DB::table('formacion')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->get();
       $experiencia=DB::table('experiencia')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->get();
       $conocimiento=DB::table('conocimiento')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->get();
       $archivoscargados=DB::table('docsus_personal')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->get();
       $colegiatura_dat=DB::table('colegiatura')->where(['idusuario'=>$iduser,'idplaza'=>$idplaza])->get();
       $envioinscripcion=DB::table('envioinscripcion')->where(['iduser'=>$iduser,'plaza'=>$idplaza,'activo'=>1])->get();

       if(count($envioinscripcion)>0)
       {
        $activo=1;//proceso enviado la inscripcion
       }
       else{
        $activo=0;// aun no se envio la inscripcion o para actualizarse
       }

       //return response()->json($dataanexo);
         
        return view('enviar',compact('dataanexo','formacion','experiencia','conocimiento','archivoscargados','colegiatura_dat','activo'));
    }
    public function formenviarinsc(Request $request)
    {
        $data = $request->all();

        $fechaactual=date('Y-m-d H:i:s');

        $idplaza=$data["idplaza"];
        $iduser=$data["idusuario"];

        $proceso=DB::table('cas_puesto')->where('id_cas_puesto',$idplaza)->get();
        $bombreproceso=$proceso[0]->cas_pue_proceso_seleccion;

        DB::insert('insert into envioinscripcion (iduser,proceso,plaza,fechaenvio) values (?,?,?,?)', [$iduser,$bombreproceso,$idplaza,$fechaactual]);


        //return response()->json($data);

        //$request->session()->flash('alert-success', 'Su postulación ha sido registrado satisfactoriamente');

      //return view('mensageenviado');
       // $url='/anexos/'.$iduser.'/'.$idplaza;
        session()->flash('alert-success', 'Fue enviada su postulación exitosamente');
       return redirect('/resultadoenv');

    }
    public function resultadoenv()
    {   // hacemnos la consulta que si ya se inscrivieron
         $iduser=auth()->user()->id;
        $result=DB::table('envioinscripcion')->join('user_conv_detalle','envioinscripcion.iduser','=','user_conv_detalle.iduser')->where('envioinscripcion.iduser',$iduser)->get();

        $nomuser=$result[0]->nombres;
        $appat=$result[0]->ap_paterno;
        $apmat=$result[0]->ap_materno;
        $dni=$result[0]->num_doc;
        $direccion=$result[0]->direccion;
        $nomape=$nomuser.' '.$appat.' '.$apmat;

        session()->put('nomape', $nomape);
        session()->put('dni', $dni);
        session()->put('direccion', $direccion);



        
        return view('mensageenviado');
    }
    public function postulacion($idp,$nombre,$ofi,$remu,$idperfil)
    {
            session()->put('idpos', $idp);
            session()->put('nomplaza', $nombre);
            session()->put('ofi', $ofi);
            session()->put('remu', $remu);
            session()->put('idperfil', $idperfil);

            $procesocasactual=DB::table('cas_puesto')->join('cas_proceso_seleccion','cas_puesto.cas_pue_proceso_seleccion','=','cas_proceso_seleccion.id_proc_sel_cas')->where('id_cas_puesto',$idp)->get();
            $idprocesoactual=$procesocasactual[0]->cas_pue_proceso_seleccion;
            $nomprecesosesion=$procesocasactual[0]->proc_sel_cas_descripcion;

            session()->put('nomprecesosesion', $nomprecesosesion);



            $iduser=auth()->user()->id;
            $consultainscr=DB::table('envioinscripcion')->where(['iduser'=>$iduser,'proceso'=>$idprocesoactual])->get(); 

            if($consultainscr->count()>0)
            {$idprocesopostulado=$consultainscr[0]->proceso;
                if($idprocesopostulado){
               session()->put('procesopostulado', $idprocesopostulado); 
                }
            }

            

            session()->put('procesoactual', $idprocesoactual);

            

            return redirect('/main');
    }

 public function formsustentatorio(Request $request)
    {
        $data = $request->all();

        $iduser=$data["idusuario"];
        $idplaza=$data["idplaza"];


        $sustentos=$data["sustentos"];

         $ubicacionfila=$request->file('file')->store('public');
         $fechaactual=date('Y-m-d H:i:s');



        // creamos sus datos del usuario
        DB::insert('insert into docsus_personal (idusuario,idplaza,sustento,archivo,fecha) values (?,?,?,?,?)', [$iduser,$idplaza,$sustentos,$ubicacionfila,$fechaactual]);

       // return response()->json($data);

       // $url='/anexos/'.$iduser.'/'.$idplaza;
       // return redirect($url);
        session()->flash('cargadonoti');
        return redirect('/datospersonales');

    }
    public function cargadocussustento($id)
    {

        $consulta=DB::table('docsus_personal')->where('idusuario',$id)->orderBy('iddocpersonal','DESC')->get();
        return response()->json($consulta);
    }
    
     public function eliminardocsustento($idreg,$iduser,$idplaza)
    {
        $sql="DELETE FROM docsus_personal where iddocpersonal=".$idreg;
        DB::delete($sql);

       //$url='/anexos/'.$iduser.'/'.$idplaza;
        session()->flash('cargaeliminado');
       return redirect('/datospersonales');
    }

    public function descargacargo($id)
    {
        // hacemnos la consulta que si ya se inscrivieron
         $iduser=auth()->user()->id;
        $result=DB::table('envioinscripcion')->join('user_conv_detalle','envioinscripcion.iduser','=','user_conv_detalle.iduser')->join('cas_puesto','envioinscripcion.plaza','=','cas_puesto.id_cas_puesto')->where(['envioinscripcion.iduser'=>$iduser,'plaza'=>$id])->get();

        $nomuser=$result[0]->nombres;
        $appat=$result[0]->ap_paterno;
        $apmat=$result[0]->ap_materno;
       
        $nomape=$nomuser.' '.$appat.' '.$apmat;
        $dni=$result[0]->num_doc;
        $direccion=$result[0]->direccion;



        // $nomproceso=Session('nomprecesosesion');
        // $nombreplaza=Session('nomplaza');
        // $nombreoficina=Session('ofi');
        // \QrCode::size(500)
        //     ->format('png')
        //     ->generate('www.google.com', public_path('images/qrcode.png'));

         $idpro=$result[0]->proceso;

         $proceso=DB::table('cas_proceso_seleccion')->where('id_proc_sel_cas',$idpro)->get();

         $nomproceso=$proceso[0]->proc_sel_cas_descripcion;

         $nombreplaza=$result[0]->cas_pue_puesto;
         $nombreoficina=$result[0]->cas_pue_oficina;

        // session()->put('nomape', $nomape);
        // session()->put('dni', $dni);
        // session()->put('direccion', $direccion);
        $datoscargo = array('nomproceso' => $nomproceso,'nomplaza' => $nombreplaza,'ofi' => $nombreoficina,'nomape' => $nomape ,'dni' => $dni,'direccion' => $direccion );


        $pdf=\PDF::loadView ('descargacargo',compact('datoscargo'));
       return $pdf->stream();
    }
    
    public function mispostulaciones()
    {
        $user=auth()->user()->id;
        $mispostulaciones=DB::table('envioinscripcion')->join('user_conv_detalle','envioinscripcion.iduser','=','user_conv_detalle.iduser')->join('cas_puesto','envioinscripcion.plaza','=','cas_puesto.id_cas_puesto')->where('envioinscripcion.iduser',$user)->orderBy('idenvioinsc','desc')->get();

        // resultados para el proceso cas 004-2020.... que corresponde en BD 98
         //return response()->json($datos);
         return view('mispostulaciones',compact('mispostulaciones'));
    }
    
    public function inscritos()
    {
        $inscritos=DB::table('envioinscripcion')->join('user_conv_detalle','envioinscripcion.iduser','=','user_conv_detalle.iduser')->join('cas_puesto','envioinscripcion.plaza','=','cas_puesto.id_cas_puesto')->where('proceso',115)->orderBy('idenvioinsc','desc')->get();

        // resultados para el proceso cas 004-2020.... que corresponde en BD 98
         //return response()->json($datos);
         return view('inscritos',compact('inscritos'));
    }

    public function primeraevaluacion()
    {
        $inscritos=DB::table('envioinscripcion')->join('user_conv_detalle','envioinscripcion.iduser','=','user_conv_detalle.iduser')->join('cas_puesto','envioinscripcion.plaza','=','cas_puesto.id_cas_puesto')->where('proceso',115)->orderBy('idenvioinsc','desc')->get();

        $data_evalcurricular=DB::table('evaluacion_curricular')->join('cas_puesto','evaluacion_curricular.idplaza','=','cas_puesto.id_cas_puesto')->where('cas_pue_proceso_seleccion',115)->get();

        // resultados para el proceso cas 004-2020.... que corresponde en BD 98
         //return response()->json($datos);
         return view('primeraevaluacion',compact('inscritos','data_evalcurricular'));
    }
    public function evalcurricular($id)
    {
        $inscritos=DB::table('envioinscripcion')->join('user_conv_detalle','envioinscripcion.iduser','=','user_conv_detalle.iduser')->join('cas_puesto','envioinscripcion.plaza','=','cas_puesto.id_cas_puesto')->where('idenvioinsc',$id)->orderBy('idenvioinsc','desc')->get();

        $idperfil=$inscritos[0]->idperfil;
        $departamento=$inscritos[0]->dom_deparatmento;
        $pronvincia=$inscritos[0]->dom_provincia;
        $istrito=$inscritos[0]->dom_distrito;

        $iduser=$inscritos[0]->iduser;
        $plaza=$inscritos[0]->plaza;

        $anexos=DB::table('anexos')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();
        $formaciondata=DB::table('formacion')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();
        $exprienciadata=DB::table('experiencia')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->orderBy('tipo_experiencia','DESC')->get();
        $conocimientodata=DB::table('conocimiento')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();
        $documentosdata=DB::table('docsus_personal')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();

        $domiciliodistrito=DB::table('ubdistrito')->where('idDist',$istrito)->get();
        $domiciliopronvincia=DB::table('ubprovincia')->where('idProv',$pronvincia)->get();
        $domiciliodepartamento=DB::table('ubdepartamento')->where('idDepa',$departamento)->get();

        $perfil=DB::table('detalle_perfil')->join('perfiles_convocatoria','detalle_perfil.id_perfil','=','perfiles_convocatoria.idperfil')->where('id_perfil',$idperfil)->orderBy('iddetalle_perfil','asc')->get();

         $colegiatura_data=DB::table('colegiatura')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();

        //echo $plaza;

        // resultados para el proceso cas 004-2020.... que corresponde en BD 98
        //return response()->json($formacion);
        return view('evalcurricular',compact('inscritos','perfil','domiciliodistrito','domiciliopronvincia','domiciliodepartamento','anexos','formaciondata','exprienciadata','conocimientodata','documentosdata','colegiatura_data'));
    }
    public function inserevalcurricular(Request $request)
    {
        $data = $request->all();

        $iduser=$data["iduser"];
        $idplaza=$data["idplaza"];

        $folios_cump=$data["folios_cump"];
        $anexos_cump=$data["anexos_cump"];
        $formacion_acad=$data["formacion_acad"];
        $conocimiento_cump=$data["conocimiento_cump"];
        $experiencia_cump=$data["experiencia_cump"];
        $docuadjunto_cump=$data["docuadjunto_cump"];
        $arraypuntages=$data["arraypuntages"];
        $puntage=$data["puntage"];
        $obs=$data["obs"];

        $idusereval=auth()->user()->id;

        //$experiencia=$datosperfil["field_experiencia"];      
            foreach($arraypuntages as $indexexp=>$valorexp)
            {
                $arrayexpe[$indexexp] = array('data_puntages' => $valorexp);
            } 
             $jsonpuntage=json_encode($arrayexpe,JSON_UNESCAPED_UNICODE);



          $fechaactual=date('Y-m-d H:i:s');



        // creamos sus datos del usuario
        DB::insert('insert into evaluacion_curricular (iduser,idplaza,folios,anexos_cump,formacion_cump,conocimiento_cump,experiencia_cump,docadjunto,arraypontage,puntagetotal,observacion,fecha,usereval) values (?,?,?,?,?,?,?,?,?,?,?,?,?)', [$iduser,$idplaza,$folios_cump,$anexos_cump,$formacion_acad,$conocimiento_cump,$experiencia_cump,$docuadjunto_cump,$jsonpuntage,$puntage,$obs,$fechaactual,$idusereval]);

       //return response()->json($data);

       session()->flash('alert-success', 'Fue guardado satisfactoriamente la evaluación curricular');
        //return back();

       $url='/primeraevaluacion';
       return redirect($url);
        //return redirect('/main');

    }
    public function fichacurricular($id)
    {   
        $ficha=DB::table('evaluacion_curricular')->join('cas_puesto','evaluacion_curricular.idplaza','=','cas_puesto.id_cas_puesto')->join('user_conv_detalle','evaluacion_curricular.iduser','=','user_conv_detalle.iduser')->where('idevalcurricular',$id)->get();

        $id_plaza=$ficha[0]->idplaza;
        $idperfil=$ficha[0]->idperfil;
        //echo $nomproceso;

        $nomproceso=DB::table('cas_puesto')->join('cas_proceso_seleccion','cas_puesto.cas_pue_proceso_seleccion','=','cas_proceso_seleccion.id_proc_sel_cas')->where('id_cas_puesto',$id_plaza)->get();

        $perfil=DB::table('detalle_perfil')->join('perfiles_convocatoria','detalle_perfil.id_perfil','=','perfiles_convocatoria.idperfil')->where('id_perfil',$idperfil)->orderBy('iddetalle_perfil','asc')->get();

        $pdf=\PDF::loadView ('fichaevalcurricular',compact('ficha','nomproceso','perfil'));
       return $pdf->stream();
    }
    public function editarcurricular($id)
    {   
        $inscritos=DB::table('envioinscripcion')->join('user_conv_detalle','envioinscripcion.iduser','=','user_conv_detalle.iduser')->join('cas_puesto','envioinscripcion.plaza','=','cas_puesto.id_cas_puesto')->where('idenvioinsc',$id)->orderBy('idenvioinsc','desc')->get();

        $idperfil=$inscritos[0]->idperfil;
        $departamento=$inscritos[0]->dom_deparatmento;
        $pronvincia=$inscritos[0]->dom_provincia;
        $istrito=$inscritos[0]->dom_distrito;

        $iduser=$inscritos[0]->iduser;
        $plaza=$inscritos[0]->plaza;

        $anexos=DB::table('anexos')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();
        $formaciondata=DB::table('formacion')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();
        $exprienciadata=DB::table('experiencia')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();
        $conocimientodata=DB::table('conocimiento')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();
        $documentosdata=DB::table('docsus_personal')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();

        $domiciliodistrito=DB::table('ubdistrito')->where('idDist',$istrito)->get();
        $domiciliopronvincia=DB::table('ubprovincia')->where('idProv',$pronvincia)->get();
        $domiciliodepartamento=DB::table('ubdepartamento')->where('idDepa',$departamento)->get();

        $perfil=DB::table('detalle_perfil')->join('perfiles_convocatoria','detalle_perfil.id_perfil','=','perfiles_convocatoria.idperfil')->where('id_perfil',$idperfil)->orderBy('iddetalle_perfil','asc')->get();

        $editacurricular_data=DB::table('evaluacion_curricular')->where(['iduser'=>$iduser,'idplaza'=>$plaza])->get();

        $colegiatura_data=DB::table('colegiatura')->where(['idusuario'=>$iduser,'idplaza'=>$plaza])->get();

        //echo $plaza;

        // resultados para el proceso cas 004-2020.... que corresponde en BD 98
        //return response()->json($formacion);
        //return $anexos;        
        return view('editaevalcurricular',compact('inscritos','perfil','domiciliodistrito','domiciliopronvincia','domiciliodepartamento','anexos','formaciondata','exprienciadata','conocimientodata','documentosdata','editacurricular_data','colegiatura_data'));
    }
    
    public function updateevalcurricular(Request $request)
    {
        $data = $request->all();

        $iduser=$data["iduser"];
        $idplaza=$data["idplaza"];

        $folios_cump=$data["folios_cump"];
        $anexos_cump=$data["anexos_cump"];
        $formacion_acad=$data["formacion_acad"];
        $conocimiento_cump=$data["conocimiento_cump"];
        $experiencia_cump=$data["experiencia_cump"];
        $docuadjunto_cump=$data["docuadjunto_cump"];
        $arraypuntages=$data["arraypuntages"];
        $puntage=$data["puntage"];
        $obs=$data["obs"];

        //$idenvioinscedit=$data["idenvioinscedit"];
        $idusereval=auth()->user()->id;

             
            foreach($arraypuntages as $indexexp=>$valorexp)
            {
                $arrayexpe[$indexexp] = array('data_puntages' => $valorexp);
            } 
             $jsonpuntage=json_encode($arrayexpe,JSON_UNESCAPED_UNICODE);



          $fechaactual=date('Y-m-d H:i:s');

          $sql="UPDATE evaluacion_curricular SET folios='$folios_cump',anexos_cump='$anexos_cump',formacion_cump='$formacion_acad',conocimiento_cump='$conocimiento_cump',experiencia_cump='$experiencia_cump',docadjunto='$docuadjunto_cump',arraypontage='$jsonpuntage',puntagetotal='$puntage',observacion='$obs',fecha='$fechaactual', usereval='$idusereval' where iduser=$iduser and idplaza=$idplaza";

          $affected=DB::update($sql);
        // // creamos sus datos del usuario
        // DB::insert('insert into evaluacion_curricular (iduser,idplaza,folios,anexos_cump,formacion_cump,conocimiento_cump,experiencia_cump,docadjunto,arraypontage,puntagetotal,observacion,fecha) values (?,?,?,?,?,?,?,?,?,?,?,?)', [$iduser,$idplaza,$folios_cump,$anexos_cump,$formacion_acad,$conocimiento_cump,$experiencia_cump,$docuadjunto_cump,$jsonpuntage,$puntage,$obs,$fechaactual]);

       //return response()->json($data);

       session()->flash('alert-success', 'Fue Actualizado satisfactoriamente la evaluación curricular');
        //return back();

       $url='/primeraevaluacion';
       return redirect($url);

    }
    public function formsustentatoriocargar(Request $request)
    {
        $data = $request->all();

        //$data = $request->all();

        $iduser=$data["iduser"];
        $idplaza=$data["idplaza"];

        $idinscr=$data["idenvioinscedit"];


        $sustentos=$data["sustentos"];

         $ubicacionfila=$request->file('file')->store('public');
         $fechaactual=date('Y-m-d H:i:s');



        // creamos sus datos del usuario
        DB::insert('insert into docsus_personal (idusuario,idplaza,sustento,archivo,fecha) values (?,?,?,?,?)', [$iduser,$idplaza,$sustentos,$ubicacionfila,$fechaactual]);

       session()->flash('alert-success', 'Fue guardado satisfactoriamente el documento sustentantorio');

        $url='/editarcurricular/'.$idinscr;
       return redirect($url);
        //return redirect('/main');
        

       // return response()->json($data);
    }
    public function actualizaravatar(Request $request)
    {
        $data = $request->all();

       //$ubicacionfila=$request->file('avatar')->store('public');

        if($request->hasfile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(160, 160)->save( public_path('/uploads/avatars/' . $filename) );
        }

        $dirimagen="uploads/avatars/".$filename;
        $iduser=$data["iduser"];

        $sql="UPDATE users set  avatar='$dirimagen' WHERE id=$iduser";

        $procesocas=DB::update($sql);

        return back();
    
    }

    public function relacionplaza()
    {
        $datosplazas=DB::table('cas_puesto')->join('cas_proceso_seleccion','cas_puesto.cas_pue_proceso_seleccion','=','cas_proceso_seleccion.id_proc_sel_cas')->where(['id_ejecutora'=>1,'cas_proc_sel_estado'=>1])->orderByRaw('id_cas_puesto DESC')->get();

        return view('relacionplaza',compact('datosplazas'));
    }

    public function cargacolegiatura(Request $request)
    {
        $data = $request->all();

        $colegiatura=$request->file('colegiatura')->store('public');

        $idplaza=$data["idplaza"];
        $idusuario=$data["idusuario"];
        $fechaactual=date('Y-m-d H:i:s');
        $Colegiatura=$data["Colegiatura"];

         DB::insert('insert into colegiatura (idplaza,idusuario,detalle_colegiatura,fecha,archivo) values (?,?,?,?,?)', [$idplaza,$idusuario,$Colegiatura,$fechaactual,$colegiatura]);

         session()->flash('cargadonoti');
        return back();
        //return $data;
    
    }
    public function eliminarregscolegiatura($idreg,$iduser,$idplaza)
    {
        $sql="DELETE FROM colegiatura where idcolegiatura=".$idreg;
        DB::delete($sql);

        session()->flash('cargaeliminado');

       $url='/formacionacademica/'.$iduser.'/'.$idplaza;
       return redirect($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(personal $personal)
    {
        //
    }
}
