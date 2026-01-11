@extends('layouts.app')

@section('title', 'Actualités')

@section('content')
<style>
    /* Styles pour la page actualités */
    .gallery-header {
        position: relative;
        height: 40vh;
        min-height: 250px;
        overflow: hidden;
        margin-top: -1px;
    }
    
    .gallery-header .header-image {
        height: 100%;
        width: 100%;
    }
    
    .gallery-header .header-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.5);
    }
    
    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(13, 66, 147, 0.4), rgba(26, 86, 219, 0.3));
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    
    .carousel_title {
        text-align: center;
        color: white;
        padding: 2rem;
    }
    
    .carousel_title h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .carousel_title .subtitle {
        font-size: 1rem;
        font-weight: 400;
        letter-spacing: 1px;
        opacity: 0.95;
    }
    
    .container00 {
        display: flex;
        gap: 40px;
        max-width: 1200px;
        margin: 50px auto;
        padding: 0 30px;
    }
    
    .main-content {
        flex: 1;
        min-width: 0;
    }
    
    .event-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
        transition: all 0.3s ease;
    }
    
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
    
    .event-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }
    
    .event-content {
        padding: 30px;
    }
    
    .event-date {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #0D4293;
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .event-date img {
        width: 16px;
        height: 16px;
    }
    
    .event-content h1 {
        font-size: 1.5rem;
        color: #1e293b;
        margin-bottom: 15px;
        line-height: 1.4;
        font-weight: 700;
    }
    
    .event-content p {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }
    
    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        background: #0D4293;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 14px;
    }
    
    .read-more:hover {
        background: #1a56db;
        transform: translateX(5px);
    }
    
    .read-more a {
        color: white;
        text-decoration: none;
    }
    
    .read-more img {
        width: 16px;
        height: 16px;
    }
    
    /* Sidebar styles */
    .sidebar {
        width: 320px;
        flex-shrink: 0;
    }
    
    .search-box {
        position: relative;
        margin-bottom: 30px;
    }
    
    .search-box input {
        width: 100%;
        padding: 12px 45px 12px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .search-box input:focus {
        border-color: #0D4293;
        outline: none;
        box-shadow: 0 0 0 3px rgba(13, 66, 147, 0.1);
    }
    
    .search-box i {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: 16px;
    }
    
    .categories, .tags {
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 25px;
    }
    
    .categories h5, .tags h5 {
        color: #1e293b;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 8px;
    }
    
    .under {
        height: 3px;
        width: 50px;
        background: #0D4293;
        margin-bottom: 20px;
        border-radius: 2px;
    }
    
    .categories ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .categories li {
        margin-bottom: 8px;
    }
    
    .category-link {
        color: #64748b;
        text-decoration: none;
        font-size: 14px;
        padding: 8px 0;
        display: block;
        transition: all 0.3s ease;
    }
    
    .category-link:hover {
        color: #0D4293;
        padding-left: 8px;
    }
    
    .tags .btn {
        background: #f1f5f9;
        border: none;
        color: #64748b;
        padding: 6px 14px;
        margin: 4px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .tags .btn:hover {
        background: #0D4293;
        color: white;
    }
    
    /* Pagination - Style de la maquette */
    .pagination {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
        margin: 50px 0;
        padding-left: 30px;
    }
    
    .page-btn, .next-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        background: #0D4293;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
    
    .page-btn:hover, .next-btn:hover {
        background: #1a56db;
        transform: scale(1.1);
    }
    
    .page-btn.active {
        background: #1a56db;
    }
    
    .next-btn {
        background: transparent;
        border: 2px solid #0D4293;
        color: #0D4293;
    }
    
    .next-btn:hover {
        background: #0D4293;
        color: white;
    }
    
    /* Responsive Design */
    @media (max-width: 1100px) {
        .container00 {
            flex-direction: column;
        }
        
        .sidebar {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
    }
    
    @media (max-width: 768px) {
        .gallery-header {
            height: 35vh;
            min-height: 200px;
        }
        
        .carousel_title h1 {
            font-size: 2rem;
        }
        
        .container00 {
            padding: 0 20px;
            margin: 30px auto;
            gap: 30px;
        }
        
        .event-content {
            padding: 20px;
        }
        
        .event-content h1 {
            font-size: 1.3rem;
        }
        
        .pagination {
            padding-left: 20px;
        }
    }
    
    @media (max-width: 480px) {
        .event-image {
            height: 200px;
        }
        
        .page-btn, .next-btn {
            width: 35px;
            height: 35px;
            font-size: 13px;
        }
    }
</style>

<section class="gallery-header">
    <div class="carousel-overlay">
        <div class="carousel_title">
            <h1>ACTUALITÉS</h1>
            <p class="subtitle">NOUVELLES ET ÉVÉNEMENTS</p>
        </div>
    </div>
    <div class="header-image">
        <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Actualités">
    </div>
</section>

<div class="container00">
    <!-- Main Content -->
    <div class="main-content">
        <!-- Actualité 1 -->
        <div class="event-card">
            <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Lancement AppDev229" class="event-image">
            <div class="event-content">
                <p class="event-date">
                    <img src="{{ asset('icons/Vector (1).png') }}" alt="calendrier">
                    17 Mars 2022
                </p>
                <h1>Lancement d'AppDev229</h1>
                <p>AppDev229, une startup prometteuse créée dans le cadre du programme Entreprendre à l'école, se spécialise dans le développement d'applications pratiques pour les entreprises locales. Son lancement marque un pas vers l'innovation et la transformation numérique au Bénin.</p>
                <a href="{{ route('annonces_plus') }}" class="read-more">
                    Lire plus
                    <img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+">
                </a>
            </div>
        </div>

        <!-- Actualité 2 -->
        <div class="event-card">
            <img src="{{ asset('images/DSC_0196 1.png') }}" alt="Partenariat INSTI GEL SUD" class="event-image">
            <div class="event-content">
                <p class="event-date">
                    <img src="{{ asset('icons/Vector (1).png') }}" alt="calendrier">
                    17 Mars 2022
                </p>
                <h1>Renforcement du partenariat entre l'INSTI et le GEL SUD</h1>
                <p>L'INSTI et le GEL SUD ont signé un nouvel accord pour renforcer leur collaboration. Ce partenariat stratégique vise à offrir davantage de ressources et de formations pour soutenir les jeunes entrepreneurs.</p>
                <a href="{{ route('annonces_plus') }}" class="read-more">
                    Lire plus
                    <img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+">
                </a>
            </div>
        </div>

        <!-- Actualité 3 -->
        <div class="event-card">
            <img src="{{ asset('images/DSC_0196 1.png') }}" alt="Atelier développement mobile" class="event-image">
            <div class="event-content">
                <p class="event-date">
                    <img src="{{ asset('icons/Vector (1).png') }}" alt="calendrier">
                    17 Mars 2022
                </p>
                <h1>Atelier intensif de développement mobile pour les startups incubées</h1>
                <p>Un atelier intensif de développement mobile a été organisé pour les startups incubées à l'INSTI. Cette formation vise à doter les étudiants de compétences avancées en programmation pour concrétiser leurs projets.</p>
                <a href="{{ route('annonces_plus') }}" class="read-more">
                    Lire plus
                    <img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+">
                </a>
            </div>
        </div>
    </div>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="search-box">
            <input type="search" placeholder="Rechercher une actualité par mots-clés">
            <i class="fas fa-search"></i>
        </div>

        <!-- Catégories -->
        <div class="categories">
            <h5>Catégories</h5>
            <div class="under"></div>
            <ul>
                <li><a href="#" class="category-link">Articles</a></li>
                <li><a href="#" class="category-link">Événements</a></li>
                <li><a href="#" class="category-link">Communiqués</a></li>
                <li><a href="#" class="category-link">Témoignages</a></li>
            </ul>
        </div>

        <!-- Tags -->
        <div class="tags">
            <h5>Tags</h5>
            <div class="under"></div>
            <div class="d-flex flex-wrap">
                <button class="btn">Startups</button>
                <button class="btn">Formation</button>
                <button class="btn">Partenariats</button>
                <button class="btn">Innovation</button>
                <button class="btn">Développement</button>
            </div>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="pagination">
    <button class="page-btn active">1</button>
    <button class="page-btn">2</button>
    <button class="page-btn">3</button>
    <button class="next-btn">→</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pagination active state
        const pageBtns = document.querySelectorAll('.page-btn');
        pageBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                pageBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Search functionality
        const searchInput = document.querySelector('.search-box input');
        const eventCards = document.querySelectorAll('.event-card');
        
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            eventCards.forEach(card => {
                const title = card.querySelector('h1').textContent.toLowerCase();
                const content = card.querySelector('.event-content p:last-of-type').textContent.toLowerCase();
                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
        
        // Category filtering
        const categoryLinks = document.querySelectorAll('.category-link');
        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                // Ajouter la logique de filtrage ici
            });
        });
        
        // Tag filtering
        const tagButtons = document.querySelectorAll('.tags .btn');
        tagButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                // Ajouter la logique de filtrage ici
            });
        });
    });
</script>
@endsection