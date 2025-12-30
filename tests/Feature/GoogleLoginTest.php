<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as SocialiteUser;

uses(RefreshDatabase::class);

it('allows login with google account', function () {
    $googleUser = mock(SocialiteUser::class);
    $googleUser->shouldReceive('getEmail')->andReturn('google@test.com');
    $googleUser->shouldReceive('getName')->andReturn('Google User');
    $googleUser->shouldReceive('getId')->andReturn('123456');

    Socialite::shouldReceive('driver->user')
        ->andReturn($googleUser);

    $response = $this->withSession([])
        ->get(route('google.callback'));

    $this->assertAuthenticated();
    $response->assertRedirect(route('welcome'));
});


