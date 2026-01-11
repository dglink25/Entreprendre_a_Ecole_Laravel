@extends('layouts.app')

@section('title', 'Entreprises Incubées')

@section('content')
<style>
    .incubee-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .incubee-banner {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        text-align: center;
        padding: 60px 20px;
        margin-bottom: 40px;
        border-radius: 10px;
    }
    
    .incubee-banner h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        text-transform: uppercase;
    }
    
    .incubee-banner p {
        font-size: 1.1rem;
        opacity: 0.9;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .section-title {
        color: #28a745;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
        border-bottom: 3px solid #28a745;
        padding-bottom: 10px;
        display: inline-block;
    }
    
    .entreprise-fiche {
        background: white;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        border-left: 5px solid #28a745;
    }
    
    .entreprise-header {
        border-bottom: 2px solid #eee;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }
    
    .entreprise-name {
        color: #28a745;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .entreprise-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 15px;
    }
    
    .meta-item {
        background: #f8f9fa;
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 0.9rem;
    }
    
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .status-inactive {
        background: #f8d7da;
        color: #721c24;
    }
    
    .status-active {
        background: #d4edda;
        color: #155724;
    }
    
    .section-box {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        border-left: 3px solid #28a745;
    }
    
    .section-title-small {
        color: #28a745;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .members-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .member-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 15px;
        background: white;
        border-radius: 8px;
        border: 1px solid #eee;
    }
    
    .member-avatar {
        width: 50px;
        height: 50px;
        background: #28a745;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    
    .member-info h4 {
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 5px;
    }
    
    .member-info p {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.4;
    }
    
    .description-box {
        background: white;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #eee;
    }
    
    .prestataires-list {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }
    
    .prestataire-badge {
        background: #0D4293;
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    @media (max-width: 768px) {
        .incubee-banner h1 {
            font-size: 2rem;
        }
        
        .incubee-banner {
            padding: 40px 15px;
        }
        
        .entreprise-meta {
            flex-direction: column;
            gap: 10px;
        }
        
        .member-item {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="incubee-container">
    <!-- Bannière -->
    <section class="incubee-banner">
        <h1>ENTREPRISES INCUBÉE</h1>
        <p>LES ENTREPRISES INNOVANTES NÉES GRACE AU PROGRAMME ENTREPRENDRE À L'ÉCOLE</p>
    </section>
    
    <!-- Section principale -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 class="section-title">Entreprises incubée</h2>
    </div>
    
    <!-- Fiche Entreprise -->
    <div class="entreprise-fiche">
        <!-- En-tête -->
        <div class="entreprise-header">
            <h2 class="entreprise-name">UNSTIM - Abomey</h2>
            <div class="entreprise-meta">
                <div class="meta-item">
                    <strong>Date de début :</strong> 15/15/2015
                </div>
                <div class="meta-item">
                    <strong>Date de fin :</strong> 15/15/2015
                </div>
            </div>
            <div>
                <strong>Statut actuel :</strong>
                <span class="status-badge status-inactive">Inactif</span>
            </div>
        </div>
        
        <!-- Section Membres -->
        <div class="section-box">
            <h3 class="section-title-small">
                <i class="fas fa-users"></i> Membres
            </h3>
            <div class="members-list">
                <div class="member-item">
                    <div class="member-avatar">CH</div>
                    <div class="member-info">
                        <h4>Claire HOUNZANIDJI</h4>
                        <p>Ingénieure pédagogique et passionnée d'innovation éducative.</p>
                    </div>
                </div>
                <div class="member-item">
                    <div class="member-avatar">YA</div>
                    <div class="member-info">
                        <h4>Yannick AGOSSADOU</h4>
                        <p>Développeur logiciel spécialisé en applications éducatives.</p>
                    </div>
                </div>
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
        
        <!-- Prestataires -->
        <div class="section-box">
            <h3 class="section-title-small">
                <i class="fas fa-handshake"></i> Prestataires
            </h3>
            <div class="prestataires-list">
                <div class="prestataire-badge">
                    <i class="fas fa-building"></i>
                    CEL
                </div>
                <div class="prestataire-badge">
                    <i class="fas fa-building"></i>
                    GEL
                </div>
            </div>
        </div>
        
        <!-- Version alternative avec statut Actif (maquette 1000271135) -->
        <div style="margin-top: 40px; padding-top: 30px; border-top: 2px dashed #ddd;">
            <div class="entreprise-meta">
                <div class="meta-item">
                    <strong>Date de début :</strong> 15/15/2015
                </div>
            </div>
            <div>
                <strong>Statut actuel :</strong>
                <span class="status-badge status-active">Actif</span>
            </div>
        </div>
    </div>
    
    <!-- Section Contact -->
    <div class="contact-section" style="background: #f8f9fa; border-radius: 10px; padding: 30px; margin-top: 40px;">
        <h3 style="color: #28a745; margin-bottom: 25px; font-weight: 700; text-align: center;">
            <i class="fas fa-address-book"></i> Contact
        </h3>
        <div style="display: flex; flex-direction: column; gap: 15px;">
            <div style="display: flex; align-items: center; gap: 15px; padding: 10px;">
                <i class="fas fa-envelope" style="color: #28a745;"></i>
                <div>
                    <strong>Email :</strong> contact@edutechsolutions.com
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 15px; padding: 10px;">
                <i class="fas fa-phone" style="color: #28a745;"></i>
                <div>
                    <strong>Téléphone :</strong> +229 97 65 43 21
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 15px; padding: 10px;">
                <i class="fas fa-globe" style="color: #28a745;"></i>
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
    console.log('Page Entreprises Incubées chargée');
});
</script>
@endsection