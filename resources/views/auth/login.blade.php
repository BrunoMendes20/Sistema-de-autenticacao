@extends('layouts.main_layout', ['pageTitle' => 'Login'])

@section('content') 
    <x-auth-card>
        <form action="/loginSubmit" method="POST" novalidate>
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
                <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}" required>
            </div>

            @error('email')
                <div class=" alert alert-danger d-block fade show auto-close">
                    {{ $message }}
                </div>
                
            @enderror


            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            @error('password')
                <div class=" alert alert-danger d-block fade show auto-close">
                    {{ $message }}
                </div>
                
            @enderror
            <button type="submit" class="btn w-100">Entrar</button>
        </form>

        <x-slot:footer>
            Não tem uma conta? <a href="{{route('register')}}">Cadastre-se</a>
        </x-slot:footer>
    </x-auth-card>
@endsection


