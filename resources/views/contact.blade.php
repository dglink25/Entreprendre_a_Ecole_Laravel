@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<style>
    /* Bannière */
    .gallery-header {
        position: relative;
        height: 60vh;
        min-height: 400px;
        overflow: hidden;
        margin-top: -1px;
    }
    
    .header-image {
        height: 100%;
        width: 100%;
    }
    
    .header-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6);
    }
    
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(13, 66, 147, 0.4), rgba(26, 86, 219, 0.3));
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .text-content {
        text-align: center;
        color: white;
        padding: 2rem;
        max-width: 800px;
    }
    
    .text-content .title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .text-content .event {
        font-size: clamp(1rem, 2vw, 1.3rem);
        font-weight: 300;
        letter-spacing: 1px;
        line-height: 1.6;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* Section contact */
    .contact-section {
        padding: clamp(40px, 6vw, 80px) 0;
        background: #f8f9fa;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .contact-container {
        display: flex;
        gap: clamp(30px, 4vw, 60px);
        flex-wrap: wrap;
    }
    
    /* Formulaire - MODIFIÉ pour champs plus courts */
    .contact-form {
        flex: 1;
        min-width: 300px;
        max-width: 500px; /* Limite la largeur maximale */
    }
    
    .contact-form h2 {
        color: #0D4293;
        font-size: clamp(1.5rem, 2.5vw, 2rem);
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .contact-form p {
        color: #555;
        margin-bottom: 30px;
        line-height: 1.6;
        font-size: clamp(0.95rem, 1.5vw, 1.1rem);
    }
    
    .contact-form form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    /* CHAMPS DE SAISIE RÉDUITS */
    .contact-form input,
    .contact-form textarea {
        width: 100%;
        max-width: 400px; /* Longueur réduite */
        padding: 14px 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        background: white;
        transition: all 0.3s ease;
        font-family: inherit;
    }
    
    /* PLACEHOLDERS CORRIGÉS */
    .contact-form input::placeholder,
    .contact-form textarea::placeholder {
        color: #666;
        opacity: 0.8;
    }
    
    .contact-form input:focus,
    .contact-form textarea:focus {
        border-color: #0D4293;
        box-shadow: 0 0 0 3px rgba(13, 66, 147, 0.1);
        outline: none;
    }
    
    .contact-form textarea {
        min-height: 150px;
        resize: vertical;
    }
    
    .contact-form button {
        background: linear-gradient(135deg, #0D4293, #1a56db);
        color: white;
        border: none;
        padding: 14px 35px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: fit-content;
        max-width: 400px; /* Même largeur que les champs */
        font-family: inherit;
    }
    
    .contact-form button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(13, 66, 147, 0.3);
    }
    
    /* Bloc informations */
    .info-block {
        flex: 1;
        min-width: 300px;
        max-width: 400px;
        background: white;
        padding: clamp(25px, 3vw, 35px);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border-top: 5px solid #0D4293;
    }
    
    .info-block h3 {
        color: #0D4293;
        font-size: clamp(1.1rem, 1.8vw, 1.3rem);
        font-weight: 700;
        margin: 25px 0 12px 0;
        padding-bottom: 8px;
        border-bottom: 2px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .info-block h3:first-child {
        margin-top: 0;
    }
    
    .info-block p {
        color: #555;
        line-height: 1.6;
        margin-bottom: 5px;
        font-size: clamp(0.95rem, 1.5vw, 1.05rem);
        padding-left: 30px; /* Espace pour l'icône */
        position: relative;
    }
    
    /* Icônes pour Adresse, Email, Téléphone */
    .info-item {
        position: relative;
        margin-bottom: 20px;
    }
    
    .info-item p::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 20px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    
    .address-item p::before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%230D4293'%3E%3Cpath d='M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z'/%3E%3C/svg%3E");
    }
    
    .email-item p::before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%230D4293'%3E%3Cpath d='M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z'/%3E%3C/svg%3E");
    }
    
    .phone-item p::before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%230D4293'%3E%3Cpath d='M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z'/%3E%3C/svg%3E");
    }
    
    /* Icônes Font Awesome pour les titres */
    .info-title-icon {
        font-size: 18px;
        width: 24px;
        text-align: center;
    }
    
    /* Social icons */
    .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 15px;
    }
    
    .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f8f9fa;
        border-radius: 50%;
        color: #0D4293;
        font-size: 18px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .social-link:hover {
        background: #0D4293;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(13, 66, 147, 0.2);
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .contact-container {
            flex-direction: column;
            align-items: center;
        }
        
        .contact-form,
        .info-block {
            max-width: 600px;
            width: 100%;
        }
        
        .contact-form input,
        .contact-form textarea,
        .contact-form button {
            max-width: 100%;
        }
    }
    
    @media (max-width: 768px) {
        .gallery-header {
            height: 50vh;
            min-height: 300px;
        }
        
        .text-content .title {
            font-size: clamp(2rem, 4vw, 2.5rem);
        }
        
        .text-content .event {
            font-size: clamp(0.9rem, 1.8vw, 1rem);
        }
        
        .contact-section {
            padding: 40px 0;
        }
        
        .contact-form input,
        .contact-form textarea {
            padding: 12px 16px;
        }
        
        .info-block {
            padding: 20px;
        }
        
        .info-block p {
            padding-left: 25px;
        }
    }
    
    @media (max-width: 480px) {
        .gallery-header {
            height: 40vh;
        }
        
        .text-content {
            padding: 1.5rem;
        }
        
        .contact-form button {
            padding: 12px 25px;
            width: 100%;
        }
        
        .social-icons {
            justify-content: center;
        }
        
        .info-block h3 {
            font-size: 1.1rem;
        }
        
        .info-block p {
            padding-left: 22px;
            font-size: 0.9rem;
        }
    }
