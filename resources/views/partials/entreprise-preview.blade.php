<!-- resources/views/partials/entreprise-preview.blade.php -->
<div class="modal-preview-content">
    <!-- En-tête avec logo -->
    <div class="preview-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="entreprise-logo-wrapper">
                        @if(isset($entreprise->meta_data['logo']))
                            <img src="{{ asset('storage/' . $entreprise->meta_data['logo']) }}" 
                                 class="entreprise-logo"
                                 alt="{{ $entreprise->name }}">
                        @else
                            <div class="logo-placeholder-large">
                                <i class="fas fa-building fa-5x text-muted"></i>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="entreprise-header-info">
                        <h2 class="entreprise-name mb-2">{{ $entreprise->name }}</h2>
                        
                        @php
                            $type = $entreprise->meta_data['type'] ?? '';
                            $typeConfig = [
                                'entreprise_incube' => ['color' => 'success', 'icon' => 'fa-seedling', 'label' => 'Entreprise Incubée'],
                                'entreprise_alumni' => ['color' => 'primary', 'icon' => 'fa-graduation-cap', 'label' => 'Entreprise Alumni'],
                                'entreprise_partenaire' => ['color' => 'warning', 'icon' => 'fa-handshake', 'label' => 'Entreprise Partenaire']
                            ];
                            $config = $typeConfig[$type] ?? ['color' => 'secondary', 'icon' => 'fa-building', 'label' => 'Entreprise'];
                        @endphp
                        
                        <div class="entreprise-meta-tags mb-3">
                            <span class="badge badge-type bg-{{ $config['color'] }}">
                                <i class="fas {{ $config['icon'] }} me-1"></i>{{ $config['label'] }}
                            </span>
                            
                            @if($entreprise->parent1)
                            <span class="badge badge-domaine bg-info">
                                <i class="fas fa-tag me-1"></i>{{ $entreprise->parent1->name }}
                            </span>
                            @endif
                            
                            @if($entreprise->is_active)
                                <span class="badge badge-status bg-success">
                                    <i class="fas fa-check-circle me-1"></i>Active
                                </span>
                            @else
                                <span class="badge badge-status bg-danger">
                                    <i class="fas fa-times-circle me-1"></i>Inactive
                                </span>
                            @endif
                        </div>
                        
                        <div class="entreprise-dates">
                            <span class="date-item">
                                <i class="fas fa-calendar-plus me-1"></i>
                                Créée le {{ $entreprise->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navigation des sections - Version corrigée -->
    <div class="preview-nav">
        <div class="container-fluid">
            <div class="preview-nav-inner">
                <button type="button" class="nav-link active" data-section="description">
                    <i class="fas fa-info-circle me-2"></i>Description
                </button>
                <button type="button" class="nav-link" data-section="mission">
                    <i class="fas fa-bullseye me-2"></i>Mission & Vision
                </button>
                <button type="button" class="nav-link" data-section="fondateurs">
                    <i class="fas fa-users me-2"></i>Fondateurs
                </button>
                <button type="button" class="nav-link" data-section="contact">
                    <i class="fas fa-address-card me-2"></i>Contact
                </button>
                <button type="button" class="nav-link" data-section="partenaires">
                    <i class="fas fa-handshake me-2"></i>Partenaires
                    @if(isset($entreprise->meta_data['partenaires']) && count($entreprise->meta_data['partenaires']) > 0)
                        <span class="badge bg-primary ms-1">{{ count($entreprise->meta_data['partenaires']) }}</span>
                    @endif
                </button>
                <button type="button" class="nav-link" data-section="documents">
                    <i class="fas fa-file-alt me-2"></i>Documents
                </button>
            </div>
        </div>
    </div>
    
    <!-- Contenu des sections - Version corrigée -->
    <div class="preview-sections">
        <div class="container-fluid">
            <!-- Section Description -->
            <div class="preview-section active" id="section-description">
                <div class="section-header">
                    <h4><i class="fas fa-info-circle text-primary me-2"></i>À propos</h4>
                </div>
                <div class="section-content">
                    <p class="entreprise-description">
                        {{ $entreprise->description ?? 'Aucune description disponible pour cette entreprise.' }}
                    </p>
                </div>
            </div>
            
            <!-- Section Mission & Vision -->
            <div class="preview-section" id="section-mission">
                <div class="row">
                    @if(isset($entreprise->meta_data['mission']))
                    <div class="col-md-6 mb-4">
                        <div class="card card-section h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-bullseye me-2"></i>Mission
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-0">{{ $entreprise->meta_data['mission'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($entreprise->meta_data['vision']))
                    <div class="col-md-6 mb-4">
                        <div class="card card-section h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-eye me-2"></i>Vision
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-0">{{ $entreprise->meta_data['vision'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Section Fondateurs -->
            <div class="preview-section" id="section-fondateurs">
                <div class="section-header">
                    <h4><i class="fas fa-users text-primary me-2"></i>Fondateurs & Équipe</h4>
                </div>
                <div class="section-content">
                    @if(isset($entreprise->meta_data['fondateurs']))
                        <p>{{ $entreprise->meta_data['fondateurs'] }}</p>
                    @else
                        <p class="text-muted">Information non disponible</p>
                    @endif
                </div>
            </div>
            
            <!-- Section Contact -->
            <div class="preview-section" id="section-contact">
                <div class="section-header">
                    <h4><i class="fas fa-address-card text-primary me-2"></i>Coordonnées</h4>
                </div>
                <div class="section-content">
                    <div class="row">
                        @if(isset($entreprise->meta_data['website']))
                        <div class="col-md-6 mb-3">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-globe text-primary"></i>
                                </div>
                                <div class="contact-info">
                                    <h6>Site Web</h6>
                                    <a href="{{ $entreprise->meta_data['website'] }}" 
                                       target="_blank" 
                                       class="text-decoration-none">
                                        {{ $entreprise->meta_data['website'] }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if(isset($entreprise->meta_data['email']))
                        <div class="col-md-6 mb-3">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope text-primary"></i>
                                </div>
                                <div class="contact-info">
                                    <h6>Email</h6>
                                    <a href="mailto:{{ $entreprise->meta_data['email'] }}" 
                                       class="text-decoration-none">
                                        {{ $entreprise->meta_data['email'] }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if(isset($entreprise->meta_data['phone']))
                        <div class="col-md-6 mb-3">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone text-primary"></i>
                                </div>
                                <div class="contact-info">
                                    <h6>Téléphone</h6>
                                    <a href="tel:{{ $entreprise->meta_data['phone'] }}" 
                                       class="text-decoration-none">
                                        {{ $entreprise->meta_data['phone'] }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if(isset($entreprise->meta_data['address']))
                        <div class="col-md-6 mb-3">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                </div>
                                <div class="contact-info">
                                    <h6>Adresse</h6>
                                    <p class="mb-0">{{ $entreprise->meta_data['address'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Section Partenaires -->
            <div class="preview-section" id="section-partenaires">
                <div class="section-header">
                    <h4><i class="fas fa-handshake text-primary me-2"></i>Partenaires & Collaborations</h4>
                    @if(isset($entreprise->meta_data['partenaires']) && count($entreprise->meta_data['partenaires']) > 0)
                        <span class="badge bg-primary ms-2">{{ count($entreprise->meta_data['partenaires']) }} partenaire(s)</span>
                    @endif
                </div>
                <div class="section-content">
                    @if(isset($entreprise->meta_data['partenaires']) && count($entreprise->meta_data['partenaires']) > 0)
                        <div class="partenaires-grid">
                            @foreach($entreprise->meta_data['partenaires'] as $index => $partenaire)
                                <div class="partenaire-card">
                                    @if(isset($partenaire['logo']) && $partenaire['logo'])
                                        <div class="partenaire-logo">
                                            <img src="{{ asset('storage/' . $partenaire['logo']) }}" 
                                                 alt="{{ $partenaire['nom'] ?? 'Partenaire' }}"
                                                 class="img-fluid rounded">
                                        </div>
                                    @else
                                        <div class="partenaire-logo-placeholder">
                                            <i class="fas fa-handshake fa-3x text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="partenaire-info">
                                        @if(isset($partenaire['nom']))
                                            <h6 class="partenaire-nom">{{ $partenaire['nom'] }}</h6>
                                        @endif
                                        
                                        @if(isset($partenaire['type']))
                                            @php
                                                $typeColors = [
                                                    'academique' => 'bg-info',
                                                    'financier' => 'bg-success',
                                                    'technique' => 'bg-warning',
                                                    'commercial' => 'bg-primary'
                                                ];
                                                $typeColor = $typeColors[$partenaire['type']] ?? 'bg-secondary';
                                            @endphp
                                            <span class="partenaire-type badge {{ $typeColor }} mb-2">
                                                @switch($partenaire['type'])
                                                    @case('academique')
                                                        <i class="fas fa-graduation-cap me-1"></i>Académique
                                                        @break
                                                    @case('financier')
                                                        <i class="fas fa-money-bill-wave me-1"></i>Financier
                                                        @break
                                                    @case('technique')
                                                        <i class="fas fa-cogs me-1"></i>Technique
                                                        @break
                                                    @case('commercial')
                                                        <i class="fas fa-store me-1"></i>Commercial
                                                        @break
                                                    @default
                                                        <i class="fas fa-handshake me-1"></i>{{ ucfirst($partenaire['type']) }}
                                                @endswitch
                                            </span>
                                        @endif
                                        
                                        @if(isset($partenaire['description']))
                                            <p class="partenaire-description small text-muted">
                                                {{ $partenaire['description'] }}
                                            </p>
                                        @endif
                                        
                                        @if(isset($partenaire['website']))
                                            <a href="{{ $partenaire['website'] }}" 
                                               target="_blank" 
                                               class="btn btn-outline-primary btn-sm mt-2">
                                                <i class="fas fa-external-link-alt me-1"></i>Site web
                                            </a>
                                        @endif
                                        
                                        @if(isset($partenaire['created_at']))
                                            <p class="partenaire-date small text-muted mt-2 mb-0">
                                                <i class="fas fa-calendar-alt me-1"></i>Partenaire depuis {{ $partenaire['created_at'] }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="no-partenaires text-center py-4">
                            <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">Aucun partenaire déclaré pour cette entreprise.</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Section Documents -->
            <div class="preview-section" id="section-documents">
                <div class="section-header">
                    <h4><i class="fas fa-file-alt text-primary me-2"></i>Documents & Ressources</h4>
                </div>
                <div class="section-content">
                    @if(isset($entreprise->meta_data['fichier_url']))
                        <div class="document-card">
                            <div class="document-icon">
                                <i class="fas fa-file-pdf fa-2x text-danger"></i>
                            </div>
                            <div class="document-info">
                                <h6>Documentation de l'entreprise</h6>
                                <p class="text-muted small mb-2">Présentation complète de l'entreprise</p>
                                <a href="{{ $entreprise->meta_data['fichier_url'] }}" 
                                   target="_blank" 
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-download me-1"></i>Télécharger
                                </a>
                                <a href="{{ $entreprise->meta_data['fichier_url'] }}" 
                                   target="_blank" 
                                   class="btn btn-outline-secondary btn-sm ms-2">
                                    <i class="fas fa-external-link-alt me-1"></i>Voir en ligne
                                </a>
                            </div>
                        </div>
                    @else
                        <p class="text-muted">Aucun document disponible pour cette entreprise.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer modal-footer-custom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="social-links">
                    @if(isset($entreprise->meta_data['website']))
                    <a href="{{ $entreprise->meta_data['website'] }}" 
                       target="_blank" 
                       class="social-link"
                       data-bs-toggle="tooltip"
                       title="Site web">
                        <i class="fas fa-globe"></i>
                    </a>
                    @endif
                    @if(isset($entreprise->meta_data['email']))
                    <a href="mailto:{{ $entreprise->meta_data['email'] }}" 
                       class="social-link"
                       data-bs-toggle="tooltip"
                       title="Envoyer un email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    @endif
                    @if(isset($entreprise->meta_data['phone']))
                    <a href="tel:{{ $entreprise->meta_data['phone'] }}" 
                       class="social-link"
                       data-bs-toggle="tooltip"
                       title="Appeler">
                        <i class="fas fa-phone"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-md-6 text-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Fermer
                </button>
                <a href="{{ route('entreprises.show', $entreprise) }}" 
                   class="btn btn-primary">
                    <i class="fas fa-external-link-alt me-1"></i>Page complète
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Initialisation au chargement
document.addEventListener('DOMContentLoaded', function() {
    initPreviewNavigation();
    initTooltips();
    showSection('description'); // Afficher la section par défaut
    
    // Masquer toutes les sections sauf la première
    document.querySelectorAll('.preview-section').forEach((section, index) => {
        if (index === 0) {
            section.classList.add('active');
        } else {
            section.classList.remove('active');
        }
    });
});

// Fonction pour initialiser la navigation
function initPreviewNavigation() {
    const navLinks = document.querySelectorAll('.preview-nav .nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            const sectionId = this.getAttribute('data-section');
            
            // Mettre à jour l'état actif des boutons
            navLinks.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Afficher la section correspondante
            showSection(sectionId);
        });
    });
}

// Fonction pour afficher une section
function showSection(sectionId) {
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

// Initialiser les tooltips
function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}
</script>

<style>
.modal-preview-content {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.preview-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 2rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.entreprise-logo-wrapper {
    text-align: center;
}

.entreprise-logo {
    width: 150px;
    height: 150px;
    object-fit: contain;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    background: white;
    padding: 10px;
}

.logo-placeholder-large {
    width: 150px;
    height: 150px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.entreprise-header-info {
    padding-left: 2rem;
}

.entreprise-name {
    color: #0D4293;
    font-weight: 700;
    font-size: 2rem;
}

.entreprise-meta-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.entreprise-meta-tags .badge {
    border-radius: 20px;
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
    font-weight: 600;
}

.badge-type {
    background: linear-gradient(135deg, var(--bs-success) 0%, var(--bs-success-light) 100%);
}

.badge-domaine {
    background: linear-gradient(135deg, var(--bs-info) 0%, var(--bs-info-light) 100%);
}

.badge-status {
    background: linear-gradient(135deg, var(--bs-success) 0%, var(--bs-success-light) 100%);
}

.entreprise-dates {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.date-item {
    display: flex;
    align-items: center;
}

.preview-nav {
    background: white;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 100;
}

.preview-nav-inner {
    display: flex;
    overflow-x: auto;
    padding: 0.5rem 0;
    gap: 0.5rem;
}

.preview-nav-inner .nav-link {
    flex: 0 0 auto;
    padding: 0.75rem 1.5rem;
    border: none;
    background: transparent;
    color: #6c757d;
    font-weight: 500;
    border-radius: 50px;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.preview-nav-inner .nav-link:hover {
    background: rgba(13, 66, 147, 0.1);
    color: #0D4293;
}

.preview-nav-inner .nav-link.active {
    background: linear-gradient(135deg, #0D4293 0%, #1a56db 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(13, 66, 147, 0.2);
}

.preview-nav-inner .nav-link .badge {
    font-size: 0.7rem;
    padding: 0.2rem 0.5rem;
    margin-left: 0.5rem;
}

.preview-sections {
    padding: 2rem 0;
    min-height: 300px;
}

.preview-section {
    display: none;
    animation: fadeIn 0.5s ease;
}

.preview-section.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.section-header {
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f0f0f0;
    display: flex;
    align-items: center;
}

.section-header h4 {
    color: #0D4293;
    font-weight: 600;
    margin: 0;
}

.section-content {
    line-height: 1.6;
}

.entreprise-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.card-section {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
}

.card-section:hover {
    transform: translateY(-5px);
}

.card-section .card-header {
    border-radius: 15px 15px 0 0;
    font-weight: 600;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
}

.contact-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.contact-icon {
    width: 40px;
    height: 40px;
    background: rgba(13, 66, 147, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.contact-info h6 {
    color: #0D4293;
    margin-bottom: 0.25rem;
    font-weight: 600;
}

.partenaires-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
}

.partenaire-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    text-align: center;
}

.partenaire-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.partenaire-logo {
    width: 80px;
    height: 80px;
    margin: 0 auto 1rem;
    overflow: hidden;
    border-radius: 10px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.partenaire-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.partenaire-logo-placeholder {
    width: 80px;
    height: 80px;
    margin: 0 auto 1rem;
    background: #f8f9fa;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.partenaire-nom {
    color: #0D4293;
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 1rem;
}

.partenaire-type {
    border-radius: 20px;
    padding: 0.25rem 0.75rem;
    font-size: 0.8rem;
    margin-bottom: 0.5rem;
    display: inline-block;
}

.partenaire-description {
    font-size: 0.9rem;
    line-height: 1.5;
    color: #6c757d;
    margin-bottom: 1rem;
}

.partenaire-date {
    font-size: 0.8rem;
}

.no-partenaires {
    background: #f8f9fa;
    border-radius: 15px;
    border: 2px dashed #dee2e6;
    padding: 3rem;
}

.document-card {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1.5rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.document-icon {
    flex-shrink: 0;
}

.document-info h6 {
    color: #0D4293;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.modal-footer-custom {
    background: #f8f9fa;
    border-top: 1px solid rgba(0,0,0,0.1);
    padding: 1.5rem 0;
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0D4293;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.social-link:hover {
    background: #0D4293;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(13, 66, 147, 0.2);
}

/* Scrollbar personnalisée pour la navigation */
.preview-nav-inner::-webkit-scrollbar {
    height: 6px;
}

.preview-nav-inner::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.preview-nav-inner::-webkit-scrollbar-thumb {
    background: #0D4293;
    border-radius: 3px;
}

.preview-nav-inner::-webkit-scrollbar-thumb:hover {
    background: #1a56db;
}

/* Responsive */
@media (max-width: 768px) {
    .preview-header {
        padding: 1.5rem 0;
    }
    
    .entreprise-header-info {
        padding-left: 0;
        margin-top: 1.5rem;
        text-align: center;
    }
    
    .entreprise-name {
        font-size: 1.5rem;
    }
    
    .entreprise-meta-tags {
        justify-content: center;
    }
    
    .entreprise-dates {
        justify-content: center;
        text-align: center;
    }
    
    .preview-nav-inner {
        justify-content: flex-start;
        padding-bottom: 0.5rem;
    }
    
    .preview-nav-inner .nav-link {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .partenaires-grid {
        grid-template-columns: 1fr;
    }
    
    .document-card {
        flex-direction: column;
        text-align: center;
    }
    
    .modal-footer-custom .row {
        flex-direction: column;
        gap: 1rem;
    }
    
    .modal-footer-custom .col-md-6 {
        width: 100%;
        text-align: center !important;
    }
    
    .social-links {
        justify-content: center;
    }
}
</style>