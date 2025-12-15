@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')

<section class="gallery-header position-relative">
    <!-- Texte fixe sur le carrousel -->
    <!-- Texte fixe sur le carrousel -->
    <div class="carousel-overlay">
        <div class="carousel_title">
            <h1>ANNONCES</h1>
            <p class="subtitle">NOUVELLES ET ÉVÉNEMENTS</p>
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
          <p class="event-date title" style="font-size: 17px; color:#0D4293;"><img src="icons/Vector (1).png" alt="galerie">   22 juillet 2024</p>
          <h1 class="title" style="font-size: 1.4rem;">Lancement de l'entreprise DUOS SALES</h1>
          <p>DUOS SALES est une organisation visionnaire créée pour initier les jeunes écoliers et élèves aux bases de l'électronique, ouvrant ainsi la voie à une meilleure compréhension des technologies modernes.</p>
              <button class="read-more"><a href="{{ route('annonces_plus') }}" class="lien"><strong>Lire plus </strong></a><img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+"></button>
      </div>
        <img src="{{ asset('images/DSC_0196 1.png') }}" alt="Lancement AppDev229" class="event-image">
        <div class="content" style="margin-bottom: 55px;">
            <p class="event-date title" style="font-size: 17px; color:#0D4293;"><img src="icons/Vector (1).png" alt="galerie">   17 Mars 2022</p>
            <h1 class="title" style="font-size: 1.4rem;">Renforcement du partenariat entre l’INSTI et le GEL SUD</h1>
            <p>L’INSTI et le GEL SUD ont signé un nouvel accord pour renforcer leur collaboration. Ce partenariat stratégique vise
            à offrir davantage de ressources et de formations pour soutenir les jeunes entrepreneurs.</p>
                <button class="read-more"><a href="{{ route('annonces_plus') }}" class="lien" ><strong>Lire plus </strong></a><img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+"></button>
        </div>
        <img src="{{ asset('images/DSC_0196 1.png') }}" alt="Lancement AppDev229" class="event-image">
        <div class="content">
            <p class="event-date title" style="font-size: 17px; color:#0D4293;"><img src="icons/Vector (1).png" alt="galerie">   17 Mars 2022</p>
            <h1 class="title" style="font-size: 1.4rem;">Atelier intensif de développement mobile pour les startups incubées</h1>
            <p>Un atelier intensif de développement mobile a été organisé pour les startups incubées à l’INSTI. Cette formation vise à 
                doter les étudiants de compétences avancées en programmation pour 
                concrétiser leurs projets.</p>
                <button class="read-more"><a href="{{ route('annonces_plus') }}" class="lien"><strong>Lire plus </strong></a> <img src="{{ asset('icons/weui_eyes-on-filled.png') }}" alt="lire+"></button>
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
                <h5>Catégories</h5>
                <div class="under mt-2"></div>
                <ul>
                    <li><a href="#" class="category-link">Articles</a></li>
                    <li><a href="#" class="category-link">Événements</a></li>
                    <li><a href="#" class="category-link">Communiqués</a></li>
                    <li><a href="#" class="category-link">Témoignages</a></li>
                </ul>
            </div>

            <!-- Tags -->
            <div class="tags">
                <h5>Tags</h5>
                <div class="under mt-2"></div>
                <div class="d-flex flex-wrap">
                    <button class="btn">Startups</button>
                    <button class="btn">Formation</button>
                    <button class="btn">Partenariats</button>
                    <button class="btn">Innovation</button>
                    <button class="btn">Développement</button>
                </div>
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