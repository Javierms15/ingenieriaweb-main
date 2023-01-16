<?php

namespace App\Http\Controllers;

use App\Models\Publicacione;
use Illuminate\Http\Request;

/**
 * Class PublicacioneController
 * @package App\Http\Controllers
 */
class PublicacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacione::paginate();

        return view('publicacione.index', compact('publicaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $publicaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publicacione = new Publicacione();
        return view('publicacione.create', compact('publicacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Publicacione::$rules);

        $publicacione = Publicacione::create($request->all());

        return redirect()->route('publicaciones.index')
            ->with('success', 'Publicacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacione = Publicacione::find($id);

        return view('publicacione.show', compact('publicacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacione = Publicacione::find($id);

        return view('publicacione.edit', compact('publicacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Publicacione $publicacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacione $publicacione)
    {
        request()->validate(Publicacione::$rules);

        $publicacione->update($request->all());

        return redirect()->route('publicaciones.index')
            ->with('success', 'Publicacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $publicacione = Publicacione::find($id)->delete();

        return redirect()->route('publicaciones.index')
            ->with('success', 'Publicacione deleted successfully');
    }
}
