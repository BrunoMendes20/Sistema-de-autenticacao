<?php

namespace App\Models;

use App\Notifications\CustomResetPassword;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordBase;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // User model code here
    protected $fillable = ['name', 'email', 'password', 'google_id'];
    protected $hidden = ['password', 'remember_token'];

    protected static function booted()
    {
        ResetPasswordBase::toMailUsing(function ($notifiable, $token) {
            return (new CustomResetPassword($token))
               ->toMail($notifiable);
        });
        
    }
    

}