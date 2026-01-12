@extends('layouts.app')

@section('title', $partenaire->name . ' - Détails du Partenaire')

@section('content')
<!-- Hero Section -->
<section class="hero-banner position-relative py-5">
    <div class="hero-image-container">
        @if(isset($partenaire->meta_data['banner']))
            <img src="{{ asset('storage/' . $partenaire->meta_data['banner']) }}" class="hero-image" alt="{{ $partenaire->name }}">
        @else
            <img src="{{ asset('images/DSC_0196 1.png') }}" class="hero-image" alt="{{ $partenaire->name }}">
        @endif
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content container position-relative py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center text-white">
                <div class="hero-badge animate__animated animate__fadeInDown">
                    <span class="badge bg-primary bg-opacity-25 text-white px-4 py-2 rounded-pill">
                        <i class="fas fa-handshake me-2"></i>Partenaire
                    </span>
                </div>
                <h1 class="display-5 fw-bold mt-4 animate__animated animate__fadeInUp animate__delay-1s">
                    {{ $partenaire->name }}
                </h1>
                @if($partenaire->parent1)
                <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                    Partenaire de <span class="text-warning fw-bold">{{ $partenaire->parent1->name }}</span>
                </p>
                @endif
                
                @php
                    $type = $partenaire->meta_data['type'] ?? '';
                    $typeConfig = [
                        'academique' => ['icon' => 'fa-graduation-cap', 'label' => 'Académique'],
                        'financier' => ['icon' => 'fa-money-bill-wave', 'label' => 'Financier'],
                        'technique' => ['icon' => 'fa-cogs', 'label' => 'Technique'],
                        'commercial' => ['icon' => 'fa-store', 'label' => 'Commercial']
                    ];
                    $config = $typeConfig[$type] ?? ['icon' => 'fa-handshake', 'label' => 'Partenaire'];
                @endphp
                
                <div class="hero-stats animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="fw-bold text-warning mb-1">
                                    <i class="fas {{ $config['icon'] }}"></i>
                                </h3>
                                <p class="small mb-0 opacity-75">{{ $config['label'] }}</p>
                            </div>
                        </div>
                        
                        @if(isset($partenaire->meta_data['contact']))
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="fw-bold text-info mb-1">
                                    <i class="fas fa-user"></i>
                                </h3>
                                <p class="small mb-0 opacity-75">Contact</p>
                            </div>
                        </div>
                        @endif
                        
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="fw-bold text-primary mb-1">
                                    <i class="fas fa-calendar-alt"></i>
                                </h3>
                                <p class="small mb-0 opacity-75">
                                    Depuis {{ $partenaire->created_at->format('m/Y') }}
                                </p>
                            </div>
                        </div>
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

