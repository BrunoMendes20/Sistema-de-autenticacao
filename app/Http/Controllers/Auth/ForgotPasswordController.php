<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => ['required','email'],
        ],
        [
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser um endereço válido'
        ]
     );

        Password::sendResetLink(
            $request->only('email')
        );

       

       return view('auth.email-sent');
    }
}
