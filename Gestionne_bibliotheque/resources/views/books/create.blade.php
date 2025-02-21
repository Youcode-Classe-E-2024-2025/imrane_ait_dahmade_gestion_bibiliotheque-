@extends('layouts.app')

@section('title', 'Ajouter un Livre')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Ajouter un Nouveau Livre</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Auteur</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="copies_available" class="form-label">Copies disponibles</label>
            <input type="number" name="copies_available" class="form-control" required min="1">
        </div>
        <button type="submit" class="btn btn-success w-100">Ajouter</button>
    </form>
</div>
@endsection
