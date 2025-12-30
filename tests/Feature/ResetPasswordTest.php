<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_reset_password_with_valid_token()
    {
        $user = User::factory()->create();

        $token = Password::createToken($user);

        $response = $this->post(route('password.update'), [
            'email' => $user->email,
            'password' => 'NewPassword123',
            'password_confirmation' => 'NewPassword123',
            'token' => $token,
        ]);

        $response->assertRedirect(route('login'));

        $this->assertTrue(
            Hash::check('NewPassword123', $user->fresh()->password)
        );
    }
}
