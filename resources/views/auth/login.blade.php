<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Insti') }} - Connexion</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #818cf8;
            --secondary: #f8fafc;
            --accent: #f59e0b;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 40px rgba(79, 70, 229, 0.1);
            --radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animations de fond */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary-light), transparent);
            animation: float 20s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -50px;
            right: -50px;
            animation-delay: -5s;
            background: linear-gradient(45deg, var(--accent), transparent);
        }

        .shape:nth-child(3) {
            width: 150px;
            height: 150px;
            top: 30%;
            right: 20%;
            animation-delay: -10s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(30px, -30px) rotate(120deg);
            }
            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }
        }

        /* Conteneur principal */
        .login-container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            animation: slideUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Section gauche avec logo */
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%234f46e5' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.1;
        }

        .logo-container {
            margin-bottom: 40px;
            z-index: 1;
            animation: fadeInScale 1s ease-out;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .logo-wrapper {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            padding: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .logo-wrapper:hover {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .logo-wrapper img {
            max-width: 100%;
            max-height: 100%;
            filter: brightness(0) invert(1);
        }

        .brand-name {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .brand-tagline {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            max-width: 300px;
            line-height: 1.5;
        }

        .features-list {
            list-style: none;
            margin-top: 40px;
            text-align: left;
            z-index: 1;
        }

        .features-list li {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            animation: slideInRight 0.6s ease-out forwards;
            opacity: 0;
        }

        .features-list li:nth-child(1) { animation-delay: 0.2s; }
        .features-list li:nth-child(2) { animation-delay: 0.3s; }
        .features-list li:nth-child(3) { animation-delay: 0.4s; }

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

        .features-list i {
            margin-right: 10px;
            color: var(--accent);
            font-size: 1.2rem;
        }

        /* Section droite avec formulaire */
        .login-right {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            margin-bottom: 40px;
        }

        .login-header h1 {
            font-size: 2.2rem;
            color: var(--text);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .login-header p {
            color: var(--text-light);
            font-size: 1rem;
        }

        /* Style personnalisé pour les composants Laravel */
        .auth-session-status {
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 12px;
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border-left: 4px solid #10b981;
            animation: slideInLeft 0.5s ease-out;
            font-size: 0.95rem;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-group {
            margin-bottom: 25px;
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }

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

        .input-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .input-container {
            position: relative;
        }

        .text-input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 1rem;
            transition: var(--transition);
            background: white;
            color: var(--text);
        }

        .text-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .text-input:hover {
            border-color: var(--primary-light);
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .text-input:focus + .input-icon {
            color: var(--primary);
        }

        .input-error {
            margin-top: 8px;
            color: #ef4444;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .input-error i {
            margin-right: 6px;
        }

        .remember-container {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-checkbox {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            border: 2px solid var(--border);
            margin-right: 10px;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remember-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            width: 10px;
            height: 10px;
            background: var(--primary);
            border-radius: 2px;
            opacity: 0;
            transition: var(--transition);
        }

        .remember-checkbox input:checked ~ .checkmark {
            opacity: 1;
        }

        .remember-label {
            color: var(--text);
            font-size: 0.95rem;
            cursor: pointer;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
            position: relative;
        }

        .forgot-password:hover {
            color: var(--primary-dark);
        }

        .forgot-password::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }

        .forgot-password:hover::after {
            width: 100%;
        }

        .primary-button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .primary-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);
        }

        .primary-button:active {
            transform: translateY(0);
        }

        .primary-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .primary-button:active::before {
            width: 300px;
            height: 300px;
        }

        .button-icon {
            margin-left: 8px;
            transition: var(--transition);
        }

        .primary-button:hover .button-icon {
            transform: translateX(4px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
            }

            .login-left, .login-right {
                padding: 40px 30px;
            }

            .logo-wrapper {
                width: 100px;
                height: 100px;
            }

            .brand-name {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .login-container {
                border-radius: 12px;
            }

            .login-left, .login-right {
                padding: 30px 20px;
            }

            .form-footer {
                flex-direction: column;
                gap: 20px;
                align-items: stretch;
            }

            .forgot-password {
                text-align: center;
                margin-bottom: 10px;
            }

            .brand-name {
                font-size: 1.8rem;
            }

            .login-header h1 {
                font-size: 1.8rem;
            }
        }

        /* Animation de chargement */
        .loading {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .loading.active {
            display: block;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Animation de fond -->
    <div class="bg-animation">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container">
        <!-- Section gauche avec logo -->
        <div class="login-left">
            <div class="logo-container">
                <div class="logo-wrapper">
                    <!-- Logo Insti - remplacer par votre fichier insti.png -->
                    <img src="{{ asset('insti.png') }}" alt="Logo Insti">
                </div>
                <h1 class="brand-name">INSTI</h1>
                <p class="brand-tagline">Plateforme de gestion professionnelle</p>
            </div>

            <ul class="features-list">
                <li><i class="fas fa-shield-alt"></i> Sécurité maximale des données</li>
                <li><i class="fas fa-bolt"></i> Interface ultra rapide</li>
                <li><i class="fas fa-headset"></i> Support 24h/24 & 7j/7</li>
            </ul>
        </div>

        <!-- Section droite avec formulaire -->
        <div class="login-right">
            <div class="login-header">
                <h1>Connexion</h1>
                <p>Accédez à votre espace personnel</p>
            </div>

            <!-- Session Status - Conservé de votre code d'origine -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label class="input-label" for="email">Adresse Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <x-text-input id="email" 
                                    class="text-input" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="votre@email.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="input-error" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="input-label" for="password">Mot de passe</label>
                    <div class="input-container">
                        <i class="fas fa-lock input-icon"></i>
                        <x-text-input id="password" 
                                    class="text-input"
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="current-password"
                                    placeholder="Votre mot de passe" />
                        <button type="button" class="password-toggle" id="passwordToggle" style="
                            position: absolute;
                            right: 18px;
                            top: 50%;
                            transform: translateY(-50%);
                            background: none;
                            border: none;
                            color: var(--text-light);
                            cursor: pointer;
                            font-size: 1.1rem;
                        ">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="input-error" />
                </div>

                <!-- Remember Me -->
                <div class="form-group">
                    <div class="remember-container">
                        <label class="remember-checkbox" for="remember_me">
                            <input id="remember_me" 
                                   type="checkbox" 
                                   name="remember">
                            <span class="checkmark"></span>
                        </label>
                        <span class="remember-label">Se souvenir de moi</span>
                    </div>
                </div>

                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif

                    <x-primary-button class="primary-button">
                        Se connecter
                        <i class="fas fa-arrow-right button-icon"></i>
                    </x-primary-button>
                </div>
            </form>

            <div class="loading" id="loading">
                <div class="spinner"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle pour afficher/masquer le mot de passe
            const passwordToggle = document.getElementById('passwordToggle');
            const passwordInput = document.getElementById('password');
            
            if (passwordToggle && passwordInput) {
                passwordToggle.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    // Changer l'icône
                    const icon = this.querySelector('i');
                    if (type === 'text') {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            }
            
            // Animation de soumission du formulaire
            const loginForm = document.getElementById('loginForm');
            const loading = document.getElementById('loading');
            const submitButton = loginForm ? loginForm.querySelector('.primary-button') : null;
            
            if (loginForm && submitButton) {
                loginForm.addEventListener('submit', function() {
                    // Afficher l'animation de chargement
                    if (loading) {
                        loading.classList.add('active');
                        submitButton.style.opacity = '0.7';
                        submitButton.disabled = true;
                    }
                });
            }
            
            // Animation pour les champs vides avec erreurs
            const errorMessages = document.querySelectorAll('.input-error');
            errorMessages.forEach(error => {
                if (error.textContent.trim() !== '') {
                    error.closest('.form-group').style.animation = 'shake 0.5s ease-in-out';
                }
            });
            
            // Effet de focus sur les champs
            const textInputs = document.querySelectorAll('.text-input');
            textInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.parentElement.querySelector('.input-label').style.color = 'var(--primary)';
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.parentElement.querySelector('.input-label').style.color = 'var(--text)';
                    }
                });
                
                // Animation pour les champs pré-remplis
                if (input.value) {
                    input.parentElement.parentElement.style.animation = 'fadeInUp 0.3s ease-out';
                }
            });
            
            // Animation au chargement de la page
            setTimeout(() => {
                document.querySelector('.login-container').style.opacity = '1';
            }, 100);
        });
    </script>
</body>
</html>