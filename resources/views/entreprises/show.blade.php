@extends('layouts.app')

@section('title', $entreprise->name . ' - Détails de l\'Entreprise')

@section('content')
<!-- Bannière Hero -->
<section class="hero-banner position-relative py-5">
    <div class="hero-image-container">
        <!-- Vous pouvez utiliser une image spécifique à l'entreprise si disponible -->
        @if(isset($entreprise->meta_data['banner']))
            <img src="{{ asset('storage/' . $entreprise->meta_data['banner']) }}" class="hero-image" alt="{{ $entreprise->name }}">
        @else
            <img src="{{ asset('images/DSC_0196 1.png') }}" class="hero-image" alt="Détails de l'entreprise">
        @endif
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content container position-relative py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center text-white">
                <div class="hero-badge animate__animated animate__fadeInDown">
                    <span class="badge bg-primary bg-opacity-25 text-white px-4 py-2 rounded-pill">
                        <i class="fas fa-star me-2"></i>Programme EAE
                    </span>
                </div>
                <h1 class="display-4 fw-bold mt-4 animate__animated animate__fadeInUp animate__delay-1s">
                    {{ $entreprise->name }}
                </h1>
               
                
                <div class="hero-stats animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="row justify-content-center">
                        <!-- Statut -->
                        <div class="col-auto">
                            
                        </div>
                        
                        <!-- Type -->
                        @php
                            $type = $entreprise->meta_data['type'] ?? '';
                            $typeConfig = [
                                'entreprise_incube' => ['icon' => 'fa-seedling', 'label' => 'Incubée'],
                                'entreprise_alumni' => ['icon' => 'fa-graduation-cap', 'label' => 'Alumni'],
                                'entreprise_partenaire' => ['icon' => 'fa-handshake', 'label' => 'Partenaire']
                            ];
                            $config = $typeConfig[$type] ?? ['icon' => 'fa-building', 'label' => 'Entreprise'];
                        @endphp
                        <div class="col-auto">
                            
                        </div>
                        
                        <!-- Date de création -->
                        <div class="col-auto">
                            
                        </div>
                        
                        <!-- Nombre de partenaires -->
                        @if(isset($partenaires) && count($partenaires) > 0)
                        <div class="col-auto">
                            
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Boutons d'action -->
                <div class="mt-4 animate__animated animate__fadeInUp animate__delay-4s">
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('entreprises.public') }}" class="btn btn-outline-light">
                            <i class="fas fa-arrow-left me-2"></i> Retour aux entreprises
                        </a>
                        
                        @if(isset($entreprise->meta_data['website']))
                        <a href="{{ $entreprise->meta_data['website'] }}" 
                           target="_blank" 
                           class="btn btn-warning">
                            <i class="fas fa-external-link-alt me-2"></i> Visiter le site web
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="hero-shape">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L1440 0V120H0Z" fill="white"/>
        </svg>
    </div>
</section>

