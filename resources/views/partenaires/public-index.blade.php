@extends('layouts.app')

@section('title', 'Nos Partenaires - Programme Entreprendre à l\'École')

@section('content')
<!-- Hero Section -->
<section class="hero-banner position-relative py-5">
    <div class="hero-image-container">
        <img src="{{ asset('images/DSC_0196 1.png') }}" class="hero-image" alt="Nos partenaires">
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content container position-relative py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center text-white">
                <div class="hero-badge animate__animated animate__fadeInDown">
                    <span class="badge bg-primary bg-opacity-25 text-white px-4 py-2 rounded-pill">
                        <i class="fas fa-handshake me-2"></i>Partenariats
                    </span>
                </div>
                <h1 class="display-4 fw-bold mt-4 animate__animated animate__fadeInUp animate__delay-1s">
                    NOS PARTENAIRES
                </h1>
                <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                    Découvrez les organisations qui soutiennent et accompagnent nos entreprises innovantes.
                </p>
                <div class="hero-stats animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                           
                        </div>
                        <div class="col-auto">
                           
                        </div>
                        <div class="col-auto">
                            
                        </div>
                        <div class="col-auto">
                           
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
                            <!-- Filtres -->
                            <div class="col-lg-8">
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" 
                                                type="button" 
                                                data-bs-toggle="dropdown"
                                                data-bs-auto-close="outside">
                                            <i class="fas fa-filter me-2"></i>Type de partenaire
                                        </button>
                                        <ul class="dropdown-menu p-3" style="min-width: 250px;">
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input filter-check" 
                                                           type="radio" 
                                                           name="type_filter"
                                                           id="type-all" 
                                                           data-type="all" 
                                                           {{ !request('type') ? 'checked' : '' }}
                                                           onchange="applyFilter('type', '')">
                                                    <label class="form-check-label" for="type-all">
                                                        Tous les types
                                                    </label>
                                                </div>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input filter-check" 
                                                           type="radio" 
                                                           name="type_filter"
                                                           id="type-academique" 
                                                           data-type="academique"
                                                           {{ request('type') == 'academique' ? 'checked' : '' }}
                                                           onchange="applyFilter('type', 'academique')">
                                                    <label class="form-check-label" for="type-academique">
                                                        <i class="fas fa-graduation-cap text-info me-2"></i>Académiques
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input filter-check" 
                                                           type="radio" 
                                                           name="type_filter"
                                                           id="type-financier" 
                                                           data-type="financier"
                                                           {{ request('type') == 'financier' ? 'checked' : '' }}
                                                           onchange="applyFilter('type', 'financier')">
                                                    <label class="form-check-label" for="type-financier">
                                                        <i class="fas fa-money-bill-wave text-success me-2"></i>Financiers
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input filter-check" 
                                                           type="radio" 
                                                           name="type_filter"
                                                           id="type-technique" 
                                                           data-type="technique"
                                                           {{ request('type') == 'technique' ? 'checked' : '' }}
                                                           onchange="applyFilter('type', 'technique')">
                                                    <label class="form-check-label" for="type-technique">
                                                        <i class="fas fa-cogs text-warning me-2"></i>Techniques
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input filter-check" 
                                                           type="radio" 
                                                           name="type_filter"
                                                           id="type-commercial" 
                                                           data-type="commercial"
                                                           {{ request('type') == 'commercial' ? 'checked' : '' }}
                                                           onchange="applyFilter('type', 'commercial')">
                                                    <label class="form-check-label" for="type-commercial">
                                                        <i class="fas fa-store text-primary me-2"></i>Commerciaux
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-outline-info dropdown-toggle" 
                                                type="button" 
                                                data-bs-toggle="dropdown">
                                            <i class="fas fa-building me-2"></i>Entreprise
                                        </button>
                                        <ul class="dropdown-menu p-3" style="min-width: 250px; max-height: 300px; overflow-y: auto;">
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input entreprise-check" 
                                                           type="radio" 
                                                           name="entreprise_filter"
                                                           id="entreprise-all" 
                                                           value=""
                                                           {{ !request('entreprise_id') ? 'checked' : '' }}
                                                           onchange="applyFilter('entreprise_id', '')">
                                                    <label class="form-check-label" for="entreprise-all">
                                                        Toutes les entreprises
                                                    </label>
                                                </div>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            @foreach($entreprises as $id => $name)
                                            <li>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input entreprise-check" 
                                                           type="radio" 
                                                           name="entreprise_filter"
                                                           id="entreprise-{{ $id }}" 
                                                           value="{{ $id }}"
                                                           {{ request('entreprise_id') == $id ? 'checked' : '' }}
                                                           onchange="applyFilter('entreprise_id', '{{ $id }}')">
                                                    <label class="form-check-label" for="entreprise-{{ $id }}">
                                                        {{ Str::limit($name, 30) }}
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    
                                    @if(request()->anyFilled(['type', 'entreprise_id']))
                                    <div class="ms-auto">
                                        <button class="btn btn-outline-danger" onclick="resetAllFilters()">
                                            <i class="fas fa-times me-2"></i>Effacer les filtres
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Compteur -->
                            <div class="col-lg-4">
                                <div class="results-count text-end">
                                    <h5 class="mb-0">
                                        <span class="text-primary">{{ $partenaires->total() }}</span> 
                                        partenaire{{ $partenaires->total() > 1 ? 's' : '' }}
                                    </h5>
                                    <p class="text-muted small mb-0">
                                        @if(request('type'))
                                        <span class="badge bg-info me-1">{{ ucfirst(request('type')) }}</span>
                                        @endif
                                        @if(request('entreprise_id') && isset($entreprises[request('entreprise_id')]))
                                        <span class="badge bg-primary">{{ $entreprises[request('entreprise_id')] }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Grille des partenaires -->
        <div class="row" id="partenairesGrid">
            @forelse ($partenaires as $partenaire)
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card h-100 border-0 shadow-sm hover-lift transition-all animate__animated animate__fadeIn">
                    <!-- Badge type partenaire -->
                    <div class="card-badge">
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
                    </div>
                    
                    <!-- Logo -->
                    <div class="card-image-container">
                        @if(isset($partenaire->meta_data['logo']))
                            <img src="{{ asset('storage/' . $partenaire->meta_data['logo']) }}" 
                                 class="card-img-top" 
                                 alt="{{ $partenaire->name }}"
                                 loading="lazy">
                        @else
                            <div class="logo-placeholder d-flex align-items-center justify-content-center">
                                <i class="fas fa-handshake fa-4x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="card-body">
                        <!-- Entreprise -->
                        @if($partenaire->parent1)
                        <div class="mb-2">
                            <span class="badge bg-light text-dark border">
                                <i class="fas fa-building me-1"></i>{{ $partenaire->parent1->name }}
                            </span>
                        </div>
                        @endif
                        
                        <!-- Nom -->
                        <h5 class="card-title fw-bold mb-3 text-primary">
                            {{ $partenaire->name }}
                        </h5>
                        
                        <!-- Description -->
                        <p class="card-text text-muted mb-4 line-clamp-3">
                            {{ $partenaire->description ?? 'Aucune description disponible.' }}
                        </p>
                        
                        <!-- Informations clés -->
                        <div class="partenaire-meta mb-4">
                            @if(isset($partenaire->meta_data['contact']))
                            <div class="d-flex align-items-start mb-2">
                                <i class="fas fa-user text-info me-2 mt-1"></i>
                                <small class="text-muted">{{ Str::limit($partenaire->meta_data['contact'], 50) }}</small>
                            </div>
                            @endif
                            
                            <div class="d-flex align-items-start">
                                <i class="fas fa-calendar-alt text-warning me-2 mt-1"></i>
                                <small class="text-muted">Partenaire depuis {{ $partenaire->created_at->format('m/Y') }}</small>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-primary btn-sm preview-btn"
                                    data-id="{{ $partenaire->id }}">
                                <i class="fas fa-eye me-1"></i> Aperçu rapide
                            </button>
                            <div class="partenaire-actions">
                                @if(isset($partenaire->meta_data['website']))
                                <a href="{{ $partenaire->meta_data['website'] }}" 
                                   target="_blank" 
                                   class="btn btn-outline-secondary btn-sm"
                                   data-bs-toggle="tooltip"
                                   title="Site web">
                                    <i class="fas fa-globe"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Aucun résultat -->
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="py-5">
                        <i class="fas fa-handshake fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">Aucun partenaire trouvé</h4>
                        <p class="text-muted">Essayez avec d'autres critères de recherche ou modifiez vos filtres.</p>
                        <button class="btn btn-primary" onclick="resetAllFilters()">
                            <i class="fas fa-redo me-1"></i> Réinitialiser les filtres
                        </button>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($partenaires->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <nav aria-label="Navigation des partenaires">
                    <ul class="pagination justify-content-center">
                        <!-- Premier -->
                        <li class="page-item {{ $partenaires->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $partenaires->url(1) }}">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                        </li>
                        
                        <!-- Précédent -->
                        <li class="page-item {{ $partenaires->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $partenaires->previousPageUrl() }}">
                                <i class="fas fa-angle-left"></i>
                            </a>
                        </li>
                        
                        <!-- Pages -->
                        @foreach(range(1, $partenaires->lastPage()) as $i)
                            @if($i >= $partenaires->currentPage() - 2 && $i <= $partenaires->currentPage() + 2)
                                <li class="page-item {{ $i == $partenaires->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $partenaires->url($i) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endforeach
                        
                        <!-- Suivant -->
                        <li class="page-item {{ !$partenaires->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $partenaires->nextPageUrl() }}">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </li>
                        
                        <!-- Dernier -->
                        <li class="page-item {{ !$partenaires->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $partenaires->url($partenaires->lastPage()) }}">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <div class="text-center text-muted small mt-2">
                    Page {{ $partenaires->currentPage() }} sur {{ $partenaires->lastPage() }} • 
                    {{ $partenaires->total() }} partenaire{{ $partenaires->total() > 1 ? 's' : '' }}
                </div>
            </div>
        </div>
        @endif
    
    </div>
</main>

<!-- Modal d'aperçu rapide -->
<div class="modal fade" id="partenaireModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-handshake me-2"></i>
                    <span id="modalTitle">Détails du partenaire</span>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Gestion des aperçus rapides
    document.querySelectorAll('.preview-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const partenaireId = this.getAttribute('data-id');
            loadPartenaireModal(partenaireId);
        });
    });
    
    // Aperçu rapide au clic sur une carte
    document.querySelectorAll('.card').forEach(card => {
        const previewBtn = card.querySelector('.preview-btn');
        if (previewBtn) {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.btn') && !e.target.closest('.partenaire-actions')) {
                    previewBtn.click();
                }
            });
        }
    });
});

