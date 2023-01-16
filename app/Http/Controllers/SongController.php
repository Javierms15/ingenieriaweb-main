<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

/**
 * Class SongController
 * @package App\Http\Controllers
 */
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::paginate();

        return view('song.index', compact('songs'))
            ->with('i', (request()->input('page', 1) - 1) * $songs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $song = new Song();
        return view('song.create', compact('song'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Song::$rules);

        $song = Song::create($request->all());

        return redirect()->route('songs.index')
            ->with('success', 'Song created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::find($id);

        return view('song.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::find($id);

        return view('song.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Song $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        request()->validate(Song::$rules);

        $song->update($request->all());

        return redirect()->route('songs.index')
            ->with('success', 'Song updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $song = Song::find($id)->delete();

        return redirect()->route('songs.index')
            ->with('success', 'Song deleted successfully');
    }
}
