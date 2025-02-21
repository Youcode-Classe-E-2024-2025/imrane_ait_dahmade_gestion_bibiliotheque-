@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des livres</h2>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>ISBN</th>
                <th>Copies</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->copies_available }}</td>
                    <td>
                        @auth
                            <!-- Si l'utilisateur est connecté, ne montre pas le bouton emprunter -->
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Voir</a>
                        @else
                            <!-- Si l'utilisateur n'est pas connecté (visiteur), montre le bouton emprunter -->
                            <a href="{{ route('register') }}" class="btn btn-success btn-sm">Emprunter</a>
                        @endauth
                        
                        @if(Auth::user() && Auth::user()->id === 1)
                            <!-- Si l'utilisateur est connecté et ID == 1, montre les boutons de modification/suppression -->
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
