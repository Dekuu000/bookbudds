<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::with(['user', 'book'])->get();
    }

    public function create()
    {
        // Return a view to create a review
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        $review = Review::create($request->all());

        return response()->json($review, 201);
    }

    public function show(Review $review)
    {
        return $review->load(['user', 'book']);
    }

    public function edit(Review $review)
    {
        // Return a view to edit the review
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
        ]);

        $review->update($request->all());

        return response()->json($review, 200);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(null, 204);
    }
}
