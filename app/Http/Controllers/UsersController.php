<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function register(Request $request) 
    {
        $valid = validator($request->only('name', 'email', 'password', 'gender', 'birthday'), [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|integer|max:3',
            'birthday' => 'required|date',
        ]);

        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return \Response::json($jsonError);
        }

        $data = request()->only('name', 'email', 'password', 'gender', 'birthday');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'birthday' => $data['birthday']
        ]);

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        return ['token' => $token];
    }

    public function login(Request $request) 
    {
        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            return ['token' => $token];

        }

        return response([
            'message' => 'Unauthenticated.'
        ], 401);

    }

    public function logout(){ 
        if (Auth::check()) {
            Auth::user()->OauthAccessToken()->delete();
        }
        
        return view('auth.register');
    }

    public function details() {
        return response()->json(['user'=>auth()->user()],200);
    }
}
