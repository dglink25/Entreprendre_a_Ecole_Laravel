@extends('layouts.app')

@section('title', 'Entreprises Créées - Programme Entreprendre à l\'École')

@section('content')
<!-- Bannière Hero -->
<section class="hero-banner position-relative py-5">
    <div class="hero-image-container">
        <img src="{{ asset('images/DSC_0196 1.png') }}" class="hero-image" alt="Entreprises créées">
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
                    ENTREPRISES CRÉÉES
                </h1>
                <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                    Découvrez les entreprises innovantes nées grâce au programme 
                    <span class="text-warning fw-bold">Entreprendre à l'École</span>
                </p>
                <div class="hero-stats animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="fw-bold text-warning mb-1">{{ $entreprises->total() }}</h3>
                                <p class="small mb-0 opacity-75">Entreprises</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="fw-bold text-warning mb-1">{{ $entreprises->where('meta_data.type', 'entreprise_incube')->count() }}</h3>
                                <p class="small mb-0 opacity-75">Incubées</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="fw-bold text-warning mb-1">{{ $entreprises->where('meta_data.type', 'entreprise_alumni')->count() }}</h3>
                                <p class="small mb-0 opacity-75">Alumni</p>
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

<!-- Section principale -->
<main class="py-5">
    <div class="container">
        <!-- Barre de recherche et filtres -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="search-filter-card card border-0 shadow-sm animate__animated animate__fadeIn">
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <!-- Barre de recherche -->
                            <div class="col-lg-6">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-primary"></i>
                                    </span>
                                    <input type="text" 
                                           class="form-control form-control-lg border-start-0" 
                                           id="searchInput" 
                                           placeholder="Rechercher une entreprise...">
                                    <button class="btn btn-outline-secondary border-start-0" 
                                            type="button" 
                                            id="clearSearch">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Filtres -->
                            <div class="col-lg-6">
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" 
                                                type="button" 
                                                data-bs-toggle="dropdown"
                                                data-bs-auto-close="outside">
                                            <i class="fas fa-filter me-2"></i>Type d'entreprise
                                        </button>
                                        <ul class="dropdown-menu p-3" style="min-width: 250px;">
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input filter-check" 
                                                           type="checkbox" 
                                                           id="filter-all" 
                                                           data-type="all" 
                                                           checked>
                                                    <label class="form-check-label" for="filter-all">
                                                        Tous les types
                                                    </label>
                                                </div>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input filter-check" 
                                                           type="checkbox" 
                                                           id="filter-incube" 
                                                           data-type="entreprise_incube">
                                                    <label class="form-check-label" for="filter-incube">
                                                        <i class="fas fa-seedling text-success me-2"></i>Entreprises incubées
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input filter-check" 
                                                           type="checkbox" 
                                                           id="filter-alumni" 
                                                           data-type="entreprise_alumni">
                                                    <label class="form-check-label" for="filter-alumni">
                                                        <i class="fas fa-graduation-cap text-primary me-2"></i>Entreprises Alumni
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input filter-check" 
                                                           type="checkbox" 
                                                           id="filter-partenaire" 
                                                           data-type="entreprise_partenaire">
                                                    <label class="form-check-label" for="filter-partenaire">
                                                        <i class="fas fa-handshake text-warning me-2"></i>Entreprises partenaires
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle" 
                                                type="button" 
                                                data-bs-toggle="dropdown">
                                            <i class="fas fa-sort me-2"></i>Trier par
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item sort-option" href="#" data-sort="recent">Plus récent</a></li>
                                            <li><a class="dropdown-item sort-option" href="#" data-sort="name_asc">Nom (A-Z)</a></li>
                                            <li><a class="dropdown-item sort-option" href="#" data-sort="name_desc">Nom (Z-A)</a></li>
                                            <li><a class="dropdown-item sort-option" href="#" data-sort="oldest">Plus ancien</a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-outline-info dropdown-toggle" 
                                                type="button" 
                                                data-bs-toggle="dropdown">
                                            <i class="fas fa-tag me-2"></i>Domaines
                                        </button>
                                        <ul class="dropdown-menu p-3" style="min-width: 250px;">
                                            @php
                                                $domaines = $entreprises->unique('parent1_id')->pluck('parent1')->filter();
                                            @endphp
                                            @foreach($domaines as $domaine)
                                                <li>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input domaine-check" 
                                                               type="checkbox" 
                                                               id="domaine-{{ $domaine->id }}" 
                                                               data-domaine="{{ $domaine->id }}">
                                                        <label class="form-check-label" for="domaine-{{ $domaine->id }}">
                                                            {{ $domaine->name }}
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Compteur de résultats -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted small mb-0" id="activeFilters"></p>
                    </div>
                    <div class="d-none" id="clearFiltersContainer">
                        <button class="btn btn-sm btn-outline-danger" id="clearFilters">
                            <i class="fas fa-times me-1"></i>Effacer les filtres
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Grille des entreprises -->
        <div class="row" id="entreprisesGrid">
            @foreach ($entreprises as $entreprise)
            <div class="col-md-6 col-lg-4 mb-4 entreprise-item" 
                 data-name="{{ strtolower($entreprise->name) }}"
                 data-type="{{ $entreprise->meta_data['type'] ?? '' }}"
                 data-domaine="{{ $entreprise->parent1_id }}"
                 data-created="{{ $entreprise->created_at->timestamp }}">
                <div class="card h-100 border-0 shadow-sm hover-lift transition-all animate__animated animate__fadeIn">
                    <!-- Badge type entreprise -->
                    <div class="card-badge">
                        @php
                            $type = $entreprise->meta_data['type'] ?? '';
                            $typeConfig = [
                                'entreprise_incube' => ['color' => 'success', 'icon' => 'fa-seedling', 'label' => 'Incubée'],
                                'entreprise_alumni' => ['color' => 'primary', 'icon' => 'fa-graduation-cap', 'label' => 'Alumni'],
                                'entreprise_partenaire' => ['color' => 'warning', 'icon' => 'fa-handshake', 'label' => 'Partenaire']
                            ];
                            $config = $typeConfig[$type] ?? ['color' => 'secondary', 'icon' => 'fa-building', 'label' => 'Entreprise'];
                        @endphp
                        <span class="badge bg-{{ $config['color'] }} px-3 py-2">
                            <i class="fas {{ $config['icon'] }} me-1"></i>{{ $config['label'] }}
                        </span>
                    </div>
                    
                    <!-- Logo -->
                    <div class="card-image-container">
                        @if(isset($entreprise->meta_data['logo']))
                            <img src="{{ asset('storage/' . $entreprise->meta_data['logo']) }}" 
                                 class="card-img-top" 
                                 alt="{{ $entreprise->name }}"
                                 loading="lazy">
                        @else
                            <div class="logo-placeholder d-flex align-items-center justify-content-center">
                                <i class="fas fa-building fa-4x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="card-body">
                        <!-- Domaine -->
                        @if($entreprise->parent1)
                        <div class="mb-2">
                            <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                <i class="fas fa-tag me-1"></i>{{ $entreprise->parent1->name }}
                            </span>
                        </div>
                        @endif
                        
                        <!-- Nom -->
                        <h5 class="card-title fw-bold mb-3 text-primary">
                            {{ $entreprise->name }}
                        </h5>
                        
                        <!-- Description -->
                        <p class="card-text text-muted mb-4 line-clamp-3">
                            {{ $entreprise->description ?? 'Aucune description disponible.' }}
                        </p>
                        
                        <!-- Informations clés -->
                        <div class="entreprise-meta mb-4">
                            @if(isset($entreprise->meta_data['mission']))
                            <div class="d-flex align-items-start mb-2">
                                <i class="fas fa-bullseye text-success me-2 mt-1"></i>
                                <small class="text-muted">{{ Str::limit($entreprise->meta_data['mission'], 70) }}</small>
                            </div>
                            @endif
                            
                            @if(isset($entreprise->meta_data['fondateurs']))
                            <div class="d-flex align-items-start mb-2">
                                <i class="fas fa-users text-primary me-2 mt-1"></i>
                                <small class="text-muted">{{ Str::limit($entreprise->meta_data['fondateurs'], 70) }}</small>
                            </div>
                            @endif
                            
                            <div class="d-flex align-items-start">
                                <i class="fas fa-calendar-alt text-warning me-2 mt-1"></i>
                                <small class="text-muted">Créée le {{ $entreprise->created_at->format('d/m/Y') }}</small>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('entreprises.show', $entreprise) }}" 
                               class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye me-1"></i> Voir détails
                            </a>
                            <div class="entreprise-actions">
                                @if(isset($entreprise->meta_data['website']))
                                <a href="{{ $entreprise->meta_data['website'] }}" 
                                   target="_blank" 
                                   class="btn btn-outline-secondary btn-sm"
                                   data-bs-toggle="tooltip"
                                   title="Site web">
                                    <i class="fas fa-globe"></i>
                                </a>
                                @endif
                                @if(isset($entreprise->meta_data['fichier_url']))
                                <a href="{{ $entreprise->meta_data['fichier_url'] }}" 
                                   target="_blank" 
                                   class="btn btn-outline-info btn-sm ms-1"
                                   data-bs-toggle="tooltip"
                                   title="Documentation">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Message si aucune entreprise -->
        <div class="text-center py-5 d-none" id="noResults">
            <div class="py-5">
                <i class="fas fa-search fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Aucune entreprise trouvée</h4>
                <p class="text-muted">Essayez avec d'autres critères de recherche ou modifiez vos filtres.</p>
                <button class="btn btn-primary" id="resetAllFilters">
                    <i class="fas fa-redo me-1"></i> Réinitialiser les filtres
                </button>
            </div>
        </div>
        
        <!-- Pagination -->
        @if($entreprises->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <nav aria-label="Navigation des entreprises">
                    <ul class="pagination justify-content-center">
                        <!-- Premier -->
                        <li class="page-item {{ $entreprises->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $entreprises->url(1) }}">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                        </li>
                        
                        <!-- Précédent -->
                        <li class="page-item {{ $entreprises->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $entreprises->previousPageUrl() }}">
                                <i class="fas fa-angle-left"></i>
                            </a>
                        </li>
                        
                        <!-- Pages -->
                        @foreach(range(1, $entreprises->lastPage()) as $i)
                            @if($i >= $entreprises->currentPage() - 2 && $i <= $entreprises->currentPage() + 2)
                                <li class="page-item {{ $i == $entreprises->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $entreprises->url($i) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endforeach
                        
                        <!-- Suivant -->
                        <li class="page-item {{ !$entreprises->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $entreprises->nextPageUrl() }}">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </li>
                        
                        <!-- Dernier -->
                        <li class="page-item {{ !$entreprises->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $entreprises->url($entreprises->lastPage()) }}">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <div class="text-center text-muted small mt-2">
                    Page {{ $entreprises->currentPage() }} sur {{ $entreprises->lastPage() }} • 
                    {{ $entreprises->total() }} entreprise{{ $entreprises->total() > 1 ? 's' : '' }}
                </div>
            </div>
        </div>
        @endif
    </div>
</main>

<!-- Modal d'aperçu rapide -->
<div class="modal fade" id="entrepriseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-building me-2"></i>
                    <span id="modalTitle">Détails de l'entreprise</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div id="modalContent">
                    <!-- Contenu chargé via AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* ============================================
   HERO SECTION - STYLES CORRIGÉS
   ============================================ */
.hero-banner {
    min-height: 70vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

/* Conteneur d'image - position absolue pour l'arrière-plan */
.hero-image-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

/* L'image elle-même */
.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 1;
    filter: brightness(0.8);
}

/* Overlay pour assombrir l'image et ajouter une couleur */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(13, 66, 147, 0.85) 0%, rgba(26, 86, 219, 0.75) 100%);
    z-index: 2;
}

