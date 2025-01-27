<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->to('dashboard')->with('toast_success', 'Login Berhasil!');
        }

        return redirect()->back()->with('toast_error', 'Username atau password salah!')->withInput();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->to('login')->with('toast_success', 'Logout Berhasil!');
    }
}
