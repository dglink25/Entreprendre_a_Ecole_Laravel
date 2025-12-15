import '../css/app.css';

// Menu mobile
document.addEventListener('DOMContentLoaded', function() {
    // Toggle menu mobile
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('hidden');
            this.innerHTML = navMenu.classList.contains('hidden') 
                ? '☰ Menu' 
                : '✕ Fermer';
        });
    }
    
    // Menu déroulant desktop
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').classList.remove('hidden');
        });
        
        dropdown.addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').classList.add('hidden');
        });
    });
    
    // Carousel
    const carouselSlides = document.querySelectorAll('.carousel-slide');
    const carouselIndicators = document.querySelectorAll('.carousel-indicator');
    let currentSlide = 0;
    
    function showSlide(index) {
        carouselSlides.forEach(slide => slide.classList.remove('active'));
        carouselIndicators.forEach(indicator => indicator.classList.remove('active'));
        
        currentSlide = (index + carouselSlides.length) % carouselSlides.length;
        carouselSlides[currentSlide].classList.add('active');
        carouselIndicators[currentSlide].classList.add('active');
    }
    
    // Auto-play carousel
    setInterval(() => {
        showSlide(currentSlide + 1);
    }, 5000);
});