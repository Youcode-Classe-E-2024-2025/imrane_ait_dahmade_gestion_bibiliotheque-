@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mon Profil</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier le Profil</a>
        </div>
    </div>
</div>
@endsection
