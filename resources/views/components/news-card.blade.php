<div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 h-full flex flex-col">
    <!-- Image -->
    <div class="relative h-48 overflow-hidden">
        <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" 
             class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
    </div>
    
    <!-- Contenu -->
    <div class="p-6 flex-grow flex flex-col">
        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
            {{ $title }}
        </h3>
        
        <p class="text-gray-600 mb-6 flex-grow line-clamp-3">
            {{ $description }}
        </p>
        
        <!-- Footer avec date et lien -->
        <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
            <div class="flex items-center text-gray-500">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
                <span class="font-medium">{{ $date }}</span>
            </div>
            
            <a href="{{ route('annonces_plus') }}" 
               class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                Lire plus
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
</div>