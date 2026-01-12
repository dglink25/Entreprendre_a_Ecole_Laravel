@extends('layouts.app')

@section('title', 'Gestion des Entreprises - Module EAE')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-building me-2"></i>Gestion des Entreprises
                            </h4>
                            <p class="mb-0 mt-1 opacity-75 small">Liste complète des entreprises de l'incubateur</p>
                        </div>
                        <a href="{{ route('entreprises.create') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-plus-circle me-2"></i>Nouvelle Entreprise
                        </a>
                    </div>
                </div>
                
                <!-- Statistiques -->
                <div class="card-body border-bottom">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center">
                                    <h3 class="text-primary mb-0">{{ $allEntreprises->count() }}</h3>
                                    <p class="text-muted mb-0">Total entreprises</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center">
                                    <h3 class="text-primary mb-0">{{ $allEntreprises->where('is_active', true)->count() }}</h3>
                                    <p class="text-muted mb-0">Entreprises actives</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center">
                                    <h3 class="text-primary mb-0">{{ $allEntreprises->where('meta_data.type', 'entreprise_incube')->count() }}</h3>
                                    <p class="text-muted mb-0">Entreprises incubées</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center">
                                    <h3 class="text-primary mb-0">{{ $allEntreprises->where('meta_data.type', 'entreprise_alumni')->count() }}</h3>
                                    <p class="text-muted mb-0">Entreprises Alumni</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filtres et recherche -->
                <div class="card-body border-bottom bg-light">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" id="searchInput" placeholder="Rechercher une entreprise...">
                                <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mt-md-0">
                            <div class="d-flex justify-content-md-end gap-2">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-filter me-2"></i>Filtrer par type
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item filter-type" href="#" data-type="all">Tous les types</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item filter-type" href="#" data-type="entreprise_incube">Incubées</a></li>
                                        <li><a class="dropdown-item filter-type" href="#" data-type="entreprise_alumni">Alumni</a></li>
                                        <li><a class="dropdown-item filter-type" href="#" data-type="entreprise_partenaire">Partenaires</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-sort me-2"></i>Trier par
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item sort-by" href="#" data-sort="name">Nom (A-Z)</a></li>
                                        <li><a class="dropdown-item sort-by" href="#" data-sort="name_desc">Nom (Z-A)</a></li>
                                        <li><a class="dropdown-item sort-by" href="#" data-sort="recent">Plus récent</a></li>
                                        <li><a class="dropdown-item sort-by" href="#" data-sort="oldest">Plus ancien</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <!-- Messages d'alerte -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Grille des entreprises -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 p-4" id="entreprisesGrid">
                        @forelse ($entreprises as $entreprise)
                        <div class="col entreprise-card" 
                             data-name="{{ strtolower($entreprise->name) }}"
                             data-type="{{ $entreprise->meta_data['type'] ?? '' }}"
                             data-created="{{ $entreprise->created_at->timestamp }}">
                            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                                <div class="card-header bg-white border-bottom-0 pt-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="d-flex align-items-center">
                                            @if(isset($entreprise->meta_data['logo']))
                                                <div class="logo-container me-3">
                                                    <img src="{{ asset('storage/' . $entreprise->meta_data['logo']) }}" 
                                                         alt="{{ $entreprise->name }}" 
                                                         class="rounded-circle border"
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                </div>
                                            @else
                                                <div class="logo-placeholder me-3 rounded-circle border d-flex align-items-center justify-content-center bg-light"
                                                     style="width: 50px; height: 50px;">
                                                    <i class="fas fa-building text-muted"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $entreprise->name }}</h6>
                                                @php
                                                    $type = $entreprise->meta_data['type'] ?? '';
                                                    $typeConfig = [
                                                        'entreprise_incube' => ['color' => 'success', 'icon' => 'fa-seedling', 'label' => 'Incubée'],
                                                        'entreprise_alumni' => ['color' => 'primary', 'icon' => 'fa-graduation-cap', 'label' => 'Alumni'],
                                                        'entreprise_partenaire' => ['color' => 'warning', 'icon' => 'fa-handshake', 'label' => 'Partenaire']
                                                    ];
                                                    $config = $typeConfig[$type] ?? ['color' => 'secondary', 'icon' => 'fa-building', 'label' => 'Non défini'];
                                                @endphp
                                                <span class="badge bg-{{ $config['color'] }}">
                                                    <i class="fas {{ $config['icon'] }} me-1"></i>{{ $config['label'] }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary border-0" 
                                                    type="button" 
                                                    data-bs-toggle="dropdown"
                                                    data-bs-toggle="tooltip"
                                                    title="Actions">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('entreprises.show', $entreprise) }}">
                                                        <i class="fas fa-eye me-2"></i>Voir détails
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('entreprises.edit', $entreprise) }}">
                                                        <i class="fas fa-edit me-2"></i>Modifier
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('entreprises.destroy', $entreprise) }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="dropdown-item text-danger"
                                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entreprise ?')">
                                                            <i class="fas fa-trash-alt me-2"></i>Supprimer
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body pt-2">
                                    <!-- Description -->
                                    <p class="text-muted small mb-3 line-clamp-2" style="--lines: 2;">
                                        {{ $entreprise->description ?? 'Aucune description disponible' }}
                                    </p>
                                    
                                    <!-- Domaine -->
                                    @if($entreprise->parent1)
                                    <div class="mb-3">
                                        <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                            <i class="fas fa-tag me-1"></i>{{ $entreprise->parent1->name }}
                                        </span>
                                    </div>
                                    @endif
                                    
                                    <!-- Informations de contact -->
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            @if(isset($entreprise->meta_data['website']))
                                            <div class="col-auto">
                                                <a href="{{ $entreprise->meta_data['website'] }}" 
                                                   target="_blank" 
                                                   class="btn btn-sm btn-outline-primary border-0"
                                                   data-bs-toggle="tooltip"
                                                   title="Site web">
                                                    <i class="fas fa-globe"></i>
                                                </a>
                                            </div>
                                            @endif
                                            @if(isset($entreprise->meta_data['email']))
                                            <div class="col-auto">
                                                <a href="mailto:{{ $entreprise->meta_data['email'] }}" 
                                                   class="btn btn-sm btn-outline-secondary border-0"
                                                   data-bs-toggle="tooltip"
                                                   title="Envoyer un email">
                                                    <i class="fas fa-envelope"></i>
                                                </a>
                                            </div>
                                            @endif
                                            @if(isset($entreprise->meta_data['phone']))
                                            <div class="col-auto">
                                                <a href="tel:{{ $entreprise->meta_data['phone'] }}" 
                                                   class="btn btn-sm btn-outline-success border-0"
                                                   data-bs-toggle="tooltip"
                                                   title="Appeler">
                                                    <i class="fas fa-phone"></i>
                                                </a>
                                            </div>
                                            @endif
                                            @if(isset($entreprise->meta_data['fichier_url']))
                                            <div class="col-auto">
                                                <a href="{{ $entreprise->meta_data['fichier_url'] }}" 
                                                   target="_blank" 
                                                   class="btn btn-sm btn-outline-warning border-0"
                                                   data-bs-toggle="tooltip"
                                                   title="Documentation">
                                                    <i class="fas fa-file-alt"></i>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <!-- Mission & Vision -->
                                    <div class="small">
                                        @if(isset($entreprise->meta_data['mission']))
                                        <div class="d-flex align-items-start mb-2">
                                            <i class="fas fa-bullseye text-success me-2 mt-1"></i>
                                            <span class="text-muted">{{ Str::limit($entreprise->meta_data['mission'], 60) }}</span>
                                        </div>
                                        @endif
                                        @if(isset($entreprise->meta_data['vision']))
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-eye text-primary me-2 mt-1"></i>
                                            <span class="text-muted">{{ Str::limit($entreprise->meta_data['vision'], 60) }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="card-footer bg-white border-top pt-3 pb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            @if($entreprise->is_active)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check-circle me-1"></i>Actif
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-times-circle me-1"></i>Inactif
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-muted small">
                                            <i class="fas fa-calendar-alt me-1"></i>
                                            {{ $entreprise->created_at->format('d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="fas fa-building fa-4x text-muted mb-3"></i>
                                <h5 class="text-muted">Aucune entreprise trouvée</h5>
                                <p class="text-muted mb-4">Commencez par ajouter votre première entreprise</p>
                                <a href="{{ route('entreprises.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle me-2"></i>Ajouter une entreprise
                                </a>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    
                    <!-- Pagination -->
                    @if($entreprises->hasPages())
                    <div class="card-footer border-top py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Affichage de {{ $entreprises->firstItem() }} à {{ $entreprises->lastItem() }} 
                                sur {{ $entreprises->total() }} entreprises
                            </div>
                            <nav aria-label="Page navigation">
                                {{ $entreprises->links() }}
                            </nav>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'aperçu rapide -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickViewTitle">
                    <i class="fas fa-building me-2"></i>Détails de l'entreprise
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="quickViewContent">
                <!-- Contenu chargé dynamiquement -->
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
    
    // Recherche en temps réel
    const searchInput = document.getElementById('searchInput');
    const clearSearch = document.getElementById('clearSearch');
    const entrepriseCards = document.querySelectorAll('.entreprise-card');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            filterAndSortCards();
            
            // Afficher/masquer le bouton clear
            if (searchTerm.length > 0) {
                clearSearch.style.display = 'block';
            } else {
                clearSearch.style.display = 'none';
            }
        });
        
        clearSearch.addEventListener('click', function() {
            searchInput.value = '';
            filterAndSortCards();
            this.style.display = 'none';
        });
    }
    
    // Filtrage par type
    const filterButtons = document.querySelectorAll('.filter-type');
    let currentFilter = 'all';
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            currentFilter = this.dataset.type;
            filterAndSortCards();
            
            // Mettre à jour le texte du bouton
            const dropdown = this.closest('.dropdown');
            const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
            if (dropdownToggle) {
                const icon = dropdownToggle.querySelector('i');
                let newText = '';
                switch(currentFilter) {
                    case 'entreprise_incube': newText = 'Incubées'; break;
                    case 'entreprise_alumni': newText = 'Alumni'; break;
                    case 'entreprise_partenaire': newText = 'Partenaires'; break;
                    default: newText = 'Tous les types';
                }
                dropdownToggle.innerHTML = `${icon.outerHTML} ${newText}`;
            }
        });
    });
    
    // Tri
    const sortButtons = document.querySelectorAll('.sort-by');
    let currentSort = 'recent';
    
    sortButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            currentSort = this.dataset.sort;
            filterAndSortCards();
        });
    });
    
    function filterAndSortCards() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        let cards = Array.from(entrepriseCards);
        
        // Filtrer par recherche
        if (searchTerm) {
            cards = cards.filter(card => {
                const name = card.dataset.name;
                return name.includes(searchTerm);
            });
        }
        
        // Filtrer par type
        if (currentFilter !== 'all') {
            cards = cards.filter(card => card.dataset.type === currentFilter);
        }
        
        // Trier
        cards.sort((a, b) => {
            switch(currentSort) {
                case 'name':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'name_desc':
                    return b.dataset.name.localeCompare(a.dataset.name);
                case 'recent':
                    return parseInt(b.dataset.created) - parseInt(a.dataset.created);
                case 'oldest':
                    return parseInt(a.dataset.created) - parseInt(b.dataset.created);
                default:
                    return 0;
            }
        });
        
        // Afficher/masquer les cartes
        entrepriseCards.forEach(card => {
            card.style.display = 'none';
        });
        
        cards.forEach(card => {
            card.style.display = '';
        });
        
        // Afficher message si aucun résultat
        const grid = document.getElementById('entreprisesGrid');
        if (cards.length === 0 && grid) {
            const noResults = document.createElement('div');
            noResults.className = 'col-12';
            noResults.innerHTML = `
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Aucune entreprise trouvée</h5>
                    <p class="text-muted">Essayez avec d'autres critères de recherche</p>
                </div>
            `;
            if (!grid.querySelector('.col-12 .text-center')) {
                grid.appendChild(noResults);
            }
        } else {
            const noResults = grid.querySelector('.col-12 .text-center');
            if (noResults) {
                noResults.remove();
            }
        }
    }
    
    // Aperçu rapide
    const quickViewModal = new bootstrap.Modal(document.getElementById('quickViewModal'));
    
    // Gérer les clics sur les cartes pour l'aperçu rapide
    entrepriseCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Ne pas déclencher si on clique sur un bouton ou un lien
            if (e.target.closest('a, button, .dropdown')) {
                return;
            }
            
            const entrepriseId = this.querySelector('form').action.split('/').pop();
            loadQuickView(entrepriseId);
        });
    });
    
    function loadQuickView(id) {
        fetch(`/entreprises/${id}/quick-view`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('quickViewTitle').innerHTML = `
                    <i class="fas fa-building me-2"></i>${data.name}
                `;
                document.getElementById('quickViewContent').innerHTML = data.html;
                quickViewModal.show();
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    }
});
</script>

