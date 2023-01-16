<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Auth\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class InicioSesion extends Controller
{
    //

    public function login(Request $request){

        $username = $request->username;
        $password = $request->password;
        $empresa = 0;


        return view('menu');

        /*
        // CONFIRMO QUE TENGO LOS DATOS DE INICIO DE SESION QUE NECESITO
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        // PREPARO EL CUERPO DEL ENVIO
        $body = [
            'usuario' => $username,
            'passwd' => $password,
            'empresa' => $empresa,
        ];

        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'LoginCliente',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        // FILTRO SI EL INCIO DE SESION HA SIDO CORRECTO Y REDIRIJO A LA PAGINA EN CONCRETO
        if($contents['descripcion'] == "Error - Clave Incorrecta"){return view('login');}
        else{
            $email = $username;
            $username = $contents['descripcion'];

            $body = [
                'usuario' => $username,
                'email' => $email,
                'passwd' => $password,
                'empresa' => $empresa,
            ];
            $user = InicioSesion::create($body);

            auth()->login($user);

            return redirect()->route('menu');
        }

        return view('menu',compact('contents'));
        */
    }



    public function create(array $data)
    {
      return User::create([
        'name' => $data['usuario'],
        'email' => $data['email'],
        'password' => Hash::make($data['passwd'])
      ]);
    }



    
    public function logout() {

        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

}
