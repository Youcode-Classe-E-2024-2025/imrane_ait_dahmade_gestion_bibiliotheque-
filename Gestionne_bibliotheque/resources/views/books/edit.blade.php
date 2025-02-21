@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Modifier le Livre</h2>
    
    <div class="card p-4">
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>

            <!-- Auteur -->
            <div class="mb-3">
                <label for="author" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $book->description }}</textarea>
            </div>

            <!-- ISBN -->
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" required>
            </div>

            <!-- Nombre de copies -->
            <div class="mb-3">
                <label for="copies_available" class="form-label">Nombre de Copies</label>
                <input type="number" class="form-control" id="copies_available" name="copies_available" value="{{ $book->copies_available }}" min="1" required>
            </div>

            <!-- Boutons -->
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
