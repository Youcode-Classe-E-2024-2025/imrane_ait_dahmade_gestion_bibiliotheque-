@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2>Bienvenue, {{ auth()->user()->name }} !</h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Se déconnecter</button>
    </form>
</div>
@endsection
