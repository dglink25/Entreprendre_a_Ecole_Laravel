<footer class="footer-main">
    <style>
        /* ===== FOOTER STYLES ===== */
        .footer-main {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: var(--white);
            padding: 4rem 0 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .footer-main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent-gold), transparent);
        }
        
        .footer-main::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            z-index: 1;
        }
        
        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .footer-column {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .footer-column:nth-child(1) { animation-delay: 0.1s; }
        .footer-column:nth-child(2) { animation-delay: 0.2s; }
        .footer-column:nth-child(3) { animation-delay: 0.3s; }
        .footer-column:nth-child(4) { animation-delay: 0.4s; }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .footer-logo img {
            width: 60px;
            height: 60px;
            background: var(--white);
            padding: 0.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .footer-logo img:hover {
            transform: rotate(10deg) scale(1.1);
        }
        
        .footer-logo span {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--white);
        }
        
        .footer-text {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .footer-contact {
            margin-bottom: 2rem;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .contact-item svg {
            flex-shrink: 0;
            color: var(--accent-gold);
            margin-top: 0.2rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--secondary-blue);
            transform: translateY(100%);
            transition: transform 0.3s ease;
            border-radius: 50%;
            z-index: 1;
        }
        
        .social-link:hover::before {
            transform: translateY(0);
        }
        
        .social-link svg {
            position: relative;
            z-index: 2;
            transition: transform 0.3s ease;
        }
        
        .social-link:hover svg {
            transform: scale(1.2);
        }
        
        .social-link.facebook:hover::before { background: #1877f2; }
        .social-link.youtube:hover::before { background: #ff0000; }
        
        .footer-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            position: relative;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent-gold);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-link-item {
            margin-bottom: 0.8rem;
        }
        
        .footer-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .footer-link::before {
            content: '';
            position: absolute;
            left: -100%;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .footer-link:hover {
            color: var(--accent-gold);
            padding-left: 1rem;
        }
        
        .footer-link:hover::before {
            left: 100%;
        }
        
        .footer-link svg {
            color: var(--accent-gold);
            transition: transform 0.3s ease;
        }
        
        .footer-link:hover svg {
            transform: translateX(5px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            position: relative;
            z-index: 2;
        }
        
        .copyright {
            margin-bottom: 0.5rem;
        }
        
        .credits {
            color: rgba(255, 255, 255, 0.5);
        }
        
        /* ===== RESPONSIVE FOOTER ===== */
        @media (max-width: 1200px) {
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .footer-main {
                padding: 3rem 0 1.5rem;
            }
            
            .footer-container {
                padding: 0 1.5rem;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
            
            .footer-column {
                text-align: center;
            }
            
            .footer-logo {
                justify-content: center;
            }
            
            .footer-title::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .footer-link {
                justify-content: center;
            }
            
            .social-links {
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .footer-main {
                padding: 2rem 0 1rem;
            }
            
            .contact-item {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }
            
            .social-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        
        /* ===== ANIMATIONS ===== */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>
    
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Colonne 1: Logo et contact -->
            <div class="footer-column">
                <div class="footer-logo floating">
                    <img src="{{ asset('icons/logoINSTI 1.png') }}" alt="INSTI Logo">
                    <span>INSTI</span>
                </div>
                
                <p class="footer-text">
                    "Science et technologie au service de l'homme"
                </p>
                
                <div class="footer-contact">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        <span>Lokossa, Agnivedji</span>
                    </div>
                    
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        <span><strong>(+229) 22 41 13 66</strong></span>
                    </div>
                    
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                        <a href="mailto:instilokossa@gmail.com" class="footer-text">
                            <strong>instilokossa@gmail.com</strong>
                        </a>
                    </div>
                </div>
                
                <div class="social-links">
                    <a href="#" class="social-link facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </a>
                    
                    <a href="#" class="social-link youtube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Colonne 2: Nos ressources -->
            <div class="footer-column">
                <h3 class="footer-title">NOS RESSOURCES</h3>
                <ul class="footer-links">
                    <li class="footer-link-item">
                        <a href="#" class="footer-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            </svg>
                            <span>Incubateur de startups</span>
                        </a>
                    </li>
                    
                    <li class="footer-link-item">
                        <a href="#" class="footer-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16a6 6 0 0 0 6-6c0-3.314-3-6-6-6S2 6.686 2 10a6 6 0 0 0 6 6z"/>
                            </svg>
                            <span>Unité d'application de l'INSTI</span>
                        </a>
                    </li>
                    
                    <li class="footer-link-item">
                        <a href="#" class="footer-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                            </svg>
                            <span>Plateforme E-learning</span>
                        </a>
                    </li>
                    
                    <li class="footer-link-item">
                        <a href="#" class="footer-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            <span>Blog officiel de l'INSTI</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Colonne 3: Liens utiles -->
            <div class="footer-column">
                <h3 class="footer-title">LIENS UTILES</h3>
                <ul class="footer-links">
                    <li class="footer-link-item">
                        <a href="#" class="footer-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                            </svg>
                            <span>Ministère de l'Enseignement Supérieur</span>
                        </a>
                    </li>
                    
                    <li class="footer-link-item">
                        <a href="#" class="footer-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <span>Université Nationale UNSTIM</span>
                        </a>
                    </li>
                    
                    <li class="footer-link-item">
                        <a href="#" class="footer-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4.715 6.542L3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                            </svg>
                            <span>Institut National Supérieur</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Colonne 4: Newsletter -->
            <div class="footer-column">
                <h3 class="footer-title">NEWSLETTER</h3>
                <p class="footer-text">
                    Restez informé des dernières actualités et événements de l'INSTI.
                </p>
                
                <form class="newsletter-form">
                    <input type="email" placeholder="Votre email" required>
                    <button type="submit">S'abonner</button>
                </form>
                
                <style>
                    .newsletter-form {
                        margin-top: 1.5rem;
                    }
                    
                    .newsletter-form input {
                        width: 100%;
                        padding: 0.8rem;
                        border: none;
                        border-radius: 6px;
                        margin-bottom: 0.8rem;
                        background: rgba(255, 255, 255, 0.1);
                        color: var(--white);
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        transition: all 0.3s ease;
                    }
                    
                    .newsletter-form input:focus {
                        outline: none;
                        border-color: var(--accent-gold);
                        background: rgba(255, 255, 255, 0.15);
                    }
                    
                    .newsletter-form button {
                        width: 100%;
                        padding: 0.8rem;
                        background: var(--accent-gold);
                        color: var(--gray-800);
                        border: none;
                        border-radius: 6px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }
                    
                    .newsletter-form button:hover {
                        background: #f59e0b;
                        transform: translateY(-2px);
                    }
                </style>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="copyright">
                © INSTI, UNSTIM 2024 - Tous droits réservés
            </p>
            <p class="credits">
                Réalisé par le groupe N°6 - Département Informatique
            </p>
        </div>
    </div>
</footer>