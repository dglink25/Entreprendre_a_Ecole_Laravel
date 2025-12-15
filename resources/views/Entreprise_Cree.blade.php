@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')
<!-- Bannière -->
<section class="gallery-header position-relative">
    <!-- Texte fixe sur le carrousel -->
    <!-- Texte fixe sur le carrousel -->
    <div class="carousel-overlay">
        <div class="carousel_title">
            <h1>ENTREPRISES CRÉÉES</h1>
            <p class="subtitle">DÉCOUVREZ LES ENTREPRISES INNOVANTES NÉES GRACE AU PROGRAMME ENTREPRENDRE À L’ÉCOLE</p>
        </div>
    </div>
    <div class="header-image">
        <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Galeries">
    </div>
</section>

<div class="container00">
    <div class="main-content">
      <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Lancement AppDev229" class="event-image">
      <div class="content" style="margin-bottom: 55px;">
          <p class="event-date title" style="font-size: 17px;margin-bottom: 30px; color:#0D4293;"><img src="icons/Vector (1).png" alt="galerie">   22 juillet 2024
          </p>
          <h1 class="title" style="font-size: 1.4rem;"><strong>Lancement de l'entreprise DUOS SALES</strong></h1>
          <p style="color:#0D4293;"><strong>Domaine d’Activité :</strong>Education technologique et la vulgarisation de l'électronique.</p>
          <p>DUOS SALES est une organisation visionnaire créée pour initier les jeunes écoliers et élèves aux bases de l'électronique, ouvrant ainsi la voie à une meilleure compréhension des technologies modernes.</p>
              <button class="read-more"><a href="{{ route('entreprises_lirePlus') }}" class="lien"><strong>Lire plus </strong></a><img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+"></button>
      </div>
        <img src="{{ asset('images/img_actu.png') }}" alt="Lancement AppDev229" class="event-image">
        <div class="content" style="margin-bottom: 55px;">
            <p class="event-date title" style="font-size: 17px;margin-bottom: 30px; color:#0D4293;"><img src="icons/Vector (1).png" alt="galerie">   10 septembre 2019</p>
            <h1 class="title" style="font-size: 1.4rem;"><strong>AgroGreen</strong></h1>
            <p style="color:#0D4293;"><strong>Domaine d’Activité :</strong> Agriculture durable.</p>
            <p>AgroGreen propose des solutions innovantes pour une agriculture respectueuse
                 de l’environnement, avec un focus sur les cultures 
                 locales et la gestion durable des ressources.</p>
                <button class="read-more"><a href="{{ route('entreprises_lirePlus') }}" class="lien"><strong>Lire plus </strong></a><img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+"></button>
        </div>
        <img src="{{ asset('images/img_actu.png') }}" alt="Lancement AppDev229" class="event-image">
        <div class="content">
            <p class="event-date title" style="font-size: 17px;margin-bottom: 30px; color:#0D4293;"><img src="icons/Vector (1).png" alt="galerie">   20 mars 2020</p>
            <h1 class="title" style="font-size: 1.4rem;"><strong>EduTech Solutions</strong></h1>
            <p style="color:#0D4293;"><strong>Domaine d’Activité :</strong> Éducation numérique.</p>
            <p>EduTech Solutions développe des plateformes éducatives interactives pour améliorer l’accès à la formation et à l’apprentissage numérique dans les écoles et universités.</p>
                <button class="read-more"><a href="{{ route('entreprises_lirePlus') }}" class="lien"><strong>Lire plus </strong></a><img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+"></button>
        </div>
    </div>
    

    <div class="sidebar">
        <div class="search-box">

            <input type="search" placeholder="Rechercher une actualité par mots-clés">
            <i class="fas fa-search"></i> <!-- Icône de recherche -->
        </div>

            <!-- Catégories -->
            <div class="cate_tag">
                <div class="categories mb-4">
                    <h2 style="font-size: 1.1rem;margin-top: 30px;">Domaine d’Activité</h2>
                    <div class="under mt-2"></div>
                    <ul>
                        <li><a href="#" class="category-link">Technologie</a></li>
                        <li><a href="#" class="category-link">Agriculture</a></li>
                        <li><a href="#" class="category-link">Éducation</a></li>
                        <li><a href="#" class="category-link">Transport</a></li>
                    </ul>
                </div>
            </div>
    </div>

</div>
<div class="pagination">
    <button class="page-btn active">1</button>
    <button class="page-btn">2</button>
    <button class="page-btn">3</button>
    <button class="next-btn">→</button>
</div>
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
  </script>
@endsection