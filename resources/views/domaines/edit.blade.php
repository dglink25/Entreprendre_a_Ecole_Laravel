@extends('layouts.app')

@section('title', 'Modifier Domaine - Module EAE')

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
        background: var(--warning-gradient);
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
        background: var(--warning-gradient);
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

    .domaine-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .domaine-id {
        background: #e0f2fe;
        color: #0369a1;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .domaine-date {
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
        color: #f59e0b;
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
        border-color: #f59e0b;
        background: white;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
    }

    .form-input:hover:not(:focus) {
        border-color: #cbd5e0;
    }

    .form-textarea {
        min-height: 150px;
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
        background: var(--warning-gradient);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition-smooth);
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
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

    .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1.5rem;
        background: #fee2e2;
        color: #dc2626;
        border: 2px solid #fecaca;
        border-radius: 12px;
        font-weight: 600;
        transition: var(--transition-smooth);
        cursor: pointer;
        margin-left: 1rem;
    }

    .btn-delete:hover {
        background: #fecaca;
        border-color: #fca5a5;
        transform: translateY(-1px);
        color: #b91c1c;
    }

    /* Error Messages */
    .error-container {
        background: linear-gradient(145deg, #fed7d7, #feb2b2);
        border: 1px solid #fc8181;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 2rem;
        animation: slideInRight 0.5s ease-out;
    }

    .error-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .error-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #f56565;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .error-title {
        font-weight: 700;
        color: #c53030;
        font-size: 1.1rem;
    }

    .error-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .error-item {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        padding: 0.5rem 0;
        color: #742a2a;
        font-size: 0.95rem;
    }

    .error-item i {
        color: #f56565;
        margin-top: 0.25rem;
        flex-shrink: 0;
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

    .field-error {
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

    .field-error i {
        margin-right: 0.5rem;
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
        color: #f59e0b;
    }

    .preview-content {
        background: white;
        padding: 1rem;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        font-size: 0.95rem;
        line-height: 1.5;
        color: #4a5568;
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
            box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(245, 158, 11, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
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
        
        .btn-submit, .btn-cancel, .btn-delete {
            width: 100%;
            justify-content: center;
            margin-left: 0;
        }
        
        .form-header {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .form-icon {
            margin-right: 0;
        }
        
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
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
        
        .error-container {
            padding: 1rem;
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

    /* Action buttons container */
    .action-buttons {
        display: flex;
        gap: 1rem;
    }

    /* Changes Preview */
    .changes-preview {
        background: linear-gradient(145deg, #f0f9ff, #e0f2fe);
        border: 1px solid #bae6fd;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        animation: fadeIn 0.5s ease-out;
    }

    .changes-title {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #0369a1;
        margin-bottom: 1rem;
    }

    .changes-title i {
        margin-right: 0.5rem;
    }

    .changes-list {
        display: grid;
        gap: 0.75rem;
    }

    .change-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        background: white;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .change-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #f0f9ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0369a1;
        font-size: 1rem;
    }

    .change-label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.95rem;
    }

    .change-value {
        color: #64748b;
        font-size: 0.9rem;
        margin-left: auto;
    }

    /* Delete Form Style */
    .delete-form {
        display: inline;
    }
</style>

<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="page-header-content">
            <h1 class="page-title">Modifier le domaine</h1>
            <p class="text-blue-100 text-lg opacity-90">Mettez à jour les informations de ce domaine d'activité</p>
        </div>
    </div>
</div>

<div class="form-container">
    {{-- Messages d'erreur généraux --}}
    @if ($errors->any())
        <div class="error-container">
            <div class="error-header">
                <div class="error-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div>
                    <div class="error-title">Des erreurs ont été détectées</div>
                    <p class="text-red-700 text-sm">Veuillez corriger les erreurs ci-dessous avant de continuer.</p>
                </div>
            </div>
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li class="error-item">
                        <i class="fas fa-times-circle"></i>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

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

    {{-- Prévisualisation des changements --}}
    <div class="changes-preview">
        <div class="changes-title">
            <i class="fas fa-history"></i>
            Informations du domaine
        </div>
        <div class="changes-list">
            <div class="change-item">
                <div class="change-icon">
                    <i class="fas fa-hashtag"></i>
                </div>
                <div>
                    <div class="change-label">ID du domaine</div>
                    <div class="text-sm text-gray-500">Identifiant unique</div>
                </div>
                <div class="change-value">{{ $domaine->id }}</div>
            </div>
            <div class="change-item">
                <div class="change-icon">
                    <i class="fas fa-calendar-plus"></i>
                </div>
                <div>
                    <div class="change-label">Date de création</div>
                    <div class="text-sm text-gray-500">Première version</div>
                </div>
                <div class="change-value">{{ $domaine->created_at->format('d/m/Y H:i') }}</div>
            </div>
            <div class="change-item">
                <div class="change-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <div class="change-label">Dernière modification</div>
                    <div class="text-sm text-gray-500">Mise à jour précédente</div>
                </div>
                <div class="change-value">{{ $domaine->updated_at->diffForHumans() }}</div>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-header">
            <div class="form-icon">
                <i class="fas fa-edit"></i>
            </div>
            <div class="flex-1">
                <h2 class="form-title">{{ $domaine->nom }}</h2>
                <div class="domaine-info">
                    <span class="domaine-id">ID: {{ $domaine->id }}</span>
                    <span class="domaine-date">• Modifié {{ $domaine->updated_at->diffForHumans() }}</span>
                </div>
                <p class="form-subtitle">Modifiez les informations ci-dessous pour mettre à jour ce domaine d'activité</p>
            </div>
        </div>

        {{-- FORMULAIRE DE MISE À JOUR --}}
        <form action="{{ route('domaines.update', $domaine->id) }}" method="POST" id="updateForm">
            @csrf
            @method('PUT')

            {{-- Nom du domaine --}}
            <div class="form-group @error('nom') has-error @enderror">
                <label for="nom" class="form-label">
                    <i class="fas fa-tag"></i>
                    Nom du domaine <span>*</span>
                </label>
                <input type="text" 
                       name="nom" 
                       id="nom" 
                       value="{{ old('nom', $domaine->nom) }}"
                       class="form-input"
                       placeholder="Ex: Intelligence Artificielle, Développement Web, Cybersécurité..."
                       maxlength="255"
                       required
                       autofocus>
                <div class="counter">
                    <span id="nomCounter">0</span>/255 caractères
                </div>
                @error('nom')
                    <div class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group @error('description') has-error @enderror">
                <label for="description" class="form-label">
                    <i class="fas fa-align-left"></i>
                    Description
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="5"
                          class="form-input form-textarea"
                          placeholder="Décrivez ce domaine d'activité en détail..."
                          maxlength="1000">{{ old('description', $domaine->description) }}</textarea>
                <div class="counter">
                    <span id="descCounter">0</span>/1000 caractères
                </div>
                @error('description')
                    <div class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                
                {{-- Prévisualisation des modifications --}}
                <div class="preview-section">
                    <div class="preview-title">
                        <i class="fas fa-eye"></i>
                        Prévisualisation des modifications
                    </div>
                    <div id="descriptionPreview" class="preview-content">
                        {{ old('description', $domaine->description) ?: 'Aucune description actuelle.' }}
                    </div>
                </div>
            </div>

            {{-- Actions du formulaire --}}
            <div class="form-actions">
                <div class="action-buttons">
                    <a href="{{ route('domaines.index') }}" class="btn-cancel">
                        <i class="fas fa-arrow-left"></i>
                        Annuler
                    </a>
                    
                    {{-- FORMULAIRE DE SUPPRESSION SÉPARÉ --}}
                    <form action="{{ route('domaines.destroy', $domaine->id) }}" method="POST" 
                          class="delete-form" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-delete" id="deleteBtn">
                            <i class="fas fa-trash-alt"></i>
                            Supprimer
                        </button>
                    </form>
                </div>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>

    {{-- Information complémentaire --}}
    <div class="mt-6 p-6 bg-gradient-to-r from-amber-50 to-orange-50 rounded-xl border border-amber-100">
        <div class="flex items-start">
            <div class="p-3 bg-amber-100 rounded-lg mr-4">
                <i class="fas fa-exclamation-circle text-amber-600 text-xl"></i>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 mb-2">Modification en cours</h4>
                <p class="text-gray-600 mb-3">
                    Toutes les modifications apportées à ce domaine seront immédiatement visibles dans l'ensemble du module EAE.
                    Vérifiez attentivement les informations avant de sauvegarder.
                </p>
                <div class="flex items-center text-sm text-amber-700">
                    <i class="fas fa-shield-alt mr-2"></i>
                    <span>Les champs marqués d'un astérisque (*) sont obligatoires.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Éléments DOM
    const nomInput = document.getElementById('nom');
    const descInput = document.getElementById('description');
    const nomCounter = document.getElementById('nomCounter');
    const descCounter = document.getElementById('descCounter');
    const updateForm = document.getElementById('updateForm');
    const deleteBtn = document.getElementById('deleteBtn');
    const deleteForm = document.getElementById('deleteForm');
    const descPreview = document.getElementById('descriptionPreview');
    
    // Valeurs initiales pour détecter les changements
    const initialValues = {
        nom: nomInput.value,
        description: descInput.value
    };
    
    // Initialiser les compteurs
    updateCounter(nomInput, nomCounter);
    updateCounter(descInput, descCounter);
    
    // Écouter les modifications
    nomInput.addEventListener('input', function() {
        updateCounter(this, nomCounter);
        validateInput(this);
        checkForChanges();
    });
    
    descInput.addEventListener('input', function() {
        updateCounter(this, descCounter);
        validateInput(this);
        updateDescriptionPreview(this.value);
        checkForChanges();
    });
    
    // Mettre à jour la prévisualisation de la description
    function updateDescriptionPreview(value) {
        if (value && value.trim()) {
            descPreview.textContent = value;
            descPreview.classList.remove('text-gray-400');
        } else {
            descPreview.textContent = 'Aucune description actuelle.';
            descPreview.classList.add('text-gray-400');
        }
    }
    
    // Vérifier les changements
    function checkForChanges() {
        const hasChanges = nomInput.value !== initialValues.nom || 
                          descInput.value !== initialValues.description;
        
        const submitBtn = updateForm.querySelector('.btn-submit');
        if (hasChanges) {
            submitBtn.innerHTML = '<i class="fas fa-save"></i> Enregistrer les modifications';
            submitBtn.style.background = 'var(--warning-gradient)';
            submitBtn.disabled = false;
        } else {
            submitBtn.innerHTML = '<i class="fas fa-check"></i> Aucun changement';
            submitBtn.style.background = 'var(--success-gradient)';
            submitBtn.disabled = false;
        }
    }
    
    // Focus sur le premier champ avec animation
    setTimeout(() => {
        nomInput.focus();
        nomInput.classList.add('pulse');
        setTimeout(() => nomInput.classList.remove('pulse'), 1000);
    }, 500);
    
    // Mettre à jour le compteur de caractères
    function updateCounter(input, counterElement) {
        const count = input.value.length;
        const max = input.maxLength;
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
    
    // Validation du formulaire de mise à jour avant soumission
    updateForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Valider le nom
        if (!nomInput.value.trim()) {
            showValidationError(nomInput, 'Le nom du domaine est requis');
            isValid = false;
        } else if (nomInput.value.length < 3) {
            showValidationError(nomInput, 'Le nom doit contenir au moins 3 caractères');
            isValid = false;
        }
        
        // Valider la description (optionnelle mais avec minimum si remplie)
        if (descInput.value.trim() && descInput.value.length < 10) {
            showValidationError(descInput, 'La description doit contenir au moins 10 caractères si elle est renseignée');
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
            const submitBtn = updateForm.querySelector('.btn-submit');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mise à jour en cours...';
            submitBtn.disabled = true;
        }
    });
    
    // Gestion de la suppression
    deleteBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Confirmer la suppression',
            html: `Êtes-vous sûr de vouloir supprimer définitivement le domaine <strong>"{{ $domaine->nom }}"</strong> ?<br><br>
                   <span class="text-red-600 font-semibold">Cette action est irréversible !</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
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
                const formCard = document.querySelector('.form-card');
                formCard.style.transition = 'all 0.5s ease';
                formCard.style.transform = 'scale(0.9)';
                formCard.style.opacity = '0';
                
                // Afficher le message de suppression
                Swal.fire({
                    title: 'Suppression en cours',
                    text: 'Suppression du domaine...',
                    icon: 'info',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Soumettre le formulaire de suppression après un délai pour l'animation
                setTimeout(() => {
                    deleteForm.submit();
                }, 800);
            }
        });
    });
    
    function showValidationError(input, message) {
        // Retirer les anciennes erreurs
        const existingError = input.parentNode.querySelector('.field-error');
        if (existingError && !existingError.dataset.serverError) {
            existingError.remove();
        }
        
        // Ajouter le message d'erreur
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
        input.parentNode.appendChild(errorDiv);
        
        input.classList.add('invalid');
        input.classList.remove('valid');
    }
    
    // Initialiser la validation
    validateInput(nomInput);
    validateInput(descInput);
    updateDescriptionPreview(descInput.value);
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
        const errorDiv = field.parentNode.querySelector('.field-error');
        if (errorDiv) {
            errorDiv.dataset.serverError = true;
        }
    });
    
    // Détecter les changements au chargement
    window.addEventListener('beforeunload', function(e) {
        if (nomInput.value !== initialValues.nom || 
            descInput.value !== initialValues.description) {
            e.preventDefault();
            e.returnValue = 'Vous avez des modifications non enregistrées. Voulez-vous vraiment quitter ?';
        }
    });
    
    // Prévenir les doubles soumissions
    let formSubmitted = false;
    updateForm.addEventListener('submit', function() {
        if (formSubmitted) {
            event.preventDefault();
            return false;
        }
        formSubmitted = true;
        return true;
    });
});
</script>
@endsection