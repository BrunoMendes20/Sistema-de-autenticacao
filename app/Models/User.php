<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    // User model code here
    protected $fillable = ['name', 'email', 'password', 'google_id'];
    protected $hidden = ['password', 'remember_token'];
}   
