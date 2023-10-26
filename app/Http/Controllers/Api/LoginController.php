<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken('BaseToken')->accessToken;

        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
            'access_token' => $token,
        ]);
    }

    public function login(AuthRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            $token = $user->createToken('BaseToken')->accessToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'access_token' => $token,
            ]);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }
}
