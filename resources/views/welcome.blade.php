@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')
    <!-- Bannière Carrousel -->
    <section class="banner-carousel">
        <div class="carousel">
            <!-- Slide 1 -->
            <div class="carousel-slide active">
                <img src="{{ asset('images/banner1.jpeg') }}" alt="Banner 1">
                <div class="banner-content">
                    <h1>Découvrez comment l'INSTI prépare la nouvelle génération d'entrepreneurs
                        grâce à une formation pratique, axée sur les compétences et l'innovation.</h1>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-slide">
                <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Banner 2">
                <div class="banner-content">
                    <h1>Une éducation axée sur l'innovation.</h1>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-slide">
                <img src="{{ asset('images/banner2.jpeg') }}" alt="Banner 3">
                <div class="banner-content">
                    <h1>Rejoignez-nous pour transformer des idées en réalité.</h1>
                </div>
            </div>
            <!-- Contrôles -->
            <button class="carousel-control prev">&#10094;</button>
            <button class="carousel-control next">&#10095;</button>
        </div>
    </script>
    </section>

    <!-- Section Présentation -->
    <section class="presentation-section">
        <div class="presentation-container">
            <!-- Image de l'étudiante -->
            <div class="presentation-image">
                <img src="{{ asset('images/etudiante.png') }}" alt="Étudiante" />
            </div>
            <!-- Texte de présentation -->
            <div class="presentation-content">
                <h2 class="presentation-title">Présentation du Programme</h2>
                <p>
                    L'Institut National Supérieur de Technologie Industrielle (INSTI) de Lokossa, en partenariat avec
                    des organisations de développement, propose le Programme Entreprendre à l'École. Ce programme vise
                    à former des étudiants aux compétences entrepreneuriales et technologiques pour les préparer à
                    l'auto-emploi.
                    Grâce à une formation de qualité et un accompagnement professionnel, l'INSTI aide les jeunes à
                    transformer leurs
                    idées en entreprises innovantes, contribuant ainsi au développement économique local.
                </p>
                <div class="presentation-buttons">
                    <a href="#" class="btn-primary">
                        Lire plus
                        <img src="{{ asset('images/arrow-icon.svg') }}" alt="Flèche" class="btn-icon">
                    </a>
                    <a href="#" class="btn-primary">
                        Voir l'INSTI
                        <img src="{{ asset('images/globe-icon.svg') }}" alt="Globe" class="btn-icon">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Statistiques -->
    <section class="stats-section">
        <div class="stats-content">
            <!-- Bloc gauche : Image + texte -->
            <div class="stats-left">
                <img src="{{ asset('images/team-meeting.png') }}" alt="Équipe en réunion" class="stats-image">
                <h2 class="stats-title">NOS STATISTIQUE</h2>
                <p class="stats-description">
                    Grâce à l'appui de nos partenaires, le Programme Entreprendre à l'École a permis de former
                    [nombre d'étudiants] jeunes aux compétences entrepreneuriales. Aujourd'hui, plusieurs startups
                    issues du programme innovent pour répondre aux besoins locaux, et un grand nombre de participants
                    envisagent de créer leur propre entreprise.
                </p>
            </div>

            <!-- Bloc droit : Statistiques -->
            <div class="stats-right">
                <!-- Première colonne -->
                <div class="stats-column">
                    <div class="stat-item">
                        <img src="{{ asset('images/startups.svg') }}" alt="Startups créées" class="stat-icon">
                        <div class="stat-info">
                            <h3 class="stat-number">4</h3>
                            <p class="stat-text">NOMBRE DE<br>STARTUPS<br>CRÉÉES</p>
                        </div>
                    </div>
                    <div class="stat-item">
                        <img src="{{ asset('images/students.svg') }}" alt="Étudiants formés" class="stat-icon">
                        <div class="stat-info">
                            <h3 class="stat-number">20</h3>
                            <p class="stat-text">ÉTUDIANTS<br>FORMÉS</p>
                        </div>
                    </div>
                    <div class="stat-item">
                        <img src="{{ asset('images/projects.svg') }}" alt="Projets développés" class="stat-icon">
                        <div class="stat-info">
                            <h3 class="stat-number">35+</h3>
                            <p class="stat-text">PROJETS<br>DÉVELOPPÉS</p>
                        </div>
                    </div>
                </div>

                <!-- Deuxième colonne -->
                <div class="stats-column">
                    <div class="stat-item">
                        <img src="{{ asset('images/employment.svg') }}" alt="Taux d'emploi" class="stat-icon">
                        <div class="stat-info">
                            <h3 class="stat-number">80%</h3>
                            <p class="stat-text">TAUX D'EMPLOI ET<br>D'AUTO-EMPLOI</p>
                        </div>
                    </div>
                    <div class="stat-item">
                        <img src="{{ asset('images/partners.svg') }}" alt="Partenariats" class="stat-icon">
                        <div class="stat-info">
                            <h3 class="stat-number">10</h3>
                            <p class="stat-text">PARTENARIATS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section news -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">DERNIÈRES NOUVELLES ET ÉVÉNEMENTS</h2>
            <p class="section-subtitle">Restez à jour avec les avancées et événements marquants du programme
                Entreprendre à l'École</p>

            <div class="news-cards">
                <!-- Premier bloc (50%) -->
                <div class="news-card large">
                    <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Lancement d'AppDev229" class="news-image">
                    <div class="news-overlay">
                        <div class="news-content">
                            <h3 class="news-title">Lancement de l'entreprise DUOS SALES</h3>
                            <p class="news-description">Une startup spécialisée dans la formation des jeunes écoliers
                                et élèves à l'utilisation de l'électronique.</p>
                            <div class="news-footer">
                                <span class="news-date">
                                    <img src="{{ asset('images/calendar-icon1.svg') }}" alt="Calendar icon"
                                        class="news-icon-calendar">
                                    <strong>22 juillet 2024</strong>
                                </span>
                                <a href="{{ route('annonces_plus') }}" class="news-button">
                                    Lire plus
                                    <img src="{{ asset('images/eye-icon.svg') }}" alt="Eye icon" class="news-icon-eye">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deuxième bloc (25%) -->
                <div class="news-card small">
                    <img src="{{ asset('images/news2.png') }}" alt="Événement 2" class="news-image">
                    <div class="news-content">
                        <h3 class="news-title">Lancement d'AppDev229</h3>
                        <p class="news-description">Une startup spécialisée en développement d'applications.</p>
                        <div class="news-footter">
                            <span class="news-date">
                                <img src="{{ asset('images/calendar-icon.svg') }}" alt="Calendar icon"
                                    class="news-icon-calendar">
                                <strong>17 Mars 2022</strong>
                            </span>
                            <a href="{{ route('annonces_plus') }}" class="news-button">
                                Lire plus
                                <img src="{{ asset('images/eye-icon.svg') }}" alt="Eye icon" class="news-icon-eye">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Troisième bloc (25%) -->
                <div class="news-card small">
                    <img src="{{ asset('images/news3.png') }}" alt="Événement 3" class="news-image">
                    <div class="news-content">
                        <h3 class="news-title">Lancement d'AppDev229</h3>
                        <p class="news-description">Une startup spécialisée en développement d'applications.</p>
                        <div class="news-footer">
                            <span class="news-date">
                                <img src="{{ asset('images/calendar-icon.svg') }}" alt="Calendar icon"
                                    class="news-icon-calendar">
                                <strong>17 Mars 2022</strong>
                            </span>
                            <a href="{{ route('annonces_plus') }}" class="news-button">
                                Lire plus
                                <img src="{{ asset('images/eye-icon.svg') }}" alt="Eye icon" class="news-icon-eye">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partenaires -->
    <div id="partenaires" class="partners-section">
        <h1><strong>Partenaires Associés</strong></h1>
        <div class="under1"></div>
        <div class="carousel1">
            <button class="prev-btn">❮</button>
            <div class="carousel-images">
                <img src="{{ asset('images/UNSTIM.png') }}" alt="UNSTIM">
                <img src="{{ asset('images/SONEB.png') }}" alt="SONEB">
                <img src="{{ asset('images/GEL.png') }}" alt="Guichet d'Économie Locale">
                <img src="{{ asset('images/snv.jpeg') }}" alt="">
            </div>
            <button class="next-btn">❯</button>
        </div>
    </div>
@endsection