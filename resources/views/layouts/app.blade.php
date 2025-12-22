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
    @stack('styles')
    <style>
        /* Styles pour le header et navigation fixes */
        .sticky-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            width: 100%;
            background: inherit; /* Garde les couleurs originales */
        }
        
        /* Correction pour main - compensation de la hauteur fixe */
        body {
            padding-top: 146px; /* 73px (header) + 73px (nav) = 146px */
        }
        
        /* Logo qui couvre header + nav */
        .full-height-logo {
            position: absolute;
            top: 0;
            height: 100px; /* Hauteur totale du header (73px) + nav (73px) */
            width: 73px;
            z-index: 1031;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-left {
            left: 0;
        }
        
        .logo-right {
            right: 0;
        }
        
        /* Styles pour le menu déroulant */
        .nav-item.dropdown .dropdown-menu {
            border: none;
            border-radius: 0;
            margin-top: 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #343a40; /* Couleur de fond du dropdown */
        }
        
        .nav-item.dropdown .dropdown-item {
            padding: 10px 20px;
            transition: all 0.3s ease;
            color: white;
        }
        
        .nav-item.dropdown .dropdown-item:hover,
        .nav-item.dropdown .dropdown-item:focus {
            background-color: #495057;
            color: white;
            padding-left: 25px;
        }
        
        .dropdown-toggle::after {
            margin-left: 5px;
            transition: transform 0.3s ease;
            border-top-color: white;
        }
        
        .dropdown.show .dropdown-toggle::after {
            transform: rotate(180deg);
        }
        
        /* Correction pour éviter le chevauchement des logos */
        header, nav.custom-navbar {
            position: relative;
            z-index: 1;
        }
        
        header .logo-container1,
        nav.custom-navbar .logo-container1 {
            visibility: hidden; /* Masque les logos originaux */
        }
        
        /* Espacement pour les logos sur desktop */
        @media (min-width: 992px) {
            header .text-container {
                margin-left: 83px; /* 73px + 10px de marge */
                margin-right: 83px;
            }
            
            .links {
                margin-right: 83px;
            }
            
            /* Ajustement pour la navigation */
            nav.custom-navbar .navbar-nav {
                margin-left: 83px;
                margin-right: 83px;
            }
        }
        
        /* Styles responsive pour mobile */
        @media (max-width: 991px) {
            .sticky-wrapper {
                position: relative;
            }
            
            body {
                padding-top: 0;
            }
            
            .full-height-logo {
                display: none; /* Masquer les logos sur mobile */
            }
            
            /* Rétablir les logos originaux sur mobile */
            header .logo-container1,
            nav.custom-navbar .logo-container1 {
                visibility: visible;
            }
            
            /* Supprimer les marges sur mobile */
            header .text-container,
            .links,
            nav.custom-navbar .navbar-nav {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
            
            /* Ajustement du menu déroulant sur mobile */
            .nav-item.dropdown .dropdown-menu {
                background-color: transparent;
                border: none;
                padding-left: 20px;
            }
            
            .nav-item.dropdown .dropdown-item {
                padding: 8px 15px;
                color: rgba(255, 255, 255, 0.8);
            }
        }
        
        /* Style pour le menu actif dans le dropdown */
        .nav-item.dropdown .dropdown-item.active {
            background-color: #007bff;
            color: white;
        }
        
        /* Animation douce pour le dropdown */
        .dropdown-menu {
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Wrapper fixe pour header + nav -->
    <div class="sticky-wrapper">
        <!-- Logo gauche qui couvre toute la hauteur (uniquement sur desktop) -->
        <div class="full-height-logo logo-left d-none d-lg-flex">
            <img src="{{ asset('images/0 2.png') }}" alt="Logo gauche" class="img-fluid">
        </div>
        
        <!-- Header -->
        <header class="d-flex align-items-center text-white py-2">
            <!-- Logo de gauche (visible sur mobile) -->
            <div class="logo-container1 d-flex align-items-center justify-content-center bg-white me-3 d-lg-none"
                style="height: 5px; width: 73px;">
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
                        style="width: 20px; height: 20px;"> Accès rapide
                </a>
                <span class="text-white">|</span>
                <a href="#" class="text-white d-flex align-items-center mx-3">
                    <img src="{{ asset('icons/snow3.svg') }}" alt="Observatoire" class="icon-white me-1"
                        style="width: 20px; height: 20px;"> Observatoire
                </a>
                <span class="text-white">|</span>
                <a href="#" class="text-white d-flex align-items-center ms-3">
                    <img src="{{ asset('icons/person-fill.svg') }}" alt="Person" class="icon-white me-1"
                        style="width: 20px; height: 20px;"> Nous écrire
                </a>
            </div>

            <!-- Logo de droite (visible sur mobile) -->
            <div class="logo-container1 d-flex align-items-center justify-content-center bg-white ms-3 d-lg-none"
                style="height: 73px; width: 73px;">
                <img src="{{ asset('insti.png') }}" alt="Logo droite" class="img-fluid">
            </div>
        </header>
        
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
                        
                        <!-- Menu déroulant Programme EaE -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('presentation') || request()->routeIs('activites') ? 'active' : '' }}" 
                               href="#" id="programmeDropdown" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                PROGRAMME EaE
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="programmeDropdown">
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('presentation') ? 'active' : '' }}" 
                                       href="">
                                        <i class="fas fa-info-circle me-2"></i>Présentation
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('activites') ? 'active' : '' }}" 
                                       href="">
                                        <i class="fas fa-tasks me-2"></i>Activités
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('annonces') ? 'active' : '' }}" href="{{ route('annonces') }}">ACTUALITES</a>
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
        
        <div class="full-height-logo logo-right d-none d-lg-flex">
            <img src="{{ asset('insti.png') }}" alt="Logo droite" class="img-fluid">
        </div>
    </div>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-4">
    <div class="container">
        <div class="row align-items-start">
            <!-- Logo et Informations -->
            <div class="col-md-3">
                <!-- Logo en haut -->
                <img src="{{ asset('images/0 2.png') }}" alt="Logo INSTI" class="mb-3" style="width: 80px;">
                 <!-- Logo en bas -->
                <div class="pt-2">
                    <img src="{{ asset('insti.png') }}" alt="Logo INSTI" style="width: 80px;">
                </div>
                <p class="mb-0">Lokossa, Agnivedji</p>
                <p><strong>(+229) 22 41 13 66</strong></p>
                <p>"Science et technologie au service de l'homme"</p>
                <a href="mailto:instilokossa@gmail.com" class="text-white d-block"><strong>instilokossa@gmail.com</strong></a>
                
                <div class="mt-3">
                    <!-- Icône Facebook -->
                    <a href="https://facebook.com" target="_blank" class="text-white me-3">
                        <img src="{{ asset('icons/facebook.svg') }}" alt="Facebook" class="icon-white" style="width: 40px; height: 40px;">
                    </a>
                    <!-- Icône YouTube -->
                    <a href="https://youtube.com" target="_blank" class="text-white">
                        <img src="{{ asset('icons/youtube.svg') }}" alt="YouTube" class="icon-white" style="width: 40px; height: 40px;">
                    </a>
                </div>
                
                <div class="underline mt-2 mb-3"></div>
                
               
            </div>

            <!-- Nos Ressources -->
            <div class="col-md-3">
                <h5>NOS RESSOURCES</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Incubateur de startups</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Unité d'application de l'INSTI</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Plateforme E-learning</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Blog officiel de l'INSTI</a></li>
                </ul>
            </div>

            <!-- Liens Utiles -->
            <div class="col-md-3">
                <h5>LIENS UTILES</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Ministère de l'Enseignement Supérieur et de la Recherche Scientifique</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Université Nationale des Sciences, Technologies, Ingénierie et Mathématiques</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Institut National Supérieur de Technologie Industrielle</a></li>
                </ul>
            </div>

            <!-- Navigation -->
            <div class="col-md-3">
                <h5>NAVIGATION</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Accueil</a></li>
                    <li><a href="#" class="text-white text-decoration-none">À propos</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Formations</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Actualités</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="mb-0">INSTI-UNSTIM © 2025</p>
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
            
            // Activer les liens selon la route actuelle
            navLinks.forEach(link => {
                const linkPath = new URL(link.href).pathname;
                
                if (currentPath === linkPath || 
                   (currentPath === '/' && linkPath === '{{ route("home") }}'.replace(window.location.origin, '')) ||
                   (currentPath.includes(linkPath) && linkPath !== '/')) {
                    link.classList.add('active');
                }
            });
            
            // Gestion du menu déroulant actif
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                if (currentPath === new URL(item.href).pathname) {
                    item.classList.add('active');
                    // Marquer aussi le parent dropdown comme actif
                    const parentDropdown = item.closest('.dropdown');
                    if (parentDropdown) {
                        const dropdownToggle = parentDropdown.querySelector('.dropdown-toggle');
                        if (dropdownToggle) {
                            dropdownToggle.classList.add('active');
                        }
                    }
                }
            });
            
            // Gestion du défilement fluide pour les ancres
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if(targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        // Compenser la hauteur du header fixe
                        const headerHeight = document.querySelector('.sticky-wrapper').offsetHeight;
                        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
        
        // Correction du padding sur mobile
        function adjustBodyPadding() {
            const body = document.body;
            if (window.innerWidth <= 991) {
                body.style.paddingTop = '0';
            } else {
                body.style.paddingTop = '146px';
            }
        }
        
        // Appel initial et lors du redimensionnement
        adjustBodyPadding();
        window.addEventListener('resize', adjustBodyPadding);
    </script>
    
    @stack('scripts')
</body>
</html>