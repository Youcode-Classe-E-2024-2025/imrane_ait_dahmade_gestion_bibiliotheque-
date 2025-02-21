@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Connexion</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-success">Se connecter</button>
        <a href="{{ route('register') }}" class="btn btn-link">Créer un compte</a>
    </form>
</div>
@endsection
