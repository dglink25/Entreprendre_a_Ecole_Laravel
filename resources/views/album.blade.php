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
        <h1 class="title">GALERIES</h1>
        <p class="event">
          EXPLOREZ NOS ALBUMS PHOTOS ORGANISES PAR CATEGORIES POUR DECOUVRIR LES EVENEMENTS, PROJETS, ET MOMENTS MARQUANTS QUI ILLUSTRENT NOTRE IMPACT.
        </p>
      </div>
    </div>
  </section>

<div class="container my-5">
    <div class="albums-header">
        <h2 class="album-title">LES ALBUMS</h2>
        <div class="divider flex-grow-1"></div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <!-- Album 1 -->
      <div class="col">
        <a href="{{ route('sous_album') }}" class="card-link">
          <div class="card border-0">
            <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 1" class="card-img-top album-image">
            <div class="card-body">
              <p class="album-description">Galerie photos de l’entreprise EduTech Solutions</p>
            </div>
          </div>
        </a>
      </div>
      
      <!-- Album 2 -->
      <div class="col">
        <a href="{{ route('sous_album') }}" class="card-link">
          <div class="card border-0">
            <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 2" class="card-img-top album-image">
            <div class="card-body">
              <p class="album-description">Galerie photos de l’entreprise AgroGreen</p>
            </div>
          </div>
        </a>
      </div>
      
      <!-- Album 3 -->
      <div class="col">
        <a href="{{ route('sous_album') }}" class="card-link">
          <div class="card border-0">
            <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 3" class="card-img-top album-image">
            <div class="card-body">
              <p class="album-description">Galerie photos de l’entreprise AppDev229</p>
            </div>
          </div>
        </a>
      </div>
      
      <!-- Album 4 -->
      <div class="col">
        <a href="{{ route('sous_album') }}" class="card-link">
          <div class="card border-0">
            <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 4" class="card-img-top album-image">
            <div class="card-body">
              <p class="album-description">Événements et Activités</p>
            </div>
          </div>
        </a>
      </div>
      
      <!-- Album 5 -->
      <div class="col">
        <a href="{{ route('sous_album') }}" class="card-link">
          <div class="card border-0">
            <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 5" class="card-img-top album-image">
            <div class="card-body">
              <p class="album-description">Partenariats</p>
            </div>
          </div>
        </a>
      </div>
      
      <!-- Album 6 -->
      <div class="col">
        <a href="{{ route('sous_album') }}" class="card-link">
          <div class="card border-0">
            <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 6" class="card-img-top album-image">
            <div class="card-body">
              <p class="album-description">Programme en Action</p>
            </div>
          </div>
        </a>
      </div>
      
    </div>
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
@endsection('content')