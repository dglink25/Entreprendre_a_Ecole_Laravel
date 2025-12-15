@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <!-- Bannière Carrousel -->
    <section class="banner-carousel animated-section">
        <div class="carousel">
            <!-- Slide 1 -->
            <div class="carousel-slide active">
                <img src="{{ asset('images/banner1.jpeg') }}" alt="Banner 1">
                <div class="banner-content">
                    <div class="container">
                        <h1>Découvrez comment l'INSTI prépare la nouvelle génération d'entrepreneurs grâce à une formation pratique, axée sur les compétences et l'innovation.</h1>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-slide">
                <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Banner 2">
                <div class="banner-content">
                    <div class="container">
                        <h1>Une éducation axée sur l'innovation.</h1>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-slide">
                <img src="{{ asset('images/banner2.jpeg') }}" alt="Banner 3">
                <div class="banner-content">
                    <div class="container">
                        <h1>Rejoignez-nous pour transformer des idées en réalité.</h1>
                    </div>
                </div>
            </div>
            <!-- Contrôles -->
            <button class="carousel-control prev">&#10094;</button>
            <button class="carousel-control next">&#10095;</button>
        </div>
    </section>

    <!-- Section Présentation -->
    <section class="presentation-section py-5 animated-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image de l'étudiante -->
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <div class="presentation-image">
                        <img src="{{ asset('images/etudiante.png') }}" alt="Étudiante" class="img-fluid rounded shadow animate-on-scroll">
                    </div>
                </div>
                <!-- Texte de présentation -->
                <div class="col-lg-6 col-md-12">
                    <div class="presentation-content">
                        <h2 class="presentation-title mb-4 animate-on-scroll">Présentation du Programme</h2>
                        <p class="text-justify lead animate-on-scroll" data-delay="100">
                            L'Institut National Supérieur de Technologie Industrielle (INSTI) de Lokossa, en partenariat avec
                            des organisations de développement, propose le <strong>Programme Entreprendre à l'École</strong>. 
                            Ce programme vise à former des étudiants aux compétences entrepreneuriales et technologiques 
                            pour les préparer à l'auto-emploi.
                        </p>
                        <p class="text-justify animate-on-scroll" data-delay="200">
                            Grâce à une formation de qualité et un accompagnement professionnel, l'INSTI aide les jeunes à
                            transformer leurs idées en entreprises innovantes, contribuant ainsi au développement économique local.
                        </p>
                        <div class="presentation-buttons mt-4 animate-on-scroll" data-delay="300">
                            <a href="" class="btn btn-primary me-3 mb-2">
                                Lire plus
                                <img src="{{ asset('images/arrow-icon.svg') }}" alt="Flèche" class="btn-icon ms-2">
                            </a>
                            <a href="#" class="btn btn-outline-primary mb-2">
                                Voir l'INSTI
                                <img src="{{ asset('images/globe-icon.svg') }}" alt="Globe" class="btn-icon ms-2">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Statistiques -->
    <section class="stats-section py-5 bg-light animated-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="stats-title mb-3 animate-on-scroll">NOS STATISTIQUES</h2>
                    <p class="stats-description mx-auto text-center animate-on-scroll" data-delay="100" style="max-width: 800px;">
                        Grâce à l'appui de nos partenaires, le Programme Entreprendre à l'École a permis de former
                        de nombreux jeunes aux compétences entrepreneuriales. Aujourd'hui, plusieurs startups
                        issues du programme innovent pour répondre aux besoins locaux.
                    </p>
                </div>
            </div>

            <!-- Statistiques horizontales -->
            <div class="stats-horizontal">
                <div class="row g-4 justify-content-center">
                    <!-- Statistique 1 -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="stat-item card border-0 shadow text-center p-4 h-100 animate-on-scroll" data-delay="0">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper">
                                    <img src="{{ asset('images/startups.svg') }}" alt="Startups créées" class="img-fluid">
                                </div>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number display-4 fw-bold text-primary mb-2 count-animate" data-count="4">0</h3>
                                <p class="stat-text fw-semibold text-uppercase">STARTUPS CRÉÉES</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Statistique 2 -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="stat-item card border-0 shadow text-center p-4 h-100 animate-on-scroll" data-delay="100">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper">
                                    <img src="{{ asset('images/students.svg') }}" alt="Étudiants formés" class="img-fluid">
                                </div>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number display-4 fw-bold text-primary mb-2 count-animate" data-count="20">0</h3>
                                <p class="stat-text fw-semibold text-uppercase">ÉTUDIANTS FORMÉS</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Statistique 3 -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="stat-item card border-0 shadow text-center p-4 h-100 animate-on-scroll" data-delay="200">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper">
                                    <img src="{{ asset('images/projects.svg') }}" alt="Projets développés" class="img-fluid">
                                </div>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number display-4 fw-bold text-primary mb-2 count-animate" data-count="35">0+</h3>
                                <p class="stat-text fw-semibold text-uppercase">PROJETS DÉVELOPPÉS</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Statistique 4 -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="stat-item card border-0 shadow text-center p-4 h-100 animate-on-scroll" data-delay="300">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper">
                                    <img src="{{ asset('images/partners.svg') }}" alt="Partenariats" class="img-fluid">
                                </div>
                            </div>
                            <div class="stat-info">
                                <h3 class="stat-number display-4 fw-bold text-primary mb-2 count-animate" data-count="10">0</h3>
                                <p class="stat-text fw-semibold text-uppercase">PARTENARIATS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section news -->
    <section class="news-section py-5 animated-section">
        <div class="container">
            <h2 class="section-title text-center mb-3 animate-on-scroll">DERNIÈRES NOUVELLES ET ÉVÉNEMENTS</h2>
            <p class="section-subtitle text-center text-muted mb-5 animate-on-scroll" data-delay="100">
                Restez à jour avec les avancées et événements marquants du programme Entreprendre à l'École
            </p>

            <div class="row g-4">
                <!-- Premier bloc (grand) -->
                <div class="col-lg-6 col-md-12">
                    <div class="news-card-large card border-0 overflow-hidden shadow h-100 animate-on-scroll" data-delay="0">
                        <div class="position-relative">
                            <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Lancement de DUOS SALES" 
                                 class="card-img-top news-image" style="height: 300px; object-fit: cover;">
                            <div class="news-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end">
                                <div class="news-content p-4 text-white w-100" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                                    <h3 class="news-title h4 mb-2">Lancement de l'entreprise DUOS SALES</h3>
                                    <p class="news-description mb-3">
                                        Une startup spécialisée dans la formation des jeunes écoliers et élèves à l'utilisation de l'électronique.
                                    </p>
                                    <div class="news-footer d-flex justify-content-between align-items-center">
                                        <span class="news-date d-flex align-items-center">
                                            <img src="{{ asset('images/calendar-icon1.svg') }}" alt="Calendar icon" 
                                                 class="news-icon-calendar me-2" style="width: 20px; height: 20px;">
                                            <strong>22 juillet 2024</strong>
                                        </span>
                                        <a href="{{ route('annonces_plus') }}" class="news-button btn btn-light btn-sm">
                                            Lire plus
                                            <img src="{{ asset('images/eye-icon.svg') }}" alt="Eye icon" class="ms-1" style="width: 16px; height: 16px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deuxième et troisième blocs (petits) -->
                <div class="col-lg-6 col-md-12">
                    <div class="row g-4">
                        <!-- Deuxième bloc -->
                        <div class="col-md-6 col-12">
                            <div class="news-card-small card border-0 shadow h-100 animate-on-scroll" data-delay="100">
                                <img src="{{ asset('images/news2.png') }}" alt="Événement 2" 
                                     class="card-img-top news-image" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h3 class="news-title h5 mb-2">Lancement d'AppDev229</h3>
                                    <p class="news-description text-muted mb-3">
                                        Une startup spécialisée en développement d'applications.
                                    </p>
                                    <div class="news-footer d-flex justify-content-between align-items-center">
                                        <span class="news-date d-flex align-items-center">
                                            <img src="{{ asset('images/calendar-icon.svg') }}" alt="Calendar icon" 
                                                 class="news-icon-calendar me-2" style="width: 16px; height: 16px;">
                                            <small class="text-muted">17 Mars 2022</small>
                                        </span>
                                        <a href="{{ route('annonces_plus') }}" class="news-button btn btn-outline-primary btn-sm">
                                            Lire plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Troisième bloc -->
                        <div class="col-md-6 col-12">
                            <div class="news-card-small card border-0 shadow h-100 animate-on-scroll" data-delay="200">
                                <img src="{{ asset('images/news3.png') }}" alt="Événement 3" 
                                     class="card-img-top news-image" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h3 class="news-title h5 mb-2">Lancement d'AppDev229</h3>
                                    <p class="news-description text-muted mb-3">
                                        Une startup spécialisée en développement d'applications.
                                    </p>
                                    <div class="news-footer d-flex justify-content-between align-items-center">
                                        <span class="news-date d-flex align-items-center">
                                            <img src="{{ asset('images/calendar-icon.svg') }}" alt="Calendar icon" 
                                                 class="news-icon-calendar me-2" style="width: 16px; height: 16px;">
                                            <small class="text-muted">17 Mars 2022</small>
                                        </span>
                                        <a href="{{ route('annonces_plus') }}" class="news-button btn btn-outline-primary btn-sm">
                                            Lire plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bouton pour voir plus d'annonces -->
                        <div class="col-12">
                            <div class="text-center mt-3 animate-on-scroll" data-delay="300">
                                <a href="{{ route('annonces') }}" class="btn btn-primary">
                                    Voir toutes les annonces
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partenaires -->
    <section id="partenaires" class="partners-section py-5 bg-light animated-section">
        <div class="container">
            <h1 class="text-center mb-4 animate-on-scroll"><strong>Partenaires Associés</strong></h1>
            <div class="under1 mx-auto mb-5 animate-on-scroll" data-delay="100" style="width: 100px; height: 3px; background: #007bff;"></div>
            
            <div class="position-relative">
                <button class="prev-btn position-absolute start-0 top-50 translate-middle-y btn btn-light rounded-circle shadow d-none d-md-block" 
                        style="z-index: 1; width: 50px; height: 50px;">
                    ❮
                </button>
                
                <div class="carousel-images overflow-hidden">
                    <div class="row justify-content-center align-items-center g-4">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 animate-on-scroll" data-delay="0">
                            <div class="partner-logo card border-0 shadow-sm p-3 h-100 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/UNSTIM.png') }}" alt="UNSTIM" class="img-fluid" style="max-height: 180px;">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 animate-on-scroll" data-delay="100">
                            <div class="partner-logo card border-0 shadow-sm p-3 h-100 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/SONEB.png') }}" alt="SONEB" class="img-fluid" style="max-height: 180px;">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 animate-on-scroll" data-delay="200">
                            <div class="partner-logo card border-0 shadow-sm p-3 h-100 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/GEL.png') }}" alt="Guichet d'Économie Locale" class="img-fluid" style="max-height:180px;">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 animate-on-scroll" data-delay="300">
                            <div class="partner-logo card border-0 shadow-sm p-3 h-100 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/snv.jpeg') }}" alt="SNV" class="img-fluid" style="max-height: 180px;">
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="next-btn position-absolute end-0 top-50 translate-middle-y btn btn-light rounded-circle shadow d-none d-md-block"
                        style="z-index: 1; width: 50px; height: 50px;">
                    ❯
                </button>
            </div>
        </div>
    </section>

    <style>
        /* Styles personnalisés pour améliorer le responsive et animations */
        .text-justify {
            text-align: justify;
            text-justify: inter-word;
        }
        
        /* Carousel */
        .banner-carousel {
            position: relative;
            overflow: hidden;
            margin-top: -1px;
        }
        
        .banner-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            padding: 2rem;
            color: white;
        }
        
        .banner-content h1 {
            font-size: 1.8rem;
            line-height: 1.4;
            margin-bottom: 0;
        }
        
        /* Statistiques horizontales */
        .stats-horizontal .stat-item {
            background: white;
            border-radius: 15px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
        }
        
        .stats-horizontal .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #007bff, #00bfff);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        
        .stats-horizontal .stat-item:hover::before {
            transform: scaleX(1);
        }
        
        .stats-horizontal .stat-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 123, 255, 0.15) !important;
        }
        
        .stats-horizontal .icon-wrapper {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s ease;
        }
        
        .stats-horizontal .stat-item:hover .icon-wrapper {
            background: linear-gradient(135deg, #007bff, #00bfff);
            transform: rotateY(360deg);
        }
        
        .stats-horizontal .stat-item:hover .icon-wrapper img {
            filter: brightness(0) invert(1);
        }
        
        .stats-horizontal .stat-number {
            font-size: 3rem;
            background: linear-gradient(90deg, #007bff, #00bfff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stats-horizontal .stat-text {
            color: #6c757d;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }
        
        /* Animations au scroll */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Style pour les cartes de news */
        .news-card-large, .news-card-small {
            transition: all 0.4s ease;
            border-radius: 15px;
            overflow: hidden;
        }
        
        .news-card-large:hover, .news-card-small:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
        }
        
        /* Style pour les logos partenaires */
        .partner-logo {
            transition: all 0.4s ease;
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }
        
        .partner-logo:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .banner-content {
                padding: 1rem;
            }
            
            .banner-content h1 {
                font-size: 1.2rem;
            }
            
            .stats-horizontal .stat-number {
                font-size: 2.5rem;
            }
            
            .stats-horizontal .icon-wrapper {
                width: 60px;
                height: 60px;
            }
            
            .presentation-section,
            .stats-section,
            .news-section,
            .partners-section {
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }
        }
        
        @media (min-width: 768px) and (max-width: 992px) {
            .banner-content h1 {
                font-size: 1.5rem;
            }
            
            .stats-horizontal .stat-number {
                font-size: 2.8rem;
            }
        }
        
        @media (min-width: 992px) and (max-width: 1200px) {
            .stats-horizontal .stat-number {
                font-size: 2.5rem;
            }
        }
        
        /* Animation pour les chiffres qui défilent */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .count-animate {
            animation: countUp 1s ease forwards;
        }
        
        /* Dégradé de fond pour les sections */
        .presentation-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }
        
        .news-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }
    </style>
    
    <!-- Scripts pour les animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation au scroll
            const animateElements = document.querySelectorAll('.animate-on-scroll');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.getAttribute('data-delay') || 0;
                        setTimeout(() => {
                            entry.target.classList.add('animated');
                        }, parseInt(delay));
                        
                        // Animation pour les chiffres
                        if (entry.target.classList.contains('stat-item')) {
                            const countElement = entry.target.querySelector('.count-animate');
                            if (countElement) {
                                animateCount(countElement);
                            }
                        }
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            animateElements.forEach(el => observer.observe(el));
            
            // Animation des chiffres
            function animateCount(element) {
                const target = parseInt(element.getAttribute('data-count'));
                const suffix = element.textContent.includes('+') ? '+' : '';
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        element.textContent = target + suffix;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(current) + suffix;
                    }
                }, 30);
            }
            
            // Gestion du carousel des partenaires
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            
            if (prevBtn && nextBtn) {
                prevBtn.addEventListener('click', function() {
                    const container = document.querySelector('.carousel-images');
                    container.scrollBy({
                        left: -300,
                        behavior: 'smooth'
                    });
                });
                
                nextBtn.addEventListener('click', function() {
                    const container = document.querySelector('.carousel-images');
                    container.scrollBy({
                        left: 300,
                        behavior: 'smooth'
                    });
                });
            }
            
            // Animation initiale pour les éléments déjà visibles
            animateElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight * 0.8) {
                    const delay = el.getAttribute('data-delay') || 0;
                    setTimeout(() => {
                        el.classList.add('animated');
                        
                        // Animation pour les chiffres
                        if (el.classList.contains('stat-item')) {
                            const countElement = el.querySelector('.count-animate');
                            if (countElement) {
                                animateCount(countElement);
                            }
                        }
                    }, parseInt(delay));
                }
            });
        });
        
        // Réanimation lors du retour en haut de page
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop < 100) {
                document.querySelectorAll('.animate-on-scroll.animated').forEach(el => {
                    el.classList.remove('animated');
                    
                    // Réinitialiser les compteurs
                    const countElement = el.querySelector('.count-animate');
                    if (countElement) {
                        countElement.textContent = '0';
                        if (countElement.textContent.includes('+')) {
                            countElement.textContent = '0+';
                        }
                    }
                    
                    // Réobserver
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const delay = entry.target.getAttribute('data-delay') || 0;
                                setTimeout(() => {
                                    entry.target.classList.add('animated');
                                    
                                    // Réanimer les compteurs
                                    if (entry.target.classList.contains('stat-item')) {
                                        const countElement = entry.target.querySelector('.count-animate');
                                        if (countElement) {
                                            animateCount(countElement);
                                        }
                                    }
                                }, parseInt(delay));
                            }
                        });
                    }, {
                        threshold: 0.1,
                        rootMargin: '0px 0px -50px 0px'
                    });
                    
                    observer.observe(el);
                });
            }
        });
        
        // Fonction helper pour animer les compteurs
        function animateCount(element) {
            const target = parseInt(element.getAttribute('data-count'));
            const suffix = element.textContent.includes('+') ? '+' : '';
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target + suffix;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current) + suffix;
                }
            }, 30);
        }
    </script>
@endsection