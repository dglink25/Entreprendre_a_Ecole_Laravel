@extends('layouts.app')

@section('title', 'Modifier le Projet - ' . $projet->name)

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-edit me-2"></i>Modifier le Projet
                            </h4>
                            <p class="mb-0 mt-1 opacity-75 small">{{ $projet->name }}</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('projets.index') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left me-1"></i> Retour
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Informations du projet -->
                <div class="card-body border-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                @if($projet->meta_data && isset($projet->meta_data['image']))
                                    <img src="{{ asset('storage/' . $projet->meta_data['image']) }}" 
                                         alt="{{ $projet->name }}" 
                                         class="rounded me-3"
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="icon-container bg-primary bg-opacity-10 rounded me-3 p-3">
                                        <i class="fas fa-project-diagram text-primary"></i>
                                    </div>
                                @endif
                                <div>
                                    <h5 class="mb-1">{{ $projet->name }}</h5>
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        @if($projet->parent1)
                                            <span class="badge bg-info">
                                                <i class="fas fa-tag me-1"></i>{{ $projet->parent1->name }}
                                            </span>
                                        @endif
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-calendar-alt me-1"></i>Créé le {{ $projet->created_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            @php
                                $now = now();
                                $dateDebut = $projet->date_debut ? \Carbon\Carbon::parse($projet->date_debut) : null;
                                $dateFin = $projet->date_fin ? \Carbon\Carbon::parse($projet->date_fin) : null;
                            @endphp
                            
                            @if($dateDebut && $dateFin)
                                @if($dateFin->isPast())
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
                            @else
                                <span class="badge bg-secondary">
                                    <i class="fas fa-clock me-1"></i>Non planifié
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Messages d'erreur généraux -->
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <div class="d-flex">
                            <i class="fas fa-exclamation-triangle me-3 mt-1"></i>
                            <div>
                                <h6 class="alert-heading mb-2">Des erreurs sont présentes dans le formulaire :</h6>
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('projets.update', $projet) }}" 
                          method="POST" 
                          enctype="multipart/form-data" 
                          class="needs-validation" 
                          novalidate>
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Informations principales -->
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-edit text-warning me-2"></i>Informations à modifier
                                    </h5>
                                    
                                    <!-- Nom du projet -->
                                    <div class="mb-4">
                                        <label for="name" class="form-label fw-bold">
                                            <i class="fas fa-tag me-1 text-warning"></i>Nom du projet *
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('name') is-invalid @enderror" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name', $projet->name) }}" 
                                               required
                                               placeholder="Ex: Plateforme E-learning">
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <label for="description" class="form-label fw-bold">
                                            <i class="fas fa-align-left me-1 text-warning"></i>Description
                                        </label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" 
                                                  name="description" 
                                                  rows="6" 
                                                  placeholder="Décrivez les objectifs, les fonctionnalités et la valeur ajoutée du projet...">{{ old('description', $projet->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Maximum 1000 caractères</div>
                                        <div class="text-end small text-muted">
                                            <span id="charCount">{{ strlen(old('description', $projet->description)) }}</span>/1000
                                        </div>
                                    </div>
                                    
                                    <!-- Domaine -->
                                    <div class="mb-4">
                                        <label for="domaine_id" class="form-label fw-bold">
                                            <i class="fas fa-layer-group me-1 text-warning"></i>Domaine *
                                        </label>
                                        <select class="form-select @error('domaine_id') is-invalid @enderror" 
                                                id="domaine_id" 
                                                name="domaine_id" 
                                                required>
                                            <option value="">Sélectionnez un domaine...</option>
                                            @foreach ($domaines as $domaine)
                                                <option value="{{ $domaine->id }}" 
                                                    {{ old('domaine_id', $projet->parent1_id) == $domaine->id ? 'selected' : '' }}>
                                                    {{ $domaine->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('domaine_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dates et Image -->
                            <div class="col-lg-4">
                                <!-- Dates du projet -->
                                <div class="card border mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">
                                            <i class="fas fa-calendar-alt me-2"></i>Dates du projet
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- Date de début -->
                                        <div class="mb-3">
                                            <label for="date_debut" class="form-label fw-bold">
                                                <i class="fas fa-play-circle me-1 text-success"></i>Date de début *
                                            </label>
                                            <input type="date" 
                                                   class="form-control @error('date_debut') is-invalid @enderror" 
                                                   id="date_debut" 
                                                   name="date_debut" 
                                                   value="{{ old('date_debut', $projet->date_debut ? \Carbon\Carbon::parse($projet->date_debut)->format('Y-m-d') : '') }}"
                                                   required>
                                            @error('date_debut')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Date de fin -->
                                        <div class="mb-3">
                                            <label for="date_fin" class="form-label fw-bold">
                                                <i class="fas fa-flag-checkered me-1 text-danger"></i>Date de fin *
                                            </label>
                                            <input type="date" 
                                                   class="form-control @error('date_fin') is-invalid @enderror" 
                                                   id="date_fin" 
                                                   name="date_fin" 
                                                   value="{{ old('date_fin', $projet->date_fin ? \Carbon\Carbon::parse($projet->date_fin)->format('Y-m-d') : '') }}"
                                                   required>
                                            @error('date_fin')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Validation de la date -->
                                        <div id="dateAlert" class="alert alert-warning d-none" role="alert">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <span id="dateAlertText"></span>
                                        </div>
                                        
                                        <!-- Timeline visuelle -->
                                        @if($projet->date_debut && $projet->date_fin)
                                        <div class="mt-3 pt-3 border-top">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-chart-line me-1"></i>Durée du projet
                                            </label>
                                            <div class="progress" style="height: 8px;">
                                                @php
                                                    $debut = \Carbon\Carbon::parse($projet->date_debut);
                                                    $fin = \Carbon\Carbon::parse($projet->date_fin);
                                                    $now = now();
                                                    $total = $debut->diffInDays($fin);
                                                    $passed = $now->greaterThan($fin) ? $total : max(0, $debut->diffInDays($now));
                                                    $percentage = $total > 0 ? min(100, ($passed / $total) * 100) : 0;
                                                @endphp
                                                <div class="progress-bar bg-success" 
                                                     role="progressbar" 
                                                     style="width: {{ $percentage }}%"
                                                     aria-valuenow="{{ $percentage }}" 
                                                     aria-valuemin="0" 
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between small text-muted mt-2">
                                                <span>{{ number_format($percentage, 1) }}%</span>
                                                <span>{{ $passed }}/{{ $total }} jours</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Image du projet -->
                                <div class="card border">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">
                                            <i class="fas fa-image me-2"></i>Illustration
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- Image actuelle -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-image me-1"></i>Image actuelle
                                            </label>
                                            @if($projet->meta_data && isset($projet->meta_data['image']))
                                                <div class="text-center mb-3">
                                                    <img src="{{ asset('storage/' . $projet->meta_data['image']) }}" 
                                                         alt="Image actuelle" 
                                                         class="img-fluid rounded border"
                                                         style="max-height: 150px;">
                                                    <div class="mt-2">
                                                        <a href="{{ asset('storage/' . $projet->meta_data['image']) }}" 
                                                           target="_blank" 
                                                           class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-external-link-alt me-1"></i>Voir en grand
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-center mb-3 p-4 border rounded bg-light">
                                                    <i class="fas fa-image fa-2x text-muted mb-2"></i>
                                                    <p class="text-muted small mb-0">Aucune image définie</p>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Changer l'image -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-sync-alt me-1"></i>Changer l'image
                                            </label>
                                            <div class="image-upload-area border rounded p-3 text-center">
                                                <div class="image-preview mb-2">
                                                    <img id="imagePreview" 
                                                         src="@if($projet->meta_data && isset($projet->meta_data['image'])){{ asset('storage/' . $projet->meta_data['image']) }} @else https://via.placeholder.com/300x200/DDDDDD/666666?text=NOUVELLE+IMAGE @endif" 
                                                         alt="Aperçu de la nouvelle image" 
                                                         class="img-fluid rounded"
                                                         style="max-height: 100px;">
                                                </div>
                                                <label for="image" class="btn btn-outline-warning btn-sm">
                                                    <i class="fas fa-upload me-1"></i> Choisir une nouvelle image
                                                </label>
                                                <input type="file" 
                                                       class="form-control d-none" 
                                                       id="image" 
                                                       name="fichier_url" 
                                                       accept="image/*"
                                                       onchange="previewImage(event)">
                                                <small class="d-block text-muted mt-1">PNG, JPG, GIF jusqu'à 2MB</small>
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Supprimer l'image actuelle -->
                                        @if($projet->meta_data && isset($projet->meta_data['image']))
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   id="remove_image" 
                                                   name="remove_image" 
                                                   value="1">
                                            <label class="form-check-label text-danger" for="remove_image">
                                                <i class="fas fa-trash-alt me-1"></i>Supprimer l'image actuelle
                                            </label>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between border-top pt-4">
                                    <div>
                                        <a href="{{ route('projets.index') }}" class="btn btn-outline-secondary px-4">
                                            <i class="fas fa-times me-1"></i> Annuler
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-danger ms-2" 
                                                onclick="confirmDelete()"
                                                data-bs-toggle="tooltip" 
                                                title="Supprimer définitivement ce projet">
                                            <i class="fas fa-trash-alt me-1"></i> Supprimer
                                        </button>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-warning px-5">
                                            <i class="fas fa-save me-1"></i> Mettre à jour
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>Confirmer la suppression
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer le projet <strong>"{{ $projet->name }}"</strong> ?</p>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Attention :</strong> Cette action est irréversible. Toutes les données associées seront perdues.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Annuler
                </button>
                <form action="{{ route('projets.destroy', $projet) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Supprimer définitivement
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Compteur de caractères pour la description
document.addEventListener('DOMContentLoaded', function() {
    const description = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    
    function updateCharCount() {
        charCount.textContent = description.value.length;
        if (description.value.length > 1000) {
            charCount.classList.add('text-danger');
        } else {
            charCount.classList.remove('text-danger');
        }
    }
    
    description.addEventListener('input', updateCharCount);
    
    // Validation des dates
    const dateDebut = document.getElementById('date_debut');
    const dateFin = document.getElementById('date_fin');
    const dateAlert = document.getElementById('dateAlert');
    const dateAlertText = document.getElementById('dateAlertText');
    
    function validateDates() {
        if (dateDebut.value && dateFin.value) {
            const debut = new Date(dateDebut.value);
            const fin = new Date(dateFin.value);
            
            if (fin < debut) {
                dateAlertText.textContent = 'La date de fin doit être postérieure à la date de début.';
                dateAlert.classList.remove('d-none');
                return false;
            } else {
                dateAlert.classList.add('d-none');
                return true;
            }
        }
        dateAlert.classList.add('d-none');
        return true;
    }
    
    dateDebut.addEventListener('change', validateDates);
    dateFin.addEventListener('change', validateDates);
    
    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity() || !validateDates()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
    
    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}

function confirmDelete() {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
    deleteModal.show();
}
</script>

<style>
.card {
    border-radius: 0.5rem;
}

.card-header {
    border-radius: 0.5rem 0.5rem 0 0 !important;
}

.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #495057;
}

.image-upload-area {
    border-style: dashed !important;
    border-width: 2px !important;
    cursor: pointer;
    transition: all 0.3s ease;
}

.image-upload-area:hover {
    border-color: #ffc107 !important;
    background-color: #fffdf6;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #000;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #e0a800;
    color: #000;
}

.btn-outline-warning:hover {
    background-color: #ffc107;
    color: #000;
}

.icon-container {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.badge {
    padding: 0.4em 0.8em;
    font-weight: 500;
}

.alert {
    border-radius: 0.375rem;
    border: none;
}

.border-bottom {
    border-bottom: 2px solid #dee2e6 !important;
}

.invalid-feedback {
    display: block !important;
}

.progress {
    border-radius: 0.5rem;
    overflow: hidden;
}

.progress-bar {
    border-radius: 0.5rem;
}

.modal-header {
    border-bottom: 2px solid #ffc107;
}

.form-check-input:checked {
    background-color: #dc3545;
    border-color: #dc3545;
}
</style>
@endsection