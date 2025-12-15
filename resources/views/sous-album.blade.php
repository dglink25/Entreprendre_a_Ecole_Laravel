@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')
  <div class="container my-5">
    <div class="albums-header">
        <h2 class="album-title">LES SOUS - ALBUMS</h2>
        <div class="divider flex-grow-1"></div>
        <p class="sousalbum-description">Galerie photos de l’entreprise EduTech Solutions</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Album 1 -->
        <div class="col">
            <a href="{{ route('sous-album_sous') }}" class="card-link">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 1" class="card-img-top album-image">
                <div class="card-body">
                    <p class="album-description">Développement des Solutions Numériques</p>
                </div>
            </div>
            </a>
        </div>
        <!-- Album 2 -->
        <div class="col">
            <a href="{{ route('sous-album_sous') }}" class="card-link">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 2" class="card-img-top album-image">
                <div class="card-body">
                    <p class="album-description">Formations : Utilisation de SmartClass</p>
                </div>
            </div>
            </a>
        </div>
        <!-- Album 3 -->
        <div class="col">
            <a href="{{ route('sous-album_sous') }}" class="card-link">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 3" class="card-img-top album-image">
                <div class="card-body">
                    <p class="album-description">Conférence sur l'Éducation Numérique – 2023</p>
                </div>
            </div>
            </a>
        </div>
        <!-- Album 4 -->
        <div class="col">
            <a href="{{ route('sous-album_sous') }}" class="card-link">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 4" class="card-img-top album-image">
                <div class="card-body">
                    <p class="album-description">Collaboration avec le Lycée Technique de Lokossa</p>
                </div>
            </div>
            </a>
        </div>
        <!-- Album 5 -->
        <div class="col">
            <a href="{{ route('sous-album_sous') }}" class="card-link">
            <div class="card border-0">
                <img src="{{ asset('images/imgAlbum.png') }}" alt="Album 5" class="card-img-top album-image">
                <div class="card-body">
                    <p class="album-description">Témoignages d'Élèves et Enseignants</p>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="return">
        <a href="{{ route('galeries') }}" class="back-button">← Retour</a>
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