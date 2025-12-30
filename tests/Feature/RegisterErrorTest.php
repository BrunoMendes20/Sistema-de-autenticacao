<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('does not allow register with duplicated email', function () {
    User::factory()->create([
        'email' => 'bruno@test.com',
    ]);

    $response = $this->post(route('register.submit'), [
        'name' => 'Outro Nome',
        'email' => 'bruno@test.com',
        'password' => 'Password123+',
        'password_confirmation' => 'Password123+',
    ]);

    $response->assertSessionHasErrors('email');
});
