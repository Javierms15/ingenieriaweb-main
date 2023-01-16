<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class ContabilidadController extends Controller
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
        $body = [
            'empresa' => 0,
            'usuario' => User::find(Auth::id())->email,
        ];


        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'CuentasContables',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);


        return view('contabilidad.menu', compact('contents'));
    }

    public function show(Request $request){

        $offset = $request->offset;
        $cuenta = $request->cuenta;
        $concepto = $request->concepto;

        if($offset == -1) $offset = 0;

        $body = [
            'usuario' => User::find(Auth::id())->email,
            'cuenta' => $request->cuenta,
            'offset' => $offset * 15,
            'limit' => 15,
            'empresa' => 0,
        ];

        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'ExtractoContable',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);


        $fin = 0;

        if(!empty($contents) && sizeof($contents) < 15)$fin = 1;

        return view('contabilidad.showMovimientos',compact('contents','fin','offset','cuenta','concepto'));
    }
}
