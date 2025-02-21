<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bibliothèque')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #6f42c1; /* Violette */
            color: white;
        }
        .navbar {
            background-color: #563d7c;
        }
        .container {
            margin-top: 50px;
        }
    </style>

    @yield('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Ma Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
    
                    @auth
                        <!-- Si l'utilisateur est connecté -->
                        <li class="nav-item"><a class="nav-link" href="/books">Livres</a></li>
                        <li class="nav-item"><a class="nav-link" href="/profile">Profil</a></li>
                        @if(Auth::user() && Auth::user() !== 1)
                        <li class="nav-item"><a class="nav-link" href="/ListeBorrow">Emprunts</a></li>
                        @endif
                        <!-- Bouton Déconnexion -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-white">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <!-- Si l'utilisateur est visiteur (non connecté) -->
                        <li class="nav-item"><a class="nav-link" href="/login">Connexion</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register">Inscription</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Contenu Principal -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>© 2025 Bibliothèque Municipale. Tous droits réservés.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')

</body>
</html>