</style>

<!-- Bannière -->
<section class="gallery-header position-relative">
    <!-- Image de fond -->
    <div class="header-image">
        <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Contact">
    </div>
    <!-- Texte superposé -->
    <div class="overlay">
        <div class="text-content">
            <h1 class="title">CONTACTS</h1>
            <p class="event">
                VOUS AVEZ DES QUESTIONS, DES SUGGESTIONS, OU SOUHAITEZ EN SAVOIR PLUS SUR LE PROGRAMME ENTREPRENDRE A L'ÉCOLE ?
            </p>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-container">
            <!-- Formulaire -->
            <div class="contact-form">
                <h2>Prenez contact</h2>
                <p>Vous avez une question ou vous souhaitez simplement nous dire bonjour ? Nous serions ravis de vous entendre.</p>
                <form action="#">
                    <!-- CHAMPS AVEC BONS PLACEHOLDERS -->
                    <input type="text" placeholder="Votre Nom" required>
                    <input type="email" placeholder="Votre Email" required>
                    <input type="text" placeholder="Sujet du message" required>
                    <textarea placeholder="Entrez votre message" required></textarea>
                    <button type="submit">Envoyez votre message</button>
                </form>
            </div>
            
            <!-- Bloc Informations AVEC LOGOS -->
            <div class="info-block">
                <!-- Adresse avec logo -->
                <h3>
                    <i class="fas fa-map-marker-alt info-title-icon"></i>
                    Adresse :
                </h3>
                <div class="info-item address-item">
                    <p>Institut National Supérieur de Technologie Industrielle (INSTI)<br>Lokossa, Bénin</p>
                </div>
                
                <!-- E-mail avec logo -->
                <h3>
                    <i class="fas fa-envelope info-title-icon"></i>
                    E-mail :
                </h3>
                <div class="info-item email-item">
                    <p>entreprendre@insti-lokossa.bj<br>contact@insti-lokossa.bj</p>
                </div>
                
                <!-- Téléphone avec logo -->
                <h3>
                    <i class="fas fa-phone info-title-icon"></i>
                    Téléphone :
                </h3>
                <div class="info-item phone-item">
                    <p>+229 61 43 42 13<br>+229 97 95 89 91</p>
                </div>
                
                <!-- Suivez-nous -->
                <h3>
                    <i class="fas fa-share-alt info-title-icon"></i>
                    Suivez-nous
                </h3>
                <div class="social-icons">
                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome pour les icônes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
    // Sélectionne tous les liens de navigation
    const navLinks = document.querySelectorAll('.nav-link');
    
    // Applique la classe active en fonction de l'URL actuelle
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
        
        // Gère le clic pour ajouter la classe active
        link.addEventListener('click', () => {
            navLinks.forEach(l => l.classList.remove('active')); // Supprime les classes actives
            link.classList.add('active'); // Applique la classe active au lien cliqué
        });
    });
</script>
@endsection