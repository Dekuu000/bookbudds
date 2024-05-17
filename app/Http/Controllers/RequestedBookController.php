<?php

namespace App\Http\Controllers;

use App\Models\RequestedBook;
use Illuminate\Http\Request;

class RequestedBookController extends Controller
{
    public function index()
    {
        return RequestedBook::with(['user', 'author', 'genre'])->get();
    }

    public function create()
    {
        // Return a view to request a book
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
        ]);

        $requestedBook = RequestedBook::create($request->all());

        return response()->json($requestedBook, 201);
    }

    public function show(RequestedBook $requestedBook)
    {
        return $requestedBook->load(['user', 'author', 'genre']);
    }

    public function edit(RequestedBook $requestedBook)
    {
        // Return a view to edit the requested book
    }

    public function update(Request $request, RequestedBook $requestedBook)
    {
        $request->validate([
            'book_title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $requestedBook->update($request->all());

        return response()->json($requestedBook, 200);
    }

    public function destroy(RequestedBook $requestedBook)
    {
        $requestedBook->delete();
        return response()->json(null, 204);
    }
}
