@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-9">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-edit me-2"></i>Modifier le partenaire
                        </h4>
                        <a href="{{ route('partenaires.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('partenaires.update', $partenaire) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Informations de base -->
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2 mb-3">
                                        <i class="fas fa-info-circle text-primary me-2"></i>Informations générales
                                    </h5>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label fw-bold">
                                                <i class="fas fa-building me-1"></i>Nom du partenaire *
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" 
                                                   name="name" 
                                                   value="{{ old('name', $partenaire->name) }}" 
                                                   required
                                                   placeholder="Entrez le nom du partenaire">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="type" class="form-label fw-bold">
                                                <i class="fas fa-tag me-1"></i>Type de partenaire *
                                            </label>
                                            <select class="form-select @error('type') is-invalid @enderror" 
                                                    id="type" 
                                                    name="type" 
                                                    required>
                                                <option value="">Sélectionnez un type</option>
                                                <option value="partenaire_strategique" {{ (old('type', $partenaire->meta_data['type'] ?? '') == 'partenaire_strategique') ? 'selected' : '' }}>
                                                    Partenaire stratégique
                                                </option>
                                                <option value="partenaire_financier" {{ (old('type', $partenaire->meta_data['type'] ?? '') == 'partenaire_financier') ? 'selected' : '' }}>
                                                    Partenaire financier
                                                </option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label fw-bold">
                                            <i class="fas fa-align-left me-1"></i>Description
                                        </label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" 
                                                  name="description" 
                                                  rows="4" 
                                                  placeholder="Décrivez le partenaire...">{{ old('description', $partenaire->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- Informations de contact -->
                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2 mb-3">
                                        <i class="fas fa-address-card text-primary me-2"></i>Informations de contact
                                    </h5>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="website" class="form-label fw-bold">
                                                <i class="fas fa-globe me-1"></i>Site web
                                            </label>
                                            <input type="url" 
                                                   class="form-control @error('website') is-invalid @enderror" 
                                                   id="website" 
                                                   name="website" 
                                                   value="{{ old('website', $partenaire->meta_data['website'] ?? '') }}"
                                                   placeholder="https://example.com">
                                            @error('website')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label fw-bold">
                                                <i class="fas fa-envelope me-1"></i>Email
                                            </label>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email', $partenaire->meta_data['email'] ?? '') }}"
                                                   placeholder="contact@partenaire.com">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label fw-bold">
                                                <i class="fas fa-phone me-1"></i>Téléphone
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" 
                                                   name="phone" 
                                                   value="{{ old('phone', $partenaire->meta_data['phone'] ?? '') }}"
                                                   placeholder="+229 XX XX XX XX XX">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="address" class="form-label fw-bold">
                                                <i class="fas fa-map-marker-alt me-1"></i>Adresse
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('address') is-invalid @enderror" 
                                                   id="address" 
                                                   name="address" 
                                                   value="{{ old('address', $partenaire->meta_data['address'] ?? '') }}"
                                                   placeholder="Adresse complète">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Relation -->
                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2 mb-3">
                                        <i class="fas fa-link text-primary me-2"></i>Relations
                                    </h5>
                                    
                                    <div class="mb-3">
                                        <label for="parent1_id" class="form-label fw-bold">
                                            <i class="fas fa-project-diagram me-1"></i> Référence
                                        </label>
                                        <select class="form-select @error('parent1_id') is-invalid @enderror" 
                                                id="parent1_id" 
                                                name="parent1_id">
                                            <option value="">Sélectionnez une référence (optionnel)</option>
                                            <optgroup label="Entreprises">
                                                @foreach ($entreprises as $entreprise)
                                                    <option value="{{ $entreprise->id }}" {{ (old('parent1_id', $partenaire->parent1_id) == $entreprise->id) ? 'selected' : '' }}>
                                                        {{ $entreprise->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Projets">
                                                @foreach ($projets as $projet)
                                                    <option value="{{ $projet->id }}" {{ (old('parent1_id', $partenaire->parent1_id) == $projet->id) ? 'selected' : '' }}>
                                                        {{ $projet->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        <small class="text-muted">Sélectionnez une entreprise ou un projet parent si applicable</small>
                                        @error('parent1_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Logo et statut -->
                            <div class="col-md-4">
                                <div class="card border">
                                    <div class="card-body">
                                        <h6 class="card-title mb-3">
                                            <i class="fas fa-image me-2"></i>Logo
                                        </h6>
                                        
                                        <div class="mb-3">
                                            <div class="logo-upload-area border rounded p-4 text-center mb-3">
                                                <div class="logo-preview mb-3">
                                                    @if(isset($partenaire->meta_data['logo']) && $partenaire->meta_data['logo'])
                                                        <img id="logoPreview" 
                                                             src="{{ Storage::url($partenaire->meta_data['logo']) }}" 
                                                             alt="Logo actuel" 
                                                             class="img-thumbnail" 
                                                             style="max-width: 200px; max-height: 200px;">
                                                    @else
                                                        <img id="logoPreview" 
                                                             src="https://via.placeholder.com/200x200/DDDDDD/666666?text=LOGO" 
                                                             alt="Aperçu du logo" 
                                                             class="img-thumbnail" 
                                                             style="max-width: 200px; max-height: 200px;">
                                                    @endif
                                                </div>
                                                <label for="logo" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-upload me-1"></i> Changer le logo
                                                </label>
                                                <input type="file" 
                                                       class="form-control d-none" 
                                                       id="logo" 
                                                       name="logo" 
                                                       accept="image/*"
                                                       onchange="previewLogo(event)">
                                                <small class="d-block text-muted mt-2">PNG, JPG, GIF jusqu'à 2MB</small>
                                                
                                                @if(isset($partenaire->meta_data['logo']) && $partenaire->meta_data['logo'])
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               id="remove_logo" 
                                                               name="remove_logo" 
                                                               value="1">
                                                        <label class="form-check-label text-danger" for="remove_logo">
                                                            <i class="fas fa-trash me-1"></i> Supprimer le logo actuel
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            @error('logo')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <hr>
                                        
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="fas fa-toggle-on me-1"></i>Statut
                                            </label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="is_active" 
                                                       name="is_active" 
                                                       value="1" 
                                                       {{ old('is_active', $partenaire->is_active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active">
                                                    Partenaire actif
                                                </label>
                                            </div>
                                            <small class="text-muted">Désactivez pour masquer ce partenaire</small>
                                        </div>
                                        
                                        <hr>
                                        
                                        <div class="text-muted small">
                                            <div class="mb-1">
                                                <i class="fas fa-calendar-plus me-1"></i>
                                                <strong>Créé le :</strong> {{ $partenaire->created_at->format('d/m/Y H:i') }}
                                            </div>
                                            <div>
                                                <i class="fas fa-calendar-edit me-1"></i>
                                                <strong>Modifié le :</strong> {{ $partenaire->updated_at->format('d/m/Y H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('partenaires.index') }}" class="btn btn-outline-secondary me-2">
                                            <i class="fas fa-times me-1"></i> Annuler
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal">
                                            <i class="fas fa-trash me-1"></i> Supprimer
                                        </button>
                                    </div>
                                    <div>
                                        <a href="{{ route('partenaires.show', $partenaire) }}" 
                                           class="btn btn-outline-info me-2"
                                           target="_blank">
                                            <i class="fas fa-eye me-1"></i> Prévisualiser
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
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
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmation de suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="fas fa-trash-alt fa-4x text-danger mb-3"></i>
                    <h5>Êtes-vous sûr de vouloir supprimer ce partenaire ?</h5>
                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Attention :</strong> Cette action est irréversible. Toutes les données associées à ce partenaire seront définitivement supprimées.
                    </div>
                    <div class="mt-3 p-3 bg-light rounded">
                        <strong>{{ $partenaire->name }}</strong><br>
                        <small class="text-muted">Type: {{ $partenaire->meta_data['type'] ?? 'Non défini' }}</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Annuler
                </button>
                <form action="{{ route('partenaires.destroy', $partenaire) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Oui, supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewLogo(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('logoPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Gérer la case à cocher de suppression de logo
document.getElementById('logo')?.addEventListener('change', function() {
    const removeLogoCheckbox = document.getElementById('remove_logo');
    if (removeLogoCheckbox && this.files.length > 0) {
        removeLogoCheckbox.checked = false;
    }
});

document.getElementById('remove_logo')?.addEventListener('change', function() {
    const logoInput = document.getElementById('logo');
    if (this.checked && logoInput) {
        logoInput.value = '';
        document.getElementById('logoPreview').src = 'https://via.placeholder.com/200x200/DDDDDD/666666?text=LOGO';
    }
});
</script>

<style>
.logo-upload-area {
    border-style: dashed !important;
    border-width: 2px !important;
    cursor: pointer;
    transition: all 0.3s ease;
}

.logo-upload-area:hover {
    border-color: #0d6efd !important;
    background-color: #f8f9fa;
}

.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #495057;
}

.card-header {
    border-radius: 0.375rem 0.375rem 0 0 !important;
}

.btn-outline-primary:hover {
    background-color: #0d6efd;
    color: white;
}

.form-switch .form-check-input {
    height: 1.5em;
    width: 3em;
}

.img-thumbnail {
    object-fit: contain;
    background-color: #f8f9fa;
}
</style>
@endsection