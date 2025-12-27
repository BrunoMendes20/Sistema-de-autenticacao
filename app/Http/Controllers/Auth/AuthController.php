<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
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

            'name' => 'required|min:3|max:30|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:32|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'password_confirmation' => 'required|same:password',
        ],

        // error messages
        [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O nome deve ter pelo :min caracteres',
            'name.max' => 'O nome deve ter pelo :max caracteres',
            'name.unique' => 'Esse nome não pode ser usado',
            'email.required' => 'Email é obrigatório',
            'email.email' => 'Email inválido',
            'email.unique' => 'Email já está em uso',
            'password.required' => 'Senha é obrigatória',
            'password.min' => 'Senha deve ter pelo menos :min caracteres',
            'password.max' => 'Senha deve ter no máximo :max  caracteres',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma minúscula e um número.',
            'password_confirmation.required' => 'Confirmação de senha é obrigatória',
            'password_confirmation.same' => 'As senhas não coincidem',
            
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

        $remember = $request->boolean('remember');


            if (Auth::attempt($credentials, $remember)) {
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
