<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserProfile::with('user')->get();
    }

    public function show(UserProfile $userProfile)
    {
        return $userProfile->load('user');
    }

    public function create()
    {
        // Return a view to create a user profile
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $profile = UserProfile::create($request->all());

        return response()->json($profile, 201);
    }

    public function edit(UserProfile $userProfile)
    {
        // Return a view to edit the user profile
    }

    public function update(Request $request, UserProfile $userProfile)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $userProfile->update($request->all());

        return response()->json($userProfile, 200);
    }

    public function destroy(UserProfile $userProfile)
    {
        $userProfile->delete();
        return response()->json(null, 204);
    }
}
