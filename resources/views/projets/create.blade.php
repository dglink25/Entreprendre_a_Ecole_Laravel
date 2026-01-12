@extends('layouts.app')

@section('title', 'Créer un Projet - Module EAE')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-project-diagram me-2"></i>
                                @isset($projet) Modifier le Projet @else Nouveau Projet @endisset
                            </h4>
                            <p class="mb-0 mt-1 opacity-75 small">Module EAE</p>
                        </div>
                        <a href="{{ route('projets.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Retour
                        </a>
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

                    <form action="@isset($projet){{ route('projets.update', $projet) }}@else{{ route('projets.store') }}@endisset" 
                          method="POST" 
                          enctype="multipart/form-data" 
                          class="needs-validation" 
                          novalidate>
                        @isset($projet)
                            @method('PUT')
                        @endisset
                        @csrf

                        <div class="row">
                            <!-- Informations principales -->
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2 mb-4">
                                        <i class="fas fa-info-circle text-primary me-2"></i>Informations du projet
                                    </h5>
                                    
                                    <!-- Nom du projet -->
                                    <div class="mb-4">
                                        <label for="name" class="form-label fw-bold">
                                            <i class="fas fa-tag me-1 text-primary"></i>Nom du projet *
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('name') is-invalid @enderror" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name', $projet->name ?? '') }}" 
                                               required
                                               placeholder="Ex: Plateforme E-learning">
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Donnez un nom clair et descriptif à votre projet</div>
                                    </div>
                                    
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <label for="description" class="form-label fw-bold">
                                            <i class="fas fa-align-left me-1 text-primary"></i>Description
                                        </label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" 
                                                  name="description" 
                                                  rows="6" 
                                                  placeholder="Décrivez les objectifs, les fonctionnalités et la valeur ajoutée du projet...">{{ old('description', $projet->description ?? '') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Maximum 1000 caractères</div>
                                        <div class="text-end small text-muted">
                                            <span id="charCount">0</span>/1000
                                        </div>
                                    </div>
                                    
                                    <!-- Domaine -->
                                    <div class="mb-4">
                                        <label for="domaine_id" class="form-label fw-bold">
                                            <i class="fas fa-layer-group me-1 text-primary"></i>Domaine *
                                        </label>
                                        <select class="form-select @error('domaine_id') is-invalid @enderror" 
                                                id="domaine_id" 
                                                name="domaine_id" 
                                                required>
                                            <option value="">Sélectionnez un domaine...</option>
                                            @foreach ($domaines as $domaine)
                                                <option value="{{ $domaine->id }}" 
                                                    {{ old('domaine_id', $projet->parent1_id ?? '') == $domaine->id ? 'selected' : '' }}>
                                                    {{ $domaine->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('domaine_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Domaine principal du projet</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dates et Image -->
                            <div class="col-lg-4">
                                <div class="card border mb-4">
                                    <div class="card-body">
                                        <h6 class="card-title mb-3">
                                            <i class="fas fa-calendar-alt me-2"></i>Dates du projet
                                        </h6>
                                        
                                        <!-- Date de début -->
                                        <div class="mb-3">
                                            <label for="date_debut" class="form-label fw-bold">
                                                <i class="fas fa-play-circle me-1 text-success"></i>Date de début *
                                            </label>
                                            <input type="date" 
                                                   class="form-control @error('date_debut') is-invalid @enderror" 
                                                   id="date_debut" 
                                                   name="date_debut" 
                                                   value="{{ old('date_debut', $projet->date_debut ?? '') }}"
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
                                                   value="{{ old('date_fin', $projet->date_fin ?? '') }}"
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
                                    </div>
                                </div>
                                
                                <div class="card border">
                                    <div class="card-body">
                                        <h6 class="card-title mb-3">
                                            <i class="fas fa-image me-2"></i>Illustration
                                        </h6>
                                        
                                        <!-- Image -->
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-upload me-1"></i>Image du projet
                                            </label>
                                            <div class="image-upload-area border rounded p-4 text-center mb-3">
                                                <div class="image-preview mb-3">
                                                    @if(isset($projet) && $projet->meta_data && isset($projet->meta_data['image']))
                                                        <img id="imagePreview" 
                                                             src="{{ asset('storage/' . $projet->fichier_url) }}" 
                                                             alt="Aperçu" 
                                                             class="img-fluid rounded" 
                                                             style="max-height: 200px;">
                                                    @else
                                                        <img id="imagePreview" 
                                                             src="https://via.placeholder.com/300x200/DDDDDD/666666?text=PROJET" 
                                                             alt="Aperçu" 
                                                             class="img-fluid rounded" 
                                                             style="max-height: 200px;">
                                                    @endif
                                                </div>
                                                <label for="image" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-upload me-1"></i> Choisir une image
                                                </label>
                                                <input type="file" 
                                                       class="form-control d-none" 
                                                       id="image" 
                                                       name="fichier_url" 
                                                       accept="image/*"
                                                       onchange="previewImage(event)">
                                                <small class="d-block text-muted mt-2">PNG, JPG, GIF jusqu'à 2MB</small>
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between border-top pt-4">
                                    <a href="{{ route('projets.index') }}" class="btn btn-outline-secondary px-4">
                                        <i class="fas fa-times me-1"></i> Annuler
                                    </a>
                                    <button type="submit" class="btn btn-primary px-5">
                                        <i class="fas fa-save me-1"></i> 
                                        @isset($projet) Mettre à jour @else Enregistrer @endisset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
    updateCharCount(); // Initial count
    
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
});

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.classList.remove('d-none');
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
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
    border-color: #0d6efd !important;
    background-color: #f8f9fa;
}

.btn-outline-primary:hover {
    background-color: #0d6efd;
    color: white;
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

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
}

#charCount {
    font-weight: 600;
}
</style>
@endsection