// Fonction pour appliquer un filtre
function applyFilter(filterName, filterValue) {
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    
    if (filterValue) {
        params.set(filterName, filterValue);
    } else {
        params.delete(filterName);
    }
    
    // Rediriger avec les nouveaux paramètres
    window.location.href = `${url.pathname}?${params.toString()}`;
}

// Réinitialiser tous les filtres
function resetAllFilters() {
    window.location.href = "{{ route('partenaires.public') }}";
}

// Charger le modal d'aperçu
async function loadPartenaireModal(id) {
    try {
        const response = await fetch(`/partenaires/${id}/public-preview`);
        if (!response.ok) throw new Error('Erreur de chargement');
        const data = await response.json();
        
        if (data.success) {
            document.getElementById('modalTitle').textContent = data.name;
            document.getElementById('modalContent').innerHTML = data.html;
            
            const modal = new bootstrap.Modal(document.getElementById('partenaireModal'));
            modal.show();
        }
    } catch (error) {
        console.error('Erreur:', error);
        // Redirection vers la page de détails
        window.location.href = `/partenaires/${id}`;
    }
}
</script>

<style>
/* Hero Section */
.hero-banner {
    min-height: 70vh;
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

/* Cards */
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

/* Pagination */
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

/* Modal */
.modal-content {
    border-radius: 20px;
    overflow: hidden;
}

.modal-header {
    border-bottom: none;
    padding: 1.5rem 2rem;
}

/* CTA Card */
.cta-card {
    border-radius: 15px;
    background: linear-gradient(135deg, #0D4293 0%, #1a56db 100%);
}

.cta-card .btn-light {
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.cta-card .btn-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255,255,255,0.2);
}

/* Filters */
.search-filter-card {
    border-radius: 15px;
}

.dropdown-menu {
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-check-input:checked {
    background-color: #0D4293;
    border-color: #0D4293;
}

.results-count h5 {
    font-size: 1.5rem;
}

.results-count .badge {
    font-size: 0.7rem;
    padding: 0.3rem 0.7rem;
}

/* Responsive */
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
    
    .hero-stats .row {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .hero-stats .col-auto {
        flex: 0 0 45%;
        margin-bottom: 10px;
    }
}

@media (max-width: 576px) {
    .hero-content h1 {
        font-size: 2rem;
    }
    
    .hero-stats .col-auto {
        flex: 0 0 100%;
    }
    
    .search-filter-card .d-flex {
        flex-direction: column;
        gap: 10px;
    }
    
    .cta-card .card-body {
        padding: 2rem !important;
    }
}
</style>
@endsection