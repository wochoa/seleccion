<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // aqui tiene que cargar
        // definimos los niveles de acceso por los usuarios(administrador,evaluador,postulante)

       


       switch (auth()->user()->nivel) {
              case '1':// nivel administrador
                 return view('administracion');
                break;
              case '2':// nivel evaluador
                return redirect('/inscritos');
                //return view('/evaluador');
                break;
                default:// nivel postulante

                return view('main');

            }

        

        //return view('main');
    }
    public function departamento($id)
    {
        $data=DB::table('ubdepartamento')->get();
        return response()->json($data);
    }
    public function provincias($id)
    {
        $provincias=DB::table('ubprovincia')->where('idDepa',$id)->get();
        return response()->json($provincias);
    }
    public function distrito($id)
    {
        $distritos=DB::table('ubdistrito')->where('idProv',$id)->get();
        return response()->json($distritos);
    }

}
