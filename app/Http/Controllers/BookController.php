<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    $books = Book::where('title', 'LIKE', "%{$query}%")
                 ->orWhereHas('author', function($q) use ($query) {
                     $q->where('name', 'LIKE', "%{$query}%");
                 })->get();

    return view('books.index', compact('books'));
}


public function index()
    {
        return Book::with(['author', 'genre'])->get();
    }

    public function create()
    {
        // Return a view to create a book
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'published_date' => 'required|date',
        ]);

        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

    public function show(Book $book)
    {
        return $book->load(['author', 'genre']);
    }

    public function edit(Book $book)
    {
        // Return a view to edit the book
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required',
            'published_date' => 'required|date',
        ]);

        $book->update($request->all());

        return response()->json($book, 200);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}
