@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="text-center">
        <h1>Bienvenue à la Bibliothèque de Saint-Marc</h1>
        <p>Explorez, empruntez et profitez de notre collection de livres.</p>
        <a href="/books" class="btn btn-primary btn-lg">Voir les livres</a>
    </div>
@endsection