/* Contenu du hero - doit être au-dessus de l'image et de l'overlay */
.hero-content {
    position: relative;
    z-index: 3;
    margin-top: 60px;
}

/* Badge */
.hero-badge {
    animation-duration: 1s;
}

/* Statistiques */
.hero-stats .stat-item {
    padding: 15px 25px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.25);
}

/* Shape en bas */
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
.search-filter-card {
    border-radius: 15px;
}

/* ============================================
   CARTES ENTREPRISES
   ============================================ */
.card {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

.hover-lift:hover {
    transform: translateY(-5px);
}

.card-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 2;
}

.card-badge .badge {
    border-radius: 20px;
    font-size: 0.8rem;
    box-shadow: 0 3px 10px rgba(0,0,0,0.2);
}

.card-image-container {
    height: 200px;
    overflow: hidden;
    position: relative;
}

.card-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.card:hover .card-image-container img {
    transform: scale(1.05);
}

.logo-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ============================================
   PAGINATION
   ============================================ */
.pagination .page-item .page-link {
    border-radius: 8px;
    margin: 0 3px;
    border: none;
    color: #0D4293;
    font-weight: 500;
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #0D4293 0%, #1a56db 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(13, 66, 147, 0.3);
}

.pagination .page-item .page-link:hover {
    background: rgba(13, 66, 147, 0.1);
}

