<?php

namespace App\Http\Controllers;

use App\Models\Parada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ParadaController
 * @package App\Http\Controllers
 */
class ParadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $ctrl = 0;
        
        if($request->get('buscarporradio') != null){
            $latitude = $_GET['latitude'];
            $longitude = $_GET['longitude'];
            $haversine = "(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude))))";
            

            $paradas = DB::table("paradas")
                ->select("paradas.nombreParada"
                ,DB::raw("6371 * acos(cos(radians(" . $latitude . ")) 
                * cos(radians(paradas.lat)) 
                * cos(radians(paradas.lon) - radians(" . $longitude . ")) 
                + sin(radians(" .$latitude. ")) 
                * sin(radians(paradas.lat))) AS distance"));
            echo ($paradas);

            return view('parada.index', compact('paradas','ctrl'));
        }else if($request->get('buscarpor') != null){
            $paradas = Parada::where('nombreParada','LIKE',"%{$request->get('buscarpor')}%")->get();
            return view('parada.index', compact('paradas','ctrl'));
        }else if($request->get('codLinea') != null & $request->get('sentido') != null){
            $aux = Parada::all();
            foreach ($aux as $parada) {
                if($parada->sentido == $request->get('sentido') && $parada->codLinea == $request->get('codLinea')){
                    $paradas[] = $parada;
                }
            }
            return view('parada.index', compact('paradas','ctrl'));
        }else{
            $paradas = Parada::all();
            $ctrl = 1;
        }
        $parada = $paradas->first();

        return view('parada.index', compact('paradas', 'parada','ctrl'));//->with('i', (request()->input('page', 1) - 1) * $paradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parada = new Parada();
        return view('parada.find', compact('parada'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Parada::$rules);

        $parada = Parada::create($request->all());

        return redirect()->route('paradas.index')
            ->with('success', 'Parada created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parada = Parada::find($id);

        return view('maps.index', compact('parada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parada = Parada::find($id);

        return view('parada.edit', compact('parada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Parada $parada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parada $parada)
    {
        request()->validate(Parada::$rules);

        $parada->update($request->all());

        return redirect()->route('paradas.index')
            ->with('success', 'Parada updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $parada = Parada::find($id)->delete();

        return redirect()->route('paradas.index')
            ->with('success', 'Parada deleted successfully');
    }
}
