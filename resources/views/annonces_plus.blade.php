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
          <p class="event">Lancement de l'entreprise DUOS SALES</p>
      </div>
  </div>
  <div class="header-image">
      <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Galeries">
  </div>
</section>

<div class="container00">
  <div class="main-content">
      <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Lancement AppDev229" class="event-image">
      <div class="content">
          <p class="event-date title" style="font-size: 17px; color:#0D4293;"><img src="icons/Vector (1).png"
                  alt="galerie"> 22 juillet 2024</p>
          <h1 class="title" style="font-size: 1.4rem;">Lancement de l'entreprise DUOS SALES</h1>
          <p>Fondée le 22 juillet 2024, DUOS SALES est une organisation
               visionnaire créée pour initier les jeunes écoliers et élèves
                aux bases de l'électronique, ouvrant ainsi la voie à une meilleure
                 compréhension des technologies modernes.</p>

          <p>Mission : Initier les jeunes à l’utilisation basique de l’électronique, en leur donnant les outils nécessaires pour appréhender ce domaine.

              Vision : Briser la barrière de l’ignorance dans le domaine de la mécatronique et éveiller les capacités d’innovation des jeunes générations.</p>

          Fondateurs : <br>
          <p><li>Bertille MEDEGNON : Étudiante en L3 de Génie Mécanique et Productique.</li> <br>
              <li>Rosine YAOITCHA : Étudiante en L3 de Génie Électrique et Informatique.</li></p>

<h3>Réalisations et Projets</h3>
          <p>L’un des projets phares de DUOS SALES est L’ÉLECTRONIQUE À LA PORTÉE DE TOUS (EPT), une formation organisée du 26 au 31 août 2024 dans les locaux de l’INSTI. Cette initiative s’adresse aux écoliers et élèves de CM1 à la 4ème, avec pour objectif de rendre l’électronique accessible et compréhensible à tous.</p>
          <h3>Partenaires</h3>

          L'organisation bénéficie du soutien de plusieurs partenaires clés : <br>
          <p><li>SNV</li>
              <li>PRÉFECTURE DU MONO</li>
              <li>DDEMP DU MONO</li>
              <li>DDESTFP DU MONO</li>
              <li>CCS DE LOKOSSA</li></p>
              <p>Avec DUOS SALES, l’avenir de la mécatronique s’écrit entre les mains des jeunes, prêts à innover et à transformer leur environnement.</p>


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
<div class="return">
    <a href="{{ route('annonces') }}" class="back-button">← Retour</a>
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