@extends('layouts.app-layout', ['pageTitle' => 'Login'])

@section('content') 
    <x-auth-card>
        <form action="{{ route('login.submit') }}" method="POST" novalidate>
            @csrf

            @if (session('error'))
                <div class="alert alert-danger auto-close">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div id="sucess-alert" class="alert alert-success fade show auto-close">
                    {{ session('success') }}

                </div>
                
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control"  name="email"  value="{{ old('email') }}" required>
            </div>

            @error('email')
                <div class="invalid-feedback d-block fade show auto-close">
                    {{ $message }}
                </div>
                
            @enderror


            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control"  name="password" required>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>

            </div>

            @error('password')
                <div class="invalid-feedback d-block fade show auto-close">
                    {{ $message }}
                </div>
                
            @enderror
         
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember"> Lembrar-me</label>
            </div>

            <button type="submit" class="btn mt-3 w-100">Entrar</button>
        </form>


        <x-slot:divider>
            <span class="mx-2 text-muted">OU</span>
        </x-slot:divider>

        <x-slot:authButton>
            
            <p>Entre com</p>
            <a href="{{ route('google.login') }}" class="btn btn-google">
                <i class="fa-brands fa-google"></i> 
            </a>
        </x-slot:authButton>

        <x-slot:footer>
            Não tem uma conta ? <a href="{{route('register')}}">Cadastre-se</a>
        </x-slot:footer>
    </x-auth-card>
@endsection


