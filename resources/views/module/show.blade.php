@extends('layouts.app')

@section('title', 'Module EaE')

@section('content')
<style>
    /* Styles personnalisés pour la page module */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #152cac 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
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

    .module-title {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        background: linear-gradient(45deg, #fff, #e0e7ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .stat-card::before {
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

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--hover-shadow);
    }

    .stat-card:nth-child(1) { background: linear-gradient(145deg, #ffffff, #f0f7ff); }
    .stat-card:nth-child(2) { background: linear-gradient(145deg, #ffffff, #f0fff4); }
    .stat-card:nth-child(3) { background: linear-gradient(145deg, #ffffff, #fffaf0); }
    .stat-card:nth-child(4) { background: linear-gradient(145deg, #ffffff, #faf5ff); }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        font-size: 1.5rem;
        color: white;
        transition: var(--transition-smooth);
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .stat-card:nth-child(1) .stat-icon { background: var(--primary-gradient); }
    .stat-card:nth-child(2) .stat-icon { background: var(--success-gradient); }
    .stat-card:nth-child(3) .stat-icon { background: var(--warning-gradient); }
    .stat-card:nth-child(4) .stat-icon { background: var(--secondary-gradient); }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(45deg, #2d3748, #4a5568);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
        margin: 0.5rem 0;
    }

    .stat-label {
        color: #718096;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .description-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--card-shadow);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.8s ease-out 0.4s both;
    }

    .description-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--primary-gradient);
        opacity: 0.05;
        border-radius: 50%;
        transform: translate(50px, -50px);
    }

    .stats-list {
        display: grid;
        gap: 1rem;
        margin-top: 2rem;
    }

    .stats-item {
        background: linear-gradient(145deg, #ffffff, #f7fafc);
        border-radius: 12px;
        padding: 1.5rem;
        border-left: 4px solid;
        transition: var(--transition-smooth);
        animation: slideInRight 0.6s ease-out;
        animation-fill-mode: both;
    }

    .stats-item:nth-child(odd) {
        border-left-color: #667eea;
        animation-delay: 0.1s;
    }

    .stats-item:nth-child(even) {
        border-left-color: #764ba2;
        animation-delay: 0.2s;
    }

    .stats-item:hover {
        transform: translateX(8px);
        box-shadow: var(--card-shadow);
    }

    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 2rem;
        background: var(--primary-gradient);
        color: white;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition-smooth);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        border: none;
        cursor: pointer;
        margin-bottom: 2rem;
        animation: fadeIn 0.8s ease-out 0.6s both;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-edit i {
        transition: transform 0.3s ease;
    }

    .btn-edit:hover i {
        transform: rotate(15deg);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        background: linear-gradient(145deg, #f7fafc, #edf2f7);
        border-radius: 16px;
        animation: fadeIn 0.8s ease-out;
    }

    .empty-state-icon {
        font-size: 4rem;
        background: linear-gradient(45deg, #cbd5e0, #a0aec0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
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
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
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
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .page-header {
            padding: 2rem 0;
        }
        
        .description-card {
            padding: 1.5rem;
        }
        
        .stat-card {
            padding: 1.25rem;
        }
        
        .stat-number {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .module-title {
            font-size: 1.75rem;
        }
        
        .btn-edit {
            width: 100%;
            justify-content: center;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 1.25rem;
        }
    }

    /* Loading animation */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    /* Badge pour les nouvelles statistiques */
    .badge-new {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: linear-gradient(45deg, #10b981, #34d399);
        color: white;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: 0.5rem;
        animation: pulse 2s infinite;
    }

    /* Tooltip style */
    [data-tooltip] {
        position: relative;
    }

    [data-tooltip]:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.875rem;
        white-space: nowrap;
        z-index: 10;
    }
</style>

<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="page-header-content">
            <h1 class="module-title mb-2">Module : {{ $module->nom }}</h1>
            <p class="text-blue-100 text-lg opacity-90">Gestion et visualisation des données du module</p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Bouton d'édition --}}
    <a href="{{ route('module.edit') }}" class="btn-edit" data-tooltip="Modifier les informations du module">
        <i class="fas fa-edit"></i>
        Modifier le module
    </a>

    {{-- Description du module --}}
    <div class="description-card">
        <div class="flex items-start mb-4">
            <div class="p-3 bg-blue-50 rounded-lg mr-4">
                <i class="fas fa-info-circle text-blue-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Description du module</h3>
                <div class="prose max-w-none">
                    <p class="text-gray-600 leading-relaxed">
                        {{ $module->longue_description ?? $module->courte_description ?? 'Aucune description disponible.' }}
                    </p>
                    @if(!$module->longue_description && !$module->courte_description)
                        <div class="mt-4 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                            <p class="text-yellow-700 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                Cette module n'a pas encore de description. Ajoutez-en une pour mieux informer les utilisateurs.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Statistiques principales --}}
    <div class="mb-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-chart-bar mr-3 text-blue-600"></i>
            Statistiques principales
            <span class="badge-new">Live</span>
        </h2>
        
        <div class="stats-grid">
            <div class="stat-card" data-tooltip="Nombre total de domaines associés">
                <div class="flex items-center">
                    <div class="stat-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="ml-4">
                        <p class="stat-label">Domaines</p>
                        <p class="stat-number">{{ $stats['domaines'] }}</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-500">Domaines d'activité couverts</p>
                </div>
            </div>

            <div class="stat-card" data-tooltip="Projets réalisés dans ce module">
                <div class="flex items-center">
                    <div class="stat-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="ml-4">
                        <p class="stat-label">Projets</p>
                        <p class="stat-number">{{ $stats['projets'] }}</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-500">Projets actifs et terminés</p>
                </div>
            </div>

            <div class="stat-card" data-tooltip="Entreprises issues du module">
                <div class="flex items-center">
                    <div class="stat-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="ml-4">
                        <p class="stat-label">Entreprises</p>
                        <p class="stat-number">{{ $stats['entreprises'] }}</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-500">Entreprises créées</p>
                </div>
            </div>

            <div class="stat-card" data-tooltip="Partenaires collaboratifs">
                <div class="flex items-center">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="ml-4">
                        <p class="stat-label">Partenaires</p>
                        <p class="stat-number">{{ $stats['partenaires'] }}</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-500">Organisations partenaires</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistiques détaillées --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-chart-line mr-3 text-purple-600"></i>
            Statistiques détaillées
        </h2>

        @if($module->statistiques->isEmpty())
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Aucune statistique enregistrée</h3>
                <p class="text-gray-500 mb-4">Commencez à ajouter des statistiques pour suivre les performances du module.</p>
                <a href="{{ route('module.edit') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-plus mr-2"></i>
                    Ajouter des statistiques
                </a>
            </div>
        @else
            <div class="stats-list">
                @foreach($module->statistiques as $index => $stat)
                    <div class="stats-item">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="flex items-center mb-2">
                                    <span class="font-semibold text-lg text-gray-800">{{ $stat->nom }}</span>
                                    @if($loop->first)
                                        <span class="ml-2 px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                                            <i class="fas fa-star mr-1"></i> Principal
                                        </span>
                                    @endif
                                </div>
                                <p class="text-gray-600 mb-3">{{ $stat->description }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <span>Dernière mise à jour : {{ now()->format('d/m/Y') }}</span>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4">
                        <i class="fas fa-lightbulb text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Conseil d'analyse</h4>
                        <p class="text-gray-600 text-sm mt-1">
                            Ces statistiques vous aident à mesurer l'impact de votre module. Suivez régulièrement ces indicateurs pour optimiser vos performances.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Actions rapides --}}
    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('domaines.index') }}" class="group p-6 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-100 hover:border-blue-300 transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg mr-4 group-hover:bg-blue-200 transition">
                    <i class="fas fa-layer-group text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 group-hover:text-blue-700 transition">Gérer les domaines</h4>
                    <p class="text-gray-600 text-sm mt-1">Accéder à la liste des domaines</p>
                </div>
            </div>
        </a>
        
        <a href="{{ route('projets.index') }}" class="group p-6 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-100 hover:border-green-300 transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg mr-4 group-hover:bg-green-200 transition">
                    <i class="fas fa-project-diagram text-green-600 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 group-hover:text-green-700 transition">Voir les projets</h4>
                    <p class="text-gray-600 text-sm mt-1">Consulter tous les projets</p>
                </div>
            </div>
        </a>
        
        <a href="{{ route('module.edit') }}" class="group p-6 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-100 hover:border-purple-300 transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg mr-4 group-hover:bg-purple-200 transition">
                    <i class="fas fa-cog text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 group-hover:text-purple-700 transition">Paramètres avancés</h4>
                    <p class="text-gray-600 text-sm mt-1">Configurer le module</p>
                </div>
            </div>
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes de statistiques
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Animation des items de statistiques
    const statItems = document.querySelectorAll('.stats-item');
    statItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Effet de hover avec feedback visuel
    const cards = document.querySelectorAll('.stat-card, .stats-item');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Animation du bouton d'édition
    const editBtn = document.querySelector('.btn-edit');
    if (editBtn) {
        editBtn.addEventListener('mouseenter', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(15deg)';
            }
        });
        
        editBtn.addEventListener('mouseleave', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    }
    
    // Simulation de chargement des données (optionnel)
    function simulateDataLoading() {
        const numbers = document.querySelectorAll('.stat-number');
        numbers.forEach(number => {
            const finalValue = parseInt(number.textContent);
            let currentValue = 0;
            const increment = finalValue / 20;
            
            const timer = setInterval(() => {
                currentValue += increment;
                if (currentValue >= finalValue) {
                    number.textContent = finalValue;
                    clearInterval(timer);
                } else {
                    number.textContent = Math.floor(currentValue);
                }
            }, 50);
        });
    }
    
    // Démarrer l'animation des nombres après un délai
    setTimeout(simulateDataLoading, 800);
    
    // Tooltips personnalisés
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    tooltipElements.forEach(el => {
        el.addEventListener('mouseenter', function() {
            this.style.position = 'relative';
        });
    });
});
</script>
@endsection