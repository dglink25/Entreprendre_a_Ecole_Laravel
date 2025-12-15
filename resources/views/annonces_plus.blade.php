@extends('layouts.app')

@section('title', 'Détails de l\'actualité')

@section('content')
<style>
    /* Styles spécifiques pour la page détail actualité */
    .gallery-header {
        position: relative;
        height: 60vh;
        min-height: 450px;
        max-height: 700px;
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
        background: linear-gradient(135deg, rgba(13, 66, 147, 0.4), rgba(26, 86, 219, 0.3));
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    
    .carousel_title {
        text-align: center;
        color: white;
        padding: clamp(1.5rem, 3vw, 3rem);
        max-width: 900px;
        width: 90%;
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
        font-size: clamp(2rem, 4vw, 3.5rem);
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .carousel_title .subtitle {
        font-size: clamp(1rem, 1.8vw, 1.3rem);
        font-weight: 300;
        letter-spacing: 1px;
        margin-bottom: clamp(5px, 1vw, 10px);
        opacity: 0.9;
    }
    
    .carousel_title .event {
        font-size: clamp(1.2rem, 2.2vw, 1.8rem);
        font-weight: 600;
        margin-top: clamp(15px, 2vw, 25px);
        padding: clamp(10px, 1.5vw, 15px) clamp(20px, 2.5vw, 30px);
        background: rgba(13, 66, 147, 0.85);
        display: inline-block;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }
    
    .container00 {
        display: flex;
        gap: clamp(25px, 4vw, 60px);
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
    
    .article-image {
        width: 100%;
        height: clamp(300px, 45vw, 550px);
        object-fit: cover;
        border-radius: 20px;
        margin-bottom: clamp(30px, 4vw, 50px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    
    .article-image.animated {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    .article-image:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }
    
    .article-content {
        background: white;
        border-radius: 20px;
        padding: clamp(30px, 4vw, 60px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        margin-bottom: clamp(30px, 4vw, 50px);
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }
    
    .article-content.animated {
        opacity: 1;
        transform: translateY(0);
    }
    
    .article-date {
        display: flex;
        align-items: center;
        gap: clamp(10px, 1.5vw, 15px);
        color: #0D4293;
        font-weight: 600;
        font-size: clamp(15px, 1.8vw, 18px);
        margin-bottom: clamp(20px, 3vw, 30px);
        padding-bottom: clamp(12px, 2vw, 18px);
        border-bottom: 2px solid #f0f0f0;
        background: rgba(13, 66, 147, 0.05);
        padding: clamp(12px, 2vw, 18px) clamp(15px, 2.5vw, 25px);
        border-radius: 12px;
        transition: all 0.4s ease;
    }
    
    .article-content:hover .article-date {
        background: rgba(13, 66, 147, 0.08);
        transform: translateX(10px);
    }
    
    .article-date img {
        width: clamp(18px, 2vw, 22px);
        height: clamp(18px, 2vw, 22px);
        transition: transform 0.5s ease;
    }
    
    .article-content:hover .article-date img {
        transform: rotate(360deg);
    }
    
    .article-content h1 {
        font-size: clamp(1.8rem, 3vw, 2.8rem);
        color: #1e293b;
        margin-bottom: clamp(20px, 3vw, 35px);
        line-height: 1.3;
        font-weight: 800;
        letter-spacing: -0.5px;
        transition: all 0.4s ease;
    }
    
    .article-content:hover h1 {
        color: #0D4293;
    }
    
    .article-content p {
        color: #555;
        line-height: 1.8;
        margin-bottom: clamp(20px, 3vw, 30px);
        font-size: clamp(1rem, 1.5vw, 1.15rem);
        text-align: justify;
    }
    
    .article-content h3 {
        color: #0D4293;
        font-size: clamp(1.3rem, 2vw, 1.8rem);
        margin: clamp(30px, 4vw, 50px) 0 clamp(15px, 2vw, 25px);
        padding-bottom: clamp(8px, 1.2vw, 12px);
        border-bottom: 3px solid;
        border-image: linear-gradient(90deg, #0D4293, #1a56db) 1;
        display: inline-block;
        position: relative;
        overflow: hidden;
    }
    
    .article-content h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #0D4293, #1a56db);
        transform: translateX(-100%);
        transition: transform 0.6s ease-out;
    }
    
    .article-content:hover h3::after {
        transform: translateX(0);
    }
    
    .article-content ul {
        margin-bottom: clamp(20px, 3vw, 30px);
        padding-left: clamp(20px, 3vw, 30px);
    }
    
    .article-content li {
        color: #555;
        line-height: 1.8;
        margin-bottom: clamp(8px, 1.2vw, 12px);
        font-size: clamp(1rem, 1.5vw, 1.15rem);
        position: relative;
        padding-left: clamp(10px, 1.5vw, 15px);
        transition: all 0.3s ease;
    }
    
    .article-content li:hover {
        color: #0D4293;
        transform: translateX(5px);
    }
    
    .article-content li::before {
        content: '▶';
        color: #0D4293;
        font-size: clamp(10px, 1.2vw, 12px);
        font-weight: bold;
        position: absolute;
        left: -15px;
        transition: all 0.3s ease;
    }
    
    .article-content li:hover::before {
        transform: scale(1.2);
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
        padding-right: clamp(45px, 4vw, 60px);
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: clamp(14px, 1.5vw, 16px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: white;
        
    }
    
    .search-box input:focus {
        border-color: #0D4293;
        box-shadow: 0 0 0 4px rgba(13, 66, 147, 0.15);
        outline: none;
        transform: translateY(-2px);
    }
    
    .search-box i {
        position: absolute;
        right: clamp(15px, 2vw, 25px);
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: clamp(16px, 1.8vw, 20px);
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
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        margin-bottom: clamp(25px, 4vw, 35px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
    
    /* Return button */
    .return {
        max-width: 1400px;
        margin: clamp(40px, 6vw, 80px) auto clamp(30px, 4vw, 50px);
        padding: 0 clamp(15px, 4vw, 40px);
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
    
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: clamp(8px, 1.2vw, 12px);
        padding: clamp(12px, 2vw, 16px) clamp(25px, 3vw, 35px);
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 25px rgba(13, 66, 147, 0.2);
        position: relative;
        overflow: hidden;
        z-index: 1;
        opacity: 0;
        transform: translateY(20px);
        animation: buttonSlideUp 0.8s ease-out 1.2s forwards;
    }
    
    @keyframes buttonSlideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .back-button::before {
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
    
    .back-button:hover {
        background: linear-gradient(135deg, #1a56db, #0D4293);
        transform: translateX(-8px) translateY(-3px);
        box-shadow: 0 12px 30px rgba(13, 66, 147, 0.3);
    }
    
    .back-button:hover::before {
        left: 0;
    }
    
    /* Highlight important text */
    .highlight-box {
        background: linear-gradient(135deg, rgba(13, 66, 147, 0.05), rgba(26, 86, 219, 0.05));
        border-left: 5px solid #0D4293;
        padding: clamp(20px, 3vw, 35px);
        margin: clamp(25px, 4vw, 40px) 0;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(13, 66, 147, 0.08);
        transition: all 0.4s ease;
        opacity: 0;
        transform: translateY(20px);
    }
    
    .highlight-box.animated {
        opacity: 1;
        transform: translateY(0);
    }
    
    .highlight-box:hover {
        transform: translateX(10px);
        box-shadow: 0 12px 35px rgba(13, 66, 147, 0.12);
    }
    
    .highlight-box p {
        color: #0D4293;
        font-weight: 600;
        margin: 0;
        font-size: clamp(1rem, 1.5vw, 1.2rem);
        line-height: 1.6;
    }
    
    /* Responsive Design amélioré */
    @media (max-width: 1100px) {
        .container00 {
            flex-direction: column-reverse;
            align-items: center;
            gap: clamp(30px, 4vw, 50px);
        }
        
        .sidebar {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .main-content {
            width: 100%;
        }
        
        .carousel_title h1 {
            font-size: clamp(1.8rem, 3.5vw, 2.5rem);
        }
        
        .carousel_title .event {
            font-size: clamp(1.1rem, 2vw, 1.5rem);
        }
    }
    
    @media (max-width: 768px) {
        .gallery-header {
            height: 50vh;
            min-height: 350px;
        }
        
        .carousel_title {
            padding: clamp(1rem, 2vw, 1.5rem);
        }
        
        .carousel_title h1 {
            letter-spacing: 1px;
        }
        
        .carousel_title .subtitle {
            font-size: clamp(0.9rem, 1.8vw, 1.1rem);
        }
        
        .carousel_title .event {
            font-size: clamp(1rem, 1.8vw, 1.3rem);
            padding: clamp(8px, 1.2vw, 12px) clamp(15px, 2vw, 25px);
        }
        
        .article-content h1 {
            font-size: clamp(1.6rem, 2.8vw, 2.2rem);
        }
        
        .article-content {
            padding: clamp(25px, 3vw, 35px);
        }
        
        .article-image {
            height: clamp(250px, 40vw, 350px);
        }
        
        .container00 {
            padding: 0 clamp(10px, 3vw, 20px);
            margin: clamp(30px, 4vw, 50px) auto;
        }
        
        .tags .btn {
            padding: clamp(5px, 1vw, 7px) clamp(10px, 2vw, 15px);
            font-size: clamp(12px, 1.5vw, 14px);
        }
    }
    
    @media (max-width: 480px) {
        .gallery-header {
            height: 40vh;
            min-height: 300px;
        }
        
        .carousel_title h1 {
            font-size: clamp(1.5rem, 3vw, 1.9rem);
        }
        
        .carousel_title .event {
            font-size: clamp(0.9rem, 1.6vw, 1.2rem);
        }
        
        .article-content h1 {
            font-size: clamp(1.4rem, 2.5vw, 1.8rem);
        }
        
        .article-image {
            height: clamp(200px, 35vw, 280px);
        }
        
        .article-content {
            padding: clamp(20px, 2.5vw, 25px);
        }
        
        .back-button {
            padding: clamp(10px, 1.5vw, 12px) clamp(20px, 2.5vw, 25px);
            font-size: clamp(13px, 1.8vw, 15px);
            width: 100%;
            justify-content: center;
        }
        
        .return {
            padding: 0 clamp(10px, 2vw, 15px);
        }
    }
    
    @media (max-width: 360px) {
        .gallery-header {
            height: 35vh;
            min-height: 250px;
        }
        
        .carousel_title {
            padding: 0.8rem;
        }
        
        .article-date {
            padding: 10px 15px;
            font-size: 14px;
        }
        
        .container00 {
            padding: 0 10px;
        }
        
        .tags .btn {
            padding: 5px 10px;
            font-size: 12px;
            margin: 3px;
        }
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
                    <button class="btn">Électronique</button>
                    <button class="btn">Jeunesse</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="return">
    <a href="{{ route('annonces') }}" class="back-button">
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
        
        // Animation spéciale pour l'article content
        const articleContent = document.querySelector('.article-content');
        if (articleContent) {
            const contentObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('animated');
                        }, 100);
                    }
                });
            }, { threshold: 0.2 });
            
            contentObserver.observe(articleContent);
        }
        
        // Search functionality
        const searchInput = document.querySelector('.search-box input');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            searchInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const headerHeight = document.querySelector('.sticky-wrapper')?.offsetHeight || 0;
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
        
        // Hover effect for article image
        const articleImage = document.querySelector('.article-image');
        if (articleImage) {
            articleImage.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
            });
            
            articleImage.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        }
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
    
    // Add reading progress bar if not exists
    if (!document.querySelector('.reading-progress')) {
        const progressBar = document.createElement('div');
        progressBar.className = 'reading-progress';
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, #0D4293, #1a56db);
            width: 0%;
            z-index: 9999;
            transition: width 0.3s ease;
        `;
        document.body.appendChild(progressBar);
    }
</script>
@endsection