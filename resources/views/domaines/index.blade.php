@extends('layouts.app')

@section('title', 'Domaines - Module EAE')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        --danger-gradient: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --hover-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        --transition-smooth: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
    }

    .page-header {
        background: var(--primary-gradient);
        padding: 3rem 0;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        animation: slideDown 0.8s ease-out;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .page-header-content {
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .page-title {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        background: linear-gradient(45deg, #fff, #e0e7ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 2rem;
        background: white;
        color: #667eea;
        border: 2px solid white;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition-smooth);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        animation: pulse 2s infinite;
    }

    .btn-add:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        background: rgba(255, 255, 255, 0.95);
    }

    .btn-add i {
        transition: transform 0.3s ease;
    }

    .btn-add:hover i {
        transform: rotate(90deg);
    }

    .success-message {
        background: linear-gradient(145deg, #d1fae5, #a7f3d0);
        border: 1px solid #10b981;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        animation: slideInRight 0.5s ease-out;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
    }

    .success-message i {
        color: #10b981;
        font-size: 1.25rem;
    }

    .empty-state {
        background: linear-gradient(145deg, #f8fafc, #edf2f7);
        border-radius: 20px;
        padding: 4rem 2rem;
        text-align: center;
        animation: fadeIn 0.8s ease-out;
        border: 2px dashed #cbd5e0;
    }

    .empty-state-icon {
        font-size: 4rem;
        background: linear-gradient(45deg, #cbd5e0, #a0aec0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        display: inline-block;
    }

    .empty-state-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }

    .empty-state-text {
        color: #718096;
        margin-bottom: 1.5rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .domaines-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .domaine-card {
        background: white;
        border-radius: 20px;
        padding: 1.75rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
    }

    .domaine-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .domaine-card:hover::before {
        transform: scaleX(1);
    }

    .domaine-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--hover-shadow);
    }

    .domaine-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .domaine-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        flex-shrink: 0;
        margin-right: 1rem;
        transition: var(--transition-smooth);
    }

    .domaine-card:hover .domaine-icon {
        transform: scale(1.1) rotate(10deg);
    }

    .domaine-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .domaine-description {
        color: #718096;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .domaine-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #e2e8f0;
    }

    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(145deg, #ebf8ff, #bee3f8);
        color: #2b6cb0;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition-smooth);
        cursor: pointer;
    }

    .btn-edit:hover {
        background: linear-gradient(145deg, #bee3f8, #90cdf4);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(43, 108, 176, 0.15);
    }

    .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(145deg, #fed7d7, #feb2b2);
        color: #c53030;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: var(--transition-smooth);
        cursor: pointer;
    }

    .btn-delete:hover {
        background: linear-gradient(145deg, #feb2b2, #fc8181);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(197, 48, 48, 0.15);
    }

    .stats-bar {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 2rem;
        animation: fadeIn 0.8s ease-out 0.4s both;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: var(--transition-smooth);
    }

    .stat-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .stat-count {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(45deg, #2d3748, #4a5568);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        color: #718096;
        font-weight: 500;
    }

    /* Animations */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        50% {
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.3);
        }
        100% {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .domaines-grid {
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 2rem 0;
        }
        
        .domaines-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-bar {
            flex-direction: column;
            align-items: stretch;
        }
        
        .stat-item {
            width: 100%;
        }
        
        .page-header-content {
            flex-direction: column;
            text-align: center;
            gap: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .domaine-card {
            padding: 1.5rem;
        }
        
        .btn-add {
            width: 100%;
            justify-content: center;
        }
        
        .domaine-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .btn-edit, .btn-delete {
            width: 100%;
            justify-content: center;
        }
    }

    /* Loading state */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }

    /* Floating action button for mobile */
    .fab-mobile {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 60px;
        height: 60px;
        background: var(--primary-gradient);
        color: white;
        border-radius: 50%;
        display: none;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        z-index: 100;
        transition: var(--transition-smooth);
        text-decoration: none;
        font-size: 1.5rem;
    }

    .fab-mobile:hover {
        transform: scale(1.1) rotate(90deg);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.6);
    }

    @media (max-width: 768px) {
        .fab-mobile {
            display: flex;
        }
        
        .btn-add.desktop {
            display: none;
        }
    }
</style>

<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="page-header-content flex flex-col sm:flex-row items-start sm:items-center justify-between">
            <div class="mb-6 sm:mb-0">
                <h1 class="page-title">Domaines du Module EAE</h1>
                <p class="text-blue-100 text-lg opacity-90">Gérez et organisez vos domaines d'activité</p>
            </div>
            <a href="{{ route('domaines.create') }}" class="btn-add desktop">
                <i class="fas fa-plus"></i>
                Ajouter un domaine
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Message de succès --}}
    @if (session('success'))
        <div class="success-message">
            <i class="fas fa-check-circle"></i>
            <div>
                <strong class="font-semibold">Succès !</strong>
                <p class="mt-1">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- Barre de statistiques --}}
    <div class="stats-bar">
        <div class="stat-item">
            <div class="stat-icon" style="background: var(--primary-gradient);">
                <i class="fas fa-layer-group"></i>
            </div>
            <div>
                <div class="stat-count">{{ $domaines->count() }}</div>
                <div class="stat-label">Domaines</div>
            </div>
        </div>
        
        <div class="stat-item">
            <div class="stat-icon" style="background: var(--success-gradient);">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <div class="stat-count">{{ $domaines->count() }}</div>
                <div class="stat-label">Actifs</div>
            </div>
        </div>
        
        <div class="stat-item">
            <div class="stat-icon" style="background: var(--warning-gradient);">
                <i class="fas fa-clock"></i>
            </div>
            <div>
                <div class="stat-count">0</div>
                <div class="stat-label">En attente</div>
            </div>
        </div>
    </div>

    {{-- Bouton d'ajout mobile --}}
    <a href="{{ route('domaines.create') }}" class="fab-mobile">
        <i class="fas fa-plus"></i>
    </a>

    @if ($domaines->count() == 0)
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <h3 class="empty-state-title">Aucun domaine enregistré</h3>
            <p class="empty-state-text">
                Commencez par ajouter vos premiers domaines d'activité pour organiser votre module EAE.
            </p>
            <a href="{{ route('domaines.create') }}" class="btn-add">
                <i class="fas fa-plus"></i>
                Ajouter votre premier domaine
            </a>
        </div>
    @else
        <div class="domaines-grid">
            @foreach ($domaines as $index => $domaine)
                <div class="domaine-card" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="domaine-header">
                        <div class="flex items-start flex-1">
                            <div class="domaine-icon">
                                @php
                                    $icons = ['fa-microchip', 'fa-code', 'fa-robot', 'fa-network-wired', 'fa-database', 'fa-cloud'];
                                    $iconIndex = $index % count($icons);
                                @endphp
                                <i class="fas {{ $icons[$iconIndex] }}"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="domaine-title">{{ $domaine->nom }}</h3>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">
                                        <i class="fas fa-hashtag mr-1"></i> ID: {{ $domaine->id }}
                                    </span>
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                                        <i class="fas fa-check mr-1"></i> Actif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p class="domaine-description">
                        {{ $domaine->description ? Str::limit($domaine->description, 150) : 'Aucune description fournie.' }}
                    </p>
                    
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>Créé le {{ $domaine->created_at->format('d/m/Y') }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-clock mr-2"></i>
                        <span>Mis à jour {{ $domaine->updated_at->diffForHumans() }}</span>
                    </div>
                    
                    <div class="domaine-actions">
                        <a href="{{ route('domaines.edit', $domaine->id) }}" class="btn-edit" 
                           data-tooltip="Modifier ce domaine">
                            <i class="fas fa-edit"></i>
                            Modifier
                        </a>
                        
                        <form action="{{ route('domaines.destroy', $domaine->id) }}" method="POST" 
                              class="delete-form" data-domaine="{{ $domaine->nom }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-delete" 
                                    data-tooltip="Supprimer ce domaine">
                                <i class="fas fa-trash-alt"></i>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        
        {{-- Pagination si nécessaire --}}
        @if($domaines->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="flex space-x-2">
                    @if($domaines->onFirstPage())
                        <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                            <i class="fas fa-chevron-left mr-2"></i> Précédent
                        </span>
                    @else
                        <a href="{{ $domaines->previousPageUrl() }}" class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:shadow-md transition">
                            <i class="fas fa-chevron-left mr-2"></i> Précédent
                        </a>
                    @endif
                    
                    <span class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow">
                        Page {{ $domaines->currentPage() }} sur {{ $domaines->lastPage() }}
                    </span>
                    
                    @if($domaines->hasMorePages())
                        <a href="{{ $domaines->nextPageUrl() }}" class="px-4 py-2 bg-white text-gray-700 rounded-lg shadow hover:shadow-md transition">
                            Suivant <i class="fas fa-chevron-right ml-2"></i>
                        </a>
                    @else
                        <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                            Suivant <i class="fas fa-chevron-right ml-2"></i>
                        </span>
                    @endif
                </div>
            </div>
        @endif
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes
    const cards = document.querySelectorAll('.domaine-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Gestion de la suppression avec SweetAlert
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        const deleteBtn = form.querySelector('.btn-delete');
        const domaineName = form.getAttribute('data-domaine');
        
        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Confirmer la suppression',
                html: `Êtes-vous sûr de vouloir supprimer le domaine <strong>"${domaineName}"</strong> ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
                reverseButtons: true,
                backdrop: 'rgba(0, 0, 0, 0.4)',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Animation avant soumission
                    const card = form.closest('.domaine-card');
                    card.style.transition = 'all 0.5s ease';
                    card.style.transform = 'scale(0.9)';
                    card.style.opacity = '0';
                    
                    setTimeout(() => {
                        form.submit();
                    }, 500);
                }
            });
        });
    });
    
    // Effet de survol sur les cartes
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Animation des statistiques au scroll
    const statsItems = document.querySelectorAll('.stat-item');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease-out';
            }
        });
    }, { threshold: 0.1 });
    
    statsItems.forEach(item => observer.observe(item));
    
    // Tooltips personnalisés
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    tooltipElements.forEach(el => {
        el.addEventListener('mouseenter', function() {
            const tooltipText = this.getAttribute('data-tooltip');
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            tooltip.textContent = tooltipText;
            document.body.appendChild(tooltip);
            
            const rect = this.getBoundingClientRect();
            tooltip.style.position = 'fixed';
            tooltip.style.top = (rect.top - 40) + 'px';
            tooltip.style.left = (rect.left + rect.width / 2) + 'px';
            tooltip.style.transform = 'translateX(-50%)';
            
            this.tooltipElement = tooltip;
        });
        
        el.addEventListener('mouseleave', function() {
            if (this.tooltipElement) {
                this.tooltipElement.remove();
            }
        });
    });
    
    // Style pour les tooltips
    const style = document.createElement('style');
    style.textContent = `
        .custom-tooltip {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            white-space: nowrap;
            z-index: 1000;
            pointer-events: none;
            animation: fadeIn 0.2s ease-out;
        }
        
        .custom-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 6px solid transparent;
            border-top-color: rgba(0, 0, 0, 0.8);
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection