<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Acceuil')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_100.CSS') }}" rel="stylesheet">
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_000.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @stack('styles')
</head>

<body>
    <!-- Header -->
    <header class="d-flex align-items-center text-white py-2">
        <!-- Logo de gauche -->
        <div class="logo-container1 d-flex align-items-center justify-content-center bg-white me-3"
            style="height: 73px; width: 73px;">
            <img src="{{ asset('images/0 2.png') }}" alt="Logo gauche" class="img-fluid">
        </div>

        <!-- Texte principal -->
        <div class="text-container flex-grow-1">
            <h1 class="m-0 fw-bold">INSTI</h1>
            <p class="m-0">Institut Nationale Supérieur de Technologie Industrielle <br /> de Lokossa</p>
        </div>

        <!-- Liens à droite -->
        <div class="links d-flex align-items-center">
            <a href="#" class="text-white d-flex align-items-center me-3">
                <img src="{{ asset('icons/info-circle-fill.svg') }}" alt="Info" class="icon-white me-1"
                    style="width: 20px; height: 20px;" class="me-1"> Accès rapide
            </a>
            <span class="text-white">|</span>
            <a href="#" class="text-white d-flex align-items-center mx-3">
                <img src="{{ asset('icons/snow3.svg') }}" alt="Observatoire" class="icon-white me-1"
                    style="width: 20px; height: 20px;" class="me-1"> Observatoire
            </a>
            <span class="text-white">|</span>
            <a href="#" class="text-white d-flex align-items-center ms-3">
                <img src="{{ asset('icons/person-fill.svg') }}" alt="Person" class="icon-white me-1"
                    style="width: 20px; height: 20px;" class="me-1"> Nous écrire
            </a>
        </div>

        <!-- Logo de droite -->
        <div class="logo-container1 d-flex align-items-center justify-content-center bg-white ms-3"
            style="height: 73px; width: 73px;">
            <img src="{{ asset('images/logoINSTI 1.png') }}" alt="Logo droite" class="img-fluid">
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container">
            <!-- Bouton de menu (mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu principal -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">ACCEUIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('annonces') ? 'active' : '' }}" href="{{ route('annonces') }}">ANNONCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('entreprises') ? 'active' : '' }}" href="{{ route('entreprises') }}">ENTREPRISES CRÉÉES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeries') ? 'active' : '' }}" href="{{ route('galeries') }}">GALERIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('#partenaires') ? 'active' : '' }}" href="{{ route('home') }}#partenaires">PARTENAIRES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}" href="{{ route('contacts') }}">CONTACTS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <!-- Logo et Informations -->
                <div class="col-md-4">
                    <img src="{{ asset('icons/logoINSTI 1.png') }}" alt="Logo" class="mb-3" style="width: 80px;">
                    <p class="mb-0">Lokossa, Agnivedji</p>
                    <p><strong>(+229) 22 41 13 66</strong></p>
                    <p>"Science et technologie au service de l'homme"</p>
                    <a href="mailto:instilokossa@gmail.com" class="text-white"><strong>instilokossa@gmail.com</strong></a>
                    <div class="mt-3">
                        <!-- Icône Facebook -->
                        <a href="https://facebook.com" target="_blank" class="text-white me-3">
                            <img src="{{ asset('icons/facebook.svg') }}" alt="Facebook" class="icon-white me-1"
                                style="width: 40px; height: 40px;">
                        </a>
                        <!-- Icône YouTube -->
                        <a href="https://youtube.com" target="_blank" class="text-white me-3">
                            <img src="{{ asset('icons/youtube.svg') }}" alt="YouTube" class="icon-white me-1"
                                style="width: 40px; height: 40px;">
                        </a>
                    </div>
                    <div class="underline mt-2"></div>
                </div>

                <!-- Nos Ressources -->
                <div class="col-md-4">
                    <h5>NOS RESSOURCES</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Incubateur de startups</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Unité d'application de l'INSTI</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Plateforme E-learning</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Blog officiel de l'INSTI</a></li>
                    </ul>
                </div>

                <!-- Liens Utiles -->
                <div class="col-md-4">
                    <h5>LIENS UTILES</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Ministère de l'Enseignement Supérieur et
                                de la Recherche Scientifique</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Université Nationale des Sciences,
                                Technologies, Ingénierie et Mathématiques</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Institut National Supérieur de
                                Technologie Industrielle</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0">© INSTI, UNSTIM 2024 - Réalisé par le groupe (OLOUKPEDE, BOSSA, TANGNI, GBECHI, ADE)</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script_index.js') }}" defer></script>
    
    <!-- Script pour la navigation active -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const currentPath = window.location.pathname;
            
            navLinks.forEach(link => {
                const linkPath = new URL(link.href).pathname;
                
                // Vérifie si le lien correspond à la route actuelle
                if (currentPath === linkPath || 
                   (currentPath === '/' && linkPath === route('home')) ||
                   (currentPath.includes(linkPath) && linkPath !== '/')) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>

</html>