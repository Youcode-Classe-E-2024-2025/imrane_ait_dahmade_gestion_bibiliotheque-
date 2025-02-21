@extends('layouts.app')

@section('title', 'Détails du Livre')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-header  text-white text-center">
                    <h2 class="mb-0 text-danger">📖 Détails du Livre</h2>
                </div>
                <div class="card-body">
                    <p><strong>Titre :</strong> {{ $book->title }}</p>
                    <p><strong>Description :</strong> {{ $book->description }}</p>
                    <p><strong>Auteur :</strong> {{ $book->author }}</p>
                    <p><strong>ISBN :</strong> {{ $book->isbn }}</p>
                    <p>
                        <strong>Copies disponibles :</strong> 
                        <span class="badge {{ $book->copies_available > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $book->copies_available }}
                        </span>
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                        ⬅ Retour
                    </a>
                    @if( Auth::user() && Auth::user()->id !== 1)
                    @if($book->copies_available > 0)
                        <form action="{{ route('borrow', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                📚 Emprunter
                            </button>
                        </form>
                    @else
                        <span class="text-danger fw-bold">❌ Indisponible</span>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
