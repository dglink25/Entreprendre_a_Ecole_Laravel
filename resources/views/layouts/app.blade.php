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
            background: linear-gradient(135deg, #1a1a2e, #16213e);
        }
        
        /* Correction pour main - compensation de la hauteur fixe */
        body {
            padding-top: 146px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex: 1;
        }
        
        /* Logo qui couvre header + nav - ARRIÈRE-PLAN TRANSPARENT */
        .full-height-logo {
            position: absolute;
            top: 0;
            height: 100px;
            width: 73px;
            z-index: 1031;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent !important; /* Transparent */
        }
        
        .logo-left {
            left: 0;
        }
        
        .logo-right {
            right: 0;
        }
        
        /* Logo container sans arrière-plan */
        .logo-container1 {
            background: transparent !important;
            border: none !important;
        }
        
        .logo-container1 img {
            filter: brightness(0) invert(1); /* Rend le logo blanc */
        }
        
        /* Header sans arrière-plan sur les logos */
        header {
            background-color: #146ccb;
        }
        
        /* Styles pour le menu déroulant */
        .nav-item.dropdown .dropdown-menu {
            border: none;
            border-radius: 0;
            margin-top: 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #343a40;
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
            visibility: hidden;
        }
        
        /* Espacement pour les logos sur desktop */
        @media (min-width: 992px) {
            header .text-container {
                margin-left: 83px;
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
            
            /* Logo ajusté */
            .full-height-logo {
                height: 146px;
            }
            
            /* STICKY FIXE POUR DESKTOP */
            .sticky-wrapper {
                position: fixed !important;
                top: 0 !important;
                animation: none !important;
                transform: translateY(0) !important;
                transition: transform 0.3s ease !important;
            }
            
            body {
                padding-top: 146px !important;
            }
        }
        
        /* ====== RESPONSIVE MOBILE ====== */
        @media (max-width: 991px) {
            .sticky-wrapper {
                position: relative;
                background: linear-gradient(135deg, #1a1a2e, #16213e);
            }
            
            body {
                padding-top: 0;
            }
            
            .full-height-logo {
                display: none;
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
            
            /* Header mobile optimisé */
            header {
                flex-direction: column;
                text-align: center;
                padding: 15px 10px;
            }
            
            .text-container {
                order: 2;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            
            .text-container h1 {
                font-size: 1.8rem;
            }
            
            .text-container p {
                font-size: 0.9rem;
                line-height: 1.3;
            }
            
            /* Logos mobile SANS ARRIÈRE-PLAN */
            .logo-container1 {
                height: 60px !important;
                width: 60px !important;
                margin: 0 5px !important;
                padding: 5px;
                background: transparent !important; /* Transparent */
                border-radius: 0 !important;
            }
            
            .logo-container1 img {
                max-height: 50px;
                max-width: 50px;
                filter: brightness(0) invert(1); /* Logo blanc */
            }
            
            /* Navigation mobile */
            .custom-navbar {
                background: rgba(0, 0, 0, 0.95);
                padding: 0;
            }
            
            .navbar-toggler {
                margin: 10px 15px;
                border: 1px solid rgba(255,255,255,0.5);
            }
            
            .navbar-collapse {
                background: rgba(0, 0, 0, 0.98);
                padding: 15px;
                border-top: 1px solid rgba(255,255,255,0.1);
            }
            
            .nav-link {
                text-align: center;
                padding: 12px;
                margin: 2px 0;
                border-radius: 5px;
                font-size: 0.95rem;
            }
            
            .nav-link:hover, .nav-link.active {
                background: rgba(255,255,255,0.1);
            }
            
            /* Dropdown mobile */
            .nav-item.dropdown .dropdown-menu {
                background-color: rgba(52, 58, 64, 0.9);
                border: none;
                padding-left: 15px;
                margin: 5px 0;
                border-left: 3px solid #007bff;
            }
            
            .nav-item.dropdown .dropdown-item {
                padding: 8px 15px;
                color: rgba(255, 255, 255, 0.9);
                font-size: 0.9rem;
            }
            
            /* Liens header mobile */
            .links {
                order: 1;
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 5px;
                margin: 10px 0 !important;
                font-size: 0.8rem;
            }
            
            .links a {
                margin: 0 5px !important;
                padding: 5px 8px !important;
                background: rgba(255,255,255,0.1);
                border-radius: 4px;
                min-width: fit-content;
            }
            
            .links span {
                display: none;
            }
            
            /* Badge admin mobile */
            .badge.bg-success {
                margin: 0 auto 10px !important;
                display: inline-flex !important;
            }
            
            /* Menu admin mobile */
            .nav-item.dropdown.admin-menu .dropdown-menu {
                background-color: rgba(44, 62, 80, 0.95);
                margin-left: 10px;
                border-left: 3px solid #28a745;
            }
            
            .admin-header-badge {
                top: 0;
                right: 0;
                position: absolute;
                border-radius: 0;
                display: none !important;
            }
        }
        
        /* ====== TABLETTE (768px - 991px) ====== */
        @media (min-width: 768px) and (max-width: 991px) {
            header {
                flex-direction: row;
                padding: 10px 15px;
            }
            
            .text-container {
                order: 1;
                margin-top: 0;
                margin-bottom: 0;
            }
            
            .text-container h1 {
                font-size: 2rem;
            }
            
            .text-container p {
                font-size: 1rem;
            }
            
            /* Logos tablette SANS ARRIÈRE-PLAN */
            .logo-container1 {
                height: 70px !important;
                width: 70px !important;
                background: transparent !important;
            }
            
            .links {
                order: 2;
                margin: 0 !important;
                font-size: 0.85rem;
            }
            
            .links a {
                margin: 0 8px !important;
            }
            
            .nav-link {
                font-size: 0.9rem;
                padding: 10px 15px;
            }
        }
        
        /* ====== PETIT MOBILE (< 576px) ====== */
        @media (max-width: 576px) {
            .text-container h1 {
                font-size: 1.5rem;
            }
            
            .text-container p {
                font-size: 0.8rem;
                line-height: 1.2;
            }
            
            /* Logos petit mobile SANS ARRIÈRE-PLAN */
            .logo-container1 {
                height: 50px !important;
                width: 50px !important;
                margin: 0 3px !important;
                background: transparent !important;
            }
            
            .logo-container1 img {
                max-height: 40px;
                max-width: 40px;
                filter: brightness(0) invert(1);
            }
            
            .links {
                font-size: 0.75rem;
            }
            
            .links a {
                margin: 0 3px !important;
                padding: 4px 6px !important;
            }
            
            .nav-link {
                font-size: 0.85rem;
                padding: 10px;
            }
            
            .badge.bg-success {
                font-size: 0.75rem;
                padding: 4px 8px;
            }
        }
        
        /* ====== FOOTER RESPONSIVE ====== */
        footer {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: white;
            margin-top: auto;
        }
        
        @media (max-width: 768px) {
            footer .row {
                gap: 2rem 0;
            }
            
            footer .col-md-3 {
                padding-bottom: 2rem;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            
            footer .col-md-3:last-child {
                border-bottom: none;
                padding-bottom: 0;
            }
            
            footer h5 {
                color: #4dabf7;
                margin-bottom: 1rem;
                font-size: 1.1rem;
            }
            
            footer ul li {
                margin-bottom: 0.5rem;
            }
            
            footer a {
                color: rgba(255,255,255,0.8);
                transition: color 0.3s ease;
            }
            
            footer a:hover {
                color: #4dabf7;
                text-decoration: none;
            }
            
            .underline {
                background: rgba(255,255,255,0.1);
                height: 1px;
                margin: 1.5rem 0;
            }
            
            footer img {
                max-width: 70px;
            }
        }
        
        /* ====== ANIMATIONS ====== */
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
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
            }
            70% {
                box-shadow: 0 0 0 5px rgba(40, 167, 69, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
            }
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
            }
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Style pour le menu actif */
        .nav-item.dropdown .dropdown-item.active {
            background-color: #007bff;
            color: white;
        }
        
        /* Animation douce pour le dropdown */
        .dropdown-menu {
            animation: fadeIn 0.3s ease;
        }
        
        /* Styles spécifiques pour le menu Admin */
        .nav-item.dropdown.admin-menu .dropdown-toggle {
            color: #28a745 !important;
            font-weight: 600;
            position: relative;
        }
        
        .nav-item.dropdown.admin-menu .dropdown-toggle::before {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background-color: #28a745;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        .nav-item.dropdown.admin-menu .dropdown-menu {
            min-width: 220px;
            background-color: #2c3e50;
            border-left: 3px solid #28a745;
        }
        
        .nav-item.dropdown.admin-menu .dropdown-item {
            color: #ecf0f1;
            border-left: 2px solid transparent;
            transition: all 0.3s ease;
        }
        
        .nav-item.dropdown.admin-menu .dropdown-item:hover {
            background-color: #34495e;
            color: white;
            border-left-color: #28a745;
            padding-left: 25px;
        }
        
        .nav-item.dropdown.admin-menu .dropdown-item i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
            color: #28a745;
        }
        
        /* Style pour le formulaire de déconnexion */
        .logout-form {
            display: inline;
        }
        
        .logout-button {
            background: none;
            border: none;
            color: #ecf0f1;
            padding: 10px 20px;
            width: 100%;
            text-align: left;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 0.9rem;
        }
        
        .logout-button:hover {
            background-color: #e74c3c;
            color: white;
            padding-left: 25px;
        }
        
        .logout-button i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }
        
        /* Style pour le header admin */
        .admin-header-badge {
            display: none;
            position: fixed;
            top: 73px;
            right: 0;
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 5px 15px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 1029;
            border-bottom-left-radius: 5px;
            box-shadow: -2px 2px 5px rgba(0,0,0,0.1);
            animation: slideInRight 0.5s ease-out;
        }
        
        /* Styles pour les séparateurs */
        .dropdown-divider {
            border-color: #495057;
            margin: 5px 0;
        }
        
        /* Animation pour les notifications admin */
        .admin-notification {
            position: relative;
        }
        
        .admin-notification::after {
            content: '';
            position: absolute;
            top: 5px;
            right: 5px;
            width: 6px;
            height: 6px;
            background-color: #ff6b6b;
            border-radius: 50%;
            animation: blink 2s infinite;
        }
        
        /* ====== AMÉLIORATIONS GÉNÉRALES ====== */
        .icon-white {
            filter: brightness(0) invert(1);
        }
        
        /* Scrollbar personnalisée */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #1a1a2e;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #16213e;
        }
    </style>
</head>

<body>
    <!-- Wrapper fixe pour header + nav -->
    <div class="sticky-wrapper">
        <!-- Logo gauche qui couvre toute la hauteur (uniquement sur desktop) -->
        <div class="full-height-logo logo-left d-none d-lg-flex">
            <img src="{{ asset('images/0 2.png') }}" alt="Logo gauche" class="img-fluid p-2">
        </div>
        
        <!-- Header -->
        <header class="d-flex align-items-center text-white py-2 px-3 px-md-4" style="background-color: #007bff;">
            <!-- Logo de gauche (visible sur mobile) -->
            <div class="logo-container1 d-flex align-items-center justify-content-center me-2 me-md-3 d-lg-none">
                <img src="{{ asset('images/0 2.png') }}" alt="Logo gauche" class="img-fluid">
            </div>

            <!-- Texte principal -->
            <div class="text-container flex-grow-1 text-center text-md-start">
                <h1 class="m-0 fw-bold">INSTI</h1>
                <p class="m-0 d-none d-md-block">Institut Nationale Supérieur de Technologie Industrielle <br> de Lokossa</p>
                <p class="m-0 d-block d-md-none">Institut Nationale Supérieur <br> de Technologie Industrielle <br> de Lokossa</p>
            </div>

            <!-- Liens à droite -->
            <div class="links d-flex align-items-center flex-wrap justify-content-center">
                @auth
                    <span class="badge bg-success me-2 me-md-3 d-inline-flex align-items-center">
                        <i class="fas fa-user-shield me-1"></i> <span class="d-none d-sm-inline">Admin Connecté</span>
                    </span>
                @endauth
                
                <a href="#" class="text-white d-flex align-items-center me-2 me-md-3">
                    <img src="{{ asset('icons/info-circle-fill.svg') }}" alt="Info" class="icon-white me-1"
                        style="width: 16px; height: 16px;"> <span class="d-none d-sm-inline">Accès rapide</span>
                </a>
                <span class="text-white d-none d-md-inline">|</span>
                <a href="#" class="text-white d-flex align-items-center mx-2 mx-md-3">
                    <img src="{{ asset('icons/snow3.svg') }}" alt="Observatoire" class="icon-white me-1"
                        style="width: 16px; height: 16px;"> <span class="d-none d-sm-inline">Observatoire</span>
                </a>
                <span class="text-white d-none d-md-inline">|</span>
                <a href="#" class="text-white d-flex align-items-center ms-2 ms-md-3">
                    <img src="{{ asset('icons/person-fill.svg') }}" alt="Person" class="icon-white me-1"
                        style="width: 16px; height: 16px;"> <span class="d-none d-sm-inline">Nous écrire</span>
                </a>
            </div>

            <!-- Logo de droite (visible sur mobile) -->
            <div class="logo-container1 d-flex align-items-center justify-content-center ms-2 ms-md-3 d-lg-none">
                <img src="{{ asset('insti.png') }}" alt="Logo droite" class="img-fluid">
            </div>
        </header>
        
        <nav class="navbar navbar-expand-lg custom-navbar py-0">
            <div class="container-fluid px-3 px-md-4">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto flex-wrap justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">ACCEUIL</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="programmeDropdown" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                PROGRAMME EaE
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="programmeDropdown">
                                <li>
                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-info-circle me-2"></i>Présentation
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-tasks me-2"></i>Activités
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('annonces') ? 'active' : '' }}" href="{{ route('annonces') }}">ACTUALITES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('entreprises') ? 'active' : '' }}" href="{{ route('entreprises') }}">ENTREPRISES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('galeries') ? 'active' : '' }}" href="{{ route('galeries') }}">GALERIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#partenaires">PARTENAIRES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}" href="{{ route('contacts') }}">CONTACTS</a>
                        </li>
                        
                        @auth
                            <li class="nav-item dropdown admin-menu">
                                <a class="nav-link dropdown-toggle admin-notification" href="#" id="adminDropdown" 
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-cog me-1"></i>ADMIN
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('module.*') ? 'active' : '' }}" 
                                           href="{{ route('module.show') }}">
                                            <i class="fas fa-cubes"></i> Module EaE
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('domaines.*') ? 'active' : '' }}" 
                                           href="{{ route('domaines.index') }}">
                                            <i class="fas fa-layer-group"></i> Domaines
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('projets.*') ? 'active' : '' }}" 
                                           href="{{ route('projets.index') }}">
                                            <i class="fas fa-project-diagram"></i> Projets
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                            @csrf
                                            <button type="submit" class="logout-button">
                                                <i class="fas fa-sign-out-alt"></i> Se déconnecter
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="full-height-logo logo-right d-none d-lg-flex">
            <img src="{{ asset('insti.png') }}" alt="Logo droite" class="img-fluid p-2">
        </div>
    </div>

    <!-- Contenu principal -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-4 mt-auto">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex flex-column align-items-center align-items-lg-start">
                        <img src="{{ asset('images/0 2.png') }}" alt="Logo INSTI" class="mb-3" style="width: 80px;">
                        <p class="mb-1 text-center text-lg-start">Lokossa, Agnivedji</p>
                        <p class="mb-1"><strong>(+229) 22 41 13 66</strong></p>
                        <p class="mb-2 text-center text-lg-start">"Science et technologie au service de l'homme"</p>
                        <a href="mailto:instilokossa@gmail.com" class="text-white d-block mb-3">
                            <strong>instilokossa@gmail.com</strong>
                        </a>
                        
                        <div class="d-flex gap-3 mb-3">
                            <a href="https://facebook.com" target="_blank" class="text-white">
                                <img src="{{ asset('icons/facebook.svg') }}" alt="Facebook" class="icon-white" style="width: 35px; height: 35px;">
                            </a>
                            <a href="https://youtube.com" target="_blank" class="text-white">
                                <img src="{{ asset('icons/youtube.svg') }}" alt="YouTube" class="icon-white" style="width: 35px; height: 35px;">
                            </a>
                        </div>
                        
                        <div class="underline w-100"></div>
                        <img src="{{ asset('insti.png') }}" alt="Logo INSTI" class="mt-3" style="width: 80px;">
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5>NOS RESSOURCES</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Incubateur de startups</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Unité d'application de l'INSTI</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Plateforme E-learning</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Blog officiel de l'INSTI</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5>LIENS UTILES</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Ministère de l'Enseignement Supérieur</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Université Nationale des Sciences</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Institut National Supérieur</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
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
            <div class="text-center mt-4 pt-3 border-top border-white border-opacity-25">
                <p class="mb-0">INSTI-UNSTIM © 2025</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script_index.js') }}" defer></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion responsive du padding body
            function updateBodyPadding() {
                const body = document.body;
                const stickyWrapper = document.querySelector('.sticky-wrapper');
                
                if (window.innerWidth < 992) {
                    body.style.paddingTop = '0';
                    if (stickyWrapper) {
                        stickyWrapper.style.position = 'relative';
                    }
                } else {
                    const headerHeight = document.querySelector('header')?.offsetHeight || 73;
                    const navHeight = document.querySelector('.custom-navbar')?.offsetHeight || 73;
                    const totalHeight = headerHeight + navHeight;
                    
                    body.style.paddingTop = totalHeight + 'px';
                    if (stickyWrapper) {
                        stickyWrapper.style.position = 'fixed';
                        stickyWrapper.style.top = '0';
                        
                        // Ajuster la hauteur des logos
                        const logos = document.querySelectorAll('.full-height-logo');
                        logos.forEach(logo => {
                            logo.style.height = totalHeight + 'px';
                        });
                    }
                }
            }
            
            // Navigation active
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link, .dropdown-item').forEach(link => {
                if (link.getAttribute('href') && link.getAttribute('href').includes(currentPath)) {
                    link.classList.add('active');
                    const dropdownToggle = link.closest('.dropdown')?.querySelector('.dropdown-toggle');
                    if (dropdownToggle) dropdownToggle.classList.add('active');
                }
            });
            
            // Scroll fluide
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;
                    
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const isDesktop = window.innerWidth >= 992;
                        const offset = isDesktop ? document.querySelector('.sticky-wrapper').offsetHeight : 0;
                        const targetPosition = target.offsetTop - offset;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Confirmation déconnexion
            document.querySelectorAll('.logout-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                        e.preventDefault();
                    }
                });
            });
            
            // Initialisation
            updateBodyPadding();
            window.addEventListener('resize', updateBodyPadding);
            window.addEventListener('load', updateBodyPadding);
            
            // NE PAS CACHER LE MENU AU SCROLL - TOUJOURS VISIBLE
            // Suppression de l'animation de cache au scroll
            
            // Badge admin (si vous voulez le rétablir)
            const adminBadge = document.querySelector('.admin-header-badge');
            if (adminBadge && window.innerWidth >= 992) {
                setTimeout(() => {
                    adminBadge.style.display = 'block';
                }, 1000);
            }
        });
        
        // FORCER LE HEADER À RESTER FIXE SUR DESKTOP
        window.addEventListener('scroll', function() {
            if (window.innerWidth >= 992) {
                const stickyWrapper = document.querySelector('.sticky-wrapper');
                if (stickyWrapper) {
                    stickyWrapper.style.transform = 'translateY(0)';
                    stickyWrapper.style.transition = 'none';
                }
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>