<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;


class RecibidaController extends Controller
{
    //
    public function index()
    {
        $offset = 0;

        if($offset == -1) $offset = 0;

        $body = [
            'usuario' => User::find(Auth::id())->email,
            'empresa' => 0,
            'offset' => $offset,
            'limit' => 15,
        ];

        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'RelacionFacvtcb',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        $fin = 0;

        return view('recibida.menu',compact('contents','fin','offset'));
    }

    public function show(Request $request)
    {

        $offset = $request->offset;

        if($offset == -1) $offset = 0;

        $body = [
            'usuario' => User::find(Auth::id())->email,
            'empresa' => 0,
            'offset' => $offset * 15,
            'limit' => 15,
        ];

        // ENVIO PETICION Y RECIBO RESPUESTA, LA CUAL DECODIFICO
        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'RelacionFacvtcb',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);

        

        $fin = 0;

        if(!empty($contents) && sizeof($contents) < 15)$fin = 1;

        return view('recibida.menu',compact('contents','fin','offset'));

    }


    public function showFactura(Request $request){


        $body = [
            'usuario' => User::find(Auth::id())->email,
            'empresa' => 0,
            'cdgfacvtcb' => $request->codigo,
        ];

        $client  = new Client();
        $request = $client->post( config("constants.URL") . 'Facvtcb',['body' => json_encode($body)]);
        $contents = json_decode($request->getBody(), true);
        

        $pdf = Pdf::loadView('recibida.factura', compact('contents'))->setPaper('a4')->setOptions(['defaultFont' => 'Helvetica', 'isRemoteEnabled' => true]);
        return $pdf->download('factura.pdf');

    }
}
