@extends('layouts.app')

@section('title', 'Nos Partenaires - Programme Entreprendre à l\'École')

@section('content')
<style>
    /* Styles spécifiques pour la page partenaires */
    .gallery-header {
        position: relative;
        height: 60vh;
        min-height: 400px;
        max-height: 600px;
        overflow: hidden;
        margin-top: -1px;
        animation: headerReveal 1s ease-out;
    }
    
    @keyframes headerReveal {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .gallery-header .header-image {
        height: 100%;
        width: 100%;
    }
    
    .gallery-header .header-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6);
        animation: zoomIn 30s ease-in-out infinite alternate;
    }
    
    @keyframes zoomIn {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }
    
    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(13, 66, 147, 0.3), rgba(26, 86, 219, 0.2));
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    
    .carousel_title {
        text-align: center;
        color: white;
        padding: 2rem;
        max-width: 800px;
        animation: titleSlideUp 1s ease-out 0.3s both;
    }
    
    @keyframes titleSlideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .carousel_title h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .carousel_title .subtitle {
        font-size: clamp(1rem, 2vw, 1.3rem);
        font-weight: 300;
        letter-spacing: 2px;
        opacity: 0.9;
    }
    
    .container00 {
        display: flex;
        gap: clamp(20px, 4vw, 60px);
        max-width: 1400px;
        margin: clamp(40px, 6vw, 80px) auto;
        padding: 0 clamp(15px, 4vw, 40px);
        animation: containerFadeIn 0.8s ease-out 0.5s both;
    }
    
    @keyframes containerFadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .main-content {
        flex: 1;
        min-width: 0;
        width: 100%;
        margin: 0 auto;
    }
    
    /* Search and Filters Section */
    .search-filter-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: clamp(30px, 4vw, 50px);
        padding: clamp(20px, 3vw, 30px);
        animation: fadeInUp 0.6s ease-out 0.3s both;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .filter-group {
        display: flex;
        flex-wrap: wrap;
        gap: clamp(10px, 2vw, 15px);
        margin-bottom: clamp(15px, 2vw, 25px);
    }
    
    .filter-dropdown {
        position: relative;
        display: inline-block;
    }
    
    .filter-dropdown .btn {
        background: white;
        border: 2px solid #e2e8f0;
        color: #64748b;
        padding: clamp(10px, 1.5vw, 14px) clamp(15px, 2vw, 25px);
        border-radius: 12px;
        font-weight: 500;
        transition: all 0.4s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .filter-dropdown .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #0D4293, #1a56db);
        transition: left 0.4s ease-out;
        z-index: -1;
    }
    
    .filter-dropdown .btn:hover {
        border-color: #0D4293;
        color: white;
    }
    
    .filter-dropdown .btn:hover::before {
        left: 0;
    }
    
    .filter-dropdown .btn:hover i {
        color: white;
    }
    
    .filter-dropdown .btn i {
        color: #64748b;
        transition: all 0.3s ease;
    }
    
    .filter-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        padding: clamp(15px, 2vw, 20px);
        min-width: 250px;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease-out;
    }
    
    .filter-dropdown:hover .filter-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .filter-check {
        accent-color: #0D4293;
        margin-right: 10px;
    }
    
    .filter-label {
        color: #64748b;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 8px 12px;
        border-radius: 6px;
    }
    
    .filter-label:hover {
        background: rgba(13, 66, 147, 0.05);
        color: #0D4293;
    }
    
    .reset-btn {
        background: linear-gradient(135deg, #f56565, #ed8936);
        color: white;
        border: none;
        padding: clamp(10px, 1.5vw, 12px) clamp(20px, 2.5vw, 25px);
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: auto;
    }
    
    .reset-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(237, 137, 54, 0.3);
    }
    
    /* Results Count */
    .results-count {
        text-align: right;
        padding: clamp(15px, 2vw, 20px) 0;
    }
    
    .results-count h5 {
        font-size: clamp(1.2rem, 2vw, 1.5rem);
        color: #1e293b;
        margin-bottom: 5px;
    }
    
    .results-count .text-primary {
        background: linear-gradient(135deg, #0D4293, #1a56db);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    /* Partner Cards Grid */
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(min(100%, 300px), 1fr));
        gap: clamp(20px, 3vw, 30px);
        margin-bottom: clamp(40px, 6vw, 60px);
    }
    
    .partner-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        opacity: 0;
        transform: translateY(30px) scale(0.95);
        position: relative;
    }
    
    .partner-card.animated {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    .partner-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #0D4293, #1a56db);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.6s ease-out;
    }
    
    .partner-card.animated::before {
        transform: scaleX(1);
    }
    
    .partner-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .partner-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        box-shadow: 0 4px 15px rgba(13, 66, 147, 0.3);
    }
    
    .partner-image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
    }
    
    .partner-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease-out;
    }
    
    .partner-card:hover .partner-image {
        transform: scale(1.08);
    }
    
    .logo-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    }
    
    .logo-placeholder i {
        font-size: 3rem;
        color: #94a3b8;
        opacity: 0.5;
    }
    
    .partner-content {
        padding: clamp(20px, 3vw, 30px);
    }
    
    .partner-category {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(13, 66, 147, 0.08);
        color: #0D4293;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }
    
    .partner-card:hover .partner-category {
        background: rgba(13, 66, 147, 0.12);
        transform: translateX(5px);
    }
    
    .partner-content h5 {
        font-size: clamp(1.1rem, 1.8vw, 1.3rem);
        color: #1e293b;
        margin-bottom: clamp(10px, 1.5vw, 15px);
        line-height: 1.4;
        transition: all 0.4s ease;
    }
    
    .partner-card:hover .partner-content h5 {
        color: #0D4293;
    }
    
    .partner-content p {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: clamp(15px, 2vw, 20px);
        font-size: 0.9rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .partner-meta {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: clamp(15px, 2vw, 20px);
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #64748b;
        font-size: 0.85rem;
    }
    
    .meta-item i {
        color: #0D4293;
        width: 16px;
    }
    
    .partner-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .preview-btn {
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .preview-btn:hover {
        transform: translateX(5px);
        box-shadow: 0 6px 20px rgba(13, 66, 147, 0.3);
    }
    
    .website-btn {
        background: transparent;
        border: 2px solid #e2e8f0;
        color: #64748b;
        padding: 6px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
    }
    
    .website-btn:hover {
        background: #0D4293;
        border-color: #0D4293;
        color: white;
        transform: rotate(15deg);
    }
    
    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: clamp(8px, 1.5vw, 12px);
        margin: clamp(40px, 6vw, 80px) 0;
        animation: fadeIn 0.8s ease-out 1s both;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    .page-btn, .next-btn {
        width: clamp(40px, 5vw, 50px);
        height: clamp(40px, 5vw, 50px);
        border-radius: 50%;
        border: 2px solid #e2e8f0;
        background: white;
        color: #64748b;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .page-btn::before, .next-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #0D4293, #1a56db);
        border-radius: 50%;
        transform: scale(0);
        transition: transform 0.4s ease-out;
        z-index: 1;
    }
    
    .page-btn span, .next-btn span {
        position: relative;
        z-index: 2;
    }
    
    .page-btn:hover, .next-btn:hover {
        border-color: #0D4293;
        color: white;
        transform: translateY(-3px);
    }
    
    .page-btn:hover::before, .next-btn:hover::before {
        transform: scale(1);
    }
    
    .page-btn.active {
        border-color: #0D4293;
        color: white;
    }
    
    .page-btn.active::before {
        transform: scale(1);
    }
    
    /* No Results */
    .no-results {
        grid-column: 1 / -1;
        text-align: center;
        padding: clamp(60px, 8vw, 100px) 20px;
    }
    
    .no-results i {
        font-size: 4rem;
        color: #e2e8f0;
        margin-bottom: 20px;
    }
    
    .no-results h4 {
        color: #64748b;
        margin-bottom: 10px;
        font-weight: 500;
    }
    
    .no-results p {
        color: #94a3b8;
        margin-bottom: 30px;
    }
    
    /* Modal */
    .modal-content {
        border-radius: 20px;
        overflow: hidden;
        border: none;
    }
    
    .modal-header {
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border: none;
        padding: 20px 30px;
    }
    
    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }
    
    /* Responsive Design */
    @media (max-width: 1100px) {
        .container00 {
            flex-direction: column;
        }
        
        .carousel_title h1 {
            font-size: clamp(2rem, 4vw, 3rem);
        }
    }
    
    @media (max-width: 768px) {
        .gallery-header {
            height: 50vh;
            min-height: 300px;
        }
        
        .carousel_title {
            padding: 1.5rem;
        }
        
        .filter-group {
            flex-direction: column;
        }
        
        .reset-btn {
            margin-left: 0;
            width: 100%;
            justify-content: center;
        }
        
        .results-count {
            text-align: center;
            padding-top: 0;
        }
        
        .partner-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }
    
    @media (max-width: 480px) {
        .gallery-header {
            height: 40vh;
        }
        
        .partner-image-container {
            height: 180px;
        }
        
        .partner-content {
            padding: 15px;
        }
        
        .preview-btn {
            padding: 6px 15px;
            font-size: 0.8rem;
        }
    }
</style>

<section class="gallery-header animated-section">
    <div class="carousel-overlay">
        <div class="carousel_title">
            <h1>NOS PARTENAIRES</h1>
            <p class="subtitle">DES ORGANISATIONS QUI SOUTIENNENT NOS ENTREPRISES INNOVANTES</p>
        </div>
    </div>
    <div class="header-image">
        <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Partenaires">
    </div>
</section>

<div class="container00">
    <div class="main-content">
        <!-- Search and Filters -->
        <div class="search-filter-card">
            <div class="filter-group">
                <!-- Type Filter -->
                <div class="filter-dropdown">
                    <button class="btn">
                        <i class="fas fa-filter"></i>
                        <span>Type de partenaire</span>
                    </button>
                    <div class="filter-menu">
                        <div class="filter-option">
                            <input type="radio" name="type_filter" id="type-all" value="all" checked class="filter-check">
                            <label for="type-all" class="filter-label">Tous les types</label>
                        </div>
                        <hr>
                        <div class="filter-option">
                            <input type="radio" name="type_filter" id="type-academique" value="academique" class="filter-check">
                            <label for="type-academique" class="filter-label">
                                <i class="fas fa-graduation-cap text-info me-2"></i>Académiques
                            </label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" name="type_filter" id="type-financier" value="financier" class="filter-check">
                            <label for="type-financier" class="filter-label">
                                <i class="fas fa-money-bill-wave text-success me-2"></i>Financiers
                            </label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" name="type_filter" id="type-technique" value="technique" class="filter-check">
                            <label for="type-technique" class="filter-label">
                                <i class="fas fa-cogs text-warning me-2"></i>Techniques
                            </label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" name="type_filter" id="type-commercial" value="commercial" class="filter-check">
                            <label for="type-commercial" class="filter-label">
                                <i class="fas fa-store text-primary me-2"></i>Commerciaux
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Entreprise Filter -->
                <div class="filter-dropdown">
                    <button class="btn">
                        <i class="fas fa-building"></i>
                        <span>Entreprise</span>
                    </button>
                    <div class="filter-menu" style="max-height: 300px; overflow-y: auto;">
                        <div class="filter-option">
                            <input type="radio" name="entreprise_filter" id="entreprise-all" value="" checked class="filter-check">
                            <label for="entreprise-all" class="filter-label">Toutes les entreprises</label>
                        </div>
                        <hr>
                        @foreach($entreprises as $id => $name)
                        <div class="filter-option">
                            <input type="radio" name="entreprise_filter" id="entreprise-{{ $id }}" value="{{ $id }}" class="filter-check">
                            <label for="entreprise-{{ $id }}" class="filter-label">{{ Str::limit($name, 30) }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                @if(request()->anyFilled(['type', 'entreprise_id']))
                <button class="reset-btn" onclick="resetAllFilters()">
                    <i class="fas fa-times"></i>
                    <span>Effacer les filtres</span>
                </button>
                @endif
            </div>
            
            <!-- Results Count -->
            <div class="results-count">
                <h5>
                    <span class="text-primary">{{ $partenaires->total() }}</span> 
                    partenaire{{ $partenaires->total() > 1 ? 's' : '' }}
                </h5>
                <p style="color: #64748b; font-size: 0.9rem;">
                    @if(request('type'))
                    <span style="background: #0ea5e9; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem; margin-right: 5px;">
                        {{ ucfirst(request('type')) }}
                    </span>
                    @endif
                    @if(request('entreprise_id') && isset($entreprises[request('entreprise_id')]))
                    <span style="background: #0D4293; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem;">
                        {{ $entreprises[request('entreprise_id')] }}
                    </span>
                    @endif
                </p>
            </div>
        </div>
        
        <!-- Partners Grid -->
        <div class="partners-grid" id="partenairesGrid">
            @forelse ($partenaires as $index => $partenaire)
            <div class="partner-card animate-on-scroll" data-delay="{{ $index * 100 }}">
                <!-- Badge type partenaire -->
                @php
                    $type = $partenaire->meta_data['type'] ?? '';
                    $typeConfig = [
                        'academique' => ['color' => '#0ea5e9', 'icon' => 'fa-graduation-cap', 'label' => 'Académique'],
                        'financier' => ['color' => '#10b981', 'icon' => 'fa-money-bill-wave', 'label' => 'Financier'],
                        'technique' => ['color' => '#f59e0b', 'icon' => 'fa-cogs', 'label' => 'Technique'],
                        'commercial' => ['color' => '#0D4293', 'icon' => 'fa-store', 'label' => 'Commercial']
                    ];
                    $config = $typeConfig[$type] ?? ['color' => '#64748b', 'icon' => 'fa-handshake', 'label' => 'Partenaire'];
                @endphp
                <div class="partner-badge" style="background: {{ $config['color'] }}">
                    <i class="fas {{ $config['icon'] }}"></i>
                    {{ $config['label'] }}
                </div>
                
                <!-- Logo -->
                <div class="partner-image-container">
                    @if(isset($partenaire->meta_data['logo']))
                        <img src="{{ asset('storage/' . $partenaire->meta_data['logo']) }}" 
                             class="partner-image" 
                             alt="{{ $partenaire->name }}"
                             loading="lazy">
                    @else
                        <div class="logo-placeholder">
                            <i class="fas fa-handshake"></i>
                        </div>
                    @endif
                </div>
                
                <div class="partner-content">
                    <!-- Entreprise -->
                    @if($partenaire->parent1)
                    <div class="partner-category">
                        <i class="fas fa-building"></i>
                        {{ $partenaire->parent1->name }}
                    </div>
                    @endif
                    
                    <!-- Nom -->
                    <h5>{{ $partenaire->name }}</h5>
                    
                    <!-- Description -->
                    <p>{{ $partenaire->description ?? 'Aucune description disponible.' }}</p>
                    
                    <!-- Informations clés -->
                    <div class="partner-meta">
                        @if(isset($partenaire->meta_data['contact']))
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>{{ Str::limit($partenaire->meta_data['contact'], 30) }}</span>
                        </div>
                        @endif
                        
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Partenaire depuis {{ $partenaire->created_at->format('m/Y') }}</span>
                        </div>
                    </div>
                    
                    <!-- Boutons d'action -->
                    <div class="partner-actions">
                        <button class="preview-btn" onclick="loadPartenaireModal({{ $partenaire->id }})">
                            <i class="fas fa-eye"></i>
                            <span>Aperçu rapide</span>
                        </button>
                        
                        @if(isset($partenaire->meta_data['website']))
                        <a href="{{ $partenaire->meta_data['website'] }}" 
                           target="_blank" 
                           class="website-btn"
                           title="Site web">
                            <i class="fas fa-globe"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <!-- Aucun résultat -->
            <div class="no-results">
                <i class="fas fa-handshake"></i>
                <h4>Aucun partenaire trouvé</h4>
                <p>Essayez avec d'autres critères de recherche ou modifiez vos filtres.</p>
                <button class="preview-btn" onclick="resetAllFilters()">
                    <i class="fas fa-redo"></i>
                    <span>Réinitialiser les filtres</span>
                </button>
            </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($partenaires->hasPages())
        <div class="pagination">
            <!-- Premier -->
            @if(!$partenaires->onFirstPage())
            <button class="page-btn" onclick="window.location.href='{{ $partenaires->url(1) }}'">
                <i class="fas fa-angle-double-left"></i>
            </button>
            @endif
            
            <!-- Précédent -->
            @if(!$partenaires->onFirstPage())
            <button class="page-btn" onclick="window.location.href='{{ $partenaires->previousPageUrl() }}'">
                <i class="fas fa-angle-left"></i>
            </button>
            @endif
            
            <!-- Pages -->
            @php
                $current = $partenaires->currentPage();
                $last = $partenaires->lastPage();
                $start = max($current - 2, 1);
                $end = min($current + 2, $last);
            @endphp
            
            @for($i = $start; $i <= $end; $i++)
                <button class="page-btn {{ $i == $current ? 'active' : '' }}" 
                        onclick="window.location.href='{{ $partenaires->url($i) }}'">
                    <span>{{ $i }}</span>
                </button>
            @endfor
            
            <!-- Suivant -->
            @if($partenaires->hasMorePages())
            <button class="page-btn" onclick="window.location.href='{{ $partenaires->nextPageUrl() }}'">
                <i class="fas fa-angle-right"></i>
            </button>
            @endif
            
            <!-- Dernier -->
            @if($partenaires->hasMorePages())
            <button class="page-btn" onclick="window.location.href='{{ $partenaires->url($last) }}'">
                <i class="fas fa-angle-double-right"></i>
            </button>
            @endif
        </div>
        
        <div style="text-align: center; color: #64748b; font-size: 0.9rem; margin-top: -20px;">
            Page {{ $partenaires->currentPage() }} sur {{ $partenaires->lastPage() }} • 
            {{ $partenaires->total() }} partenaire{{ $partenaires->total() > 1 ? 's' : '' }}
        </div>
        @endif
    </div>
</div>

<!-- Modal d'aperçu rapide -->
<div class="modal fade" id="partenaireModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-handshake me-2"></i>
                    <span id="modalTitle">Détails du partenaire</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
    // Animation au scroll pour les cartes de partenaires
    const partnerCards = document.querySelectorAll('.partner-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.getAttribute('data-delay') || 0;
                setTimeout(() => {
                    entry.target.classList.add('animated');
                }, parseInt(delay));
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    partnerCards.forEach(card => observer.observe(card));
    
    // Animation initiale pour les cartes déjà visibles
    partnerCards.forEach(card => {
        const rect = card.getBoundingClientRect();
        if (rect.top < window.innerHeight * 0.8) {
            const delay = card.getAttribute('data-delay') || 0;
            setTimeout(() => {
                card.classList.add('animated');
            }, parseInt(delay));
        }
    });
    
    // Gestion des filtres
    const filterInputs = document.querySelectorAll('.filter-check');
    filterInputs.forEach(input => {
        input.addEventListener('change', function() {
            const filterName = this.name === 'type_filter' ? 'type' : 'entreprise_id';
            const filterValue = this.value === 'all' || this.value === '' ? '' : this.value;
            applyFilter(filterName, filterValue);
        });
    });
    
    // Click sur les cartes pour ouvrir le modal
    document.querySelectorAll('.partner-card').forEach(card => {
        const previewBtn = card.querySelector('.preview-btn');
        const websiteBtn = card.querySelector('.website-btn');
        
        card.addEventListener('click', function(e) {
            // Ne pas déclencher si on clique sur les boutons d'action
            if (!e.target.closest('.preview-btn') && !e.target.closest('.website-btn')) {
                previewBtn.click();
            }
        });
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
            
            const modalElement = document.getElementById('partenaireModal');
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    } catch (error) {
        console.error('Erreur:', error);
        // Redirection vers la page de détails
        window.location.href = `/partenaire/${id}`;
    }
}
</script>
@endsection