<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields =  $request->validate([
            'username' => 'required|max:12',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:15|confirmed',
        ]);
        $user = User::create($fields);
        $token = $user->createToken($request->username);
        return ['user'=>$user,
            'token' => $token->plainTextToken];
    }
    public function login(Request $request)
    {
         $request->validate([
             'username' => 'required|exists:users',
            'password' => 'required|max:15',
        ]);
        $user = User::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
           return ['message'=> 'Username or password is incorrect!'];}
        else{
            $token = $user->createToken($user->username);
            return ['user'=>$user,
            'token' => $token->plainTextToken];
        }
     }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ['message'=> 'You are logged out!'];
    }
}
