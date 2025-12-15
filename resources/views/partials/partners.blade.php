<section id="partenaires" class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Partenaires Associés</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Nous travaillons avec des partenaires prestigieux pour offrir la meilleure formation possible
            </p>
        </div>
        
        <div class="relative">
            <!-- Conteneur carousel -->
            <div class="overflow-hidden">
                <div id="partnersCarousel" class="flex transition-transform duration-500">
                    <!-- Partenaire 1 -->
                    <div class="min-w-full md:min-w-1/2 lg:min-w-1/4 p-4">
                        <div class="bg-white rounded-xl shadow-lg p-8 h-48 flex items-center justify-center hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ asset('images/UNSTIM.png') }}" alt="UNSTIM" class="max-h-20 object-contain">
                        </div>
                    </div>
                    
                    <!-- Partenaire 2 -->
                    <div class="min-w-full md:min-w-1/2 lg:min-w-1/4 p-4">
                        <div class="bg-white rounded-xl shadow-lg p-8 h-48 flex items-center justify-center hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ asset('images/SONEB.png') }}" alt="SONEB" class="max-h-20 object-contain">
                        </div>
                    </div>
                    
                    <!-- Partenaire 3 -->
                    <div class="min-w-full md:min-w-1/2 lg:min-w-1/4 p-4">
                        <div class="bg-white rounded-xl shadow-lg p-8 h-48 flex items-center justify-center hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ asset('images/GEL.png') }}" alt="Guichet d'Économie Locale" class="max-h-20 object-contain">
                        </div>
                    </div>
                    
                    <!-- Partenaire 4 -->
                    <div class="min-w-full md:min-w-1/2 lg:min-w-1/4 p-4">
                        <div class="bg-white rounded-xl shadow-lg p-8 h-48 flex items-center justify-center hover:shadow-xl transition-shadow duration-300">
                            <img src="{{ asset('images/snv.jpeg') }}" alt="SNV" class="max-h-20 object-contain">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contrôles -->
            <button id="partnersPrev" class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 bg-white shadow-lg hover:shadow-xl w-10 h-10 rounded-full flex items-center justify-center text-gray-700 hover:text-blue-600 transition-all">
                ❮
            </button>
            <button id="partnersNext" class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-4 bg-white shadow-lg hover:shadow-xl w-10 h-10 rounded-full flex items-center justify-center text-gray-700 hover:text-blue-600 transition-all">
                ❯
            </button>
        </div>
        
        <!-- Indicateurs -->
        <div class="flex justify-center space-x-2 mt-8">
            <button class="partner-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500 transition-colors active:bg-blue-600"></button>
            <button class="partner-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500 transition-colors"></button>
            <button class="partner-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500 transition-colors"></button>
            <button class="partner-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500 transition-colors"></button>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('partnersCarousel');
    const items = document.querySelectorAll('#partnersCarousel > div');
    const indicators = document.querySelectorAll('.partner-indicator');
    let currentIndex = 0;
    const itemWidth = items[0].offsetWidth;
    
    function updateCarousel() {
        const translateX = -currentIndex * itemWidth;
        carousel.style.transform = `translateX(${translateX}px)`;
        
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('bg-blue-600', index === currentIndex);
            indicator.classList.toggle('bg-gray-300', index !== currentIndex);
        });
    }
    
    document.getElementById('partnersPrev').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel();
    });
    
    document.getElementById('partnersNext').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
    });
    
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
    });
    
    // Responsive
    function handleResize() {
        const itemWidth = items[0].offsetWidth;
        updateCarousel();
    }
    
    window.addEventListener('resize', handleResize);
});
</script>