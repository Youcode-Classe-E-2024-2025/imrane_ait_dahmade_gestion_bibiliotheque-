@extends('layouts.app')

@section('title', 'Détails du Livre')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Détails du Livre</h2>

    <p><strong>Titre:</strong> {{ $book->title }}</p>
    <p><strong>Auteur:</strong> {{ $book->author }}</p>
    <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
    <p><strong>Copies disponibles:</strong> {{ $book->copies_available }}</p>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
