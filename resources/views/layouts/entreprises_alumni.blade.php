@extends('layouts.app')

@section('title', 'Entreprises Alumni')

@section('content')
<style>
    .alumni-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .alumni-banner {
        background: linear-gradient(135deg, #0D4293, #1A56DB);
        color: white;
        text-align: center;
        padding: 60px 20px;
        margin-bottom: 40px;
        border-radius: 10px;
    }
    
    .alumni-banner h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        text-transform: uppercase;
    }
    
    .alumni-banner p {
        font-size: 1.1rem;
        opacity: 0.9;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .section-title {
        color: #0D4293;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
        border-bottom: 3px solid #0D4293;
        padding-bottom: 10px;
        display: inline-block;
    }
    
    .entreprises-list {
        background: white;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .entreprise-item {
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #eee;
    }
    
    .entreprise-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .entreprise-date {
        background: #0D4293;
        color: white;
        padding: 5px 15px;
        border-radius: 5px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 10px;
        font-size: 0.9rem;
    }
    
    .entreprise-title {
        color: #0D4293;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .entreprise-description {
        color: #555;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    .read-more-btn {
        color: #0D4293;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .read-more-btn:hover {
        color: #1A56DB;
        transform: translateX(5px);
    }
    
    .tags-section {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 25px;
        margin: 30px 0;
    }
    
    .tags-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }
    
    .tag-item {
        background: #e9ecef;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        font-weight: 600;
        color: #0D4293;
    }
    
    .contact-section {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 30px;
        margin-top: 40px;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        padding: 10px;
    }
    
    .contact-item i {
        color: #0D4293;
        font-size: 1.2rem;
        width: 30px;
    }
    
    @media (max-width: 768px) {
        .alumni-banner h1 {
            font-size: 2rem;
        }
        
        .alumni-banner {
            padding: 40px 15px;
        }
        
        .tags-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<div class="alumni-container">
    <!-- Bannière -->
    <section class="alumni-banner">
        <h1>ENTREPRISES ALUMNI</h1>
        <p>VOUS AVEZ DES QUESTIONS, DES SUGGESTIONS, OU SOUHAITEZ EN SAVOIR PLUS SUR LE PROGRAMME ENTREPRENDRE À L'ÉCOLE ?</p>
    </section>
    
    <!-- Section principale -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 class="section-title">Entreprises alumni</h2>
    </div>
    
    <!-- Liste des entreprises -->
    <div class="entreprises-list">
        <!-- Entreprise 1 -->
        <div class="entreprise-item">
            <div class="entreprise-date">13-17 Mars 2022</div>
            <h3 class="entreprise-title">Lancement d'AppDev229</h3>
            <p class="entreprise-description">
                AppDev229, une startup prometteuse créée dans le cadre du programme Entreprendre à l'école, 
                se spécialise dans le développement d'applications pratiques pour les entreprises locales. 
                Son lancement marque un pas vers l'innovation et la transformation numérique au Bénin.
            </p>
            <a href="#" class="read-more-btn">
                Lire plus
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <!-- Entreprise 2 -->
        <div class="entreprise-item">
            <div class="entreprise-date">13-17 Mars 2022</div>
            <h3 class="entreprise-title">Renforcement du partenariat entre l'INSTI et le CEL SUD</h3>
            <p class="entreprise-description">
                L'INSTI et le CEL SUD ont signé un nouvel accord pour renforcer leur collaboration. 
                Ce partenariat stratégique vise à offrir davantage de ressources et de formations 
                pour soutenir les jeunes entrepreneurs.
            </p>
            <a href="#" class="read-more-btn">
                Lire plus
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <!-- Entreprise 3 -->
        <div class="entreprise-item">
            <div class="entreprise-date">17 Mars 2022</div>
            <h3 class="entreprise-title">Atelier intensif de développement mobile pour les startups incubées</h3>
            <p class="entreprise-description">
                Un atelier intensif de développement mobile a été organisé pour les startups incubées à l'INSTI. 
                Cette formation vise à doter les étudiants de compétences avancées en programmation pour concrétiser leurs projets.
            </p>
            <a href="#" class="read-more-btn">
                Lire plus
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
    
    <!-- Section Tags -->
    <div class="tags-section">
        <h3 style="color: #0D4293; margin-bottom: 20px; font-weight: 700;">
            <i class="fas fa-tags"></i> Tags
        </h3>
        <div class="tags-grid">
            <div class="tag-item">Startups</div>
            <div class="tag-item">Innovation</div>
            <div class="tag-item">Développement durable</div>
            <div class="tag-item">Activities</div>
        </div>
    </div>
    
    <!-- Domaines d'activité -->
    <div class="tags-section">
        <h3 style="color: #0D4293; margin-bottom: 20px; font-weight: 700;">
            <i class="fas fa-sitemap"></i> Domaine d'activité
        </h3>
        <div class="tags-grid">
            <div class="tag-item">Technologie</div>
            <div class="tag-item">Agriculture</div>
            <div class="tag-item">Éducation</div>
        </div>
    </div>
    
    <!-- Section Contact -->
    <div class="contact-section">
        <h3 style="color: #0D4293; margin-bottom: 25px; font-weight: 700; text-align: center;">
            <i class="fas fa-address-book"></i> Contact
        </h3>
        <div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <strong>Email :</strong> contact@edutechsolutions.com
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <div>
                    <strong>Téléphone :</strong> +229 97 65 43 21
                </div>
            </div>
            <div class="contact-item">
                <i class="fas fa-globe"></i>
                <div>
                    <strong>Site Web :</strong> www.edutechsolutions.com
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Page Entreprises Alumni chargée');
});
</script>
@endsection