<style>
.card {
    border-radius: 0.75rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.hover-shadow:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.08) !important;
}

.logo-placeholder {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.badge {
    padding: 0.4em 0.8em;
    font-weight: 500;
    border-radius: 0.375rem;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: var(--lines, 2);
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.dropdown-menu {
    border-radius: 0.5rem;
    border: 1px solid rgba(0,0,0,0.1);
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.input-group .form-control {
    border-left: 0;
}

.input-group .input-group-text {
    border-right: 0;
}

.btn-outline-primary, .btn-outline-secondary, .btn-outline-success, .btn-outline-warning {
    padding: 0.25rem 0.5rem;
}

.btn-outline-primary:hover, .btn-outline-secondary:hover, 
.btn-outline-success:hover, .btn-outline-warning:hover {
    transform: translateY(-1px);
}

.pagination .page-link {
    border-radius: 0.375rem;
    margin: 0 3px;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.transition-all {
    transition: all 0.3s ease;
}

.modal-content {
    border-radius: 1rem;
    border: none;
}

.modal-header {
    border-bottom: 2px solid #f8f9fa;
    border-radius: 1rem 1rem 0 0;
}

#clearSearch {
    display: none;
}
</style>

@if(!$entreprises->isEmpty())
<style>
.entreprise-card {
    cursor: pointer;
}

.entreprise-card:hover .card {
    border-color: #0d6efd;
}
</style>
@endif
@endsection