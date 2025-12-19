@extends('layouts.main_layout', ['pageTitle' => 'Dashboard'])
@section('content')


<div class="mb-4">
    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>

</div>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

@endsection






