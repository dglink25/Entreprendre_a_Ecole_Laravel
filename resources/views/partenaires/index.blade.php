@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-2">
                <i class="fas fa-handshake text-primary me-2"></i>Gestion des Partenaires
            </h1>
            <p class="text-muted mb-0">Liste des partenaires du programme EaE</p>
        </div>
        <a href="{{ route('partenaires.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Nouveau Partenaire
        </a>
    </div>

    <!-- Cartes statistiques -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-primary border-3 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                Total Partenaires
                            </div>
                            <div class="h5 mb-0 fw-bold text-gray-800">
                                {{ $partenaires->total() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-success border-3 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                Partenaires actifs
                            </div>
                            <div class="h5 mb-0 fw-bold text-gray-800">
                                {{ $partenaires->where('is_active', true)->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-warning border-3 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                Partenaires financiers
                            </div>
                            <div class="h5 mb-0 fw-bold text-gray-800">
                                {{ $partenaires->where('meta_data->type', 'partenaire_financier')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau -->
    <div class="card shadow border-0">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">
                    <i class="fas fa-list me-2"></i>Liste des partenaires
                    <span class="badge bg-primary ms-2">{{ $partenaires->total() }}</span>
                </h6>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Rechercher un partenaire..." id="searchInput">
                    </div>
                    <select class="form-select form-select-sm" style="width: 150px;" id="statusFilter">
                        <option value="">Tous les statuts</option>
                        <option value="active">Actifs seulement</option>
                        <option value="inactive">Inactifs</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="partenairesTable">
                    <thead class="table-light">
                        <tr>
                            <th width="60">N°</th>
                            <th width="80">Logo</th>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Référence</th>
                            <th width="100">Statut</th>
                            <th width="150" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partenaires as $partenaire)
                        <tr>
                            <td class="fw-bold">{{ $loop->iteration + ($partenaires->currentPage() - 1) * $partenaires->perPage() }}</td>
                            <td>
                                @if(isset($partenaire->meta_data['logo']) && $partenaire->meta_data['logo'])
                                    <img src="{{ Storage::url($partenaire->meta_data['logo']) }}" 
                                         alt="{{ $partenaire->name }}" 
                                         class="rounded-circle" 
                                         style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 40px; height: 40px;">
                                        <i class="fas fa-building text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $partenaire->name }}</div>
                                @if(isset($partenaire->meta_data['email']))
                                    <small class="text-muted">{{ $partenaire->meta_data['email'] }}</small>
                                @endif
                            </td>
                            <td>
                                @php
                                    $typeColors = [
                                        'entreprise_incube' => 'primary',
                                        'entreprise_alumni' => 'info',
                                        'partenaire_strategique' => 'success',
                                        'partenaire_financier' => 'warning'
                                    ];
                                    $typeLabels = [
                                        'entreprise_incube' => 'Incubée',
                                        'entreprise_alumni' => 'Alumni',
                                        'partenaire_strategique' => 'Stratégique',
                                        'partenaire_financier' => 'Financier'
                                    ];
                                    $type = $partenaire->meta_data['type'] ?? 'unknown';
                                    $color = $typeColors[$type] ?? 'secondary';
                                    $label = $typeLabels[$type] ?? 'Inconnu';
                                @endphp
                                <span class="badge bg-{{ $color }}">{{ $label }}</span>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ Str::limit($partenaire->description, 50) }}
                                </small>
                            </td>
                            <td>
                                @if($partenaire->parent1)
                                    <span class="badge bg-light text-dark border">
                                        <i class="fas fa-link me-1"></i>
                                        {{ $partenaire->parent1->name }}
                                    </span>
                                @else
                                    <span class="text-muted">Aucun</span>
                                @endif
                            </td>
                            <td>
                                @if($partenaire->is_active)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i> Actif
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-times-circle me-1"></i> Inactif
                                    </span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('partenaires.edit', $partenaire) }}" 
                                       class="btn btn-sm btn-outline-primary" 
                                       title="Éditer">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-info" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#viewModal{{ $partenaire->id }}"
                                            title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{ route('partenaires.destroy', $partenaire) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-outline-danger" 
                                                title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal de détails -->
                        <div class="modal fade" id="viewModal{{ $partenaire->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">
                                            <i class="fas fa-info-circle me-2"></i>
                                            Détails du partenaire
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3 text-center mb-3">
                                                @if(isset($partenaire->meta_data['logo']) && $partenaire->meta_data['logo'])
                                                    <img src="{{ Storage::url($partenaire->meta_data['logo']) }}" 
                                                         alt="{{ $partenaire->name }}" 
                                                         class="img-fluid rounded" 
                                                         style="max-height: 150px;">
                                                @endif
                                            </div>
                                            <div class="col-md-9">
                                                <h4>{{ $partenaire->name }}</h4>
                                                <div class="mb-3">
                                                    <span class="badge bg-{{ $color }} fs-6">{{ $label }}</span>
                                                    @if($partenaire->is_active)
                                                        <span class="badge bg-success ms-2">Actif</span>
                                                    @endif
                                                </div>
                                                <p>{{ $partenaire->description }}</p>
                                                
                                                <div class="row mt-3">
                                                    @if(isset($partenaire->meta_data['website']))
                                                    <div class="col-md-6 mb-2">
                                                        <i class="fas fa-globe me-2"></i>
                                                        <a href="{{ $partenaire->meta_data['website'] }}" target="_blank">
                                                            {{ $partenaire->meta_data['website'] }}
                                                        </a>
                                                    </div>
                                                    @endif
                                                    @if(isset($partenaire->meta_data['email']))
                                                    <div class="col-md-6 mb-2">
                                                        <i class="fas fa-envelope me-2"></i>
                                                        {{ $partenaire->meta_data['email'] }}
                                                    </div>
                                                    @endif
                                                    @if(isset($partenaire->meta_data['phone']))
                                                    <div class="col-md-6 mb-2">
                                                        <i class="fas fa-phone me-2"></i>
                                                        {{ $partenaire->meta_data['phone'] }}
                                                    </div>
                                                    @endif
                                                    @if(isset($partenaire->meta_data['address']))
                                                    <div class="col-md-6 mb-2">
                                                        <i class="fas fa-map-marker-alt me-2"></i>
                                                        {{ $partenaire->meta_data['address'] }}
                                                    </div>
                                                    @endif
                                                    @if($partenaire->parent1)
                                                    <div class="col-md-12 mb-2">
                                                        <i class="fas fa-project-diagram me-2"></i>
                                                        <strong>Parent :</strong> {{ $partenaire->parent1->name }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('partenaires.edit', $partenaire) }}" 
                                           class="btn btn-primary">
                                            <i class="fas fa-edit me-1"></i> Éditer
                                        </a>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Fermer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div class="py-5">
                                    <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Aucun partenaire enregistré</h5>
                                    <p class="text-muted">Commencez par ajouter votre premier partenaire</p>
                                    <a href="{{ route('partenaires.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Ajouter un partenaire
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pied de tableau avec pagination -->
        @if($partenaires->count() > 0)
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    Affichage de {{ $partenaires->firstItem() }} à {{ $partenaires->lastItem() }} sur {{ $partenaires->total() }} partenaires
                </div>
                <div>
                    {{ $partenaires->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
// Filtre de recherche
document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#partenairesTable tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});

// Filtre par statut
document.getElementById('statusFilter').addEventListener('change', function() {
    const filter = this.value;
    const rows = document.querySelectorAll('#partenairesTable tbody tr');
    
    rows.forEach(row => {
        if (row.cells[6]) { // Colonne statut
            const statusBadge = row.cells[6].querySelector('.badge');
            const isActive = statusBadge && statusBadge.classList.contains('bg-success');
            
            if (filter === '') {
                row.style.display = '';
            } else if (filter === 'active' && isActive) {
                row.style.display = '';
            } else if (filter === 'inactive' && !isActive) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
});
</script>

<style>
.card-header {
    border-bottom: 1px solid rgba(0,0,0,.125);
}

.table th {
    font-weight: 600;
    color: #495057;
    border-bottom-width: 2px;
}

.badge {
    font-size: 0.75em;
    padding: 0.35em 0.65em;
}

.btn-group .btn {
    border-radius: 0.25rem !important;
    margin-right: 0.25rem;
}

.table-hover tbody tr:hover {
    background-color: rgba(13, 110, 253, 0.05);
}

.rounded-circle {
    border: 2px solid #dee2e6;
}

.pagination {
    margin-bottom: 0;
}
</style>
@endsection