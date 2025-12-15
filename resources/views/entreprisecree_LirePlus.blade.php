@extends('layouts.app')

@section('title', 'Acceuil')

@section('content')
    <section class="gallery-header position-relative">
        <!-- Texte fixe sur le carrousel -->
        <!-- Texte fixe sur le carrousel -->
        <div class="carousel-overlay">
            <div class="carousel_title">
                <h1>ENTREPRISES CRÉÉES</h1>
                <p class="subtitle">LES ENTREPRISES INNOVANTES NÉES GRACE AU PROGRAMME ENTREPRENDRE A L’ÉCOLE</p>
                <p class="event">DUOS SALES</p>
            </div>
        </div>
        <div class="header-image">
            <img src="{{ asset('images/DSC_0196 1.png') }}" class="d-block w-100" alt="Galeries">
        </div>
    </section>
    <div class="container00">
        <div class="main-content">
            <img src="images/image_duosale2.jpeg" alt="Lancement AppDev229" class="event-image">
            <div class="content">
                <p class="event-date title" style="font-size: 17px; color:#0D4293;"><img src="icons/Vector (1).png" alt="galerie">    Créée le 22 juillet 2024</p>
                <h1 class="title" style="font-size: 1.4rem;margin-top: 30px;">DUOS SALES</h1>
                <h2 class="title" style="font-size: 1rem; margin-top: 30px;margin-bottom: 30px;">Domaine d’Activité :
                    Initiation à l'électronique.</h2>
                <h2 class="title" style="font-size: 1rem; color:#0D4293;margin-bottom: 10px">Description Détaillée :
                </h2>
                <p>DUOS SALES est une startup innovante qui se consacre à l'initiation
                     des jeunes écoliers et élèves à l'utilisation basique de l'électronique. 
                     L'entreprise vise à briser la barrière de l'ignorance dans le domaine de
                     la mécatronique en éveillant les capacités d'innovation des jeunes, afin de les préparer
                       à devenir des acteurs clés dans l'évolution technologique future.</p>

                <h2 class="title" style="font-size: 1rem; color:#0D4293;margin-top: 30px;">Mission :</h2>

                <p> Initier les jeunes écoliers et élèves à l'utilisation basique de l'électronique. </p>

                <h2 class="title" style="font-size: 1rem; color:#0D4293;margin-top: 30px;">Vision :</h2>

                <p>Briser la barrière qu'est l'ignorance des jeunes dans le domaine de la mécatronique 
                    et réveiller leurs capacités à innover dans ce domaine.</p>
                <h2 class="title" style="font-size: 1rem; color:#0D4293;margin-top: 30px;">Fondateur :</h2>
                <ul class="founders-list">
                    <li>Bertille MEDEGNON : Étudiante en L3 de Génie Mécanique et Productique.</li><br>

                    <li> Rosine YAOITCHA : Étudiante en L3 de Génie Électrique et Informatique.</li>
                </ul>

                <h2 class="title" style="font-size: 1rem; color:#0D4293;margin-top: 30px;">Projets Réalisés ou Produits
                    :</h2>

                <p>DUOS SALES a développé plusieurs produits pour répondre aux défis actuels de l'éducation :</p>
                <ol class="founders-list">
                    <li>L'ÉLECTRONIQUE À LA PORTÉE DE TOUS (EPT): c'est une formation dédiée aux écoliers et élèves 
                        de la classe du CM1 en 4ème, organisée du 26 au 31 août 2024 dans les locaux de l'INSTI .</li><br>
                    
                </ol>

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
                    </ul>
                </div>

                <!-- Tags -->
                <div class="tags" style="margin-bottom: 610px;;">
                    <h2 style="font-size: 1.1rem;margin-top: 30px;">Tags</h2>
                    <div class="under mt-2"></div>
                    <div class="d-flex flex-wrap">
                        <button class="btn">Startups</button>
                        <button class="btn">Innovation</button>
                        <button class="btn">Développement durable</button>
                    </div>
                </div>

                <div class="Contacts mb-4">
                    <h5>Contacts</h5>
                    <div class="under mt-2"></div>
                    <h2 class="title" style="font-size: 1rem; color:#0D4293;">E-mail :</h2>
                    <p>contact@edutechsolutions.com</p><br>
                    <h2 class="title" style="font-size: 1rem; color:#0D4293;">Téléphone :</h2>
                    <p>+229 97 65 43 21</p><br>
                    <h2 class="title" style="font-size: 1rem; color:#0D4293;">Site Web :</h2>
                    <p>www.edutechsolutions.com</p><br>
                </div>
            </div>
        </div>

    </div>
    <div class="partners-section">
        <h1><strong>Partenaires Associés</strong></h1>
        <div class="under1"></div>
        <div class="carousel1">
            <button class="prev-btn">❮</button>
            <div class="carousel-images">
                <img src="icons/images-removebg-preview (3).png" alt="UNSTIM">
                <img src="images/justice.png" alt="SONEB">
                <img src="images/snv.jpeg" alt="Guichet d'Économie Locale">
            </div>
            <button class="next-btn">❯</button>
        </div>
    </div>
        <div class="buttons">
            <a href="gallery.html" class="btn-gallery">Voir Galerie d'Images <span><img src="icons/solar_gallery-wide-bold-duotone.png" alt="galerie"></span></a>
        </div>
    
    <script>
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const carouselImages = document.querySelector('.carousel-images');
    
        let scrollPosition = 0;
    
        prevBtn.addEventListener('click', () => {
            scrollPosition -= 120; // Ajustez la valeur selon la largeur de vos images
            if (scrollPosition < 0) scrollPosition = 0;
            carouselImages.style.transform = `translateX(-${scrollPosition}px)`;
        });
    
        nextBtn.addEventListener('click', () => {
            scrollPosition += 120; // Ajustez la valeur selon la largeur de vos images
            const maxScroll = carouselImages.scrollWidth - carouselImages.offsetWidth;
            if (scrollPosition > maxScroll) scrollPosition = maxScroll;
            carouselImages.style.transform = `translateX(-${scrollPosition}px)`;
        });
    </script>
    
    <div class="return">
        <a href="{{ route('entreprises') }}" class="back-button">← Retour</a>
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