@extends('layouts.app')

@section('title', 'Modifier Module - Module EAE')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        --danger-gradient: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        --hover-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
        font-size: clamp(1.75rem, 4vw, 2.5rem);
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        background: linear-gradient(45deg, #fff, #e0e7ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
    }

    .form-container {
        max-width: 48rem;
        margin: 0 auto;
        animation: fadeIn 0.8s ease-out 0.4s both;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: var(--card-shadow);
        position: relative;
        overflow: hidden;
    }

    .form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--primary-gradient);
    }

    .form-header {
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f4f8;
    }

    .form-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-right: 1.5rem;
        animation: pulse 2s infinite;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }

    .form-subtitle {
        color: #718096;
        font-size: 0.95rem;
    }

    .module-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .module-code {
        background: #e0f2fe;
        color: #0369a1;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .module-date {
        color: #64748b;
        font-size: 0.875rem;
    }

    .form-group {
        margin-bottom: 1.75rem;
        animation: slideInRight 0.6s ease-out;
        animation-fill-mode: both;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }

    .form-label {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        transition: color 0.3s ease;
    }

    .form-label i {
        margin-right: 0.5rem;
        color: #667eea;
        width: 20px;
        text-align: center;
    }

    .form-label span {
        color: #e53e3e;
        margin-left: 2px;
    }

    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: var(--transition-smooth);
        background: #f8fafc;
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-input:hover:not(:focus) {
        border-color: #cbd5e0;
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
        line-height: 1.5;
    }

    .counter {
        display: block;
        text-align: right;
        font-size: 0.875rem;
        color: #a0aec0;
        margin-top: 0.5rem;
    }

    .counter.warning {
        color: #ed8936;
    }

    .counter.danger {
        color: #e53e3e;
        font-weight: 600;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e2e8f0;
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 2.5rem;
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition-smooth);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .btn-submit i {
        transition: transform 0.3s ease;
    }

    .btn-submit:hover i {
        transform: rotate(15deg);
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1.5rem;
        background: #f7fafc;
        color: #4a5568;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition-smooth);
    }

    .btn-cancel:hover {
        background: #edf2f7;
        border-color: #cbd5e0;
        transform: translateY(-1px);
    }

    /* Error Messages */
    .error-message {
        display: flex;
        align-items: center;
        color: #e53e3e;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        padding: 0.5rem 0.75rem;
        background: #fed7d7;
        border-radius: 8px;
        border-left: 4px solid #e53e3e;
        animation: shake 0.5s ease-in-out;
    }

    .error-message i {
        margin-right: 0.5rem;
    }

    /* Field Error State */
    .has-error .form-label {
        color: #e53e3e;
    }

    .has-error .form-input {
        border-color: #e53e3e;
        background: #fff5f5;
    }

    .has-error .form-input:focus {
        border-color: #e53e3e;
        box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1);
    }

    /* Preview Section */
    .preview-section {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1rem;
        border: 1px dashed #cbd5e0;
        animation: fadeIn 0.5s ease-out;
    }

    .preview-title {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 1rem;
    }

    .preview-title i {
        margin-right: 0.5rem;
        color: #667eea;
    }

    .preview-content {
        background: white;
        padding: 1rem;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        font-size: 0.95rem;
        line-height: 1.5;
        color: #4a5568;
        max-height: 200px;
        overflow-y: auto;
    }

    /* Stats Preview */
    .stats-preview {
        background: linear-gradient(145deg, #f0f9ff, #e0f2fe);
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1rem;
        border: 1px solid #bae6fd;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-top: 1rem;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        background: white;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .stat-label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
    }

    .stat-value {
        color: #64748b;
        font-size: 1.1rem;
        font-weight: 700;
        margin-left: auto;
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

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 0 1rem;
        }
        
        .form-card {
            padding: 1.5rem;
            border-radius: 16px;
        }
        
        .page-header {
            padding: 2rem 0;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .btn-submit, .btn-cancel {
            width: 100%;
            justify-content: center;
        }
        
        .form-header {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .form-icon {
            margin-right: 0;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.5rem;
        }
        
        .form-card {
            padding: 1.25rem;
        }
        
        .form-input {
            padding: 0.75rem;
            font-size: 0.95rem;
        }
    }

    /* Character counter animation */
    .pulse {
        animation: pulse 0.3s ease;
    }

    /* Validation states */
    .form-input.valid {
        border-color: #48bb78;
        background: #f0fff4;
    }

    .form-input.invalid {
        border-color: #e53e3e;
        background: #fff5f5;
    }

    /* Success Message */
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

    /* Auto-generate notification */
    .auto-generate {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 8px;
        padding: 0.75rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #0369a1;
    }

    .auto-generate i {
        color: #0ea5e9;
    }
</style>

<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="page-header-content">
            <h1 class="page-title">Modifier le module</h1>
            <p class="text-blue-100 text-lg opacity-90">Mettez à jour les informations de votre module EAE</p>
        </div>
    </div>
</div>

<div class="form-container">
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

    {{-- Message d'erreur --}}
    @if (session('error'))
        <div class="error-message">
            <i class="fas fa-exclamation-circle"></i>
            <div>
                <strong class="font-semibold">Erreur !</strong>
                <p class="mt-1">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <div class="form-card">
        <div class="form-header">
            <div class="form-icon">
                <i class="fas fa-cube"></i>
            </div>
            <div class="flex-1">
                <h2 class="form-title">{{ $module->nom }}</h2>
                <div class="module-info">
                    <span class="module-code">Code: {{ $module->code }}</span>
                    <span class="module-date">• Dernière modification: {{ $module->updated_at->diffForHumans() }}</span>
                </div>
                <p class="form-subtitle">Modifiez les informations ci-dessous pour mettre à jour votre module</p>
            </div>
        </div>

        {{-- Statistiques du module --}}
        @if(isset($stats))
        <div class="stats-preview">
            <div class="preview-title">
                <i class="fas fa-chart-bar"></i>
                Statistiques actuelles
            </div>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <span class="stat-label">Domaines</span>
                    <span class="stat-value">{{ $stats['domaines'] ?? 0 }}</span>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <span class="stat-label">Projets</span>
                    <span class="stat-value">{{ $stats['projets'] ?? 0 }}</span>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <span class="stat-label">Entreprises</span>
                    <span class="stat-value">{{ $stats['entreprises'] ?? 0 }}</span>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <span class="stat-label">Partenaires</span>
                    <span class="stat-value">{{ $stats['partenaires'] ?? 0 }}</span>
                </div>
            </div>
        </div>
        @endif

        <form action="{{ route('module.update') }}" method="POST" id="moduleForm" class="mt-6">
            @csrf
            @method('PUT')

            {{-- Nom du module --}}
            <div class="form-group @error('nom') has-error @enderror">
                <label for="nom" class="form-label">
                    <i class="fas fa-tag"></i>
                    Nom du module <span>*</span>
                </label>
                <input type="text" 
                       name="nom" 
                       id="nom" 
                       value="{{ old('nom', $module->nom) }}"
                       class="form-input"
                       placeholder="Ex: Module Entrepreneuriat et Innovation..."
                       maxlength="255"
                       required
                       autofocus>
                <div class="counter">
                    <span id="nomCounter">0</span>/255 caractères
                </div>
                @error('nom')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Longue description --}}
            <div class="form-group @error('longue_description') has-error @enderror">
                <label for="longue_description" class="form-label">
                    <i class="fas fa-align-left"></i>
                    Description complète <span>*</span>
                </label>
                <textarea name="longue_description" 
                          id="longue_description" 
                          rows="5"
                          class="form-input form-textarea"
                          placeholder="Décrivez en détail le module, ses objectifs, ses activités, ses résultats attendus..."
                          maxlength="5000"
                          required>{{ old('longue_description', $module->longue_description) }}</textarea>
                <div class="counter">
                    <span id="longueDescCounter">0</span>/5000 caractères
                </div>
                @error('longue_description')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                
                {{-- Notification de génération automatique --}}
                <div class="auto-generate">
                    <i class="fas fa-robot"></i>
                    <span>La courte description sera automatiquement générée à partir des 100 premiers caractères de la description complète.</span>
                </div>
            </div>

            {{-- Courte description (lecture seule) --}}
            <div class="form-group @error('courte_description') has-error @enderror">
                <label for="courte_description" class="form-label">
                    <i class="fas fa-file-alt"></i>
                    Description courte (générée automatiquement)
                </label>
                <textarea name="courte_description" 
                          id="courte_description" 
                          rows="2"
                          class="form-input form-textarea"
                          placeholder="La courte description sera générée automatiquement..."
                          maxlength="500"
                          readonly>{{ old('courte_description', $module->courte_description) }}</textarea>
                <div class="counter">
                    <span id="courteDescCounter">0</span>/500 caractères
                </div>
                @error('courte_description')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                
                {{-- Prévisualisation --}}
                <div class="preview-section">
                    <div class="preview-title">
                        <i class="fas fa-eye"></i>
                        Prévisualisation de la description courte
                    </div>
                    <div id="shortDescPreview" class="preview-content">
                        {{ old('courte_description', $module->courte_description) ?: 'La courte description sera générée automatiquement...' }}
                    </div>
                </div>
            </div>

            {{-- Actions du formulaire --}}
            <div class="form-actions">
                <a href="{{ route('module.show') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i>
                    Annuler
                </a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    Mettre à jour le module
                </button>
            </div>
        </form>
    </div>

    {{-- Information complémentaire --}}
    <div class="mt-6 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
        <div class="flex items-start">
            <div class="p-3 bg-blue-100 rounded-lg mr-4">
                <i class="fas fa-info-circle text-blue-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 mb-2">À propos de la modification</h4>
                <p class="text-gray-600 mb-3">
                    Toutes les modifications apportées à ce module seront immédiatement visibles dans l'ensemble de la plateforme.
                    La description courte est automatiquement générée pour garantir la cohérence des informations.
                </p>
                <div class="flex items-center text-sm text-blue-700">
                    <i class="fas fa-lightbulb mr-2"></i>
                    <span>Conseil : Rédigez une description complète détaillée pour obtenir une courte description pertinente.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Éléments DOM
    const nomInput = document.getElementById('nom');
    const longueDescInput = document.getElementById('longue_description');
    const courteDescInput = document.getElementById('courte_description');
    const nomCounter = document.getElementById('nomCounter');
    const longueDescCounter = document.getElementById('longueDescCounter');
    const courteDescCounter = document.getElementById('courteDescCounter');
    const shortDescPreview = document.getElementById('shortDescPreview');
    const moduleForm = document.getElementById('moduleForm');
    
    // Valeurs initiales pour détecter les changements
    const initialValues = {
        nom: nomInput.value,
        longue_description: longueDescInput.value,
        courte_description: courteDescInput.value
    };
    
    // Initialiser les compteurs
    updateCounter(nomInput, nomCounter);
    updateCounter(longueDescInput, longueDescCounter);
    updateCounter(courteDescInput, courteDescCounter);
    updateShortDescPreview();
    
    // Écouter les modifications
    nomInput.addEventListener('input', function() {
        updateCounter(this, nomCounter);
        validateInput(this);
        checkForChanges();
    });
    
    longueDescInput.addEventListener('input', function() {
        updateCounter(this, longueDescCounter);
        validateInput(this);
        generateShortDescription(this.value);
        checkForChanges();
    });
    
    // Focus sur le premier champ avec animation
    setTimeout(() => {
        nomInput.focus();
        nomInput.classList.add('pulse');
        setTimeout(() => nomInput.classList.remove('pulse'), 1000);
    }, 500);
    
    // Générer la courte description automatiquement
    function generateShortDescription(longDesc) {
        let shortDesc = longDesc.substring(0, 100).trim();
        
        // Si la description dépasse 100 caractères, on coupe au dernier mot complet
        if (longDesc.length > 100) {
            const lastSpaceIndex = shortDesc.lastIndexOf(' ');
            if (lastSpaceIndex > 80) { // On garde au moins 80 caractères
                shortDesc = shortDesc.substring(0, lastSpaceIndex);
            }
            shortDesc += '...';
        }
        
        // Mettre à jour le champ caché et la prévisualisation
        courteDescInput.value = shortDesc;
        updateCounter(courteDescInput, courteDescCounter);
        updateShortDescPreview();
    }
    
    // Mettre à jour la prévisualisation
    function updateShortDescPreview() {
        const shortDesc = courteDescInput.value;
        if (shortDesc && shortDesc.trim()) {
            shortDescPreview.textContent = shortDesc;
            shortDescPreview.classList.remove('text-gray-400');
        } else {
            shortDescPreview.textContent = 'La courte description sera générée automatiquement...';
            shortDescPreview.classList.add('text-gray-400');
        }
    }
    
    // Vérifier les changements
    function checkForChanges() {
        const hasChanges = nomInput.value !== initialValues.nom || 
                          longueDescInput.value !== initialValues.longue_description ||
                          courteDescInput.value !== initialValues.courte_description;
        
        const submitBtn = moduleForm.querySelector('.btn-submit');
        if (hasChanges) {
            submitBtn.innerHTML = '<i class="fas fa-save"></i> Enregistrer les modifications';
            submitBtn.style.background = 'var(--primary-gradient)';
            submitBtn.disabled = false;
        } else {
            submitBtn.innerHTML = '<i class="fas fa-check"></i> Aucun changement';
            submitBtn.style.background = 'var(--success-gradient)';
            submitBtn.disabled = false;
        }
    }
    
    // Mettre à jour le compteur de caractères
    function updateCounter(input, counterElement) {
        const count = input.value.length;
        const max = input.maxLength || 5000;
        counterElement.textContent = count;
        
        // Ajouter des classes de couleur selon le pourcentage
        const percentage = (count / max) * 100;
        counterElement.classList.remove('warning', 'danger', 'pulse');
        
        if (percentage > 80) {
            counterElement.classList.add('pulse');
            setTimeout(() => counterElement.classList.remove('pulse'), 300);
        }
        
        if (percentage > 90) {
            counterElement.classList.add('danger');
        } else if (percentage > 70) {
            counterElement.classList.add('warning');
        }
    }
    
    // Validation en temps réel
    function validateInput(input) {
        const value = input.value.trim();
        input.classList.remove('valid', 'invalid');
        
        if (value.length === 0 && input.required) {
            input.classList.add('invalid');
        } else if (value.length > 0) {
            input.classList.add('valid');
        }
    }
    
    // Validation du formulaire avant soumission
    moduleForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Valider le nom
        if (!nomInput.value.trim()) {
            showValidationError(nomInput, 'Le nom du module est requis');
            isValid = false;
        } else if (nomInput.value.length < 3) {
            showValidationError(nomInput, 'Le nom doit contenir au moins 3 caractères');
            isValid = false;
        }
        
        // Valider la description longue
        if (!longueDescInput.value.trim()) {
            showValidationError(longueDescInput, 'La description complète est requise');
            isValid = false;
        } else if (longueDescInput.value.length < 50) {
            showValidationError(longueDescInput, 'La description doit contenir au moins 50 caractères');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            // Animation de shake pour les champs invalides
            const invalidInputs = document.querySelectorAll('.invalid');
            invalidInputs.forEach(input => {
                input.style.animation = 'shake 0.5s ease-in-out';
                setTimeout(() => {
                    input.style.animation = '';
                }, 500);
            });
            
            // Scroll vers le premier champ invalide
            const firstInvalid = document.querySelector('.invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        } else {
            // Animation de soumission réussie
            const submitBtn = moduleForm.querySelector('.btn-submit');
            const originalContent = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mise à jour en cours...';
            submitBtn.disabled = true;
            
            // Réactiver le bouton après 5 secondes (en cas d'erreur)
            setTimeout(() => {
                submitBtn.innerHTML = originalContent;
                submitBtn.disabled = false;
            }, 5000);
        }
    });
    
    function showValidationError(input, message) {
        // Retirer les anciennes erreurs
        const existingError = input.parentNode.querySelector('.error-message');
        if (existingError && !existingError.dataset.serverError) {
            existingError.remove();
        }
        
        // Ajouter le message d'erreur
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
        input.parentNode.appendChild(errorDiv);
        
        input.classList.add('invalid');
        input.classList.remove('valid');
    }
    
    // Initialiser la validation
    validateInput(nomInput);
    validateInput(longueDescInput);
    checkForChanges();
    
    // Animation des éléments du formulaire
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach((group, index) => {
        group.style.animationDelay = `${(index + 1) * 0.1}s`;
    });
    
    // Gestion des erreurs serveur
    const errorFields = document.querySelectorAll('.has-error .form-input');
    errorFields.forEach(field => {
        field.classList.add('invalid');
        const errorDiv = field.parentNode.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.dataset.serverError = true;
        }
    });
    
    // Prévenir les doubles soumissions
    let formSubmitted = false;
    moduleForm.addEventListener('submit', function(event) {
        if (formSubmitted) {
            event.preventDefault();
            return false;
        }
        formSubmitted = true;
        return true;
    });
    
    // Détecter les changements non sauvegardés
    window.addEventListener('beforeunload', function(e) {
        if (nomInput.value !== initialValues.nom || 
            longueDescInput.value !== initialValues.longue_description ||
            courteDescInput.value !== initialValues.courte_description) {
            e.preventDefault();
            e.returnValue = 'Vous avez des modifications non enregistrées. Voulez-vous vraiment quitter ?';
        }
    });
    
    // Générer automatiquement la courte description au chargement
    if (longueDescInput.value && !courteDescInput.value) {
        generateShortDescription(longueDescInput.value);
    }
});
</script>
@endsection