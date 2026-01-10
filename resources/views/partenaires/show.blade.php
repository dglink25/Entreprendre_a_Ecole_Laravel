@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="fas fa-eye me-2"></i>Détails du partenaire
                        </h4>
                        <div>
                            <a href="{{ route('partenaires.edit', $partenaire) }}" class="btn btn-light btn-sm me-2">
                                <i class="fas fa-edit me-1"></i> Modifier
                            </a>
                            <a href="{{ route('partenaires.index') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left me-1"></i> Retour
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="row">
                        <!-- Colonne de gauche : Logo et infos principales -->
                        <div class="col-md-4">
                            <div class="card border mb-4">
                                <div class="card-body text-center">
                                    @if(isset($partenaire->meta_data['logo']) && $partenaire->meta_data['logo'])
                                        <img src="{{ Storage::url($partenaire->meta_data['logo']) }}" 
                                             alt="{{ $partenaire->name }}" 
                                             class="img-fluid rounded mb-3" 
                                             style="max-height: 200px;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" 
                                             style="height: 200px;">
                                            <i class="fas fa-building fa-4x text-muted"></i>
                                        </div>
                                    @endif
                                    
                                    <h4 class="mb-2">{{ $partenaire->name }}</h4>
                                    
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
                                    
                                    <span class="badge bg-{{ $color }} fs-6 mb-3">{{ $label }}</span>
                                    
                                    <div class="d-grid gap-2 mt-3">
                                        @if($partenaire->is_active)
                                            <span class="badge bg-success fs-6">
                                                <i class="fas fa-check-circle me-1"></i> Actif
                                            </span>
                                        @else
                                            <span class="badge bg-secondary fs-6">
                                                <i class="fas fa-times-circle me-1"></i> Inactif
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Informations de contact -->
                            <div class="card border">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">
                                        <i class="fas fa-address-card me-2"></i>Contact
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @if(isset($partenaire->meta_data['website']))
                                    <div class="mb-3">
                                        <i class="fas fa-globe text-primary me-2"></i>
                                        <strong>Site web :</strong><br>
                                        <a href="{{ $partenaire->meta_data['website'] }}" target="_blank">
                                            {{ $partenaire->meta_data['website'] }}
                                        </a>
                                    </div>
                                    @endif
                                    
                                    @if(isset($partenaire->meta_data['email']))
                                    <div class="mb-3">
                                        <i class="fas fa-envelope text-primary me-2"></i>
                                        <strong>Email :</strong><br>
                                        {{ $partenaire->meta_data['email'] }}
                                    </div>
                                    @endif
                                    
                                    @if(isset($partenaire->meta_data['phone']))
                                    <div class="mb-3">
                                        <i class="fas fa-phone text-primary me-2"></i>
                                        <strong>Téléphone :</strong><br>
                                        {{ $partenaire->meta_data['phone'] }}
                                    </div>
                                    @endif
                                    
                                    @if(isset($partenaire->meta_data['address']))
                                    <div class="mb-0">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        <strong>Adresse :</strong><br>
                                        {{ $partenaire->meta_data['address'] }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Colonne de droite : Description et relations -->
                        <div class="col-md-8">
                            <!-- Description -->
                            <div class="card border mb-4">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">
                                        <i class="fas fa-align-left me-2"></i>Description
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @if($partenaire->description)
                                        <p class="mb-0">{{ $partenaire->description }}</p>
                                    @else
                                        <p class="text-muted mb-0 fst-italic">Aucune description disponible.</p>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Relations -->
                            <div class="card border mb-4">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">
                                        <i class="fas fa-link me-2"></i>Relations
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @if($partenaire->parent1)
                                        <div class="mb-3">
                                            <h6 class="fw-bold mb-2">
                                                <i class="fas fa-project-diagram me-2"></i>Référence
                                            </h6>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" 
                                                     style="width: 50px; height: 50px;">
                                                    <i class="fas fa-building text-muted"></i>
                                                </div>
                                                <div>
                                                    <strong>{{ $partenaire->parent1->name }}</strong><br>
                                                    <small class="text-muted">{{ $partenaire->parent1->type }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-muted mb-0 fst-italic">Aucune relation de référence définie.</p>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Métadonnées -->
                            <div class="card border">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">
                                        <i class="fas fa-info-circle me-2"></i>Informations techniques
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <strong>ID :</strong> {{ $partenaire->id }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Créé le :</strong> {{ $partenaire->created_at->format('d/m/Y H:i') }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Modifié le :</strong> {{ $partenaire->updated_at->format('d/m/Y H:i') }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <strong>Module :</strong> {{ $partenaire->module->name ?? 'N/A' }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Type :</strong> {{ $partenaire->type }}
                                            </div>
                                            <div class="mb-0">
                                                <strong>Statut :</strong> 
                                                @if($partenaire->is_active)
                                                    <span class="text-success">Actif</span>
                                                @else
                                                    <span class="text-secondary">Inactif</span>
                                                @endif
                                            </div>
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
                                <a href="{{ route('partenaires.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                                </a>
                                <div>
                                    <button type="button" 
                                            class="btn btn-outline-danger me-2" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal">
                                        <i class="fas fa-trash me-1"></i> Supprimer
                                    </button>
                                    <a href="{{ route('partenaires.edit', $partenaire) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-1"></i> Modifier
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de suppression (identique à celui de edit) -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Même contenu que dans edit.blade.php -->
        </div>
    </div>
</div>
@endsection