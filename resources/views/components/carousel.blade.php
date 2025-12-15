<section class="relative overflow-hidden rounded-xl shadow-2xl mx-4 my-8 md:mx-auto md:my-12 max-w-7xl">
    <div id="mainCarousel" class="relative h-64 md:h-96">
        <!-- Slide 1 -->
        <div class="absolute inset-0 carousel-slide active">
            <img src="{{ asset('images/banner1.jpeg') }}" alt="Banner 1" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent"></div>
            <div class="absolute inset-0 flex items-center px-6 md:px-12">
                <div class="max-w-2xl text-white">
                    <h2 class="text-2xl md:text-4xl font-bold mb-4 leading-tight">
                        Découvrez comment l'INSTI prépare la nouvelle génération d'entrepreneurs
                    </h2>
                    <p class="text-lg md:text-xl opacity-90">
                        Grâce à une formation pratique, axée sur les compétences et l'innovation.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Slide 2 -->
        <div class="absolute inset-0 carousel-slide">
            <img src="{{ asset('images/image_duosale2.jpeg') }}" alt="Banner 2" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent"></div>
            <div class="absolute inset-0 flex items-center justify-end px-6 md:px-12">
                <div class="max-w-2xl text-white text-right">
                    <h2 class="text-2xl md:text-4xl font-bold mb-4">
                        Une éducation axée sur l'innovation
                    </h2>
                    <p class="text-lg md:text-xl opacity-90">
                        Transformer des idées en réalité
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Slide 3 -->
        <div class="absolute inset-0 carousel-slide">
            <img src="{{ asset('images/banner2.jpeg') }}" alt="Banner 3" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/70 to-transparent"></div>
            <div class="absolute inset-0 flex items-center px-6 md:px-12">
                <div class="max-w-2xl text-white">
                    <h2 class="text-2xl md:text-4xl font-bold mb-4">
                        Rejoignez-nous pour transformer des idées en réalité
                    </h2>
                    <a href="{{ route('contacts') }}" class="inline-block mt-4 px-8 py-3 bg-white text-blue-900 font-bold rounded-lg hover:bg-blue-100 transition-colors">
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Contrôles -->
    <button id="prevBtn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 text-white w-10 h-10 rounded-full flex items-center justify-center backdrop-blur-sm transition-colors">
        ❮
    </button>
    <button id="nextBtn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 text-white w-10 h-10 rounded-full flex items-center justify-center backdrop-blur-sm transition-colors">
        ❯
    </button>
    
    <!-- Indicateurs -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors active:bg-white"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors"></button>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    let currentSlide = 0;
    
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));
        
        currentSlide = (index + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
        indicators[currentSlide].classList.add('active');
    }
    
    document.getElementById('prevBtn').addEventListener('click', () => showSlide(currentSlide - 1));
    document.getElementById('nextBtn').addEventListener('click', () => showSlide(currentSlide + 1));
    
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => showSlide(index));
    });
    
    // Auto-play
    setInterval(() => showSlide(currentSlide + 1), 5000);
});
</script>