<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],

        // error messages
        [
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email inválido',
            'email.unique' => 'Email já está em uso',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha deve ter pelo menos 8 caracteres',
            
        ]
    );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('login')->with('success', 'Conta criada com sucesso! Faça login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ],

        //error messages
        [
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email inválido',
            'password.required' => 'Senha é obrigatória',
            'password.string' => 'Senha inválida',
        ]
    );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->with('error', 
            'E-mail ou senha inválidos.',
        )->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
