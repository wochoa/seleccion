<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');  datospersonales
// });


Auth::routes();

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('storage/{file}', function ($file)
{

$rutaDeArchivo = storage_path().'/app/public/'.$file;
 //return $rutaDeArchivo;
 return response()->file($rutaDeArchivo);
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','PersonalController@index')->name('inicio');
Route::get('/main', 'HomeController@index')->name('home');
Route::get('/departamento/{id}','HomeController@departamento')->name('departamento');
Route::get('/provincia/{id}','HomeController@provincias')->name('provincias');
Route::get('/distrito/{id}','HomeController@distrito')->name('distrito');

Route::post('/detalledatospersonales','PersonalController@store')->name('detalledatospersonales');
Route::get('/cargadatospersona/{id}','PersonalController@cargadatospersona')->name('cargadatospersona');

// cargamos las plazas de la convocatoria
Route::get('/plazasconvocatoria/{id}','PersonalController@plazasconvocatoria')->name('plazasconvocatoria');




Route::get('/datospersonales','PersonalController@datospersonales')->name('datospersonales'); 
Route::get('/formacionacademica/{iduser}/{idplaza}','PersonalController@formacionacademica')->name('formacionacademica');
Route::get('/conocimiento/{iduser}/{idplaza}','PersonalController@conocimiento')->name('conocimiento');
Route::get('/experiencia/{iduser}/{idplaza}','PersonalController@experiencia')->name('experiencia');
Route::get('/anexos/{iduser}/{idplaza}','PersonalController@anexos')->name('anexos');


// cuando los usuarios ingresan haceindo click en el enlace postular
Route::get('/postulacion/{idp}/{nombre}/{ofi}/{remu}/{idperfil}','PersonalController@postulacion')->name('postulacion');


// formacion academica
Route::post('/formaacademica','PersonalController@formaacademica')->name('formaacademica');
Route::get('/cargaformacionsleccionada/{id}','PersonalController@cargaformacionsleccionada')->name('cargaformacionsleccionada'); 
Route::post('/actualizarformaacademico','PersonalController@actualizarformaacademico')->name('actualizarformaacademico');
Route::get('/eliminarregsformacion/{idreg}/{iduser}/{idplaza}','PersonalController@eliminarregsformacion')->name('eliminarregsformacion');

// conocimiento
Route::post('/formconcimiento','PersonalController@formconcimiento')->name('formconcimiento'); 
Route::get('/cargaconocimientoleccionada/{id}','PersonalController@cargaconocimientoleccionada')->name('cargaconocimientoleccionada'); 
Route::post('/actualizaconocimiento','PersonalController@actualizaconocimiento')->name('actualizaconocimiento');
Route::get('/eliminarregsconocimiento/{idreg}/{iduser}/{idplaza}','PersonalController@eliminarregsconocimiento')->name('eliminarregsconocimiento');

// experiencia
Route::post('/formexperiencia','PersonalController@formexperiencia')->name('formexperiencia');
Route::get('/cargaexperiencialeccionada/{id}','PersonalController@cargaexperiencialeccionada')->name('cargaexperiencialeccionada'); 
Route::post('/actualizaexperiencia','PersonalController@actualizaexperiencia')->name('actualizaexperiencia');
Route::get('/eliminarregsexperiencia/{idreg}/{iduser}/{idplaza}','PersonalController@eliminarregsexperiencia')->name('eliminarregsexperiencia');

//anexos 
Route::post('/formanexo','PersonalController@formanexo')->name('formanexo'); 
Route::get('/cargaanexoleccionada/{id}','PersonalController@cargaanexoleccionada')->name('cargaanexoleccionada');
Route::post('/actualizaanexo','PersonalController@actualizaanexo')->name('actualizaanexo'); 
Route::get('/eliminarregsanexo/{idreg}/{iduser}/{idplaza}','PersonalController@eliminarregsanexo')->name('eliminarregsanexo');

// enlaces para usuarios de administrador

Route::get('/publiconvocatoria','PersonalController@procesoconvocatoria')->name('procesoconvocatoria');
Route::get('/eliminaproceso/{id}','PersonalController@eliminaproceso')->name('eliminaproceso');//eliminaproceso

Route::post('/procesoeditar','PersonalController@procesoeditar')->name('procesoeditar');//procesoeditar
Route::get('/cargaprocesoeditar/{id}','PersonalController@cargaprocesoeditar')->name('cargaprocesoeditar');//cargaprocesoeditar
Route::get('/desactivarproceso/{id}','PersonalController@desactivarproceso')->name('desactivarproceso');
Route::get('/activarproceso/{id}','PersonalController@activarproceso')->name('activarproceso');
Route::post('/nuevoproceso','PersonalController@nuevoproceso')->name('nuevoproceso');
Route::get('/cargarplzasporconvo/{id}','PersonalController@cargarplzasporconvo')->name('cargarplzasporconvo');

Route::get('/perfiles','PersonalController@perfiles')->name('perfiles');
Route::get('/cargaprocesoparaperfiles','PersonalController@cargaprocesoparaperfiles')->name('cargaprocesoparaperfiles');
Route::post('/nuevoperfil','PersonalController@nuevoperfil')->name('nuevoperfil');
Route::get('/perfilescreados','PersonalController@perfilescreados')->name('perfilescreados');// carga los perfiles despues de haber creados para autocarga
Route::get('/cargadetalleperfil/{id}','PersonalController@cargadetalleperfil')->name('cargadetalleperfil');// carga los detalles de perfiles creaddos
Route::post('/nuevodetalleperfil','PersonalController@nuevodetalleperfil')->name('nuevodetalleperfil');
Route::get('/cargadetalleparaeditar/{id}','PersonalController@cargadetalleparaeditar')->name('cargadetalleparaeditar');
Route::post('/actualizadetalleperfil','PersonalController@actualizadetalleperfil')->name('actualizadetalleperfil');
Route::get('/eliminardetalleperfil/{id}','PersonalController@eliminardetalleperfil')->name('eliminardetalleperfil');
Route::get('/cargaperfileditar/{id}','PersonalController@cargaperfileditar')->name('cargaperfileditar');
Route::post('/actualizaperfil','PersonalController@actualizaperfil')->name('actualizaperfil');
Route::get('/eliminarperfil/{id}','PersonalController@eliminarperfil')->name('eliminarperfil');  
Route::get('/cargaoficinas','PersonalController@cargaoficinas')->name('cargaoficinas');
Route::post('/nuevasplazas','PersonalController@nuevasplazas')->name('nuevasplazas');
Route::get('/cargaplazaseleccionada/{id}','PersonalController@cargaplazaseleccionada')->name('cargaplazaseleccionada'); 
Route::post('/editaplazas','PersonalController@editaplazas')->name('editaplazas');
Route::get('/eliminarplaza/{id}','PersonalController@eliminarplaza')->name('eliminarplaza'); 


// vistas para resumen file
// Route::get('/resufile',function(){
// 	$pdf=PDF::loadView('resumenfile');
// 	return $pdf->download();
// 	//return view('resumenfile');
// });

Route::get('/resufile/{iduser}/{idplaza}','PersonalController@resufile')->name('resufile');

Route::get('/enviarinsc/{iduser}/{idplaza}','PersonalController@enviarinsc')->name('enviarinsc');
Route::post('/formenviarinsc','PersonalController@formenviarinsc')->name('formenviarinsc');
Route::get('/resultadoenv','PersonalController@resultadoenv')->name('resultadoenv');

Route::post('/formsustentatorio','PersonalController@formsustentatorio')->name('formsustentatorio');
Route::get('/cargadocussustento/{id}','PersonalController@cargadocussustento')->name('cargadocussustento');
Route::get('/eliminardocsustento/{idreg}/{iduser}/{idplaza}','PersonalController@eliminardocsustento')->name('eliminardocsustento');

Route::get('/descargacargo/{id}','PersonalController@descargacargo')->name('descargacargo');


/*  PARA VER MIS POSTULACIONES*/
Route::get('/mispostulaciones','PersonalController@mispostulaciones')->name('mispostulaciones');
/*
seccion para evaluador
*/
Route::get('/inscritos','PersonalController@inscritos')->name('inscritos');
Route::get('/primeraevaluacion','PersonalController@primeraevaluacion')->name('primeraevaluacion');
Route::get('/evalcurricular/{id}','PersonalController@evalcurricular')->name('evalcurricular');
Route::post('/inserevalcurricular','PersonalController@inserevalcurricular')->name('inserevalcurricular');
Route::get('/fichacurricular/{id}','PersonalController@fichacurricular')->name('fichacurricular');
Route::get('/editarcurricular/{id}','PersonalController@editarcurricular')->name('editarcurricular');
Route::post('/updateevalcurricular','PersonalController@updateevalcurricular')->name('updateevalcurricular');

// para subsanar ficha ruc, etc
Route::post('/formsustentatoriocargar','PersonalController@formsustentatoriocargar')->name('formsustentatoriocargar');

// actualizar avatar


Route::post('/actualizaravatar','PersonalController@actualizaravatar')->name('actualizaravatar');
Route::get('/relacionplaza','PersonalController@relacionplaza')->name('relacionplaza');

Route::post('/cargacolegiatura','PersonalController@cargacolegiatura')->name('cargacolegiatura');
Route::get('/eliminarregscolegiatura/{idreg}/{iduser}/{idplaza}','PersonalController@eliminarregscolegiatura')->name('eliminarregscolegiatura');

// RECUPERAR  CONTRASENAS

route::post('/password/reset','Auth\RegisterController@recuperacionclave')->name('recuperacionclave');
route::post('/nuevaclave','Auth\RegisterController@nuevaclave')->name('nuevaclave');
