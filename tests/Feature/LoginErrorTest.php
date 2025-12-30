<?php 

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

it('does not allow login with invalid password', function(){
    $user = User::factory()->create([
        'password' => Hash::make('Password123'),
    ]);

    $response = $this->post(route('login.submit'),[
        'email' => $user->email,
        'password' => 'WrongPassword123'
    ]);

    $response->assertRedirect();
    $this->assertGuest();
});
