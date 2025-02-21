@extends('layouts.app')

@section('title', 'Liste des Livres')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 text-purple">📚 Liste des Livres</h2>  <!-- Titre principal -->
    @if( Auth::user() && Auth::user()->id === 1)
    <a href="{{ route('books.create') }}" class="btn btn-purple mb-4">
        📚 Ajouter un Livre
    </a>
    @endif
    
    <div class="row">
        <!-- Boucle sur les livres -->
        @foreach($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-purple text-white">
                    <h5 class="card-title">{{ $book->title }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Auteur :</strong> {{ $book->author }}</p>
                    <p><strong>ISBN :</strong> {{ $book->isbn }}</p>
                    <p><strong>Copies disponibles :</strong>
                        <span class="badge {{ $book->copies_available > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $book->copies_available }}
                        </span>
                    </p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-purple">
                        Détails
                    </a>
                    @if( Auth::user() && Auth::user()->id !== 1)
                    @if($book->copies_available > 0 )
                        <form action="{{ route('borrow', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Emprunter
                            </button>
                        </form>
                    @else
                        <span class="text-danger">Indisponible</span>
                    @endif 
                    @endif 
                </div>
                <div class="card-footer text-center">
                    @if(Auth::user() && Auth::user()->id === 1)
                    <!-- Si l'utilisateur est connecté et ID == 1, montre les boutons de modification/suppression -->
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('styles')
<style>
    .bg-purple {
        background-color: #6f42c1 !important; /* Couleur violet #6f42c1 */
    }

    .text-purple {
        color: #6f42c1 !important; /* Texte violet */
    }

    .btn-purple {
        background-color: #6f42c1;
        border-color: #6f42c1;
        color: white;
    }

    .btn-purple:hover {
        background-color: #5a32a1; /* Un violet plus foncé pour l'effet hover */
        border-color: #5a32a1;
    }

    /* Optionnel : ajouter un fond de page léger */
    body {
        background-color: #f9f9f9;
    }
</style>
@endsection
