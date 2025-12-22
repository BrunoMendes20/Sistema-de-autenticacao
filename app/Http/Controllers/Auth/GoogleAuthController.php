<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try{

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if($user){
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => $user->email_verified_at ?? now(),
                ]);

            }else{
                $user = User::create([
                    'name' => $googleUser->getName() ?? explode('@', $googleUser->getEmail())[0],
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'password' => null,
                ]);

            }

            Auth::login($user);
            request()->session()->regenerate();
    
            return redirect()->route('dashboard');
        }catch(\Throwable $e){
            return redirect()->route('login')->with('error', 'Falha ao autenticar com o Google.');
        }

    }

    
}  