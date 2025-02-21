@extends('layouts.app')

@section('title', 'Mes Emprunts')

@section('content')
    <div class="container">
        <h1 class="my-4">Mes Emprunts</h1>

        @if($borrows->isEmpty())
            <p>Vous n'avez emprunté aucun livre.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Livre</th>
                        <th>Date d'emprunt</th>
                        <th>Date de retour prévue</th>
                        <th>Retourner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->id }}</td>
                            <td>{{ $borrow->book->title }}</td>
                            <td>{{ $borrow->borrowed_at->format('d/m/Y') }}</td> --}}
                            <td>{{ $borrow->due_date ? $borrow->due_date->format('d/m/Y') : 'Non spécifiée' }}</td>
                            <td>
                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
