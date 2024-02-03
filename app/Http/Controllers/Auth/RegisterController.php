<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' =>'uploads/avatars/default.png',
        ]);
    }

    protected function recuperacionclave(Request $request)
    {
        //dd($request->all());
        $correo=$request->email;
        $dni=$request->dni;

        $datosverifcado=DB::table('user_conv_detalle')->join('users','user_conv_detalle.iduser','=','users.id')->where(['email'=>$correo,'num_doc'=>$dni])->get();
        $idUer=@$datosverifcado[0]->id;

        if(count($datosverifcado)>0)
        {
            $mensage='Los datos proporcionados fueron correctos';
            $identificador=1;
        }
        else{
            $mensage='Los datos ingresados no coinciden con los registrados en nuestra Base de Datos, intente nuevamente';
            $identificador=0;
        }
        
        return view('auth.passwords.reset',compact('identificador','mensage','correo','idUer'));
         
    }
    protected function nuevaclave(Request $request)
    {
        $iduser=$request->id;
        $correo=$request->email;
        $pass= Hash::make($request->password);

        $cambio=DB::update('update users set email = ?,password=? where id = ?', [$correo,$pass,$iduser]);

        session()->flash('alert-success', 'Fue actualizado la contraseña');

        $url='/login';
       return redirect($url);
    }
}
