<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Genre::all();
    }

    public function create()
    {
        // Return a view to create a genre
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|unique:genres',
        ]);

        $genre = Genre::create($request->all());

        return response()->json($genre, 201);
    }

    public function show(Genre $genre)
    {
        return $genre;
    }

    public function edit(Genre $genre)
    {
        // Return a view to edit the genre
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'type' => 'required|unique:genres,type,' . $genre->id,
        ]);

        $genre->update($request->all());

        return response()->json($genre, 200);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json(null, 204);
    }
}