<!-- Section principale -->
<main class="py-5">
    <div class="container">
        <!-- Alerte entreprise inactive -->
        @if(!$entreprise->is_active)
        <div class="alert alert-warning mb-4 animate__animated animate__fadeIn">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Cette entreprise n'est actuellement pas active.
        </div>
        @endif
        
        <!-- Contenu principal -->
        <div class="row">
            <!-- Sidebar Info -->
            <div class="col-lg-4 mb-4">
                <!-- Card Logo & Info -->
                <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInLeft">
                    <div class="card-body text-center">
                        @if(isset($entreprise->meta_data['logo']))
                            <img src="{{ asset('storage/' . $entreprise->meta_data['logo']) }}" 
                                 alt="{{ $entreprise->name }}" 
                                 class="rounded-circle mb-3"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="logo-placeholder-large mx-auto mb-3">
                                <i class="fas fa-building fa-4x text-muted"></i>
                            </div>
                        @endif
                        
                        <h4 class="mb-3">{{ $entreprise->name }}</h4>
                        
                        <!-- Badges -->
                        <div class="mb-4">
                            @php
                                $type = $entreprise->meta_data['type'] ?? '';
                                $typeConfig = [
                                    'entreprise_incube' => ['color' => 'success', 'icon' => 'fa-seedling', 'label' => 'Incubée'],
                                    'entreprise_alumni' => ['color' => 'primary', 'icon' => 'fa-graduation-cap', 'label' => 'Alumni'],
                                    'entreprise_partenaire' => ['color' => 'warning', 'icon' => 'fa-handshake', 'label' => 'Partenaire']
                                ];
                                $config = $typeConfig[$type] ?? ['color' => 'secondary', 'icon' => 'fa-building', 'label' => 'Entreprise'];
                            @endphp
                            
                            <span class="badge bg-{{ $config['color'] }} px-3 py-2 mb-2">
                                <i class="fas {{ $config['icon'] }} me-1"></i>{{ $config['label'] }}
                            </span>
                            
                            @if($entreprise->parent1)
                            <span class="badge bg-info px-3 py-2 mb-2">
                                <i class="fas fa-tag me-1"></i>{{ $entreprise->parent1->name }}
                            </span>
                            @endif
                            
                            @if($entreprise->is_active)
                                <span class="badge bg-success px-3 py-2">
                                    <i class="fas fa-check-circle me-1"></i>Active
                                </span>
                            @else
                                <span class="badge bg-danger px-3 py-2">
                                    <i class="fas fa-times-circle me-1"></i>Inactive
                                </span>
                            @endif
                        </div>
                        
                        <!-- Quick Info -->
                        <div class="text-start">
                            <div class="mb-2">
                                <i class="fas fa-calendar-alt text-primary me-2"></i>
                                <span class="text-muted">Créée le:</span>
                                <span class="ms-2 fw-bold">{{ $entreprise->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="mb-2">
                                <i class="fas fa-history text-primary me-2"></i>
                                <span class="text-muted">Dernière mise à jour:</span>
                                <span class="ms-2 fw-bold">{{ $entreprise->updated_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Card -->
                @if(isset($entreprise->meta_data['website']) || isset($entreprise->meta_data['email']) || isset($entreprise->meta_data['phone']) || isset($entreprise->meta_data['address']))
                <div class="card border-0 shadow-sm animate__animated animate__fadeInLeft">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-address-card me-2"></i>Contact
                        </h5>
                    </div>
                    <div class="card-body">
                        @if(isset($entreprise->meta_data['website']))
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-globe me-2"></i>Site Web
                            </h6>
                            <a href="{{ $entreprise->meta_data['website'] }}" 
                               target="_blank" 
                               class="text-decoration-none d-flex align-items-center">
                                <i class="fas fa-external-link-alt me-2 text-muted"></i>
                                <span>{{ $entreprise->meta_data['website'] }}</span>
                            </a>
                        </div>
                        @endif
                        
                        @if(isset($entreprise->meta_data['email']))
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-envelope me-2"></i>Email
                            </h6>
                            <a href="mailto:{{ $entreprise->meta_data['email'] }}" 
                               class="text-decoration-none d-flex align-items-center">
                                <i class="fas fa-envelope me-2 text-muted"></i>
                                <span>{{ $entreprise->meta_data['email'] }}</span>
                            </a>
                        </div>
                        @endif
                        
                        @if(isset($entreprise->meta_data['phone']))
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-phone me-2"></i>Téléphone
                            </h6>
                            <a href="tel:{{ $entreprise->meta_data['phone'] }}" 
                               class="text-decoration-none d-flex align-items-center">
                                <i class="fas fa-phone me-2 text-muted"></i>
                                <span>{{ $entreprise->meta_data['phone'] }}</span>
                            </a>
                        </div>
                        @endif
                        
                        @if(isset($entreprise->meta_data['address']))
                        <div>
                            <h6 class="text-primary">
                                <i class="fas fa-map-marker-alt me-2"></i>Adresse
                            </h6>
                            <p class="mb-0 d-flex align-items-start">
                                <i class="fas fa-map-marker-alt me-2 text-muted mt-1"></i>
                                <span>{{ $entreprise->meta_data['address'] }}</span>
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Description Card -->
                <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInRight">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle text-primary me-2"></i>Description
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{ $entreprise->description ?? 'Aucune description disponible pour cette entreprise.' }}
                        </p>
                    </div>
                </div>

                <!-- Mission & Vision -->
                <div class="row mb-4">
                    @if(isset($entreprise->meta_data['mission']))
                    <div class="col-md-6 mb-3">
                        <div class="card border-0 shadow-sm h-100 animate__animated animate__fadeInUp">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-bullseye me-2"></i>Mission
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $entreprise->meta_data['mission'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($entreprise->meta_data['vision']))
                    <div class="col-md-6 mb-3">
                        <div class="card border-0 shadow-sm h-100 animate__animated animate__fadeInUp animate__delay-1s">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-eye me-2"></i>Vision
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $entreprise->meta_data['vision'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Fondateurs -->
                @if(isset($entreprise->meta_data['fondateurs']))
                <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInRight">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">
                            <i class="fas fa-users text-primary me-2"></i>Fondateurs
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $entreprise->meta_data['fondateurs'] }}</p>
                    </div>
                </div>
                @endif

                <!-- Partenaires -->
                <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInRight">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-handshake text-primary me-2"></i>Partenaires
                            </h5>
                            @if(isset($partenaires) && count($partenaires) > 0)
                                <span class="badge bg-primary">{{ count($partenaires) }} partenaire(s)</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if(isset($partenaires) && count($partenaires) > 0)
                            <div class="row">
                                @foreach($partenaires as $partenaire)
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100 border-0 shadow-sm hover-lift">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start">
                                                @if(isset($partenaire->meta_data['logo']))
                                                    <img src="{{ asset('storage/' . $partenaire->meta_data['logo']) }}" 
                                                         alt="{{ $partenaire->name }}" 
                                                         class="rounded me-3"
                                                         style="width: 60px; height: 60px; object-fit: cover;">
                                                @else
                                                    <div class="logo-placeholder-small rounded me-3 d-flex align-items-center justify-content-center"
                                                         style="width: 60px; height: 60px; background: #f8f9fa;">
                                                        <i class="fas fa-handshake text-muted"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <h6 class="mb-1">{{ $partenaire->name }}</h6>
                                                    @if(isset($partenaire->meta_data['type']))
                                                        @php
                                                            $typeColors = [
                                                                'academique' => 'badge bg-info',
                                                                'financier' => 'badge bg-success',
                                                                'technique' => 'badge bg-warning',
                                                                'commercial' => 'badge bg-primary'
                                                            ];
                                                            $typeClass = $typeColors[$partenaire->meta_data['type']] ?? 'badge bg-secondary';
                                                        @endphp
                                                        <span class="{{ $typeClass }} mb-2">
                                                            {{ ucfirst($partenaire->meta_data['type']) }}
                                                        </span>
                                                    @endif
                                                    @if($partenaire->description)
                                                        <p class="text-muted small mb-0 mt-2">
                                                            {{ Str::limit($partenaire->description, 100) }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">Aucun partenaire déclaré pour cette entreprise.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Documentation -->
                @if(isset($entreprise->meta_data['fichier_url']))
                <div class="card border-0 shadow-sm animate__animated animate__fadeInRight">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">
                            <i class="fas fa-file-alt text-primary me-2"></i>Documentation
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-light border">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Documentation de l'entreprise</h6>
                                    <p class="text-muted small mb-0">Présentation complète et documents associés</p>
                                </div>
                                <div>
                                    <a href="{{ $entreprise->meta_data['fichier_url'] }}" 
                                       target="_blank" 
                                       class="btn btn-primary">
                                        <i class="fas fa-external-link-alt me-1"></i>Consulter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

<!-- Similar Enterprises Section -->
@if(isset($similarEntreprises) && count($similarEntreprises) > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4 text-center">Entreprises similaires</h3>
                <p class="text-muted text-center mb-5">Découvrez d'autres entreprises du même domaine</p>
                
                <div class="row">
                    @foreach($similarEntreprises as $similar)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift animate__animated animate__fadeInUp">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    @if(isset($similar->meta_data['logo']))
                                        <img src="{{ asset('storage/' . $similar->meta_data['logo']) }}" 
                                             alt="{{ $similar->name }}" 
                                             class="rounded me-3"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="logo-placeholder-small rounded me-3 d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px; background: #f8f9fa;">
                                            <i class="fas fa-building text-muted"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1">
                                            <a href="{{ route('entreprises.show', $similar) }}" 
                                               class="text-decoration-none text-dark">
                                                {{ $similar->name }}
                                            </a>
                                        </h6>
                                        @if($similar->parent1)
                                            <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                                {{ $similar->parent1->name }}
                                            </span>
                                        @endif
                                        <p class="text-muted small mb-0 mt-2">
                                            {{ Str::limit($similar->description, 80) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top-0 text-end">
                                <a href="{{ route('entreprises.show', $similar) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    Voir détails <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<style>
/* ============================================
   HERO SECTION - Même structure que l'autre page
   ============================================ */
.hero-banner {
    min-height: 60vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.hero-image-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 1;
    filter: brightness(0.8);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(13, 66, 147, 0.85) 0%, rgba(26, 86, 219, 0.75) 100%);
    z-index: 2;
}

.hero-content {
    position: relative;
    z-index: 3;
    margin-top: 60px;
}

.hero-badge {
    animation-duration: 1s;
}

.hero-stats .stat-item {
    padding: 15px 25px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.25);
}

.hero-shape {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    z-index: 3;
}

.hero-shape svg {
    width: calc(100% + 1.3px);
    height: 120px;
}

/* ============================================
   SECTION PRINCIPALE
   ============================================ */
.logo-placeholder-large {
    width: 150px;
    height: 150px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-placeholder-small {
    width: 50px;
    height: 50px;
    background: #f8f9fa;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ============================================
   CARTES
   ============================================ */
.card {
    border-radius: 12px;
    transition: transform 0.3s ease;
    border: 1px solid rgba(0,0,0,0.08);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}

.hover-lift:hover {
    transform: translateY(-3px);
}

.badge {
    border-radius: 20px;
    padding: 0.4em 0.8em;
    font-weight: 500;
}

.card-header {
    border-bottom: 1px solid rgba(0,0,0,0.08);
    background: rgba(248, 249, 250, 0.5);
}

/* ============================================
   BOUTONS DE PARTAGE
   ============================================ */
.btn-group .btn {
    border-radius: 8px !important;
    margin: 0 2px;
}

.btn-group .btn:first-child {
    border-top-left-radius: 8px !important;
    border-bottom-left-radius: 8px !important;
}

.btn-group .btn:last-child {
    border-top-right-radius: 8px !important;
    border-bottom-right-radius: 8px !important;
}

/* ============================================
   ANIMATIONS
   ============================================ */
.animate__delay-1s {
    animation-delay: 0.3s;
}

.animate__delay-2s {
    animation-delay: 0.6s;
}

.animate__delay-3s {
    animation-delay: 0.9s;
}

.animate__delay-4s {
    animation-delay: 1.2s;
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 768px) {
    .hero-banner {
        min-height: 50vh;
    }
    
    .hero-content h1 {
        font-size: 2.2rem;
    }
    
    .hero-content .lead {
        font-size: 1.1rem;
    }
    
    .hero-stats .row {
        flex-wrap: wrap;
    }
    
    .hero-stats .col-auto {
        flex: 0 0 45%;
        margin-bottom: 10px;
    }
    
    .btn-group {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .btn-group .btn {
        margin-bottom: 5px;
    }
}

@media (max-width: 576px) {
    .hero-content h1 {
        font-size: 1.8rem;
    }
    
    .hero-stats .col-auto {
        flex: 0 0 100%;
    }
    
    .hero-stats .stat-item {
        padding: 10px 15px;
    }
    
    .d-flex.flex-wrap {
        flex-direction: column;
    }
    
    .d-flex.flex-wrap .btn {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

<script>
// Fonctions de partage
function shareOnFacebook() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent("{{ $entreprise->name }} - Programme EAE");
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${title}`, '_blank', 'width=600,height=400');
}

function shareOnTwitter() {
    const text = encodeURIComponent("Découvrez {{ $entreprise->name }} sur le programme Entreprendre à l'École");
    const url = encodeURIComponent(window.location.href);
    window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank', 'width=600,height=400');
}

function shareOnLinkedIn() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent("{{ $entreprise->name }}");
    const summary = encodeURIComponent("{{ Str::limit($entreprise->description ?? '', 100) }}");
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${title}&summary=${summary}`, '_blank', 'width=600,height=400');
}

function copyLink() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        // Créer une notification toast
        const toast = document.createElement('div');
        toast.className = 'position-fixed top-0 end-0 m-3';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show shadow">
                <i class="fas fa-check-circle me-2"></i>
                Lien copié dans le presse-papier !
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        document.body.appendChild(toast);
        
        // Supprimer automatiquement après 3 secondes
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }).catch(err => {
        console.error('Erreur lors de la copie: ', err);
        alert('Impossible de copier le lien. Veuillez le copier manuellement.');
    });
}

// Initialiser les tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Animation au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__fadeInUp');
            }
        });
    }, observerOptions);
    
    // Observer les cartes pour les animations
    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });
});

// Ajouter une classe lors du survol des cartes d'entreprise similaire
document.querySelectorAll('.hover-lift').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s ease';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transition = 'all 0.3s ease';
    });
});
</script>
@endsection