/* ============================================
   MODAL
   ============================================ */
.modal-content {
    border-radius: 20px;
    overflow: hidden;
}

.modal-header {
    border-bottom: none;
    padding: 1.5rem 2rem;
}

/* ============================================
   ANIMATIONS
   ============================================ */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

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
   TRANSITIONS
   ============================================ */
.transition-all {
    transition: all 0.3s ease;
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 768px) {
    .hero-banner {
        min-height: 60vh;
    }
    
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .search-filter-card .card-body {
        padding: 1.5rem !important;
    }
    
    .card-image-container {
        height: 180px;
    }
}

@media (max-width: 576px) {
    .hero-content h1 {
        font-size: 2rem;
    }
    
    .hero-stats .row {
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: flex-start;
    }
    
    .hero-stats .col-auto {
        flex: 0 0 auto;
    }
    
    .search-filter-card .d-flex {
        flex-direction: column;
        gap: 10px;
    }
    
    .search-filter-card .dropdown {
        width: 100%;
    }
    
    .search-filter-card .dropdown-toggle {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Variables globales
    let activeFilters = {
        types: [],
        domaines: [],
        search: '',
        sort: 'recent'
    };
    
    // Éléments DOM
    const searchInput = document.getElementById('searchInput');
    const clearSearch = document.getElementById('clearSearch');
    const entreprisesGrid = document.getElementById('entreprisesGrid');
    const entrepriseItems = document.querySelectorAll('.entreprise-item');
    const noResults = document.getElementById('noResults');
    const activeFiltersText = document.getElementById('activeFilters');
    const clearFiltersContainer = document.getElementById('clearFiltersContainer');
    const clearFiltersBtn = document.getElementById('clearFilters');
    const resetAllFiltersBtn = document.getElementById('resetAllFilters');
    
    // Initialiser les tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Gestion de la recherche
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            activeFilters.search = this.value.toLowerCase().trim();
            filterEntreprises();
            
            // Afficher/masquer le bouton clear
            if (activeFilters.search.length > 0) {
                clearSearch.style.display = 'block';
            } else {
                clearSearch.style.display = 'none';
            }
        });
        
        clearSearch.addEventListener('click', function() {
            searchInput.value = '';
            activeFilters.search = '';
            filterEntreprises();
            this.style.display = 'none';
        });
    }
    
    // Gestion des filtres par type
    const filterChecks = document.querySelectorAll('.filter-check');
    filterChecks.forEach(check => {
        check.addEventListener('change', function() {
            if (this.dataset.type === 'all') {
                // Si "Tous" est coché, décocher les autres
                if (this.checked) {
                    filterChecks.forEach(c => {
                        if (c.dataset.type !== 'all') c.checked = false;
                    });
                }
            } else {
                // Si un type spécifique est coché, décocher "Tous"
                if (this.checked) {
                    document.getElementById('filter-all').checked = false;
                }
            }
            
            updateTypeFilters();
            filterEntreprises();
        });
    });
    
    // Gestion des filtres par domaine
    const domaineChecks = document.querySelectorAll('.domaine-check');
    domaineChecks.forEach(check => {
        check.addEventListener('change', function() {
            updateDomaineFilters();
            filterEntreprises();
        });
    });
    
    // Gestion du tri
    const sortOptions = document.querySelectorAll('.sort-option');
    sortOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            activeFilters.sort = this.dataset.sort;
            filterEntreprises();
            
            // Mettre à jour le texte du bouton
            const dropdown = this.closest('.dropdown');
            const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
            if (dropdownToggle) {
                let newText = '';
                switch(activeFilters.sort) {
                    case 'recent': newText = 'Plus récent'; break;
                    case 'name_asc': newText = 'Nom (A-Z)'; break;
                    case 'name_desc': newText = 'Nom (Z-A)'; break;
                    case 'oldest': newText = 'Plus ancien'; break;
                }
                dropdownToggle.innerHTML = `<i class="fas fa-sort me-2"></i>${newText}`;
            }
        });
    });
    
    // Fonction pour mettre à jour les filtres de type
    function updateTypeFilters() {
        activeFilters.types = [];
        filterChecks.forEach(check => {
            if (check.checked && check.dataset.type !== 'all') {
                activeFilters.types.push(check.dataset.type);
            }
        });
    }
    
    // Fonction pour mettre à jour les filtres de domaine
    function updateDomaineFilters() {
        activeFilters.domaines = [];
        domaineChecks.forEach(check => {
            if (check.checked) {
                activeFilters.domaines.push(check.dataset.domaine);
            }
        });
    }
    
    // Fonction principale de filtrage
    function filterEntreprises() {
        let visibleItems = [];
        let filteredCount = 0;
        
        entrepriseItems.forEach(item => {
            const name = item.dataset.name || '';
            const type = item.dataset.type || '';
            const domaine = item.dataset.domaine || '';
            const created = parseInt(item.dataset.created) || 0;
            
            let isVisible = true;
            
            // Filtre par recherche
            if (activeFilters.search && !name.includes(activeFilters.search)) {
                isVisible = false;
            }
            
            // Filtre par type
            if (activeFilters.types.length > 0 && !activeFilters.types.includes(type)) {
                isVisible = false;
            }
            
            // Filtre par domaine
            if (activeFilters.domaines.length > 0 && !activeFilters.domaines.includes(domaine)) {
                isVisible = false;
            }
            
            if (isVisible) {
                visibleItems.push({ element: item, name, type, domaine, created });
                filteredCount++;
            }
            
            // Animation de disparition/apparition
            if (isVisible) {
                item.style.display = 'block';
                item.classList.remove('animate__fadeOut');
                item.classList.add('animate__fadeIn');
            } else {
                item.classList.remove('animate__fadeIn');
                item.classList.add('animate__fadeOut');
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
        
        // Trier les éléments visibles
        visibleItems.sort((a, b) => {
            switch(activeFilters.sort) {
                case 'name_asc':
                    return a.name.localeCompare(b.name);
                case 'name_desc':
                    return b.name.localeCompare(a.name);
                case 'recent':
                    return b.created - a.created;
                case 'oldest':
                    return a.created - b.created;
                default:
                    return b.created - a.created;
            }
        });
        
        // Réorganiser le DOM selon l'ordre de tri
        visibleItems.forEach(item => {
            entreprisesGrid.appendChild(item.element);
        });
        
        // Afficher/masquer le message "Aucun résultat"
        if (filteredCount === 0) {
            noResults.classList.remove('d-none');
            entreprisesGrid.style.display = 'none';
        } else {
            noResults.classList.add('d-none');
            entreprisesGrid.style.display = 'flex';
        }
        
        // Mettre à jour le texte des filtres actifs
        updateActiveFiltersText();
        
        // Afficher/masquer le bouton "Effacer les filtres"
        const hasActiveFilters = activeFilters.search || 
                               activeFilters.types.length > 0 || 
                               activeFilters.domaines.length > 0 ||
                               activeFilters.sort !== 'recent';
        
        if (hasActiveFilters) {
            clearFiltersContainer.classList.remove('d-none');
        } else {
            clearFiltersContainer.classList.add('d-none');
        }
    }
    
    // Mettre à jour le texte des filtres actifs
    function updateActiveFiltersText() {
        const filters = [];
        
        if (activeFilters.search) {
            filters.push(`Recherche: "${activeFilters.search}"`);
        }
        
        if (activeFilters.types.length > 0) {
            const typeLabels = activeFilters.types.map(type => {
                switch(type) {
                    case 'entreprise_incube': return 'Incubées';
                    case 'entreprise_alumni': return 'Alumni';
                    case 'entreprise_partenaire': return 'Partenaires';
                    default: return type;
                }
            });
            filters.push(`Types: ${typeLabels.join(', ')}`);
        }
        
        if (activeFilters.domaines.length > 0) {
            const domaineNames = Array.from(domaineChecks)
                .filter(check => activeFilters.domaines.includes(check.dataset.domaine))
                .map(check => check.nextElementSibling.textContent.trim());
            filters.push(`Domaines: ${domaineNames.join(', ')}`);
        }
        
        if (activeFilters.sort !== 'recent') {
            let sortLabel = '';
            switch(activeFilters.sort) {
                case 'name_asc': sortLabel = 'Nom (A-Z)'; break;
                case 'name_desc': sortLabel = 'Nom (Z-A)'; break;
                case 'oldest': sortLabel = 'Plus ancien'; break;
            }
            filters.push(`Tri: ${sortLabel}`);
        }
        
        if (filters.length > 0) {
            activeFiltersText.textContent = `Filtres actifs: ${filters.join(' • ')}`;
            activeFiltersText.classList.remove('d-none');
        } else {
            activeFiltersText.textContent = '';
            activeFiltersText.classList.add('d-none');
        }
    }
    
    // Effacer tous les filtres
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', resetAllFilters);
    }
    
    if (resetAllFiltersBtn) {
        resetAllFiltersBtn.addEventListener('click', resetAllFilters);
    }
    
    function resetAllFilters() {
        // Réinitialiser la recherche
        if (searchInput) {
            searchInput.value = '';
            activeFilters.search = '';
            clearSearch.style.display = 'none';
        }
        
        // Réinitialiser les filtres de type
        document.getElementById('filter-all').checked = true;
        filterChecks.forEach(check => {
            if (check.dataset.type !== 'all') check.checked = false;
        });
        activeFilters.types = [];
        
        // Réinitialiser les filtres de domaine
        domaineChecks.forEach(check => {
            check.checked = false;
        });
        activeFilters.domaines = [];
        
        // Réinitialiser le tri
        activeFilters.sort = 'recent';
        const sortDropdown = document.querySelector('.dropdown .dropdown-toggle');
        if (sortDropdown) {
            sortDropdown.innerHTML = '<i class="fas fa-sort me-2"></i>Trier par';
        }
        
        // Appliquer les filtres
        filterEntreprises();
    }
    
    // Aperçu rapide au clic sur une carte
    entrepriseItems.forEach(item => {
        const card = item.querySelector('.card');
        const quickViewBtn = item.querySelector('.btn-outline-primary');
        
        if (card && quickViewBtn) {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.btn') && !e.target.closest('.entreprise-actions')) {
                    quickViewBtn.click();
                }
            });
            
            quickViewBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const entrepriseId = this.href.split('/').pop();
                loadEntrepriseModal(entrepriseId);
            });
        }
    });
    
    // Charger le modal d'aperçu
    function loadEntrepriseModal(id) {
        fetch(`/entreprises/${id}/public-preview`)
            .then(response => {
                if (!response.ok) throw new Error('Erreur de chargement');
                return response.json();
            })
            .then(data => {
                document.getElementById('modalTitle').textContent = data.name;
                document.getElementById('modalContent').innerHTML = data.html;
                const modalElement = document.getElementById('entrepriseModal');
                const modal = new bootstrap.Modal(modalElement);
                
                // Supprimer les anciens event listeners
                const newModalContent = modalElement.querySelector('.modal-body');
                
                // Réinitialiser la navigation lorsque le modal est affiché
                modalElement.addEventListener('shown.bs.modal', function() {
                    // Attendre que le contenu soit complètement chargé
                    setTimeout(() => {
                        const navLinks = document.querySelectorAll('.preview-nav .nav-link');
                        
                        if (navLinks.length > 0) {
                            navLinks.forEach(link => {
                                link.addEventListener('click', function() {
                                    const sectionId = this.getAttribute('data-section');
                                    
                                    // Mettre à jour l'état actif des boutons
                                    navLinks.forEach(btn => btn.classList.remove('active'));
                                    this.classList.add('active');
                                    
                                    // Afficher la section correspondante
                                    showModalSection(sectionId);
                                });
                            });
                            
                            // Afficher la première section
                            showModalSection('description');
                            
                            // Initialiser les tooltips
                            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                return new bootstrap.Tooltip(tooltipTriggerEl);
                            });
                        }
                    }, 100);
                });
                
                // Fonction pour afficher une section
                function showModalSection(sectionId) {
                    // Masquer toutes les sections
                    document.querySelectorAll('.preview-section').forEach(section => {
                        section.classList.remove('active');
                        section.style.display = 'none';
                    });
                    
                    // Afficher la section sélectionnée
                    const targetSection = document.getElementById('section-' + sectionId);
                    if (targetSection) {
                        targetSection.classList.add('active');
                        targetSection.style.display = 'block';
                    }
                }
                
                modal.show();
            })
            .catch(error => {
                console.error('Erreur:', error);
                window.location.href = `/entreprises/${id}`;
            });
    }
    
    // Initialiser les filtres
    updateTypeFilters();
    updateDomaineFilters();
    filterEntreprises();
});
</script>
@endsection