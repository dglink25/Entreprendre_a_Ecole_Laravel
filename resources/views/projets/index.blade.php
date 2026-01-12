@extends('layouts.app')

@section('title', 'Gestion des Projets - Module EAE')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-project-diagram me-2"></i>Gestion des Projets
                            </h4>
                            <p class="mb-0 mt-1 opacity-75 small">Liste des projets du module EAE</p>
                        </div>
                        <a href="{{ route('projets.create') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-plus-circle me-2"></i>Nouveau Projet
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <!-- Messages de succès/erreur -->
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

                    <!-- Table des projets -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4" width="60">N°</th>
                                    <th>Nom du Projet</th>
                                    <th>Description</th>
                                    <th>Domaine</th>
                                    <th>Dates</th>
                                    <th>Statut</th>
                                    <th class="text-end pe-4" width="200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projets as $projet)
                                <tr>
                                    <td class="ps-4">
                                        <span class="badge bg-secondary">#{{ $projet->id }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="icon-container bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                                <i class="fas fa-project-diagram text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">{{ $projet->name }}</h6>
                                                <small class="text-muted">Créé le {{ $projet->created_at->format('d/m/Y') }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 small text-truncate" style="max-width: 200px;">
                                            {{ $projet->description ?? 'Aucune description' }}
                                        </p>
                                    </td>
                                    <td>
                                        @if($projet->parent1)
                                            <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                                <i class="fas fa-tag me-1"></i>{{ $projet->parent1->name }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning bg-opacity-10 text-warning">
                                                <i class="fas fa-exclamation-triangle me-1"></i>Non assigné
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="small">
                                            <div class="d-flex align-items-center mb-1">
                                                <i class="fas fa-play-circle text-success me-2"></i>
                                                <span>{{ $projet->date_debut ? \Carbon\Carbon::parse($projet->date_debut)->format('d/m/Y') : 'Non définie' }}</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-flag-checkered text-danger me-2"></i>
                                                <span>{{ $projet->date_fin ? \Carbon\Carbon::parse($projet->date_fin)->format('d/m/Y') : 'Non définie' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $now = now();
                                            $dateDebut = $projet->date_debut ? \Carbon\Carbon::parse($projet->date_debut) : null;
                                            $dateFin = $projet->date_fin ? \Carbon\Carbon::parse($projet->date_fin) : null;
                                        @endphp
                                        
                                        @if(!$dateDebut)
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-clock me-1"></i>Non planifié
                                            </span>
                                        @elseif($dateFin && $dateFin->isPast())
                                            <span class="badge bg-success">
                                                <i class="fas fa-check-circle me-1"></i>Terminé
                                            </span>
                                        @elseif($dateDebut->isFuture())
                                            <span class="badge bg-primary">
                                                <i class="fas fa-calendar-alt me-1"></i>À venir
                                            </span>
                                        @else
                                            <span class="badge bg-warning">
                                                <i class="fas fa-spinner me-1"></i>En cours
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group btn-group-sm" role="group">
                                            
                                            <a href="{{ route('projets.edit', $projet) }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('projets.destroy', $projet) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="py-5">
                                            <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">Aucun projet trouvé</h5>
                                            <p class="text-muted mb-4">Commencez par créer votre premier projet</p>
                                            <a href="{{ route('projets.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus-circle me-2"></i>Créer un projet
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible.');
}

document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>

<style>
.card {
    border-radius: 0.5rem;
}

.table thead th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    border-bottom-width: 2px;
}

.table tbody tr:hover {
    background-color: rgba(13, 110, 253, 0.05);
}

.icon-container {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.badge {
    padding: 0.4em 0.8em;
    font-weight: 500;
    border-radius: 0.375rem;
}

.btn-group .btn {
    border-radius: 0.25rem !important;
    margin: 0 2px;
}

.btn-outline-info, .btn-outline-primary, .btn-outline-danger {
    border-width: 1px;
}

.btn-outline-info:hover, .btn-outline-primary:hover, .btn-outline-danger:hover {
    border-width: 1px;
}

.alert {
    border-radius: 0.375rem;
    border: none;
}
</style>
@endsection