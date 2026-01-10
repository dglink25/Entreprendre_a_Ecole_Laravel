@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-9">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-handshake me-2"></i>Ajouter un nouveau partenaire
                        </h4>
                        <a href="{{ route('partenaires.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('partenaires.store') }}" enctype="multipart/form-data">
                        @csrf

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
                                                   value="{{ old('name') }}" 
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
                                                <option value="partenaire_strategique" {{ old('type') == 'partenaire_strategique' ? 'selected' : '' }}>
                                                    Partenaire stratégique
                                                </option>
                                                <option value="partenaire_financier" {{ old('type') == 'partenaire_financier' ? 'selected' : '' }}>
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
                                                  placeholder="Décrivez le partenaire...">{{ old('description') }}</textarea>
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
                                                   value="{{ old('website') }}"
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
                                                   value="{{ old('email') }}"
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
                                                   value="{{ old('phone') }}"
                                                   placeholder="+XX XXX XXX XXX">
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
                                                   value="{{ old('address') }}"
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
                                            <i class="fas fa-project-diagram me-1"></i>Parent / Référence
                                        </label>
                                        <select class="form-select @error('parent1_id') is-invalid @enderror" 
                                                id="parent1_id" 
                                                name="parent1_id">
                                            <option value="">Sélectionnez un parent (optionnel)</option>
                                            <optgroup label="Entreprises">
                                                @foreach ($entreprises as $entreprise)
                                                    <option value="{{ $entreprise->id }}" {{ old('parent1_id') == $entreprise->id ? 'selected' : '' }}>
                                                        {{ $entreprise->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Projets">
                                                @foreach ($projets as $projet)
                                                    <option value="{{ $projet->id }}" {{ old('parent1_id') == $projet->id ? 'selected' : '' }}>
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
                                                    <img id="logoPreview" 
                                                         src="https://via.placeholder.com/200x200/DDDDDD/666666?text=LOGO" 
                                                         alt="Aperçu du logo" 
                                                         class="img-thumbnail" 
                                                         style="max-width: 200px; max-height: 200px;">
                                                </div>
                                                <label for="logo" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-upload me-1"></i> Télécharger un logo
                                                </label>
                                                <input type="file" 
                                                       class="form-control d-none" 
                                                       id="logo" 
                                                       name="logo" 
                                                       accept="image/*"
                                                       onchange="previewLogo(event)">
                                                <small class="d-block text-muted mt-2">PNG, JPG, GIF jusqu'à 2MB</small>
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
                                                       checked>
                                                <label class="form-check-label" for="is_active">
                                                    Partenaire actif
                                                </label>
                                            </div>
                                            <small class="text-muted">Désactivez pour masquer ce partenaire</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('partenaires.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-1"></i> Annuler
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-1"></i> Enregistrer le partenaire
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
function previewLogo(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('logoPreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
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
</style>
@endsection