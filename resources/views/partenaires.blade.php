@extends('layouts.app')

@section('title', 'Partenaires')

@section('content')
<style>
    /* Header de la page */
    .partners-header {
        position: relative;
        height: 35vh;
        min-height: 250px;
        overflow: hidden;
        margin-top: -1px;
    }
    
    .partners-header .header-image {
        height: 100%;
        width: 100%;
    }
    
    .partners-header .header-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.5);
    }
    
    .partners-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 1;
        text-align: center;
        padding: 2rem;
    }
    
    .partners-overlay h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .partners-overlay p {
        font-size: 0.85rem;
        color: white;
        max-width: 700px;
        line-height: 1.5;
        opacity: 0.95;
        font-weight: 400;
    }
    
    /* Section nos partenaires */
    .partners-section {
        padding: 60px 0 80px;
        background: white;
    }
    
    .partners-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 30px;
    }
    
    .section-title {
        text-align: left;
        margin-bottom: 40px;
    }
    
    .section-title h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #0D4293;
        margin-bottom: 0;
    }
    
    /* Carte partenaire */
    .partner-card {
        background: #e8e8e8;
        border-radius: 15px;
        padding: 40px 50px;
        margin-bottom: 35px;
        display: flex;
        gap: 50px;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }
    
    .partner-logo {
        flex-shrink: 0;
        width: 160px;
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 50%;
        padding: 15px;
    }
    
    .partner-logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .partner-info {
        flex: 1;
    }
    
    .partner-info h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 15px;
    }
    
    .partner-type {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 12px;
    }
    
    .partner-projects {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 12px;
    }
    
    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .project-tag {
        background: #0D4293;
        color: white;
        padding: 6px 18px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .partners-overlay h1 {
            font-size: 2rem;
        }
        
        .partners-overlay p {
            font-size: 0.8rem;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
        }
        
        .partner-card {
            flex-direction: column;
            padding: 30px;
            gap: 25px;
            text-align: center;
        }
        
        .partner-logo {
            width: 140px;
            height: 140px;
        }
        
        .partner-info h3 {
            font-size: 1.5rem;
        }
        
        .project-tags {
            justify-content: center;
        }
    }
    
    @media (max-width: 480px) {
        .partners-header {
            height: 30vh;
            min-height: 200px;
        }
        
        .partners-section {
            padding: 40px 0 60px;
        }
        
        .partners-container {
            padding: 0 20px;
        }
        
        .partner-card {
            padding: 25px 20px;
        }
        
        .partner-logo {
            width: 120px;
            height: 120px;
        }
        
        .partner-info h3 {
            font-size: 1.3rem;
        }
        
        .project-tag {
            padding: 5px 14px;
            font-size: 0.85rem;
        }
    }
</style>

<!-- Header -->
<section class="partners-header">
    <div class="partners-overlay">
        <h1>PARTENAIRES</h1>
        <p>VOUS AVEZ DES QUESTIONS, DES SUGGESTIONS, OU SOUHAITEZ EN SAVOIR PLUS SUR LE PROGRAMME ENTREPRENDRE À L'ÉCOLE?</p>
    </div>
    <div class="header-image">
        <img src="{{ asset('images/DSC_0196 1.png') }}" alt="Partenaires">
    </div>
</section>

<!-- Section Nos Partenaires -->
<section class="partners-section">
    <div class="partners-container">
        <div class="section-title">
            <h2>Nos partenaires</h2>
        </div>
        
        <!-- Partenaire 1: GEL -->
        <div class="partner-card">
            <div class="partner-logo">
                <img src="{{ asset('images/GEL.png') }}" alt="GEL">
            </div>
            <div class="partner-info">
                <h3>GEL</h3>
                <p class="partner-type">Type de partenariat</p>
                <p class="partner-projects">Projets d'intervention :</p>
                <div class="project-tags">
                    <span class="project-tag">Marketing</span>
                    <span class="project-tag">Vente</span>
                    <span class="project-tag">Vente</span>
                    <span class="project-tag">Marketing</span>
                    <span class="project-tag">Vente</span>
                </div>
            </div>
        </div>
        
        <!-- Partenaire 2: UNSTIM-ABOMEY -->
        <div class="partner-card">
            <div class="partner-logo">
                <img src="{{ asset('images/UNSTIM.png') }}" alt="UNSTIM-ABOMEY">
            </div>
            <div class="partner-info">
                <h3>UNSTIM-ABOMEY</h3>
                <p class="partner-type">Type de partenariat</p>
                <p class="partner-projects">Projets d'intervention :</p>
                <div class="project-tags">
                    <span class="project-tag">logo</span>
                    <span class="project-tag">logo</span>
                    <span class="project-tag">logo</span>
                    <span class="project-tag">logo</span>
                </div>
            </div>
        </div>
        
        <!-- Partenaire 3: SONEB -->
        <div class="partner-card">
            <div class="partner-logo">
                <img src="{{ asset('images/SONEB.png') }}" alt="SONEB">
            </div>
            <div class="partner-info">
                <h3>SONEB</h3>
                <p class="partner-type">Type de partenariat</p>
                <p class="partner-projects">Projets d'intervention :</p>
                <div class="project-tags">
                    <span class="project-tag">logo</span>
                    <span class="project-tag">logo</span>
                    <span class="project-tag">logo</span>
                    <span class="project-tag">logo</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection