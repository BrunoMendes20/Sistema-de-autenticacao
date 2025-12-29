<x-layout-app page-title="Bem-vindo">

    <div class="mb-4">
        <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>

    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

</x-layout-guest>