<!-- Détails du Partenaire -->
<main class="py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Info -->
            <div class="col-lg-4 mb-4">
                <!-- Card Logo & Info -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center p-4">
                        @if(isset($partenaire->meta_data['logo']))
                            <img src="{{ asset('storage/' . $partenaire->meta_data['logo']) }}" 
                                 alt="{{ $partenaire->name }}" 
                                 class="rounded-circle mb-3 img-fluid"
                                 style="max-width: 150px; max-height: 150px; object-fit: cover;">
                        @else
                            <div class="logo-placeholder-large mx-auto mb-3">
                                <i class="fas fa-handshake fa-4x text-muted"></i>
                            </div>
                        @endif
                        
                        <h4 class="mb-3">{{ $partenaire->name }}</h4>
                        
                        <!-- Badges -->
                        <div class="mb-4 d-flex flex-wrap justify-content-center gap-2">
                            @php
                                $type = $partenaire->meta_data['type'] ?? '';
                                $typeConfig = [
                                    'academique' => ['color' => 'info', 'icon' => 'fa-graduation-cap', 'label' => 'Académique'],
                                    'financier' => ['color' => 'success', 'icon' => 'fa-money-bill-wave', 'label' => 'Financier'],
                                    'technique' => ['color' => 'warning', 'icon' => 'fa-cogs', 'label' => 'Technique'],
                                    'commercial' => ['color' => 'primary', 'icon' => 'fa-store', 'label' => 'Commercial']
                                ];
                                $config = $typeConfig[$type] ?? ['color' => 'secondary', 'icon' => 'fa-handshake', 'label' => 'Partenaire'];
                            @endphp
                            
                            <span class="badge bg-{{ $config['color'] }} px-3 py-2">
                                <i class="fas {{ $config['icon'] }} me-1"></i>{{ $config['label'] }}
                            </span>
                            
                            @if($partenaire->parent1)
                            <span class="badge bg-primary px-3 py-2">
                                <i class="fas fa-building me-1"></i>{{ $partenaire->parent1->name }}
                            </span>
                            @endif
                        </div>
                        
                        <!-- Quick Info -->
                        <div class="text-center text-lg-start">
                            <div class="mb-2 d-flex align-items-center justify-content-center justify-content-lg-start">
                                <i class="fas fa-calendar-alt text-primary me-2 fs-5"></i>
                                <div>
                                    <span class="text-muted d-block small">Partenaire depuis:</span>
                                    <span class="fw-bold">{{ $partenaire->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Card -->
                @if(isset($partenaire->meta_data['contact']) || isset($partenaire->meta_data['email']) || isset($partenaire->meta_data['phone']) || isset($partenaire->meta_data['address']))
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-address-card me-2"></i>Contact
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        @if(isset($partenaire->meta_data['contact']))
                        <div class="mb-4">
                            <h6 class="text-primary d-flex align-items-center mb-2">
                                <i class="fas fa-user me-2 fs-5"></i>Personne de contact
                            </h6>
                            <p class="mb-0 ps-4">{{ $partenaire->meta_data['contact'] }}</p>
                        </div>
                        @endif
                        
                        @if(isset($partenaire->meta_data['email']))
                        <div class="mb-4">
                            <h6 class="text-primary d-flex align-items-center mb-2">
                                <i class="fas fa-envelope me-2 fs-5"></i>Email
                            </h6>
                            <a href="mailto:{{ $partenaire->meta_data['email'] }}" 
                               class="text-decoration-none d-flex align-items-center ps-4">
                                <span>{{ $partenaire->meta_data['email'] }}</span>
                            </a>
                        </div>
                        @endif
                        
                        @if(isset($partenaire->meta_data['phone']))
                        <div class="mb-4">
                            <h6 class="text-primary d-flex align-items-center mb-2">
                                <i class="fas fa-phone me-2 fs-5"></i>Téléphone
                            </h6>
                            <a href="tel:{{ $partenaire->meta_data['phone'] }}" 
                               class="text-decoration-none d-flex align-items-center ps-4">
                                <span>{{ $partenaire->meta_data['phone'] }}</span>
                            </a>
                        </div>
                        @endif
                        
                        @if(isset($partenaire->meta_data['address']))
                        <div>
                            <h6 class="text-primary d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt me-2 fs-5"></i>Adresse
                            </h6>
                            <p class="mb-0 ps-4">{{ $partenaire->meta_data['address'] }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Description Card -->
                <div class="card border-0 shadow-sm mb-4">
                    
                    <div class="card-body p-4">
                        <p class="card-text mb-0">
                            {{ $partenaire->description ?? 'Aucune description disponible pour ce partenaire.' }}
                        </p>
                    </div>
                </div>

                <!-- Entreprise Partenaire -->
                @if($entreprise)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-light py-3">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                            <h5 class="mb-2 mb-md-0 d-flex align-items-center">
                                <i class="fas fa-building text-primary me-2"></i>Entreprise Partenaire
                            </h5>
                            <span class="badge bg-primary py-2">Partenaire principal</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-3 mb-md-0 text-center">
                                @if(isset($entreprise->meta_data['logo']))
                                    <img src="{{ asset('storage/' . $entreprise->meta_data['logo']) }}" 
                                         alt="{{ $entreprise->name }}" 
                                         class="rounded-circle img-fluid"
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <div class="logo-placeholder-small mx-auto d-flex align-items-center justify-content-center rounded-circle"
                                         style="width: 80px; height: 80px; background: #f8f9fa;">
                                        <i class="fas fa-building fa-2x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9 text-center text-md-start">
                                <h5 class="mb-1">{{ $entreprise->name }}</h5>
                                @if($entreprise->description)
                                <p class="text-muted mb-2">{{ Str::limit($entreprise->description, 150) }}</p>
                                @endif
                                <a href="{{ route('entreprises.show', $entreprise) }}" 
                                   class="btn btn-outline-primary btn-sm mt-2">
                                    <i class="fas fa-external-link-alt me-1"></i>Voir l'entreprise
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Détails du Partenariat -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-light py-3">
                        <h5 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-list-alt text-primary me-2"></i>Détails du Partenariat
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            @if(isset($partenaire->meta_data['role']))
                            <div class="col-md-6 mb-3">
                                <div class="detail-item p-3">
                                    <h6 class="d-flex align-items-center mb-3">
                                        <i class="fas fa-user-tie text-primary me-2"></i>Rôle
                                    </h6>
                                    <p class="mb-0">{{ $partenaire->meta_data['role'] }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if(isset($partenaire->meta_data['duration']))
                            <div class="col-md-6 mb-3">
                                <div class="detail-item p-3">
                                    <h6 class="d-flex align-items-center mb-3">
                                        <i class="fas fa-clock text-primary me-2"></i>Durée
                                    </h6>
                                    <p class="mb-0">{{ $partenaire->meta_data['duration'] }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if(isset($partenaire->meta_data['type']))
                            <div class="col-md-6 mb-3">
                                <div class="detail-item p-3">
                                    <h6 class="d-flex align-items-center mb-3">
                                        <i class="fas fa-chart-line text-primary me-2"></i>
                                    </h6>
                                    <p class="mb-0">{{ $partenaire->meta_data['type'] }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Liens externes -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-light py-3">
                        <h5 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-external-link-alt text-primary me-2"></i>Liens et Réseaux
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="social-links d-flex flex-wrap gap-2">
                            @if(isset($partenaire->meta_data['website']))
                            <a href="{{ $partenaire->meta_data['website'] }}" 
                               target="_blank" 
                               class="btn btn-outline-primary d-flex align-items-center">
                                <i class="fas fa-globe me-2"></i>Site web
                            </a>
                            @endif
                            @if(isset($partenaire->meta_data['linkedin']))
                            <a href="{{ $partenaire->meta_data['linkedin'] }}" 
                               target="_blank" 
                               class="btn btn-outline-info d-flex align-items-center">
                                <i class="fab fa-linkedin me-2"></i>LinkedIn
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Partenaires similaires -->
@if($similarPartenaires->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4 text-center">Partenaires similaires</h3>
                <p class="text-muted text-center mb-5">Découvrez d'autres partenaires du même type</p>
                
                <div class="row justify-content-center">
                    @foreach($similarPartenaires as $similar)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift transition-all">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start">
                                    @if(isset($similar->meta_data['logo']))
                                        <img src="{{ asset('storage/' . $similar->meta_data['logo']) }}" 
                                             alt="{{ $similar->name }}" 
                                             class="rounded me-3"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="logo-placeholder-small rounded me-3 d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px; background: #f8f9fa;">
                                            <i class="fas fa-handshake text-muted"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1">
                                            <a href="{{ route('partenaires.show', $similar) }}" 
                                               class="text-decoration-none text-dark">
                                                {{ $similar->name }}
                                            </a>
                                        </h6>
                                        @if($similar->parent1)
                                            <span class="badge bg-light text-dark border mb-2">
                                                {{ $similar->parent1->name }}
                                            </span>
                                        @endif
                                        <p class="text-muted small mb-0 mt-2">
                                            {{ Str::limit($similar->description, 80) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top-0 text-end py-3">
                                <a href="{{ route('partenaires.show', $similar) }}" 
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
   HERO SECTION
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
    filter: brightness(0.7);
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
    padding-top: 4rem;
    padding-bottom: 4rem;
}

.hero-badge {
    animation-duration: 1s;
}

.hero-stats .stat-item {
    padding: 1rem 1.5rem;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    min-width: 140px;
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
   MAIN CONTENT
   ============================================ */
.card {
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.08);
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

.card-header {
    background: rgba(248, 249, 250, 0.8);
    border-bottom: 1px solid rgba(0,0,0,0.08);
}

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
    background: #f8f9fa;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.detail-item {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
    height: 100%;
}

.detail-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.detail-item h6 {
    color: #0D4293;
    font-weight: 600;
    font-size: 1rem;
}

.social-links .btn {
    border-radius: 10px;
    padding: 0.5rem 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.social-links .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.badge {
    border-radius: 20px;
    font-weight: 500;
    font-size: 0.85rem;
}

.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-4px);
}

/* ============================================
   RESPONSIVE STYLES
   ============================================ */
@media (max-width: 1200px) {
    .hero-content h1 {
        font-size: 2.8rem;
    }
}

@media (max-width: 992px) {
    .hero-banner {
        min-height: 50vh;
    }
    
    .hero-content {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }
    
    .hero-content h1 {
        font-size: 2.4rem;
    }
    
    .hero-stats .row {
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .hero-stats .col-auto {
        flex: 0 0 calc(50% - 0.5rem);
    }
    
    .stat-item {
        min-width: auto;
        width: 100%;
    }
}

@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2rem;
    }
    
    .hero-content .lead {
        font-size: 1.1rem;
    }
    
    .hero-stats .col-auto {
        flex: 0 0 100%;
    }
    
    .logo-placeholder-large {
        width: 120px;
        height: 120px;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    .detail-item {
        margin-bottom: 1rem;
    }
    
    .social-links {
        justify-content: center;
    }
    
    .social-links .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}

@media (max-width: 576px) {
    .hero-banner {
        min-height: 45vh;
    }
    
    .hero-content {
        padding-top: 2.5rem;
        padding-bottom: 2.5rem;
    }
    
    .hero-content h1 {
        font-size: 1.8rem;
    }
    
    .hero-badge .badge {
        font-size: 0.85rem;
        padding: 0.4rem 1rem;
    }
    
    .card {
        border-radius: 12px;
    }
    
    .card-header h5 {
        font-size: 1.1rem;
    }
    
    .logo-placeholder-large {
        width: 100px;
        height: 100px;
    }
    
    .logo-placeholder-large i {
        font-size: 3rem !important;
    }
    
    .logo-placeholder-small {
        width: 50px !important;
        height: 50px !important;
    }
    
    .logo-placeholder-small i {
        font-size: 1.5rem !important;
    }
    
    .detail-item h6 {
        font-size: 0.9rem;
    }
    
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.85rem;
    }
}

@media (max-width: 375px) {
    .hero-content h1 {
        font-size: 1.6rem;
    }
    
    .hero-content .lead {
        font-size: 1rem;
    }
    
    .stat-item {
        padding: 0.75rem 1rem;
    }
    
    .card-body {
        padding: 1.25rem !important;
    }
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

/* ============================================
   UTILITY CLASSES
   ============================================ */
.fs-5 {
    font-size: 1.25rem !important;
}

.text-warning {
    color: #ffc107 !important;
}

.text-primary {
    color: #0D4293 !important;
}

.bg-primary {
    background-color: #0D4293 !important;
}

.bg-info {
    background-color: #17a2b8 !important;
}

.bg-success {
    background-color: #28a745 !important;
}

.bg-warning {
    background-color: #ffc107 !important;
}

.bg-secondary {
    background-color: #6c757d !important;
}

/* ============================================
   FLEX UTILITIES
   ============================================ */
.d-flex {
    display: flex !important;
}

.flex-wrap {
    flex-wrap: wrap !important;
}

.gap-2 {
    gap: 0.5rem !important;
}

/* ============================================
   IMAGE RESPONSIVE
   ============================================ */
.img-fluid {
    max-width: 100%;
    height: auto;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les tooltips
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

// Ajuster la taille des cartes similaires
function adjustSimilarCards() {
    const cards = document.querySelectorAll('.hover-lift');
    let maxHeight = 0;
    
    // Réinitialiser les hauteurs
    cards.forEach(card => {
        card.style.height = 'auto';
    });
    
    // Trouver la hauteur maximale
    cards.forEach(card => {
        const height = card.offsetHeight;
        if (height > maxHeight) {
            maxHeight = height;
        }
    });
    
    // Appliquer la hauteur maximale seulement sur desktop
    if (window.innerWidth >= 768) {
        cards.forEach(card => {
            card.style.height = maxHeight + 'px';
        });
    }
}

// Exécuter au chargement et au redimensionnement
window.addEventListener('load', adjustSimilarCards);
window.addEventListener('resize', adjustSimilarCards);
</script>
@endsection