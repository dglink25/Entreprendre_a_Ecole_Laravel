@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')
<!-- Bannière -->
<section class="gallery-header position-relative">
    <!-- Image de fond -->
    <div class="header-image">
      <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Galeries">
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
            <input type="text" placeholder="Votre Nom" required>
            <input type="email" placeholder="Votre Email" required>
            <input type="text" placeholder="Sujet du message" required>
            <textarea placeholder="Entrez votre message" required></textarea>
            <button type="submit">Envoyez votre message</button>
          </form>
        </div>
      
        <!-- Bloc Informations (Boîte surélevée à droite) -->
        <div class="info-block elevated-box">
          <h3>Adresse :</h3>
          <p>Institut National Supérieur de Technologie Industrielle (INSTI)<br>Lokossa, Bénin</p>
      
          <h3>E-mail :</h3>
          <p>entreprendre@insti-lokossa.bj<br>contact@insti-lokossa.bj</p>
      
          <h3>Téléphone :</h3>
          <p>+229 61 43 42 13<br>+229 97 95 89 91</p>
      
          <h3>Suivez-nous</h3>
          <div class="social-icons">
            <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
            <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
  </section>
  
 
<!-- JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
</script>)

@endsection('content')