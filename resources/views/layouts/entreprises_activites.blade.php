@extends('layouts.app')

@section('title', 'Entreprises Activités')

@section('content')
<style>
    .activite-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .activite-banner {
        background: linear-gradient(135deg, #ffc107, #fd7e14);
        color: white;
        text-align: center;
        padding: 60px 20px;
        margin-bottom: 40px;
        border-radius: 10px;
    }
    
    .activite-banner h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        text-transform: uppercase;
    }
    
    .activite-banner p {
        font-size: 1.1rem;
        opacity: 0.9;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .section-title {
        color: #333;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
        border-bottom: 3px solid #ffc107;
        padding-bottom: 10px;
        display: inline-block;
    }
    
    .activite-fiche {
        background: white;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        border-left: 5px solid #ffc107;
        background: linear-gradient(135deg, #fff8e1, #fff3cd);
    }
    
    .activite-header {
        border-bottom: 2px solid rgba(255, 193, 7, 0.3);
        padding-bottom: 20px;
        margin-bottom: 20px;
    }
    
    .activite-name {
        color: #333;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .activite-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 15px;
    }
    
    .meta-item {
        background: rgba(255, 193, 7, 0.2);
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 0.9rem;
        color: #333;
    }
    
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        background: #d4edda;
        color: #155724;
    }
    
    .section-box {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid rgba(255, 193, 7, 0.3);
    }
    
    .section-title-small {
        color: #333;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .description-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #eee;
    }
    
    .impact-box {
        background: #d4edda;
        border-left: 4px solid #28a745;
        padding: 20px;
        border-radius: 8px;
        margin: 20px 0;
    }
    
    .partenaires-list {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }
    
    .partenaire-badge {
        background: #0D4293;
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
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
        color: #ffc107;
        font-size: 1.2rem;
        width: 30px;
    }
    
    @media (max-width: 768px) {
        .activite-banner h1 {
            font-size: 2rem;
        }
        
        .activite-banner {
            padding: 40px 15px;
        }
        
        .activite-meta {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="activite-container">
    <!-- Bannière -->
    <section class="activite-banner">
        <h1>ENTREPRISES ACTIVITÉS</h1>
        <p>VOUS AVEZ DES QUESTIONS, DES SUGGESTIONS, OU SOUHAITEZ EN SAVOIR PLUS SUR LE PROGRAMME ENTREPRENDRE À L'ÉCOLE ?</p>
    </section>
    
    <!-- Section principale -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 class="section-title">EduTech Solutions</h2>
    </div>
    
    <!-- Fiche Activité -->
    <div class="activite-fiche">
        <!-- En-tête -->
        <div class="activite-header">
            <h2 class="activite-name">EduTech Solutions</h2>
            <div class="activite-meta">
                <div class="meta-item">
                    <strong>Date de début :</strong> 15/15/2023
                </div>
            </div>
            <div>
                <strong>Statut actuel :</strong>
                <span class="status-badge">Continue</span>
            </div>
        </div>
        
        <!-- Description -->
        <div class="section-box">
            <h3 class="section-title-small">
                <i class="fas fa-file-alt"></i> Description
            </h3>
            <div class="description-box">
                <p style="color: #555; line-height: 1.6; margin: 0;">
                    EduTech Solutions est une startup innovante qui se consacre à la transformation numérique 
                    du secteur éducatif. L'entreprise conçoit des plateformes interactives et des outils numériques 
                    pour améliorer l'accès à l'éducation et rendre l'apprentissage plus dynamique et engageant.
                </p>
            </div>
        </div>
        
        <!-- Impact -->
        <div class="section-box">
            <h3 class="section-title-small">
                <i class="fas fa-bullseye"></i> Impact
            </h3>
            <div class="impact-box">
                <p style="color: #155724; line-height: 1.6; margin: 0;">
                    EduTech Solutions est une startup innovante qui se consacre à la transformation numérique 
                    du secteur éducatif. L'entreprise a déjà impacté plus de 1000 étudiants avec ses plateformes 
                    éducatives innovantes.
                </p>
            </div>
        </div>
        
        <!-- Partenaires -->
        <div class="section-box">
            <h3 class="section-title-small">
                <i class="fas fa-handshake"></i> Partenaires
            </h3>
            <div class="partenaires-list">
                <!-- Les partenaires seraient listés ici -->
                <div class="partenaire-badge">
                    <i class="fas fa-university"></i>
                    Partenaire Académique
                </div>
                <div class="partenaire-badge">
                    <i class="fas fa-industry"></i>
                    Partenaire Industriel
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section Contact -->
    <div class="contact-section">
        <h3 style="color: #333; margin-bottom: 25px; font-weight: 700; text-align: center;">
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
    console.log('Page Entreprises Activités chargée');
});
</script>
@endsection