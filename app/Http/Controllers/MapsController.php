<?php

namespace App\Http\Controllers;

class MapsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function index(){
        return view('maps.buscador');
     }
}