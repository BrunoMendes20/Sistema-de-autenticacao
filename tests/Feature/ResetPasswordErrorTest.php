<?php 

// tests/Feature/Auth/ResetPasswordErrorTest.php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

it('does not reset password with invalid token', function () {
    $user = User::factory()->create();

    $response = $this->post(route('password.update'), [
        'email' => $user->email,
        'password' => 'NewPassword123',
        'password_confirmation' => 'NewPassword123',
        'token' => 'invalid-token',
    ]);

    $response->assertSessionHasErrors();
    expect(Hash::check('NewPassword123', $user->fresh()->password))->toBeFalse();
});
