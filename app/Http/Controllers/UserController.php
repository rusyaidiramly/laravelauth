<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function register(Request $request, $generate_token = true)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $response = [
            'user' => $user,
        ];

        if ($generate_token) {
            $token = $user->createToken('app_token')->plainTextToken;
            $response['token'] = $token;
        }

        return response($response, 201);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);
        $remember = true;
        if (!auth()->attempt($credentials, $remember)) {
            return response(
                ['message' => 'Email or password is incorrect.'], 401
            );
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('app_token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response, 200);
    }

    public function revoke_token()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Token revoked.'], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        auth()->logout();
        return response()->json(['message' => 'Logged out'], 200);
    }

}
