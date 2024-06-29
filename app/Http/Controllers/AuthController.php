<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            //check if user role is professor or aluno
            if (Auth::user()->role == 'professor') {
                return redirect('/listarnotas');
            } else {
                return redirect('/minhasnotas');
            }
        }

        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
