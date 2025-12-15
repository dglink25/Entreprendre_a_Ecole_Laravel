@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')
  <div class="container my-5">
    <div class="albums-header">
        <h2 class="album-title">LES SOUS - ALBUMS</h2>
        <div class="divider flex-grow-1"></div>
        <p class="sousalbum-description">Galerie photos de l’entreprise EduTech Solutions</p>
        <div class="subalbum-toggle">
            <img src="{{ asset('icons/fleche_album.svg') }}" alt="Flèche" class="arrow-icon">
          <span class="subalbum-text">Développement des Solutions Numériques</span>
        </div>
      </div>
      
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- photo 1 -->
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 1" class="card-img-top album-image">
            </div>
        </div>
        <!-- photo 2 -->
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 2" class="card-img-top album-image">
            </div>
        </div>
        <!-- photo 3 -->
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 3" class="card-img-top album-image">
            </div>
        </div>
        <!-- photo 4 -->
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 4" class="card-img-top album-image">
            </div>
        </div>
        <!-- photo 5 -->
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 5" class="card-img-top album-image">
            </div>
        </div>
        <!-- photo 5 -->
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 5" class="card-img-top album-image">
            </div>
        </div>
        <!-- photo 5 -->
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 5" class="card-img-top album-image">
            </div>
        </div>
    </div>

    <div class="return">
        <a href="{{ route('sous_album') }}" class="back-button">← Retour</a>
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