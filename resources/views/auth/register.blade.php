@extends('layouts.main_layout', ['pageTitle' => 'Cadastro'])

@section('content') 
    <x-auth-card>
        <form action="/registerSubmit" method="POST" novalidate>
            @csrf

            
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control"  name="name"  value="{{ old('name') }}" required>

            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control"  name="email"  value="{{ old('email') }}" required>
            </div>

             @error('email')
                <div class="alert alert-danger d-block fade show auto-close">
                    {{ $message }}
                </div>
                
            @enderror

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control"  name="password" required>
            </div>
            
            @error('password')
            <div class="alert alert-danger d-block fade show auto-close">
                {{ $message }}
            </div>
            
            @enderror
            
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirma Senha</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            @error('password_confirmation')
                <div class="alert alert-danger d-block fade show auto-close">
                    {{ $message }}
                </div>
            
            @enderror

            <button type="submit" class="btn w-100">Inscreva-se</button>
        </form>

        <x-slot:footer>
            Já tem uma conta? <a href="{{route('login')}}">Faça Login</a>
        </x-slot:footer>
    </x-auth-card>
@endsection


