<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AlmazaraController extends Controller
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
            'usuario' => User::find(Auth::id())->email,
            'empresa' => 0,
        ];



        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'EjerciciosAlmazara',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        return view('almazara.menu', compact('contents'));
    }

    public function show(Request $request){

        $offset = $request->offset;

        if($offset == -1) $offset = 0;

        $body = [
            'proveedor' => $request->proveedor,
            'empresa' => 0,
            'offset' => $offset * 15,
            'fechaini' => $request->fechaini,
            'fechafin' => $request->fechafin,
            'limit' => 15,
        ];

        $proveedor = $request->proveedor;
        $tkilos = $request->tkilos;
        $tgrasa = $request->tgrasa;
        $fechaini = $request->fechaini;
        $fechafin = $request->fechafin;
        $ejercicio = $request->ejercicio;

        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'AlbaranesAlmazara',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        $fin = 0;

        if(sizeof($contents) < 15)$fin = 1;

        return view('almazara.showPesajes',compact('contents','tkilos','tgrasa','fechaini','fechafin','ejercicio','offset','proveedor','fin'));
    }

}
