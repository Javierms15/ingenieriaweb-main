<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AderezoController extends Controller
{
    //
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


        // PREPARO EL CUERPO DEL ENVIO
        $body = [
            'empresa' => 0,
            'usuario' => User::find(Auth::id())->email,
        ];



        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'EjerciciosAderezo',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        return view('aderezo.menu', compact('contents'));
    }

    public function show(Request $request){

        $offset = $request->offset;
        $ejercicio = $request->ejercicio;
        $empaderezo = $request->empaderezo;

        if($offset == -1) $offset = 0;

        $body = [
            'usuario' => User::find(Auth::id())->email,
            'empaderezo' => $request->empaderezo,
            'offset' => $offset * 15,
            'limit' => 15,
        ];

        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'AlbaranesAderezo',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        

        $fin = 0;

        if(!empty($contents) && sizeof($contents) < 15)$fin = 1;

        return view('aderezo.showPesajes',compact('contents','fin','offset','ejercicio','empaderezo'));
    }

    public function showpesos(Request $request){

        $cdg = $request->codigo;
        $offset = $request->offset;
        $empaderezo = $request->empaderezo;

        $body = [
            'usuario' => User::find(Auth::id())->email,
            'empaderezo' => $request->empaderezo,
            'offset' => $offset * 15,
            'limit' => 15,
        ];

        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'AlbaranesAderezo',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        
        $pesos = $contents;


        return view('aderezo.showPesos',compact('contents','cdg'));
    }



}
