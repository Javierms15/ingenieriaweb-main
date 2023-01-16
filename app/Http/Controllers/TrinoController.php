<?php

namespace App\Http\Controllers;

use App\Models\Trino;
use Illuminate\Http\Request;

/**
 * Class TrinoController
 * @package App\Http\Controllers
 */
class TrinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trinos = Trino::paginate();

        return view('trino.index', compact('trinos'))
            ->with('i', (request()->input('page', 1) - 1) * $trinos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trino = new Trino();
        return view('trino.create', compact('trino'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Trino::$rules);

        $trino = Trino::create($request->all());

        return redirect()->route('trinos.index')
            ->with('success', 'Trino created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trino = Trino::find($id);

        return view('trino.show', compact('trino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trino = Trino::find($id);

        return view('trino.edit', compact('trino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Trino $trino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trino $trino)
    {
        request()->validate(Trino::$rules);

        $trino->update($request->all());

        return redirect()->route('trinos.index')
            ->with('success', 'Trino updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $trino = Trino::find($id)->delete();

        return redirect()->route('trinos.index')
            ->with('success', 'Trino deleted successfully');
    }
}
