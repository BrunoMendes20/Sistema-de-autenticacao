<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'password' => Hash::make('Password123'),
        ]);

        $response = $this->post(route('login.submit'), [
            'email' => $user->email,
            'password' => 'Password123',
        ]);

        $response->assertRedirect(route('welcome'));
        $this->assertAuthenticatedAs($user);
    }
}
