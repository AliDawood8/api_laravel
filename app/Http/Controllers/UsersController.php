<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "username" => 'required|max:12',
            'email' => 'required|email',
            'password' => 'required|max:15',

        ]);
        $users = User::create($fields);
        return  $users;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return  $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $fields = $request->validate([
            "username" => 'required|max:12',
            'email' => 'required|email|max:20',
            'password' => 'required|max:15',

        ]);
        $user->update($fields);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return ['message' => 'User Deleted!!'];
    }
}
