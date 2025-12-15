@extends('layouts.app')

@section('title', 'Détails de l\'actualité')

@section('content')
<style>
    /* Styles spécifiques pour la page détail actualité */
    .gallery-header {
        position: relative;
        height: 450px;
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
        filter: brightness(0.6);
    }
    
    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    
    .carousel_title {
        text-align: center;
        color: white;
        padding: 2rem;
        max-width: 900px;
    }
    
    .carousel_title h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .carousel_title .subtitle {
        font-size: 1.2rem;
        font-weight: 300;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }
    
    .carousel_title .event {
        font-size: 1.8rem;
        font-weight: 600;
        margin-top: 20px;
        padding: 15px 30px;
        background: rgba(13, 66, 147, 0.8);
        display: inline-block;
        border-radius: 10px;
    }
    
    .container00 {
        display: flex;
        gap: 50px;
        max-width: 1400px;
        margin: 60px auto;
        padding: 0 20px;
    }
    
    .main-content {
        flex: 1;
        min-width: 0;
    }
    
    .article-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s ease;
    }
    
    .article-image:hover {
        transform: scale(1.01);
    }
    
    .article-content {
        background: white;
        border-radius: 15px;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }
    
    .article-date {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #0D4293;
        font-weight: 600;
        font-size: 17px;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .article-date img {
        width: 20px;
        height: 20px;
    }
    
    .article-content h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 30px;
        line-height: 1.3;
        font-weight: 800;
        letter-spacing: -0.5px;
    }
    
    .article-content p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 1.1rem;
        text-align: justify;
    }
    
    .article-content h3 {
        color: #0D4293;
        font-size: 1.6rem;
        margin: 40px 0 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #0D4293;
        display: inline-block;
    }
    
    .article-content ul {
        margin-bottom: 25px;
        padding-left: 25px;
    }
    
    .article-content li {
        color: #555;
        line-height: 1.8;
        margin-bottom: 10px;
        font-size: 1.1rem;
        position: relative;
        padding-left: 10px;
    }
    
    .article-content li::before {
        content: '•';
        color: #0D4293;
        font-weight: bold;
        position: absolute;
        left: -15px;
    }
    
    /* Sidebar styles */
    .sidebar {
        width: 350px;
        flex-shrink: 0;
    }
    
    .search-box {
        position: relative;
        margin-bottom: 40px;
    }
    
    .search-box input {
        width: 100%;
        padding: 15px 20px;
        padding-right: 50px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    
    .search-box input:focus {
        border-color: #0D4293;
        box-shadow: 0 0 0 3px rgba(13, 66, 147, 0.1);
        outline: none;
    }
    
    .search-box i {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
        font-size: 18px;
    }
    
    .categories, .tags {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }
    
    .categories h5, .tags h5 {
        color: #333;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .under {
        height: 3px;
        width: 50px;
        background: linear-gradient(90deg, #0D4293, #1a56db);
        margin-bottom: 20px;
    }
    
    .categories ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .categories li {
        margin-bottom: 12px;
    }
    
    .category-link {
        color: #666;
        text-decoration: none;
        font-size: 16px;
        padding: 8px 0;
        display: block;
        transition: all 0.3s ease;
        border-radius: 5px;
        padding-left: 15px;
        position: relative;
    }
    
    .category-link:hover {
        color: #0D4293;
        background: rgba(13, 66, 147, 0.05);
        padding-left: 25px;
    }
    
    .category-link::before {
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
    
    .category-link:hover::before {
        opacity: 1;
    }
    
    .tags .btn {
        background: #f8f9fa;
        border: 1px solid #e0e0e0;
        color: #666;
        padding: 8px 15px;
        margin: 5px;
        border-radius: 25px;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .tags .btn:hover {
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border-color: #0D4293;
        transform: translateY(-2px);
    }
    
    /* Return button */
    .return {
        max-width: 1400px;
        margin: 60px auto 40px;
        padding: 0 20px;
    }
    
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 15px 30px;
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(13, 66, 147, 0.2);
    }
    
    .back-button:hover {
        background: linear-gradient(135deg, #1a56db, #0D4293);
        transform: translateX(-5px);
        box-shadow: 0 8px 20px rgba(13, 66, 147, 0.3);
        color: white;
    }
    
    /* Animation classes */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .animate-on-scroll.animated {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .container00 {
            flex-direction: column;
            gap: 40px;
        }
        
        .sidebar {
            width: 100%;
        }
        
        .carousel_title h1 {
            font-size: 2.5rem;
        }
        
        .carousel_title .event {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .gallery-header {
            height: 350px;
        }
        
        .carousel_title h1 {
            font-size: 2rem;
        }
        
        .carousel_title .subtitle {
            font-size: 1rem;
        }
        
        .carousel_title .event {
            font-size: 1.2rem;
            padding: 12px 20px;
        }
        
        .article-content h1 {
            font-size: 2rem;
        }
        
        .article-content {
            padding: 30px;
        }
        
        .article-image {
            height: 350px;
        }
        
        .container00 {
            padding: 0 15px;
            margin: 40px auto;
        }
        
        .tags .btn {
            padding: 6px 12px;
            font-size: 13px;
        }
    }
    
    @media (max-width: 480px) {
        .gallery-header {
            height: 300px;
        }
        
        .carousel_title h1 {
            font-size: 1.8rem;
        }
        
        .carousel_title .event {
            font-size: 1.1rem;
        }
        
        .article-content h1 {
            font-size: 1.8rem;
        }
        
        .article-image {
            height: 250px;
        }
        
        .article-content {
            padding: 20px;
        }
        
        .back-button {
            padding: 12px 25px;
            font-size: 14px;
        }
    }
    
    /* Highlight important text */
    .highlight-box {
        background: linear-gradient(135deg, rgba(13, 66, 147, 0.05), rgba(26, 86, 219, 0.05));
        border-left: 4px solid #0D4293;
        padding: 25px;
        margin: 30px 0;
        border-radius: 8px;
    }
    
    .highlight-box p {
        color: #0D4293;
        font-weight: 500;
        margin: 0;
    }
</style>

<section class="gallery-header animated-section">
    <div class="carousel-overlay">
        <div class="carousel_title">
            <h1>ACTUALITÉS</h1>
            <p class="subtitle">NOUVELLES ET ÉVÉNEMENTS</p>
            <p class="event">Lancement de l'entreprise DUOS SALES</p>
        </div>
    </div>
    <div class="header-image">
        <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Détails actualité">
    </div>
</section>

<div class="container00">
    <!-- Main Content -->
    <div class="main-content">
        <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Lancement DUOS SALES" class="article-image animate-on-scroll" data-delay="0">
        
        <div class="article-content animate-on-scroll" data-delay="100">
            <p class="article-date">
                <img src="{{ asset('icons/Vector (1).png') }}" alt="calendrier">
                22 juillet 2024
            </p>
            
            <h1>Lancement de l'entreprise DUOS SALES</h1>
            
            <div class="highlight-box animate-on-scroll" data-delay="200">
                <p>Fondée le 22 juillet 2024, DUOS SALES est une organisation visionnaire créée pour initier les jeunes écoliers et élèves aux bases de l'électronique, ouvrant ainsi la voie à une meilleure compréhension des technologies modernes.</p>
            </div>
            
            <h3>Mission et Vision</h3>
            <p><strong>Mission :</strong> Initier les jeunes à l'utilisation basique de l'électronique, en leur donnant les outils nécessaires pour appréhender ce domaine.</p>
            <p><strong>Vision :</strong> Briser la barrière de l'ignorance dans le domaine de la mécatronique et éveiller les capacités d'innovation des jeunes générations.</p>
            
            <h3>Fondateurs</h3>
            <ul>
                <li><strong>Bertille MEDEGNON :</strong> Étudiante en L3 de Génie Mécanique et Productique.</li>
                <li><strong>Rosine YAOITCHA :</strong> Étudiante en L3 de Génie Électrique et Informatique.</li>
            </ul>
            
            <h3>Réalisations et Projets</h3>
            <p>L'un des projets phares de DUOS SALES est <strong>L'ÉLECTRONIQUE À LA PORTÉE DE TOUS (EPT)</strong>, une formation organisée du 26 au 31 août 2024 dans les locaux de l'INSTI. Cette initiative s'adresse aux écoliers et élèves de CM1 à la 4ème, avec pour objectif de rendre l'électronique accessible et compréhensible à tous.</p>
            
            <h3>Partenaires</h3>
            <p>L'organisation bénéficie du soutien de plusieurs partenaires clés :</p>
            <ul>
                <li>SNV</li>
                <li>PRÉFECTURE DU MONO</li>
                <li>DDEMP DU MONO</li>
                <li>DDESTFP DU MONO</li>
                <li>CCS DE LOKOSSA</li>
            </ul>
            
            <p>Avec DUOS SALES, l'avenir de la mécatronique s'écrit entre les mains des jeunes, prêts à innover et à transformer leur environnement.</p>
        </div>
    </div>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="search-box">
            <input type="search" placeholder="Rechercher une actualité par mots-clés">
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
                    <button class="btn">Électronique</button>
                    <button class="btn">Jeunesse</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="return">
    <a href="{{ route('annonces') }}" class="back-button animate-on-scroll" data-delay="200">
        ← Retour aux actualités
    </a>
</div>

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
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animateElements.forEach(el => observer.observe(el));
        
        // Animation initiale pour les éléments déjà visibles
        animateElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.8) {
                const delay = el.getAttribute('data-delay') || 0;
                setTimeout(() => {
                    el.classList.add('animated');
                }, parseInt(delay));
            }
        });
        
        // Search functionality
        const searchInput = document.querySelector('.search-box input');
        searchInput.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        searchInput.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerHeight = document.querySelector('.sticky-wrapper').offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Tag filtering
        const tagButtons = document.querySelectorAll('.tags .btn');
        tagButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                tagButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const tag = this.textContent;
                // Add your filtering logic here
                console.log(`Filter by tag: ${tag}`);
            });
        });
        
        // Category filtering
        const categoryLinks = document.querySelectorAll('.category-link');
        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                categoryLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                const category = this.textContent;
                // Add your filtering logic here
                console.log(`Filter by category: ${category}`);
            });
        });
    });
    
    // Progress reading indicator
    window.addEventListener('scroll', function() {
        const articleContent = document.querySelector('.article-content');
        if (articleContent) {
            const scrollTop = window.pageYOffset;
            const articleTop = articleContent.offsetTop;
            const articleHeight = articleContent.offsetHeight;
            const windowHeight = window.innerHeight;
            
            if (scrollTop > articleTop - windowHeight) {
                const progress = ((scrollTop - articleTop + windowHeight) / articleHeight) * 100;
                const progressBar = document.querySelector('.reading-progress');
                if (progressBar) {
                    progressBar.style.width = Math.min(100, Math.max(0, progress)) + '%';
                }
            }
        }
    });
</script>
@endsection