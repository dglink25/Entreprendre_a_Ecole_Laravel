@extends('layouts.app')

@section('title', 'Actualités')

@section('content')
<style>
    /* Styles spécifiques pour la page actualités */
    .gallery-header {
        position: relative;
        height: 60vh;
        min-height: 400px;
        max-height: 600px;
        overflow: hidden;
        margin-top: -1px;
        animation: headerReveal 1s ease-out;
    }
    
    @keyframes headerReveal {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .gallery-header .header-image {
        height: 100%;
        width: 100%;
    }
    
    .gallery-header .header-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6);
        animation: zoomIn 30s ease-in-out infinite alternate;
    }
    
    @keyframes zoomIn {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }
    
    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(13, 66, 147, 0.3), rgba(26, 86, 219, 0.2));
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    
    .carousel_title {
        text-align: center;
        color: white;
        padding: 2rem;
        max-width: 800px;
        animation: titleSlideUp 1s ease-out 0.3s both;
    }
    
    @keyframes titleSlideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .carousel_title h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .carousel_title .subtitle {
        font-size: clamp(1rem, 2vw, 1.3rem);
        font-weight: 300;
        letter-spacing: 2px;
        opacity: 0.9;
    }
    
    .container00 {
        display: flex;
        gap: clamp(20px, 4vw, 60px);
        max-width: 1400px;
        margin: clamp(40px, 6vw, 80px) auto;
        padding: 0 clamp(15px, 4vw, 40px);
        animation: containerFadeIn 0.8s ease-out 0.5s both;
    }
    
    @keyframes containerFadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .main-content {
        flex: 1;
        min-width: 0;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .event-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: clamp(30px, 4vw, 50px);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        opacity: 0;
        transform: translateY(30px) scale(0.95);
        position: relative;
    }
    
    .event-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #0D4293, #1a56db);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.6s ease-out;
    }
    
    .event-card.animated {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    .event-card.animated::before {
        transform: scaleX(1);
    }
    
    .event-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .event-image {
        width: 100%;
        height: clamp(250px, 35vw, 400px);
        object-fit: cover;
        display: block;
        transition: transform 0.8s ease-out;
    }
    
    .event-card:hover .event-image {
        transform: scale(1.08);
    }
    
    .event-content {
        padding: clamp(20px, 3vw, 40px);
    }
    
    .event-date {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #0D4293;
        font-weight: 600;
        font-size: clamp(14px, 1.5vw, 16px);
        margin-bottom: clamp(15px, 2vw, 20px);
        background: rgba(13, 66, 147, 0.08);
        padding: 10px 18px;
        border-radius: 12px;
        width: fit-content;
        transition: all 0.4s ease;
    }
    
    .event-card:hover .event-date {
        background: rgba(13, 66, 147, 0.12);
        transform: translateX(10px);
    }
    
    .event-date img {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }
    
    .event-card:hover .event-date img {
        transform: rotate(360deg);
    }
    
    .event-content h1 {
        font-size: clamp(1.4rem, 2.5vw, 2.2rem);
        color: #1e293b;
        margin-bottom: clamp(15px, 2vw, 25px);
        line-height: 1.3;
        font-weight: 700;
        transition: all 0.4s ease;
    }
    
    .event-card:hover .event-content h1 {
        color: #0D4293;
    }
    
    .event-content p {
        color: #64748b;
        line-height: 1.7;
        margin-bottom: clamp(20px, 3vw, 30px);
        font-size: clamp(0.95rem, 1.5vw, 1.1rem);
    }
    
    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: clamp(10px, 1.5vw, 14px) clamp(25px, 3vw, 35px);
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .read-more::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #1a56db, #2563eb);
        transition: left 0.6s ease-out;
        z-index: -1;
    }
    
    .read-more:hover::before {
        left: 0;
    }
    
    .read-more:hover {
        transform: translateX(8px) translateY(-2px);
        box-shadow: 0 8px 25px rgba(13, 66, 147, 0.3);
    }
    
    .read-more a {
        color: white;
        text-decoration: none;
    }
    
    .read-more img {
        width: 18px;
        height: 18px;
        transition: transform 0.5s ease-out;
    }
    
    .read-more:hover img {
        transform: translateX(8px) rotate(45deg);
    }
    
    /* Sidebar styles */
    .sidebar {
        width: clamp(300px, 30vw, 380px);
        flex-shrink: 0;
        animation: sidebarSlideIn 0.8s ease-out 0.7s both;
    }
    
    @keyframes sidebarSlideIn {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .search-box {
        position: relative;
        margin-bottom: clamp(30px, 4vw, 50px);
    }
    
    .search-box input {
        width: 100%;
        padding: clamp(12px, 2vw, 16px) clamp(15px, 2vw, 25px);
        padding-right: 60px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: clamp(14px, 1.5vw, 16px);
        transition: all 0.4s ease;
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    .search-box input:focus {
        border-color: #0D4293;
        box-shadow: 0 0 0 4px rgba(13, 66, 147, 0.15);
        outline: none;
    }
    
    .search-box i {
        position: absolute;
        right: 25px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: 18px;
        transition: all 0.4s ease;
    }
    
    .search-box input:focus + i {
        color: #0D4293;
        transform: translateY(-50%) scale(1.1);
    }
    
    .categories, .tags {
        background: white;
        padding: clamp(20px, 3vw, 30px);
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        margin-bottom: clamp(25px, 4vw, 35px);
        transition: all 0.4s ease;
    }
    
    .categories:hover, .tags:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .categories h5, .tags h5 {
        color: #1e293b;
        font-size: clamp(1.1rem, 1.8vw, 1.3rem);
        font-weight: 700;
        margin-bottom: clamp(12px, 2vw, 18px);
        position: relative;
        display: inline-block;
    }
    
    .under {
        height: 4px;
        width: 60px;
        background: linear-gradient(90deg, #0D4293, #1a56db);
        margin-bottom: clamp(15px, 2vw, 25px);
        border-radius: 2px;
        transition: width 0.4s ease-out;
    }
    
    .categories:hover .under, .tags:hover .under {
        width: 80px;
    }
    
    .categories ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .categories li {
        margin-bottom: clamp(8px, 1.5vw, 12px);
        transition: all 0.4s ease;
    }
    
    .categories li:hover {
        transform: translateX(5px);
    }
    
    .category-link {
        color: #64748b;
        text-decoration: none;
        font-size: clamp(14px, 1.5vw, 16px);
        padding: clamp(8px, 1vw, 10px) 0;
        display: block;
        transition: all 0.4s ease;
        border-radius: 8px;
        padding-left: clamp(12px, 2vw, 20px);
        position: relative;
        overflow: hidden;
    }
    
    .category-link::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        background: linear-gradient(to bottom, #0D4293, #1a56db);
        transform: translateX(-100%);
        transition: transform 0.4s ease-out;
    }
    
    .category-link:hover {
        color: #0D4293;
        background: rgba(13, 66, 147, 0.05);
        padding-left: clamp(20px, 3vw, 30px);
    }
    
    .category-link:hover::before {
        transform: translateX(0);
    }
    
    .category-link::after {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        background: #0D4293;
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .category-link:hover::after {
        opacity: 1;
    }
    
    .tags .btn {
        background: #f8fafc;
        border: 2px solid transparent;
        color: #64748b;
        padding: clamp(6px, 1vw, 8px) clamp(12px, 2vw, 18px);
        margin: clamp(3px, 0.5vw, 5px);
        border-radius: 50px;
        font-size: clamp(13px, 1.5vw, 14px);
        font-weight: 500;
        transition: all 0.4s ease;
        cursor: pointer;
        display: inline-block;
    }
    
    .tags .btn:hover {
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border-color: #0D4293;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 6px 20px rgba(13, 66, 147, 0.2);
    }
    
    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: clamp(8px, 1.5vw, 12px);
        margin: clamp(40px, 6vw, 80px) 0;
        animation: fadeIn 0.8s ease-out 1s both;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .page-btn, .next-btn {
        width: clamp(40px, 5vw, 50px);
        height: clamp(40px, 5vw, 50px);
        border-radius: 50%;
        border: 2px solid #e2e8f0;
        background: white;
        color: #64748b;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .page-btn::before, .next-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #0D4293, #1a56db);
        border-radius: 50%;
        transform: scale(0);
        transition: transform 0.4s ease-out;
        z-index: 1;
    }
    
    .page-btn span, .next-btn span {
        position: relative;
        z-index: 2;
    }
    
    .page-btn:hover, .next-btn:hover {
        border-color: #0D4293;
        color: white;
        transform: translateY(-3px);
    }
    
    .page-btn:hover::before, .next-btn:hover::before {
        transform: scale(1);
    }
    
    .page-btn.active {
        border-color: #0D4293;
        color: white;
    }
    
    .page-btn.active::before {
        transform: scale(1);
    }
    
    /* Responsive Design amélioré */
    @media (max-width: 1100px) {
        .container00 {
            flex-direction: column;
            align-items: center;
        }
        
        .sidebar {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            order: -1;
        }
        
        .main-content {
            width: 100%;
        }
        
        .carousel_title h1 {
            font-size: clamp(2rem, 4vw, 3rem);
        }
    }
    
    @media (max-width: 768px) {
        .gallery-header {
            height: 50vh;
            min-height: 300px;
        }
        
        .carousel_title {
            padding: 1.5rem;
        }
        
        .carousel_title h1 {
            letter-spacing: 2px;
        }
        
        .carousel_title .subtitle {
            font-size: clamp(0.9rem, 1.8vw, 1rem);
        }
        
        .event-content h1 {
            font-size: clamp(1.3rem, 2vw, 1.6rem);
        }
        
        .event-content {
            padding: clamp(15px, 2vw, 20px);
        }
        
        .container00 {
            padding: 0 clamp(10px, 3vw, 15px);
            margin: clamp(30px, 4vw, 40px) auto;
            gap: 30px;
        }
        
        .tags .btn {
            padding: clamp(5px, 1vw, 6px) clamp(10px, 2vw, 12px);
            font-size: clamp(12px, 1.5vw, 13px);
        }
    }
    
    @media (max-width: 480px) {
        .gallery-header {
            height: 40vh;
        }
        
        .carousel_title h1 {
            letter-spacing: 1px;
        }
        
        .event-image {
            height: clamp(200px, 40vw, 220px);
        }
        
        .read-more {
            padding: clamp(8px, 1.2vw, 10px) clamp(15px, 2.5vw, 20px);
            font-size: clamp(13px, 1.5vw, 14px);
        }
        
        .page-btn, .next-btn {
            width: clamp(35px, 4vw, 40px);
            height: clamp(35px, 4vw, 40px);
        }
    }
    
    @media (max-width: 360px) {
        .gallery-header {
            height: 35vh;
            min-height: 250px;
        }
        
        .carousel_title {
            padding: 1rem;
        }
        
        .event-date {
            padding: 8px 12px;
            font-size: 13px;
        }
        
        .container00 {
            padding: 0 10px;
        }
    }
</style>

<section class="gallery-header animated-section">
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
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="search-box">
            <input style="color: #1e293b" type="search" placeholder="Rechercher une actualité par mots-clés">
            <i class="fas fa-search"></i>
        </div>

        <!-- Catégories -->
        <div class="cate_tag">
            <div class="categories mb-4">
                <h5>Catégories</h5>
                <div class="under mt-2"></div>
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
                <div class="under mt-2"></div>
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Actualité 1 -->
        <div class="event-card animate-on-scroll" data-delay="0">
            <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Lancement DUOS SALES" class="event-image">
            <div class="event-content">
                <p class="event-date">
                    <img src="{{ asset('icons/Vector (1).png') }}" alt="calendrier">
                    22 juillet 2024
                </p>
                <h1>Lancement de l'entreprise DUOS SALES</h1>
                <p>DUOS SALES est une organisation visionnaire créée pour initier les jeunes écoliers et élèves aux bases de l'électronique, ouvrant ainsi la voie à une meilleure compréhension des technologies modernes.</p>
                <a href="{{ route('annonces_plus') }}" class="read-more">
                    <strong>Lire plus</strong>
                    <img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+">
                </a>
            </div>
        </div>

        <!-- Actualité 2 -->
        <div class="event-card animate-on-scroll" data-delay="100">
            <img src="{{ asset('images/DSC_0196 1.png') }}" alt="Partenariat INSTI GEL SUD" class="event-image">
            <div class="event-content">
                <p class="event-date">
                    <img src="{{ asset('icons/Vector (1).png') }}" alt="calendrier">
                    17 Mars 2022
                </p>
                <h1>Renforcement du partenariat entre l'INSTI et le GEL SUD</h1>
                <p>L'INSTI et le GEL SUD ont signé un nouvel accord pour renforcer leur collaboration. Ce partenariat stratégique vise à offrir davantage de ressources et de formations pour soutenir les jeunes entrepreneurs.</p>
                <a href="{{ route('annonces_plus') }}" class="read-more">
                    <strong>Lire plus</strong>
                    <img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+">
                </a>
            </div>
        </div>

        <!-- Actualité 3 -->
        <div class="event-card animate-on-scroll" data-delay="200">
            <img src="{{ asset('images/DSC_0196 1.png') }}" alt="Atelier développement mobile" class="event-image">
            <div class="event-content">
                <p class="event-date">
                    <img src="{{ asset('icons/Vector (1).png') }}" alt="calendrier">
                    17 Mars 2022
                </p>
                <h1>Atelier intensif de développement mobile pour les startups incubées</h1>
                <p>Un atelier intensif de développement mobile a été organisé pour les startups incubées à l'INSTI. Cette formation vise à doter les étudiants de compétences avancées en programmation pour concrétiser leurs projets.</p>
                <a href="{{ route('annonces_plus') }}" class="read-more">
                    <strong>Lire plus</strong>
                    <img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+">
                </a>
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
        // Animation au scroll pour les cartes d'actualités
        const eventCards = document.querySelectorAll('.event-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.getAttribute('data-delay') || 0;
                    setTimeout(() => {
                        entry.target.classList.add('animated');
                    }, parseInt(delay));
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        eventCards.forEach(card => observer.observe(card));
        
        // Animation initiale pour les cartes déjà visibles
        eventCards.forEach(card => {
            const rect = card.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.8) {
                const delay = card.getAttribute('data-delay') || 0;
                setTimeout(() => {
                    card.classList.add('animated');
                }, parseInt(delay));
            }
        });
        
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
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            eventCards.forEach(card => {
                const title = card.querySelector('h1').textContent.toLowerCase();
                const content = card.querySelector('p').textContent.toLowerCase();
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
                const category = this.textContent;
                // Simulate filtering by category
                alert(`Filtrer par catégorie: ${category}`);
            });
        });
        
        // Tag filtering
        const tagButtons = document.querySelectorAll('.tags .btn');
        tagButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const tag = this.textContent;
                // Simulate filtering by tag
                alert(`Filtrer par tag: ${tag}`);
            });
        });
    });
</script>
@endsection