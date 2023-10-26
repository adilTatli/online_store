<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('user.sign-in');
    }

    public function login(AuthRequest $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->back()->withInput()->withErrors(['login' => 'Неверный email или пароль']);
        }
        return redirect()->route('home')->with('success', __('user.signin'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
