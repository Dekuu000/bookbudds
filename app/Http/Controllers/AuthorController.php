<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Author::all();
    }

    public function create()
    {
        // Return a view to create an author
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:authors',
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function edit(Author $author)
    {
        // Return a view to edit the author
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|unique:authors,name,' . $author->id,
        ]);

        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(null, 204);
    }
}
